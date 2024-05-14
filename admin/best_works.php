<?php 
require_once "user_auth.php";
$title="Миний хамгийн сайн ажлууд";
require_once "header.php";
require_once "db.php";

$all_works = $dbcon->query("SELECT * FROM my_best_works");

?>



																	<!-- кард эхлэх -->
                                	<div class="card mb-3" >
																	  <div class="card-header bg-success text-center"><h2>Миний хамгийн сайн ажлууд</h2></div>

																	  <!-- кардын бодит эхлэх -->
																	  <div class="card-body">

																			<!-- агуулга эхлэх -->


																			<!-- мэдээллийг нэмэх мессеж алдаа  -->

																		  	<?php if(isset($_SESSION['best_works_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['best_works_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['best_works_success']);
																		  	?>

																		  	<!-- мессеж дуусах -->

																				<!-- мэдээллийг устгах мессеж алдаа  -->

																		  	<?php if(isset($_SESSION['best_works_delete'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['best_works_delete']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['best_works_delete']);
																		  	?>

																		  	<!-- мессеж дуусах -->

																		  	<!-- мэдээллийг шинэчлэх мессеж алдаа  -->

																		  	<?php if(isset($_SESSION['best_works_update_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['best_works_update_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['best_works_update_success']);
																		  	?>

																		  	<!-- мессеж дуусах -->



																				<table id="example" class="table table-bordered text-center">
																					<thead>
																						<tr>
																							<th>Ажлын Нэр</th>
																							<th>Төрөл</th>
																							<th>Зураг</th>
																							<th>Үйлдэл</th>
																						</tr>
																					</thead>
																					<tbody>

																					<!-- PHP код -->
																					<?php foreach ($all_works as $result) {
																						
																					 ?>


																						<tr>
																							<td><?=$result['works_name']?></td>
																							<td><?=$result['catagory']?></td>
																							<td><img src="image/my_best_works/<?=$result['photo']?>" alt="" style="width: 50px;"></td>

																							<td>
																								<div class="btn-group">
																									<a class="btn btn-sm btn-warning" href="best_works_update.php?id=<?=base64_encode($result['id'])?>">Засах</a>
																									<a class="btn btn-sm btn-danger" href="best_works_delete.php?id=<?=base64_encode($result['id'])?>">Устгах</a>
																								</div>
																							</td>
																						</tr>

																						<!-- end foreach -->
																					<?php } ?>
																					</tbody>
																					

																				</table>
																				<a class="btn btn-block btn-success mt-2" href="my_best_works.php">Бусад Ажлууд Нэмэх</a>

																		  

																			<!-- агуулга дуусах -->


																	  </div>
																	  <!-- кардын бодит дуусах -->

																	</div>
																	<!-- кард дуусах -->


<!-- ============ хаяг болон товчны агуулга =============== -->
<?php 
    require_once "footer.php";
?>
