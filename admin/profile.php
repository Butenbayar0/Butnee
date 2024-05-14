<?php 
require_once "user_auth.php";
$title="профиль";
require_once "header.php";
require_once "db.php";

$email = $_SESSION['user_email'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = $dbcon -> query($query);
$row = $result -> fetch_assoc();
$id = $row['id'];


?>



                                	<div class="row">
                                		<!-- контентийн мөрийн эхний багана -->

                                		<div class="col-6">
                                			<!-- эхний багана -->

																		<div class="card text-dark mb-3" >
																		  <div class="card-header bg-success text-center"><h2>Профиль</h2></div>
																		  <div class="card-body">
																			<!-- энд хүснэгт эхлүүлнэ -->

																				<table class="table table-bordered table-striped text-center mx-auto" >
																						<tr>
																							<td colspan="2"><img src="image/users/<?=$row['photo']?>" alt="" width="100" ></td>
																						</tr>

																						<tr>
																							<td>Нэр</td>
																							<td><?=$row['fname']?></td>
																						</tr>

																						<tr>
																							<td>Имэйл</td>
																							<td><?=$row['email']?></td>
																						</tr>

																						<tr>
																							<td>Статус</td>
																							<td><span class="bg-success p-2">Идэвхтэй</span></td>
																						</tr>
																						
																				</table>

																				<a class="btn btn-block btn-success" href="change_password.php">Нууц үг солих</a>

																			
                                		</div>
                                	</div>
                                </div>
                                		<!-- эхний багана дууссан -->

                                		<!-- зургийн багана эхлэх -->
				                            <div class="col-4 mx-auto">

				                            	<!-- зургийн хоосон тайлбар  -->

																		  	<?php if(isset($_SESSION['profile_photo_emty'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_emty']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_emty']);
																		  	?>

																		  	<!-- тайлбар дууссан -->

																		  	<!-- зургийн хэмжээ тохирохгүй тайлбар  -->

																		  	<?php if(isset($_SESSION['profile_photo_size'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_size']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_size']);
																		  	?>

																		  	<!-- тайлбар дууссан -->

																		  	<!-- зургийн өргөтгөл тохирохгүй тайлбар  -->

																		  	<?php if(isset($_SESSION['profile_photo_extension'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_extension']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_extension']);
																		  	?>

																		  	<!-- тайлбар дууссан -->


																		  	<!-- зургийг амжилттай байршуулах тайлбар  -->

																		  	<?php if(isset($_SESSION['profile_photo_success'])){ ?>
																						
																						<div class="alert alert-success alert-dismissible fade show" role="alert">
																					  <strong><?=$_SESSION['profile_photo_success']?></strong>
																					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					    <span aria-hidden="true">&times;</span>
																					  </button>
																					</div>


																		  	<?php }
																		  	unset($_SESSION['profile_photo_success']);
																		  	?>

																		  	<!-- тайлбар дууссан -->

																			<table class="table-bordered text-center mb-2" width="100%">	
																				<tr class="bg-success">	
																					<th ><h2> Одоогийн зураг	</h2></th>
																				</tr>

																				<tr> 
																					<td>
																						<img class="mt-0 mb-2" src="image/users/<?=$row['photo']?>" alt="профайл зураг" width='200'>
																					</td>	
																				</tr>

																			</table>
																			
																			

				                            	<form action="profile_img_change.php?id=<?=base64_encode($id)?>" enctype="multipart/form-data" method="post">
				                            		
																					<input  type="file" name="photo" class="form-control">
																					<label for="">Зураг оруулах</label>

																				<input class="btn btn-block btn-success" type="submit" name="photo_submit" value="Зургийг солих">

				                            	</form>

				                           </div>
				                            <!-- зургийн багана дууссан -->

                                	</div>
                                	<!-- хайрцаг мөр дууссан -->
                                    


<!-- ============ хөтөч контент =============== -->
<?php 
    require_once "footer.php";
?>
