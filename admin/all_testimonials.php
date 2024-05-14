<?php 
require_once "user_auth.php";
$title="Санал хүсэлтүүд";
require_once "header.php";
require_once "db.php";

$testimonial = $dbcon->query("SELECT * FROM testimonials");
?>

      

<div class="card text-dark mb-3">
	<div class="card-header bg-success text-center"><h3>Миний тухай</h3></div>

	<div class="card-body">

																			
		  	<!-- шинэчлэлт мессежийн мэдээлэл -->

		  	<?php if(isset($_SESSION['testimonial_update_success'])){ ?>
						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong><?=$_SESSION['testimonial_update_success']?></strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>


		  	<?php }
		  	unset($_SESSION['testimonial_update_success']);
		  	?>

		  	<!-- алерт дууссан -->



		  	<!-- устгах мессежийн мэдээлэл -->

		  	<?php if(isset($_SESSION['testimonial_delete'])){ ?>
						
						<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong><?=$_SESSION['testimonial_delete']?></strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>


		  	<?php }
		  	unset($_SESSION['testimonial_delete']);
		  	?>

		  	<!-- алерт дууссан -->

				<table id="example" class="table table-striped table-bordered mx-auto">
					<thead>
						<tr>
							<th>Хэрэглэгчийн нэр</th>
							<th>Мэргэжил</th>
							<th>Сэтгэгдэл</th>
							<th>Зураг</th>
							<th>Үйлдэл</th>
						</tr>
					</thead>

					<tbody>

					<!-- PHP код -->
					<?php foreach ($testimonial as $result) {
						
					 ?>


						<tr>
							<td><?=$result['customer_name']?></td>

							<td><?=$result['customer_desegnation']?></td>

							<td><?=$result['customer_comment']?></td>
							
							<td><img src="image/customers/<?=$result['photo']?>" alt="" style="width: 50px;"></td>

							<td>
								<div class="btn-group">
									<a class="btn btn-sm btn-warning" href="testimonial_update.php?id=<?=base64_encode($result['id'])?>">Шинэчлэх</a>

									<a class="btn btn-sm btn-danger" href="testimonial_delete.php?id=<?=base64_encode($result['id'])?>">Устгах</a>
								</div>
							</td>
						</tr>

						<!-- foreach дууссан -->
					<?php } ?>
					</tbody>
					

				</table>
				<a class="btn btn-block btn-success" href="testimonials.php">Бусад санал нэмэх</a>
			</div>
		</div>



<!-- Футер хэсэг -->
<?php 
    require_once "footer.php";
?>
