
<!DOCTYPE HTML>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="file/two.ico">
	<meta charset="utf-8">
	<title>Работа №2</title>
</head>
<body bgcolor="silver" vlink="navy" link="navy">
<span style="font-weight:bold; font-size:30px; margin-left:50px;"> Список посещений: </span> <br>
<?php
$PageName=$_SERVER['PHP_SELF'];
$yourIP=$_SERVER['REMOTE_ADDR'];

$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Ошибка соединения с сервером: ' . mysql_error());
}

if (!mysqli_query($link, 'CREATE DATABASE IF NOT EXISTS zad22')) {
    echo 'Ошибка создания базы данных! ' . mysqli_error($link) . "<br>";
} 

if (!mysqli_query($link, "CREATE TABLE IF NOT EXISTS zad22.Counter_IP (
    id INT NOT NULL AUTO_INCREMENT,
    IP varchar(16),
    NumberCounter int(128),
    PageName varchar(32),
    PRIMARY KEY (id)   
  ); "))
{
    echo "Ошибка создания таблицы Counter_IP! <br>". mysqli_error($link) . "<br>";
}



$CounterSQL=mysqli_query($link, "SELECT * FROM zad22.Counter_IP
WHERE IP='$yourIP' AND PageName='$PageName'");
$SQL=mysqli_fetch_array($CounterSQL);
$sqlIP=$SQL[0];
$sqlCount=$SQL[2];


if ($sqlIP==NULL) {
    $Counter=1;
    if(!mysqli_query($link, "INSERT INTO zad22.Counter_IP(IP, NumberCounter, PageName) 
    VALUES ('$yourIP',$Counter,'$PageName')"))
    {echo "Ошибка добовления новой строки! <br>". mysqli_error($link) . "<br>";}

}
else{
    $sqlCount++;
    if(!mysqli_query($link, "UPDATE zad22.Counter_IP
    SET NumberCounter = $sqlCount WHERE IP='$yourIP' AND PageName='$PageName'"))
    {echo "Ошибка обновления! <br>". mysqli_error($link) . "<br>";}
}

$CounterSQL=mysqli_query($link, "SELECT * FROM zad22.Counter_IP");
$SQL=mysqli_fetch_all($CounterSQL, MYSQLI_ASSOC);

foreach($SQL as $row){
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> IP: </span> ';
echo ' <span style="color:red;font-size:35px;">'. $row['IP'] .'</span>';
echo ' <span style="font-weight:bold; font-size:28px; margin-left:25px;"> Количество посещений: </span> ';
echo ' <span style="color:red;font-size:35px;">'. $row['NumberCounter'] .'</span>';
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> Страница: </span> ';
echo ' <span style="color:red;font-size:35px;">'. $row['PageName'] .'</span> <br>';

}

mysqli_close($link);
?>
<br><br><br> 
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница </span></a>

</body>
</html>