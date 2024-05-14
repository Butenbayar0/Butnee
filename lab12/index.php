<!DOCTYPE html>
<?php
$conn=mysqli_connect("localhost", "root", "","lesson");
if ($conn) {

}else{
    echo "холболт амжилтгүй";
}
$query="select * from user";
$connect=mysqli_query($conn,$query);
$num=mysqli_num_rows($connect);

?>

<html>
    <head>
    <meta charset="utf-8">
    <title>Өгөгдлийн сантай ажиллах</title>
    <style type="text/css">  
           
           body {
            font-family: 'Times New Roman', Times, serif;
    background-color: #5D6D7D;
    border: 1px solid;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: white;
           }

   .container{
    background-color: #5D6D7D;
    padding: 20px;
   }
td{
    padding-left:70px; padding-right:70px; text-align:center;
}
      </style>
    
    </head>
<body>
    <div class="container">
        <table>
            <div>
            <tr style="background-color: red;">
                <th style="">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
            </div>
            <?php
                if ($num>0) {
                    while($data=mysqli_fetch_assoc($connect)){
                        echo "
                        <tr>
                        <td>".$data['id']."</td>
                        <td>".$data['name']."</td>
                        <td>".$data['email']."</td>
                        <td>".$data['mobile']."</td>
                        </tr>
                        ";
                    }
                }
                ?>

        </table>


        <button><a href="insert.php">Бүртгэл үүсгэх</a></button>
    </div>
</body>
</html>
