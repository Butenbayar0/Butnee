<?php
require_once "admin/db.php"; 
require_once "login_val.php"; 
?>
<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Нэвтрэх</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="CRM, CMS, гэх мэт бүхий томоохон админ төслийг баримталж болох бүтэцтэй админ загвар." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Апп favicon -->
        <link rel="shortcut icon" href="admin/assets/images/favicon.ico">

        <!-- Апп css -->
        <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="admin/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="admin/assets/js/modernizr.min.js"></script>

    </head>


    <body class="account-pages">

        <!-- Эхлэх хуудас -->
        <div class="accountbg" style="background: url('admin/assets/images/bg_1.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="#" class="text-success">
                                    <span>
                                        <!-- Энд таны лого -->
                                    </span>
                                </a>
                            </h2>

                            <form class="" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                                <!-- Хэрэглэгч нэмэгдсэн амжилттай мессеж -->
                              <?php if(isset($_SESSION['user_success'])){ ?>                              
                                <div class="alert alert-success">
                                    <?= $_SESSION['user_success'] ?>
                                </div>
                              <?php } 
                              unset($_SESSION['user_success']);
                              ?>

                              
                              <!-- И-мэйл тохирохгүй     -->

                              <?php if(isset($email_not_matched)) { ?>
                                <div class="alert alert-danger">
                                  <?=$email_not_matched?>
                                </div>
                              <?php } ?>

                            <!-- Нууц үг тохирохгүй -->

                              <?php if(isset($password_not_matched)) { ?>
                                <div class="alert alert-danger">
                                  <?=$password_not_matched?>
                                </div>
                              <?php } ?>

                              <!-- Админ зөвшөөрөл хүлээж байна -->
                              <?php if(isset($waiting)) { ?>
                                <div class="alert alert-success">
                                  <?=$waiting?>
                                </div>
                              <?php } ?>



                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">И-мэйл хаяг</label>
                                        <input class="form-control" type="text" id="emailaddress"  placeholder="И-мэйл хаягаа оруулна уу"  name="email" value="<?php if(isset($email)){
                                          echo $email;
                                        } ?>">

                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <a href="#" class="text-muted float-right"><small>Нууц үгээ мартсан уу?</small></a>
                                        <label for="password">Нууц үг</label>
                                        <input class="form-control" type="password"  id="password" placeholder="Нууц үгээ оруулна уу" name="password" value="<?php if(isset($password)){
                                          echo $password;
                                        } ?>">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Намайг сана
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <input class="btn btn-block btn-success" type="submit" value="Нэвтрэх" name="login">
                                    </div>
                                </div>

                            </form>

                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Бүртгэлтэй байгаа юу? <a href="register.php" class="text-dark m-l-5"><b>Бүртгүүлэх</b></a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright"><?=date('Y')?> © 2024</p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="admin/assets/js/jquery.min.js"></script>
        <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
        <script src="admin/assets/js/metisMenu.min.js"></script>
        <script src="admin/assets/js/waves.js"></script>
        <script src="admin/assets/js/jquery.slimscroll.js"></script>

        <!-- Апп js -->
        <script src="admin/assets/js/jquery.core.js"></script>
        <script src="admin/assets/js/jquery.app.js"></script>

    </body>

</html>
