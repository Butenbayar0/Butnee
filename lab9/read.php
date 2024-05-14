<?php
$file = fopen('read.txt', 'r');
?>
<html>
<head>
<title></title>
</head>
<body>
<?php
while ($line = fgets($file)) {
echo $line."<br>";
}
?>
</body>
</html>
