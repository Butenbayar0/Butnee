<?php 
require_once "user_auth.php";
ob_start();
$title="Статистикийг шинэчлэх";
require_once "header.php";
require_once "db.php";

$data_from_db_query = $dbcon->query("SELECT * FROM stastistics");
$data_from_db = $data_from_db_query->fetch_assoc();

if(isset($_POST['submit'])){
	$feature_item = $_POST['feature_item'];
	$active_products = $_POST['active_products'];
	$experience = $_POST['experience'];
	$clients = $_POST['clients'];


	if(!empty($feature_item) && !empty($active_products) && !empty($experience) && !empty($clients)){
		$fact_information_update = $dbcon->query("UPDATE stastistics SET feature_item='$feature_item',active_products='$active_products',experience='$experience',clients='$clients' WHERE id=1");
		$_SESSION['stastistics_update'] = "Амжилттай шинэчлэгдлээ";
		header('location: statistics.php');
		ob_end_flush();
		 
	}

}

?>


<!-- Эхлэх хуудасны агуулга -->
<div class="card text-dark mb-3" >
	<div class="card-header bg-success text-center"><h2>Статистикийг шинэчлэх</h2></div>
	<div class="card-body">

		<form action="" method="post" >
			<div class="form-group">
				<label for="project_name">Онцлог бүтээгдэхүүн</label>
				<input type="text" class="form-control" name="feature_item" value="<?=$data_from_db['feature_item']?>">
			</div>

			<div class="form-group">
				<label for="project_catagory">Идэвхтэй бүтээгдэхүүн</label>
				<input type="text" class="form-control" name="active_products" value="<?=$data_from_db['active_products']?>">
			</div>

			<div class="form-group">
				<label for="project_catagory">Туршилтын туршлага</label>
				<input type="text" class="form-control" name="experience" value="<?=$data_from_db['experience']?>">
			</div>

			<div class="form-group">
				<label for="project_catagory">Харилцагчид</label>
				<input type="text" class="form-control" name="clients" value="<?=$data_from_db['clients']?>">
			</div>
							
			<div class="form-group">
				<input class="btn btn-block btn-success" type="submit" value="Шинэчлэх" name="submit">
			</div>

		</form>
	</div>
</div>
<!-- ============ хөвөгчийн агуулга =============== -->
<?php 
    require_once "footer.php";
?>
