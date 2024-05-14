<?php 
require_once "user_auth.php";
ob_start();
$title="Ажлын өөрчлөлт хийх";
require_once "header.php";
require_once "db.php";



$id = base64_decode($_GET['id']);

$best_works_data_from_db = $dbcon->query("SELECT * FROM my_best_works WHERE id=$id");
$best_works_data = $best_works_data_from_db->fetch_assoc(); 


?>


    	<!-- агуулга хуваарилах мөрийг багтаах -->
    	<div class="row">
    		<!-- эхний хэсэгийн col -->

    		<div class="col-6">
				<!-- карт эхлэх -->
					<div class="card mb-3" >
					  <div class="card-header bg-success text-center"><h2>Миний хамгийн сайн ажлууд</h2></div>
					  <!-- картын бодит эхлэх -->
					  <div class="card-body">

				    			<form action="best_works_update_check.php?id=<?=base64_encode($id)?>" method="post">
										<div class="form-group">
											<label for="project_name">Ажлын нэр</label>
											<input type="text" class="form-control" name="works_name" value="<?=$best_works_data['works_name']?>">
										</div>

										<div class="form-group">
											<label for="project_catagory">Төрөл</label>
											<input type="text" class="form-control" name="catagory" value="<?=$best_works_data['catagory']?>">
										</div>


										<div class="form-group">
											<input class="btn btn-block btn-success " type="submit" value="Шинэчлэх" name="submit">
										</div>

									</form>

								</div>
							</div>
   				</div>
   <!-- эхний col дууссан -->

    		<!-- зургийн col эхлэх -->
        <div class="col-4 mx-auto">

        	<!-- зураг хоосон мессеж  -->

				  	<?php if(isset($_SESSION['best_works_photo_emty'])){ ?>
								
								<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong><?=$_SESSION['best_works_photo_emty']?></strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>


				  	<?php }
				  	unset($_SESSION['best_works_photo_emty']);
				  	?>

				  	<!-- мессеж дууссан -->

				  	<!-- зурагны хэмжээ тохиргоо мессеж  -->

				  	<?php if(isset($_SESSION['best_works_photo_size'])){ ?>
								
								<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong><?=$_SESSION['best_works_photo_size']?></strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>


				  	<?php }
				  	unset($_SESSION['best_works_photo_size']);
				  	?>

				  	<!-- мессеж дууссан -->

				  	<!-- зурагны өргөтгөл тохиргоо мессеж  -->

				  	<?php if(isset($_SESSION['best_works_photo_extension'])){ ?>
								
								<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong><?=$_SESSION['best_works_photo_extension']?></strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>


				  	<?php }
				  	unset($_SESSION['best_works_photo_extension']);
				  	?>

				  	<!-- мессеж дууссан -->


				  	<!-- зураг амжилттай байршуулах мессеж  -->

				  	<?php if(isset($_SESSION['best_works_photo_success'])){ ?>
								
								<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong><?=$_SESSION['best_works_photo_success']?></strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>


				  	<?php }
				  	unset($_SESSION['best_works_photo_success']);
				  	?>

				  	<!-- мессеж дууссан -->

					<table class="table-bordered text-center mb-2" width="100%">	
						<tr class="bg-success">	
							<th ><h2> Одоогийн зургийн	</h2></th>
						</tr>

						<tr> 
							<td>
								<img class="mt-0 mb-2" src="image/my_best_works/<?=$best_works_data['photo']?>" alt="profile image" width='200'>
							</td>	
						</tr>

					</table>
					
					

        	<form action="best_works_update_check.php?id=<?=base64_encode($id)?>" enctype="multipart/form-data" method="post">
        		
						<div class="form-group">
							<input class="form-control" type="file" name="photo">
							<label for="">Зураг байршуулах</label>
						</div>

						<input class="btn btn-block btn-success" type="submit" name="photo_submit" value="Зургийг солих">

        	</form>

        </div>
        <!-- зургийн col дууссан -->
    		
    	</div>
    	<!-- агуулга хуваарилах мөрийг багтаах дууссан -->
                                    

																			


                                
<!-- ============ хаяг болон товчны агуулга =============== -->
<?php 
    require_once "footer.php";
?>
