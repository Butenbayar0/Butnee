<?php
session_start();
require_once 'db.php';
ob_start();

$id = base64_decode($_GET['id']); 

if(isset($_POST['submit'])){
	$customer_name = $_POST['customer_name'];
	$customer_desegnation = $_POST['customer_desegnation'];
	$customer_comment = $_POST['customer_comment'];


	if(!empty($customer_name) &&!empty($customer_desegnation) && !empty($customer_desegnation) ){
		$work_insert = $dbcon->query("UPDATE testimonials SET customer_name='$customer_name',customer_desegnation='$customer_desegnation',customer_comment='$customer_comment' WHERE id=$id");
		if($work_insert){
		
			$_SESSION['testimonial_update_success'] = "Шинэчлэгдсэн!";
			header('location: all_testimonials.php');
			ob_end_flush();
		} 
	}

}

// зургийн баталгаажуулалт
if(isset($_POST['photo_submit'])){
	$photo      = $_FILES['photo']['name'];
	$photo_ext_array  = explode('.', $photo);
	$photo_ext = end($photo_ext_array);
	$photo_name =$id .".".$photo_ext;

	if(!empty($photo)){
		// хоосон эсэх
		if($_FILES['photo']['size']<5000000){
			// зургийн хэмжээ тодорхой хэмжээтэй эсэх
			$accepted_extension_list = ['png','jpg','jpeg'];
			if( in_array(strtolower($photo_ext),$accepted_extension_list) ){
				// одоогийн зураг устгах
				$old_photo_query =$dbcon->query("SELECT photo FROM testimonials WHERE id=$id");
				$old_photo = $old_photo_query->fetch_assoc();

				$photo_link = "image/customers/".$old_photo['photo'];
				unlink($photo_link);

				// зураг оруулах
				$update_photo =$dbcon->query("UPDATE testimonials SET photo='$photo_name' WHERE id=$id");
				if($update_photo){
					move_uploaded_file($photo = $_FILES['photo']['tmp_name'],"image/customers/". $photo_name);
					$_SESSION['testimonial_photo_success'] = "Зураг амжилттай хавсаргалаа!";
					header('location: testimonial_update.php?id=' . base64_encode($id));
					ob_end_flush();
				}


			}else{
				// тодорхойгүй гэж зураг оруулах
				$_SESSION['testimonial_photo_extension'] = "jpg, png эсвэл jpeg өргөтгөлтэй зураг оруулна уу";
				header('location: testimonial_update.php?id=' . base64_encode($id));
				ob_end_flush();
			}

		}else{
			// тодорхой хэмжээгээс илүү гэж зураг оруулах
			$_SESSION['testimonial_photo_size'] = "1MB-с хэтэрхий хэмжээтэй зургийг оруулна уу";
			header('location: testimonial_update.php?id=' . base64_encode($id));
			ob_end_flush();
		}



	} else{
		// хоосон гэж зураг оруулах
		$_SESSION['testimonial_photo_emty'] = "Зураг оруулна уу";
		header('location: testimonial_update.php?id=' . base64_encode($id));
		ob_end_flush();
	}

}

?>
