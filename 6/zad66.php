<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="file/6.ico">
	<meta charset="utf-8">
	<title>Работа №6</title>

<script type="text/javascript">
	function getHttpObject(){
		if(window.ActiveXobject) return new ActiveXobject("Microsoft.XMLHTTP");
		else if(window.XMLHttpRequest) return new XMLHttpRequest();
		else{
			alert("AJAX is not supported");
			return null;
		}
	}

	function doWork(){
		httpObject = getHttpObject();
		if(httpObject == null) return;
		httpObject.open("GET", "zad6_perevod.php?inputText="+document.getElementById('inputText').value, true);
		httpObject.send(null);
		httpObject.onreadystatechange = setOutput;
	}

	function setOutput(){
		if(httpObject.readyState == 4){
			document.getElementById('outputText').value = httpObject.responseText;
		}
	}
</script>

</head>
<body body bgcolor="silver" vlink="navy" link="navy">
<center>
<span style="font-weight:bold; font-size:35px;">Автоматический перевод текста в Азбуку Морзе! </span> <br><br>
<form >
	<span style="font-size:25px;">Input</span><br>
	<textarea type="text" onkeyup="doWork()" name="inputText" id="inputText" maxlength="200" cols="40" rows="5"> </textarea>
	<br>
	<img src=file/upd.png width="204" height="306">
	<br>
	<span style="font-size:25px;"> Output </span><br>
	<textarea type="text" name="outputText" id="outputText" disabled maxlength="200" cols="40" rows="5" placeholder="   Здесь будет появляться шифр Морзе!"></textarea>
</form>

<?php
include "../2/zad2.php";
Counter_Page();
?>

<br><br><br> 
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница >>> </span></a>
</center>
</body>
</html>
