<?php
require_once "user_auth.php";
$title = "мессеж";
require_once "header.php"; 
require_once "db.php";

$result = $dbcon -> query('SELECT * FROM guest_messages');

?>


<!-- Хуудас агуулга эхлээ -->


<div class="card text-dark mb-3">

		<div class="card-header bg-success text-center"><h3>Мессеж</h3></div>

		  <div class="card-body">


						<!-- Хүснэгт эхлээд байрлана -->
						<table id="example" class="table table-bordered table-striped text-center mx-auto" >
							<thead>
								<tr>
									<th>Дугаар</th>
									<th>Нэр</th>
									<th>Имэйл</th>
									<th>Статус</th>
								</tr>	
							</thead>

							<tbody>
							
							<?php
							$serial = 1; 
							foreach($result as $row){ ?>

								<tr class="<?=$row['status']==1?'bg-info':''?>">
									<td><?=$serial++?></td>
									<td><?=$row['name']?></td>
									<td><?=$row['email']?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-sm btn-success" href="view.php?id=<?=base64_encode($row['id'])?>">Мессеж харах</a>

										<!-- уншсан болгон товч -->

											<?php if($row['status']==1){ ?>
											<a class="btn btn-sm btn-danger" href="mark_as_read.php?id=<?=base64_encode($row['id'])?>">Уншсан болгох</a>
										<?php } ?>
											
											<!-- уншсан болгон товч дуусгах -->

										</div>
									</td>
								</tr>
							<?php } ?>
							</tbody>
								
								
						</table>
					</div>
				</div>

<!-- ============ хөтөч агуулга =============== -->
<?php 
    require_once "footer.php";
?>
