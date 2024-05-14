<!DOCTYPE html>  
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'lesson';

$conn = new mysqli($servername, $username, $password, $dbname);

$msg = "";  
$name = "";
$email = "";
$number = "";
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id='$id'");
    $data = mysqli_fetch_assoc($select);

    if ($data) {
        $name = $data['name'];
        $email = $data['email'];
        $number = $data['mobile'];
    }
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $update = mysqli_query($conn, "UPDATE `user` SET `name`='$name', `email`='$email', `mobile`='$number' WHERE id='$id'");

    if ($update) {
        header("location: index.php");
        die();

    } else {
        $msg = "Засварлахад алдаа гарлаа";
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
                width: 86%;  
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
    </style>  
</head>  
<body>
    <div class="container">  
        <h1>Бүртгэл</h1>  
        <form method="post" action="">  
            <input type="text" name="name" placeholder="Нэрээ оруулна уу" required value="<?php echo $name ?>"> 
            <input type="email" name="email" placeholder="Мэйл хаягаа оруулна уу" required value="<?php echo $email ?>">  
            <input type="text" name="number" placeholder="Утасны дугаараа оруулна уу" required value="<?php echo $number ?>">  
            <input type="submit" name="update" value="Засах" class="btn">
        </form>  
        <a href="index.php">Буцах</a>
        <p><?php echo $msg; ?></p>
    </div>  
</body>  
</html>
