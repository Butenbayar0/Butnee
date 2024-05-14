<?php
require_once "admin/db.php";
require_once "user_valid.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Бүртгүүлэх</title>
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

    <!-- Хуудас эхлэх -->
    <div class="accountbg" style="background: url('admin/assets/images/bg_2.png');background-size: cover;background-position: center;"></div>


    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index.php" class="text-success">
                                <span><img src="admin/assets/images/logo_light.png" alt="" height="100"></span>
                            </a>
                        </h2>

                        <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                            <!-- И-мэйл аль хэдийн байна анхааруулга -->
                            <?php if(isset($email_exist)){ ?>                              
                                <div class="alert alert-danger">
                                    <?= $email_exist ?>
                                </div>
                            <?php } ?>

                            <!-- Бүртгэл -->

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="username">Бүтэн нэр</label>
                                    <input class="form-control" type="text" id="username" placeholder="Том үсгээр эхлүүлнэ үү?" name="fname" value="<?php
                                    if(isset($fname)){
                                        echo $fname;
                                    }
                                    ?>">


                                    <!-- Нэр алдаа -->
                                    <label style="color:red; font-style:italic;">
                                        <?php
                                        if (isset($input_error['name'])) {
                                            echo $input_error['name'];
                                        }

                                        ?>
                                    </label>

                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="emailaddress">И-мэйл хаяг</label>
                                    <input class="form-control" type="text" id="emailaddress"  placeholder="@example.com" name="email" value="<?php 
                                    if(isset($email)){
                                        echo $email;
                                    }
                                    ?>">

                                    <!-- И-мэйл алдаа -->
                                    <label style="color:red;font-style: italic;" for="emailaddress">
                                        <?php
                                        if(isset($input_error['email'])){
                                            echo $input_error['email'];
                                        }
                                        ?>
                                    </label>

                                </div>
                            </div>

                            <!-- Нууц үг -->

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="password">Нууц үг</label>
                                    <input class="form-control" type="password"  id="password" placeholder="8 тэмдэгттэй, тоо, том, жижиг үсэгтэй нууц үг оруулна уу" name="password" value="<?php 
                                    if(isset($password)){
                                        echo $password;
                                    }
                                    ?>">

                                    <!-- Нууц үг алдаа -->
                                    <label for="password" style="color:red;font-style:italic;">
                                        <?php 
                                        if(isset($input_error['password'])){
                                            echo $input_error['password'];
                                        }
                                        ?>
                                    </label>

                                </div>
                            </div>

                            <!-- Нууц үг баталгаажуулах -->
                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="cpassword">Нууц үг баталгаажуулах</label>
                                    <input class="form-control" type="password"  id="cpassword" placeholder="Нууц үгээ оруулна уу" name="cpassword" value="<?php
                                    if(isset($password,$cpassword)){
                                        echo $cpassword;
                                    }
                                    ?>">

                                    <!-- Нууц үг баталгаажуулах алдаа -->
                                    <label style="color:red;font-style:italic;" for="cpassword">
                                        <?php if(isset($input_error['cpassword'])){
                                            echo $input_error['cpassword'];
                                        } ?>
                                    </label>

                                </div>
                            </div>


                            <div class="form-group row m-b-20">
                                <div class="col-12">

                                    <input class="form-control" type="file"  placeholder="зураг оруулах" name="photo" >

                                    <!-- Зураг алдаа -->
                                    <label style="color:red;font-style:italic;" >
                                        <?php if(isset($photo_error)){
                                            echo $photo_error;
                                        } ?>
                                    </label>

                                </div>
                            </div>


                            <!-- баталгаажуулах -->

                            <div class="form-group row m-b-20">
                                <div class="col-12">

                                    <div class="checkbox checkbox-custom">
                                        <input id="remember" type="checkbox" checked="">
                                        <label for="remember">
                                            Би <a href="#" class="text-custom">Нөхцөл болон нөхцөл байршуулна уу?</a>-г зөвшөөрсөн.
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <input class="btn btn-block btn-success" type="submit" value="Бүртгүүлэх" name="reg_submit">
                            </div>


                        </form>

                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Бүртгэл  байгаа юу?  <a href="login.php" class="text-dark m-l-5"><b>Нэвтрэх</b></a></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>



    <!-- jQuery  -->
    <script src="admin/assets/js/jquery.min.js"></script>
    <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/js/metisMenu.min.js"></script>
    <script src="admin/assets/js/waves.js"></script>
    <script src="admin/assets/js/jquery.slimscroll.js"></script>

    <!-- Апп js -->
    <script src="admin/admin/assets/js/jquery.core.js"></script>
    <script src="admin/admin/assets/js/jquery.app.js"></script>

</body>

</html>
