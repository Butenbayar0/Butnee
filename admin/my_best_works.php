<?php 
require_once "user_auth.php";
ob_start();
$title="Миний сайхан ажилуудыг нэмэх";
require_once "header.php";
require_once "db.php";

if(isset($_POST['submit'])){
	$work_name     = $_POST['work_name'];
	$work_catagory = $_POST['project_catagory'];
	$photo         = $_FILES['photo']['name'];
	$photo_ext_arr = explode('.', $photo);
	$photo_ext     = end($photo_ext_arr);
	

	if(!empty($work_name) && !empty($work_catagory) ){
		$work_insert = $dbcon->query("INSERT INTO my_best_works (works_name,catagory) VALUES('$work_name','$work_catagory')");
		if($work_insert){

			if(!empty($photo)){
				// хоосон биш бол
				if($_FILES['photo']['size']<2000000){
					// тодорхой хэмжээтэй зураг оруулсан тохиолдолд
					$accepted_extension_list = ['png','jpg','jpeg'];
					if( in_array(strtolower($photo_ext),$accepted_extension_list) ){

						$last_id = $dbcon->insert_id;
						$photo_name    = $last_id.".".$photo_ext;
						// зураг оруулах
						$update_photo =$dbcon->query("UPDATE my_best_works SET photo='$photo_name' WHERE id=$last_id");


						move_uploaded_file($_FILES['photo']['tmp_name'], 'image/my_best_works/'.$photo_name);
						$_SESSION['best_works_success'] = "Амжилттай нэмэгдлээ!";
						header('location: best_works.php');
						ob_end_flush();
					}
					// зургийн өргөтгөл шалгах
				} 
				// файлын хэмжээ шалгах дууссан
			}else{
				// зургийн байхгүй өгөгдөл нэмэгдлээ
				$_SESSION['best_works_success'] = "Амжилттай нэмэгдлээ!";
				header('location: best_works.php');
				ob_end_flush();			
			} 

				
		}
		// ажлыг нэмэх дууссан
	} 
	// хоосон эсэхийг шалгах
}
// isset дууссан


?>


															<!-- кард эхлэх -->
	                          	<div class="card mb-3" >
															  <div class="card-header bg-success text-center"><h2>Миний сайхан ажилуудыг нэмэх</h2></div>

															  <!-- кард боди эхлэх -->
															  <div class="card-body">

																	<!-- агуулга эхлэх -->

																			<form action="" method="post" enctype="multipart/form-data">
																				<div class="form-group">
																					<label for="project_name">Ажлын нэр</label>
																					<input type="text" class="form-control" name="work_name">
																				</div>

																				<div class="form-group">
																					<label for="project_catagory">Төрөл</label>
																					<input type="text" class="form-control" name="project_catagory">
																				</div>
																				<div class="form-group">
																					<input class="form-control" type="file" name="photo">
																					<label for="">Зургийг оруулах</label>
																				</div>
																				
																				<div class="form-group">
																					<input class="btn btn-block btn-success" type="submit" value="Ажлыг нэмэх" name="submit">
																				</div>

																			</form>

																<!-- агуулга дууссан -->


																	  </div>
																	  <!-- кард боди дууссан -->

																	</div>
																	<!-- кард дууссан -->

																			



<!-- ============ доод хэсэгийн агуулга =============== -->
<?php 
    require_once "footer.php";
?>
