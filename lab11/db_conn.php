<?php
$sname = "localhost";
$uname = "root";
$password = "";


$dbname = "lab";
$conn = mysqli_connect($sname, $uname, $password, $dbname);


if (!$conn) {
    echo "холболт амжилтгүй";
    exit();
}
?>