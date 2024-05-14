<?php
require_once "user_auth.php";
$title = "Хянах самбар";
require_once "header.php";
require_once "db.php";
// хэрэглэгчийн хэсэг query
$email = $_SESSION['user_email'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = $dbcon -> query($query);
$row = $result -> fetch_assoc();

// Фронт энд нэмэлт мэдээллийн хэсэг query
$about_me = $dbcon->query("SELECT * FROM about_me");
$result = $about_me -> fetch_assoc();

// Миний сайн ажил query
$all_works = $dbcon->query("SELECT * FROM my_best_works ORDER BY id DESC LIMIT 3");
?>


    <div class="row">
                            <div class="col-sm-12">
                                <!-- мэтэг -->
                                <div class="profile-user-box card-box bg-info">
                                    <div class="row text-dark">
                                        <div class="col-sm-6">
                                            <span class="float-left mr-2"><img src="image/users/<?=$row['photo']?>" alt="profile_photo" width='100' class="avatar-xl rounded-circle"></span>
                                            <div class="media-body text-white">
                                                <h4 class="mt-1 mb-1 text-white font-18">Хэрэглэгчийн Нэр: <?=$row['fname']?></h4>
                                                <p class="font-13">Хэрэглэгчийн Имэйл: <?=$row['email']?></p>
                                                <p class="mb-0">Төлөв: идэвхтэй <i class="fa fa-circle text-success"></i></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-right">
                                                <a type="button" href="profile.php" class="btn btn-light waves-effect">
                                                    <i class="mdi mdi-account-settings mr-1"></i> Профайл Засах
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ мэтэг -->
                            </div>
                        </div>
                        <!-- дурын мөр -->


                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Хувийн-Мэдээлэл -->
                                <div class="card-box">
                                    <span class="bg-success p-1 text-white mb-1">Фронт Энд</span>
                                    
                                    <h4 class="header-title mt-1">Хувийн Мэдээлэл</h4>
                                    <hr>
                                    <img  src="image/profile/<?=$result['photo']?>" style="width: 150px;" >
                                    <h5 class="header-title mt-1"><?=$result['name']?></h5>
                                    <div class="panel-body">
                                        <p class="text-muted font-13"><?=$result['details']?></p>

                                        <hr/>

                                        

                                        <ul class="social-links list-inline mt-4 mb-0 mx-auto">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?=$result['fb_link']?>" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?=$result['twitter_link']?>" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?=$result['github_link']?>" data-original-title="Github"><i class="fab fa-github"></i></a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?=$result['linkedin_link']?>" data-original-title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <a class="btn btn-sm btn-block btn-success" href="about_me.php">Засах</a>
                                </div>
                                <!-- Хувийн-Мэдээлэл -->
                              </div>

                                


                            <div class="col-xl-8">

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="card-box tilebox-one">
                                            <i class="mdi mdi-account-multiple-outline float-right text-muted"></i>
                                            <h6 class="text-muted text-uppercase mt-0">Хэрэглэгчид</h6>
                                            <h2 class="" data-plugin="counterup">                                        
                                              <?php
                                              $result = $dbcon->query("SELECT COUNT(*) AS total_users FROM users");
                                              $row = $result->fetch_assoc();
                                              echo $row['total_users']; 
                                              ?>
                                          </h2>
                                        </div>
                                        <a class="btn btn-sm btn-block btn-success" href="users.php">Бүгдийн хэрэглэгчид</a>
                                    </div><!-- end col -->

                                 
                                    <div class="col-sm-4">
                                        <div class="card-box tilebox-one">
                                            <i class="dripicons-message  float-right text-muted"></i>
                                            <h6 class="text-muted text-uppercase mt-0">Зурвасууд</h6>
                                            <h2 class="" data-plugin="counterup">
                                              <?php
                                              $result = $dbcon->query("SELECT COUNT(*) AS total_messages FROM guest_messages");
                                              $row = $result->fetch_assoc();
                                              echo $row['total_messages']; 
                                              ?>
                                              </h2>
                                        </div>
                                        <a class="btn btn-sm btn-block btn-success" href="all_guest_message.php">Бүх зурвасууд</a>
                                    </div><!-- end col -->

                                </div>
                                <!-- end row -->


                              
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Миний ажлууд</h4>

                                    <table id="example" class="table table-bordered text-center">
                                          <thead>
                                            <tr>
                                              <th>Ажлын нэр</th>
                                              <th>Төрөл</th>
                                              <th>Зураг</th>
                                              <th>Үйлдэл</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                          <!-- php code -->
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
                                        <a class="btn btn-block btn-success mt-2" href="best_works.php">Дэлгэрэнгүй</a>

                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

<!-- ============ footer content =============== -->
<?php 
    require_once "footer.php";
?> 
