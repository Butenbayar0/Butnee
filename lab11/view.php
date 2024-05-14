<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        body.view {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

nav {
    background-color: #333; 
    padding: 10px;
}

nav a {
    color: #fff; 
    text-decoration: none;
    font-weight: bold;
}

nav a:hover {
    text-decoration: underline;
}

.alb {
    margin: 20px;
    border: 10px solid #ddd; 
    border-radius: 50px; 
    display: inline;
    float: inline-start;
    text-align: center;
}

.alb img {
    display: block;
    width: 360px;
    height: 360px;
    display: block;
    overflow: hidden;
}
.mar{
    margin-left: 200px;
}
    </style>
</head>
<body class="view">
    <nav>
    <a href="index.php">&#8592; Back to Upload</a>
    </nav>
    <div class="mar">
    <?php
        $sql = "SELECT * FROM images ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) { ?>
                <div class="alb">
                    <img src="uploads/<?=$images['image_url']?>" alt="Uploaded Image">
                </div>
        <?php  } }?>

    </div>
  
</body>
</html>
