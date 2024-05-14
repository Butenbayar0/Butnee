<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo'])
        && is_uploaded_file($_FILES['photo']['tmp_name'])
        && $_FILES['photo']['error'] == UPLOAD_ERR_OK
    ) {
        $uploadFolder = 'img/'; 

       
        if (!file_exists($uploadFolder)) {
            mkdir($uploadFolder, 0777, true);
        }

        $targetPath = $uploadFolder . basename($_FILES['photo']['name']);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
            echo "Амжилттай.<br>";
            foreach($_FILES['photo'] as $key => $value){
                echo "$key: $value<br>";}


        } else {
            echo "Алдаа.";
        }
    } else {
        echo "Файл алга.";
    }
} else {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 28px;
            margin-bottom: 10px;
        }

        input[type='file'] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type='submit'] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type='submit']:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form action='' method='POST' enctype='multipart/form-data'>
        <label for='photo'>Зурагтай ажиллах</label><br><br>
        <input type='file' name='photo'><br><br>
        <input type='submit' value='Хадгалах'>
    </form>

</body>
</html>


    <?php
}
?>