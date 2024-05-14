<?php 
require_once "user_auth.php";
$title="нууц үг солих";
require_once "header.php";
require_once "db.php";

$email = $_SESSION['user_email'];
$result = $dbcon->query("SELECT password FROM users WHERE email='$email'");
$row = $result->fetch_assoc();
$password_from_db = $row['password'];

if(isset($_POST['submit'])){
	$old_password = $_POST['old_pass'];
	$new_password = $_POST['new_pass'];
	$con_password = $_POST['con_pass'];
	if(password_verify($old_password,$password_from_db)){
		// хуучин нууц үг зөв бол
		if(!password_verify($new_password,$password_from_db)){
			// шинэ болон хуучин нууц үг таарахгүй байна
			if(!strlen($new_password)<8 || preg_match('@[0-9]@', $new_password) || preg_match('@[a-z]@', $new_password) || preg_match('@[A-Z]@', $new_password)){
				// нууц үгийн хэмжээ баталгаажсан байх ёстой
				if($new_password==$con_password){
					// шинэ болон баталгаажуулалтын нууц үг тааруулж байгаа эсэх

					$new_hash_password = password_hash($new_password, PASSWORD_BCRYPT);
					$new_pass_update = $dbcon -> query("UPDATE users SET password = '$new_hash_password' WHERE email='$email'");
						$password_change_success = "Таны нууц үг амжилттай солигдлоо";
		

				}else{
					// шинэ болон баталгаажуулалтын нууц үг таарахгүй байна
					$con_pass_not_match = "Нууц үг баталгаажуулалттай таарахгүй байна";
				}
			}else{
				// нууц үгийн хэмжээ буруу байна
				$pass_lenght = "8 урттай, тоо, том үсэг, жижиг үсэг агуулсан шинэ нууц үг оруулна уу";
			}
		}else{
			// шинэ болон хуучин нууц үг таарахгүй байна
			$old_new_matched = "Та өмнөх нууц үгээ шинэ нууц үгээр солих боломжгүй";
		}


	}else{
		// хуучин нууц үг таарахгүй байна
		$old_pass_not_match = "Хуучин нууц үг тохирохгүй байна";
	}
}




?>


<!-- Хуудасны агуулга эхлэх -->
                <div class="content">
                    <div class="container-fluid">
											

											

											
                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Акаунтын тойм</h4>

																	<!-- бүх алдаа эхлэх  -->

																	<!-- хуучин нууц үг тохирохгүй байна  -->
																	<?php if(isset($old_pass_not_match)){ ?>
							                    	<div class="alert alert-danger">
							                    		<?=$old_pass_not_match?>
							                    	</div>
						                    	<?php } ?>

						                    <!-- алдааны мессеж дуусах -->

						                    <!-- шинэ болон хуучин нууц үг таарахгүй байна  -->
																	<?php if(isset($old_new_matched)){ ?>
							                    	<div class="alert alert-danger">
							                    		<?=$old_new_matched?>
							                    	</div>
						                    	<?php } ?>

						                    <!-- алдааны мессеж дуусах -->

																<!-- нууц үгийн баталгаажуулалтын алдаа  -->
																<?php if(isset($pass_lenght)){ ?>
						                    	<div class="alert alert-danger">
						                    		<?=$pass_lenght?>
						                    	</div>
					                    	<?php } ?>

					                    <!-- алдааны мессеж дуусах -->

					                    <!-- нууц үгийн баталгаажуулалтын алдаа  -->
																<?php if(isset($con_pass_not_match)){ ?>
						                    	<div class="alert alert-danger">
						                    		<?=$con_pass_not_match?>
						                    	</div>
					                    	<?php } ?>

					                    <!-- алдааны мессеж дуусах -->



																	<!-- бүх алдаа дуусах -->

																	<!-- нууц үг солих амжилттай мессеж -->

																	
																<?php if(isset($password_change_success)){ ?>
						                    	<div class="alert alert-success">
						                    		<?=$password_change_success?>
						                    	</div>
					                    	<?php } ?>

					                    <!-- амжилттай мессеж дуусах -->


                                    <form action="" method="post">
                                    	
																			<div class="form-group">
																				<label for="old_pass">Хуучин Нууц Үг</label>
																				<input class="form-control" type="password" name="old_pass" id="old_pass">
																			</div>

																			<div class="form-group">
																				<label for="new_pass">Шинэ Нууц Үг</label>
																				<input class="form-control" type="password" name="new_pass" id="new_pass">
																			</div>

																			<div class="form-group">
																				<label for="con_pass">Нууц Үг Давтах</label>
																				<input class="form-control" type="password" name="con_pass" id="con_pass">
																			</div>
																			
																			<div class="form-group">
																			<input class="btn btn-block btn-success" type="submit" value="Нууц Үг Солих" name="submit">
																			</div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->




<!-- ============ Хаяг болон товчны агуулга =============== -->
<?php 
    require_once "footer.php";
?>
