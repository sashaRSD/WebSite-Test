<?php
	if(isset($_POST['submit'])){
	if(isset($_COOKIE['name_cooki'])) setcookie('name_cooki', ''); 
	else setcookie('name_cooki', $_POST['username']);
	header("Refresh:0");
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="file/5.ico">
	<meta charset="utf-8">
	<title>Работа №5</title>
</head>
<body body bgcolor="silver" vlink="navy" link="navy">
<center>
<?php

if(isset($_COOKIE['name_cooki'])){
	echo '<img src=file/1.gif width="920" height="714"><br><br>';
	echo '<span style="font-weight:bold; font-size:30px;"> Вход выполнен успешно! </span> <br><br>';
	echo '<span style="font-size:25px;">';
	echo "Привет,".$_COOKIE['name_cooki']."</span><br>";
	echo '<form action="zad55.php" method="post" enctype="multipart/form-data">
        <input type="submit" name="submit" id="submit" value="Это не я!" /></form>';
}
else{
	echo '<img src=file/2.gif width="1000" height="435"><br><br>';
	echo '<span style="font-weight:bold; font-size:30px;"> Добро пожаловать! </span> <br>';
	echo     
		'<div style="font-size:25px;">
		<form action="zad55.php" name="login" method="post" enctype="multipart/form-data"><br>
        	<label for="username">Логин: </label>
        	<input type="text" name="username" id="username" autocomplete="off" onkeyup="ProverkaKolSim(this);" placeholder="Не менее 3 символов!"/><br>
        	<label for="pass"> Пароль: </label>
        	<input type="password" name="pass" id="pass" onkeyup="ProverkaKolSim(this);" placeholder="Не менее 5 символов!"/><br>
		<input type="submit" id="submit" name="submit" disabled value=" Войти! "/>
    	</div></form>';
	echo '<script src="zad5_scrp.js"></script>';
}

include "../2/zad2.php";
Counter_Page();

?>
<br><br><br> 
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница >>> </span></a>
</center>
</body>
</html>