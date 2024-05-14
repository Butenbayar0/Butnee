<?php


$file_name = $_POST["file_name"];
$content = $_POST["content"];


$file = fopen($file_name, "w");
fwrite($file, $content);
fclose($file);


echo "амжилттай хадгаллаа";
