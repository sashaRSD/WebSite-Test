
<!DOCTYPE HTML>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="file/3.ico">
	<meta charset="utf-8">
	<title>Работа №3</title>
</head>
<body bgcolor="silver"  vlink="navy" link="navy">
<span style="font-weight:bold; font-size:30px; margin-left:50px;"> Список заявок: </span> <br>
<?php

$name = $_POST['name'];
$gender = $_POST['gender'];
$comment = $_POST['comment'];
$img = "file/".$_FILES['picture']['name'];

if(file_exists($_FILES['picture']['name']))
{
copy($_FILES['picture']['tmp_name'], $img);
}
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
	die('Ошибка соединения c сервером: ' . mysql_error());
}

if (!mysqli_query($link, 'CREATE DATABASE IF NOT EXISTS zad33')) {
    echo 'Ошибка создания базы данных! ' . mysqli_error($link) . "<br>";
} 

if (!mysqli_query($link, "CREATE TABLE IF NOT EXISTS zad33.Form (
	id INT NOT NULL AUTO_INCREMENT,
	UserName varchar(128),
	Comment  varchar(128),
	Gender varchar(128),
	Img varchar(128),
	PRIMARY KEY(id)
  ); "))
{
	echo "Ошибка создания таблицы Counter_IP! <br>";
}

if(!mysqli_query($link, "INSERT INTO zad33.Form(UserName, Comment, Gender, Img) 
VALUES (\"$name\",\"$comment\",\"$gender\",\"$img\")"))
{echo "Ошибка добовления новой строки!<br>";}

$CounterSQL=mysqli_query($link, "SELECT * FROM zad33.Form");
$SQL=mysqli_fetch_all($CounterSQL, MYSQLI_ASSOC);

foreach($SQL as $row){
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> ID: </span> ';
echo ' <span style="color:red;font-size:35px;">'. $row['id'] .'</span>';
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> Ваше имя: </span> ';
echo ' <span style="color:red;font-size:35px;">'. $row['UserName'] .'</span>';
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> Комментарий: </span> ';
echo ' <pre style="color:red; display:inline-block;\">'. $row['Comment'] .'</pre>';
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> Ваш пол: </span> ';
echo ' <span style="color:red;font-size:35px;">'. $row['Gender'] .'</span>';
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> Картинка: </span> ';
echo "<img src=$row[Img] width='50' height='40'> ";
echo "<br>";
}

mysqli_close($link);

include "../2/zad2.php";
Counter_Page();
?>

<br> <br> <br>
<a href="//test2.ru/3/zad33.php"><span style="font-size:20px;"> <<< Назад </span></a>
<br>
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница </span></a>
</body>
</html>