<?php
session_start();
require_once 'db.php';
ob_start();

$id = base64_decode($_GET['id']); 

if(isset($_POST['submit'])){
	$works_name = $_POST['works_name'];
	$catagory = $_POST['catagory'];


	if(!empty($works_name) && !empty($catagory) ){
		$work_insert = $dbcon->query("UPDATE my_best_works SET works_name='$works_name',catagory='$catagory' WHERE id=$id");
		if($work_insert){
		
			$_SESSION['best_works_update_success'] = "Амжилттай шинэчлэгдлээ!";
			header('location: best_works.php');
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
		// хоосон биш бол
		if($_FILES['photo']['size']<5000000){
			// зургийн хэмжээ нь дуусгах 5мб-аас багагүй байх ёстой
			$accepted_extension_list = ['png','jpg','jpeg'];
			if( in_array(strtolower($photo_ext),$accepted_extension_list) ){
				// одоогийн зургийг устгах
				$old_photo_query =$dbcon->query("SELECT photo FROM my_best_works WHERE id=$id");
				$old_photo = $old_photo_query->fetch_assoc();

				$photo_link = "image/my_best_works/".$old_photo['photo'];
				unlink($photo_link);

				// зургийг хуулах
				$update_photo =$dbcon->query("UPDATE my_best_works SET photo='$photo_name' WHERE id=$id");
				if($update_photo){
					move_uploaded_file($photo = $_FILES['photo']['tmp_name'],"image/my_best_works/". $photo_name);
					$_SESSION['best_works_photo_success'] = "Зураг амжилттай хавсаргалаа!";
					header('location: best_works_update.php?id=' . base64_encode($id));
					ob_end_flush();
				}


			}else{
				// зургийн өргөтгөл нь таарахгүй бол
				$_SESSION['best_works_photo_extension'] = "jpg, png эсвэл jpeg өргөтгөлтэй зураг хавсаргаарай";
				header('location: best_works_update.php?id=' . base64_encode($id));
				ob_end_flush();
			}

		}else{
			// тодорхой хэмжээнд бус зураг хавсаргаагүй бол
			$_SESSION['best_works_photo_size'] = "1MB -аас бага хэмжээтэй зургийг хавсаргаарай";
			header('location: best_works_update.php?id=' . base64_encode($id));
			ob_end_flush();
		}



	} else{
		// хоосон байвал
		$_SESSION['best_works_photo_emty'] = "Зураг хавсаргана уу";
		header('location: best_works_update.php?id=' . base64_encode($id));
		ob_end_flush();
	}

}

?>
