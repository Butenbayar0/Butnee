<?php 
require_once "user_auth.php";
$title="Холбоо барих мэдээлэл";
require_once "header.php";
require_once "db.php";


$query = "SELECT * FROM contact_information";
$result = $dbcon -> query($query);

$row = $result -> fetch_assoc();


?>

	<div class="card text-dark mb-3" >
	  <div class="card-header bg-success text-center"><h2>Холбоо барих мэдээлэл</h2></div>
	  	<div class="card-body">


        <!-- мэдээллийг өөрчлөх мессеж алдаа -->

				  	<?php if(isset($_SESSION['contact_information_change'])){ ?>
								
								<div class="alert alert-success alert-dismissible fade show" role="alert">
							  	<strong><?=$_SESSION['contact_information_change']?></strong>
							  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  	</button>
							</div>


				  	<?php }
				  	unset($_SESSION['contact_information_change']);
				  	?>

				  	<!-- мессеж алдаа дуусах хэсэг -->


					<!-- хүснэгт энд эхэлнэ -->
					<table class="table table-bordered table-striped text-center mx-auto" >
							<tr>
								<td>Жижиг текст</td>
								<td><?=$row['small_text']?></td>
							</tr>

							<tr>
								<td>Ажлын байр</td>
								<td><?=$row['office']?></td>
							</tr>

							<tr>
								<td>Хаяг</td>
								<td><?=$row['address']?></td>
							</tr>

							<tr>
								<td>Утас</td>
								<td><?=$row['phone']?></td>
							</tr>

							<tr>
								<td>Имэйл</td>
								<td><?=$row['email']?></td>
							</tr>
							
					</table>

					<a class="btn btn-block btn-success" href="contact_information_change.php">Холбоо барих мэдээллийг өөрчлөх</a>
			</div>
	</div>



<!-- ============ хаяг болон товчны агуулга =============== -->
<?php 
    require_once "footer.php";
?>
