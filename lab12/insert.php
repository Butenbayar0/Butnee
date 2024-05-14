<!DOCTYPE html>  
   
<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password, "lesson");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $msg="";  
 if (isset($_POST['insert'])) {  
      $name=$_POST['name'];  
      $email=$_POST['email'];  
      $number=$_POST['number'];  
      $query= "INSERT INTO `user`(`name`, `email`, `mobile`) VALUES ('$name','$email','$number')";  
      $data=mysqli_query($conn,$query); 
      if ($data) {  
           $msg="Бүртгэл амжилттай";  
      }else{  
           $msg="Бүртгэл амжилтгүй";  
      }  
 }  

?>
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title>Өгөгдлийн санд бүртгэсэн мэдээлэлтэй ажиллах</title>  
      <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
           }  
           body{  
                background: #5d6d7d;  
                width: 100%;  
                min-height: 100vh;  
                display: flex;  
                justify-content: center;  
                align-items: center;  
           }  
           .container{  
                width: 500px;  
                background: #fff;  
           }  
           .container form{  
                width: 100%;  
                padding: 30px;  
           }  
           .container form input{  
                width: 100%;  
                padding: 15px 10px;  
                outline: none;  
                margin: 10px 0;  
           }  
           .btn{  
                cursor: pointer;  
                background: green;  
                border: none;  
                padding: 10px 30px;  
                color: #fff;  
           }  
           h1{  
                display: block;  
                text-align: center;  
                padding-top: 20px;  
           }  
           a{  
                cursor: pointer;    
                border: none;  
                padding: 5px 30px;  
                color: #fff;
                background: green;
                margin-left: 200px;  
           }  
      </style>  
 </head>  
 <body>  
 <div class="container">  
      <h1>Бүртгэл</h1>  
      <form method="post" action="">  
           <input type="text" name="name" placeholder="Нэрээ оруулна уу" required>  
           <input type="email" name="email" placeholder="Мэйл хаягаа оруулна уу" required>  
           <input type="text" name="number" placeholder="Утасны дугаараа оруулна уу" required>  
           <input type="submit" name="insert" value="Бүртгүүлэх" class="btn"><br>  
           <?php echo $msg; ?>
      </form>  
      <a href="index.php">Буцах</a>
 </div>  
 </body>  
 </html>  
