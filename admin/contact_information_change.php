<?php 
require_once "user_auth.php";
ob_start();
$title="Холбоо барих мэдээлэл";
require_once "header.php";
require_once "db.php";

$query = "SELECT * FROM contact_information";
$result = $dbcon -> query($query);

$row = $result -> fetch_assoc();

if(isset($_POST['submit'])){
	$small_text = $_POST['small_text'];
	$office = $_POST['office'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];


	if(!empty($small_text) && !empty($office) && !empty($address) && !empty($phone) && !empty($email)){
		$fact_information_update = $dbcon->query("UPDATE contact_information SET small_text='$small_text',office='$office',address='$address',phone='$phone',email='$email' WHERE id=1");
		$_SESSION['contact_information_change'] = "Мэдээлэл амжилттай өөрчлөгдлөө!";
		header('location: contact_information.php');
		ob_end_flush();
		 
	}

}




?>


<!-- Хуудасны агуулга эхлэх -->
	<div class="card text-dark mb-3" >
	  <div class="card-header bg-success text-center"><h2>Холбоо барих мэдээлэл</h2></div>
	  	<div class="card-body">

						<form action="" method="post" >
							
							<div class="form-group">
								<label for="project_catagory">Ажлын байр</label>
								<input type="text" class="form-control" name="office" value="<?=$row['office']?>">
							</div>

							<div class="form-group">
								<label for="project_catagory">Хаяг</label>
								<input type="text" class="form-control" name="address" value="<?=$row['address']?>">
							</div>

							<div class="form-group">
								<label for="project_catagory">Утас</label>
								<input type="text" class="form-control" name="phone" value="<?=$row['phone']?>">
							</div>

							<div class="form-group">
								<label for="project_catagory">Имэйл</label>
								<input type="text" class="form-control" name="email" value="<?=$row['email']?>">
							</div>
							
							<div class="form-group">
								<label for="project_name">Дэлгэрэнгүй</label>
								<textarea name="small_text" class="form-control"><?=$row['small_text']?></textarea>
							</div>
							
							<div class="form-group">
								<input class="btn btn-block btn-success" type="submit" value="Шинэчлэх" name="submit">
							</div>


						</form>
					</div>
				</div>



                               
<!-- ============ Хаяг болон товчны агуулга =============== -->
<?php 
    require_once "footer.php";
?>
