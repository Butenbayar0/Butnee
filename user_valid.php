<?php
session_start(); 

if(isset($_POST['reg_submit'])){

	$fname          			= $_POST['fname'];
	$email          			= $_POST['email'];
	$password       			= $_POST['password'];
	$cpassword      			= $_POST['cpassword'];
	$photo      					= $_FILES['photo']['name']; 
	$photo_ext_array  	  = explode('.', $photo);
	$photo_ext            = end($photo_ext_array);


// all input error
$input_error = [];


if(empty($fname)){
	$input_error['name'] = "Хэрэглэчийн нэр?";
}

else if(preg_match('@[0-9]@', $fname)){
	$input_error['name'] = "Нэр?";
}
if(empty($email)){
	$input_error['email']="И-мэйл";
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$input_error['email'] = "И-мэйлээ давтан оруулна уу?";
}
if(empty($password)){
	$input_error['password'] = '8 урттай нууц үгээ тоо, том, жижиг үсгээр оруулна';
}

else if(strlen($password)<8 || !preg_match('@[0-9]@',$password) || !preg_match('@[a-z]@',$password) || !preg_match('@[A-Z]@',$password) ){
	$input_error['password'] = '8 урттай нууц үгээ тоо, том, жижиг үсгээр оруулна';
}
else if(empty($cpassword)){
	$input_error['cpassword'] = "Нууц үг?";
}

else if($cpassword != $password){
	$input_error['cpassword'] = "Нууц үг таарахгүй байна!";
}



// ===================== if no error then go to database ====

if(count($input_error)==0){
	$email_check_query = $dbcon->query("SELECT * FROM users WHERE email='$email'");

// ========= check email exists in db or not 

	if($email_check_query->num_rows!=0){
		$email_exist = "Имэйл аль хэдийн байна. Өөр имэйлээр оролдоно уу";
	// num_rows check bracket	
	}else{
		$hash_password = password_hash($password, PASSWORD_BCRYPT);
		$user_data_insert_query = "INSERT INTO users (fname,email,password) VALUES('$fname','$email','$hash_password')";
		$user_insert = $dbcon->query($user_data_insert_query);
		if($user_insert){
			if(!empty($photo)){
				if($_FILES['photo']['size']<200000){
					$valid_ext = ['jpg','png','jpeg'];
					if(in_array($photo_ext,$valid_ext)){

						$last_id = $dbcon->insert_id;
						$photo_name =$last_id . '.' . $photo_ext;
						$dbcon->query("UPDATE users SET photo='$photo_name' WHERE id=$last_id");

						move_uploaded_file($_FILES['photo']['tmp_name'], 'admin/image/users/'.$photo_name);
						$_SESSION['user_success'] = "Таны бүртгэл амжилттай үүсгэгдсэн!";
						header('location: login.php');

					}
					}
				}else{
					// if not attached photo 

					$_SESSION['user_success'] = "Таны бүртгэл амжилттай үүсгэгдсэн!";
					header('location: login.php');
				}
				
			}
		}

// input error check bracket
}



// isset check bracket
}

?>