<?php
session_start();
require_once 'db.php';
ob_start();

$id = base64_decode($_GET['id']); 



// зургийн баталгаажуулалт
if(isset($_POST['photo_submit'])){
	$photo      = $_FILES['photo']['name'];
	$photo_ext_array  = explode('.', $photo);
	$photo_ext = end($photo_ext_array);
	$photo_name =$id .".".$photo_ext;

	if(!empty($photo)){
		// хоосон биш бол
		if($_FILES['photo']['size']<2000000){
			// тодорхой хэмжээтэй зургийг оруулсан тохиолдолд
			$accepted_extension_list = ['png','jpg','jpeg'];
			if( in_array(strtolower($photo_ext),$accepted_extension_list) ){
				// одоогийн зургийг устгах
				$old_photo_query =$dbcon->query("SELECT photo FROM users WHERE id=$id");
				$old_photo = $old_photo_query->fetch_assoc();

				$photo_link = "image/users/".$old_photo['photo'];
				if(!($old_photo['photo']=='default.png')){
					unlink($photo_link);
				}
				

				// зураг оруулах
				$update_photo =$dbcon->query("UPDATE users SET photo='$photo_name' WHERE id=$id");
				if($update_photo){
					move_uploaded_file($photo = $_FILES['photo']['tmp_name'],"image/users/". $photo_name);
					$_SESSION['profile_photo_success'] = "Зураг амжилттай хавсаргалаа!";
					header('location: profile.php');
					ob_end_flush();
				}


			}else{
				// өргөтгөл таарахгүй тохиолдолд
				$_SESSION['profile_photo_extension'] = "Jpg, png эсвэл jpeg зураг оруулна уу";
				header('location: profile.php');
				ob_end_flush();
			}

		}else{
			// тодорхой хэмжээнээс хэтэрсэн тохиолдолд
			$_SESSION['profile_photo_size'] = "1MB-с бага хэмжээтэй зураг оруулна уу";
			header('location: profile.php');
			ob_end_flush();
		}



	} else{
		// хоосон байвал
		$_SESSION['profile_photo_emty'] = "Зураг оруулна уу";
		header('location: profile.php');
		ob_end_flush();
	}

}

?>
