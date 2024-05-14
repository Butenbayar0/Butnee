<?php 
session_start();
include "db_conn.php";

if(isset($_POST['add_cart'])){
    if(isset($_SESSION['cart'])){
        $session_array_id = array_column($_SESSION['cart'], "id");
        if(!in_array($_GET['id'], $session_array_id)){
            $session_array = array(
                'id'=> $_GET['id'],
                'name'=> $_POST['name'],
                'price'=> $_POST['price'],
                'quantity'=> $_POST['quantity'] // Corrected typo in 'quantity'
            );
            $_SESSION['cart'][] = $session_array; 
        }
    } else{
        $session_array = array(
            'id'=> $_GET['id'],
            'name'=> $_POST['name'],
            'price'=> $_POST['price'],
            'quantity'=> $_POST['quantity'] // Corrected typo in 'quantity'
        );
        $_SESSION['cart'][] = $session_array;
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab 14</title>
</head>
<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">Зураг </h2>
                <div class="row">
                    <?php
                    $query = "SELECT * FROM images";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {?>
                        <div class="col-md-4 mb-3">   
                            <form method="post" action="view.php?id=<?=$row['id']?>">
                                <div class="card">
                                    <img src="uploads/<?=$row['image_url']?>" class="card-img-top" alt="" style='height: 150px;'>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['name']; ?></h5>
                                        <p class="card-text"><?= number_format($row['price'],2); ?>₮</p>
                                        <input type="hidden" name="name" value="<?= $row['name'] ?>">
                                        <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                        <input type="number" name="quantity" value="1" class="form-control mb-2">
                                        <button type="submit" name="add_cart" class="btn btn-warning btn-block">Сагсанд нэмэх</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Сагс</h2>
                <?php 
                $total = 0;
                $output = "
                <table class='table table-bordered table-striped'>
                <tr>
                    <th>ID</th>
                    <th>Нэр</th>
                    <th>Үнэ</th>
                    <th>Тоо ширхэг</th>
                    <th>Нийт үнэ</th>
                    <th>action</th>
                </tr>
                ";
                if(!empty($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key => $value){
                        $output .= "
                        <tr>
                        <td>".$value['id']."</td>
                        <td>".$value['name']."</td>
                        <td>₮".$value['price']."</td>
                        <td>".$value['quantity']."</td>
                        <td>₮".number_format($value['price'] * $value['quantity'])."</td>
                        <td>
                        <a href='view.php?action=remove&id=".$value['id']."'>
                        <button class='btn btn-danger btn-sm'>Устгах</button>
                        </td>
                        </tr>
                        ";
                        $total += $value['price'] * $value['quantity'];
                    }
                    $output .= "
                    <tr>
                    <td colspan='3'></td>
                    <td><b>Нийт үнэ</b></td>
                    <td>₮".number_format($total)."</td>
                    <td>
                    <a href='view.php?action=clearall'>
                    <button class='btn btn-warning btn-sm'>Сагс хоослох</button>
                    </a>
                    
                    </td>
                    </tr>
                    ";
                }
                $output .= "</table>";
                echo $output;
                ?>
            </div>
        </div>
    </div>
    <?php
    if(isset($_GET['action'])){
        if($_GET['action']=="clearall"){
            unset($_SESSION['cart']);
        }
    
        if($_GET['action'] == 'remove'){
            foreach ($_SESSION['cart'] as $key => $value){
                if($value['id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    } 
    ?>
</body>
</html>
