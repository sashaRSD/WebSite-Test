
<!DOCTYPE HTML>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="file/3.ico">
	<meta charset="utf-8">
	<title>Работа №3</title>
</head>
<body bgcolor="silver" vlink="navy" link="navy">

<?php
include "../2/zad2.php";
Counter_Page();
?>

<center>
<span style="font-weight:bold; font-size:35px; margin-left:50px;">Заполните форму </span>
<br> <br> <br> 
<form action="zad3.php" method="POST" name = "form" enctype="multipart/form-data">
<div style="font-weight:bold; font-size:28px; margin-left:25px;"> Ваше имя: 
<input type="text" name="name" placeholder="Введите имя!"/>

<br> Комментарий: <br> 
<textarea name="comment" maxlength="200" cols="42" placeholder="Введите комментрий!"></textarea>
<br>Укажите ваш пол: </div>
<span style="color:blue; font-weight:bold; font-size:20px;"><input type="radio" name="gender" value="M" /> Мужской </span>
<span style="color:red; font-weight:bold; font-size:20px;"><input type="radio" name="gender" value="F" />Женский</span>
<span style="font-weight:bold; font-size:20px;"><input type="radio" name="gender" value="?" />Другое (?)</span>

<br><br>
<span style="margin-left:25px;font-weight:bold; font-size:20px;">Отправить картинку:</span><br>
<input type="file" name="picture" > 
<br> <br>
<input type="submit" value="Отправить" style="font-size:20px;margin-left:10px;height:50px;width:125px">
<input type="reset" value="Сброс"style="font-size:20px;margin-left:75px;height:50px;width:125px">

</form>
<br> <br> <br> 
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница >>> </span></a>
</center>
</body>
</html>