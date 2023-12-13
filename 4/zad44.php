
<!DOCTYPE HTML>
<html>
<head>
	<style>
	#dd { position:absolute; right:0px; bottom:10px; width:460px; height:345px;}
	</style>
	<link rel="shortcut icon" type="image/x-icon" href="file/4.ico">
	<meta charset="utf-8">
	<title>Работа №4</title>
</head>
<body bgcolor="silver" vlink="navy" link="navy">
<img id="dd" src=file/reklama.gif>
<center>
<br>
<span style="font-weight:bold; font-size:30px; margin-left:50px;"> Бесплатная версия сайта </span> <br>
<?php

    $dir_img = './file/foto/';
    $dir_img_mini = './file/foto/mini/';
    $counter = 0;
    if (is_dir($dir_img))
    {
	$op = opendir($dir_img);
	echo "<table border = '3'>";
	while (($vibor = readdir($op)) !== FALSE)
	{
		if ($vibor != "."&& $vibor != ".." && $vibor != "mini") 
                {
		$img_name = $dir_img.$vibor;
		$img_mini_adr = $dir_img_mini.$vibor;
			if (!file_exists($img_mini_adr))
				{
				$namefile=basename($img_name);
				$imglink = imagecreatefromjpeg($img_name);
				list($width,$height)=getimagesize($img_name);

				if ($width > $height)
				$izm=$width/200;
				else
				$izm=$height/200;

				$width_new=$width/$izm;
				$height_new=$height/$izm;
  
    				$imgput = imagecreatetruecolor(200, 200);
    				imagecopyresampled($imgput, $imglink, 100-$width_new/2, 100-$height_new/2, 0, 0, $width_new, $height_new, $width, $height);
    				imagepng($imgput, './file/foto/mini/'.$namefile);
				}
				echo "<td align = 'center' width = '250' height = '250'><a href = 'show.php?pic=$vibor'><img src = $img_mini_adr></a>";
				echo ' <strike><a title="Скачивание недоступно в бесплатной версии!" > Download </a><strike></td>';
			$counter++;
				if ($counter % 5 == 0)
				{
				echo "<tr></tr>";
				}
		}	
	}
	echo "</table>";      
    }
        if (is_dir($dir_img_mini))
    {
     $op = opendir($dir_img_mini);
     while (($vibor = readdir($op)) !== FALSE)
            {
             $img_name = $dir_img.$vibor;
             $img_mini_adr = $dir_img_mini.$vibor;
             if (!file_exists($img_name))
             unlink($img_mini_adr);    
            }
    }

echo '*Чтобы получить полный доступ к сайту и избавиться от рекламы - отправьте СМС на номер 8-800-555-35-35 с текстом "FOTO"!';
echo '<form method="POST" name = "form" enctype="multipart/form-data"><br><br><br>';
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> <label for="pwd">Введите бонус-код: </label> </span>';
echo '<input type="text" name="pwd" placeholder="Вводить сюда!"> </form><br>';
$password = "Get_Foto";
$pwd = $_POST['pwd'];
if (strcasecmp ($pwd,$password) == 0)
echo '<a href="zad4.php"><span style="font-size:25px;"> VIP версия сайта! </span></a>';

include "../2/zad2.php";
Counter_Page();
?>


<br>
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница >>> </span></a>
</center>
</body>
</html>