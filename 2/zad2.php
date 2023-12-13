<?php
function Counter_Page(){

$PageName=$_SERVER['PHP_SELF'];
$yourIP=$_SERVER['REMOTE_ADDR'];

$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Connection error: ' . mysql_error());
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

mysqli_close($link);
}

?>