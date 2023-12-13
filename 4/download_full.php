<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="file/4.ico">
<title>Загрузка...</title>
<meta charset="utf-8"; http-equiv=Refresh content="0; url=http://test2.ru/4/zad4.php">
</head>
<body>
<?php
	$dir_img = './file/foto/';
	$img_name = $_GET['pic'];
	$img_file = $dir_img.$img_name;
	$path = './download/'.$img_name;
	file_put_contents($path, file_get_contents($img_file));
?>
</body>
</html>