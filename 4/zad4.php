
<!DOCTYPE HTML>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="file/4.ico">
	<meta charset="utf-8">
	<title>Работа №4</title>
</head>
<body bgcolor="silver" vlink="navy" link="navy">
<center>
<span style="font-weight:bold; font-size:30px; margin-left:50px;"> VIP версия сайта </span> <br>
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
			echo "<td align = 'center' width = '250' height = '250'><a href = 'show_full.php?pic=$vibor'><img src = $img_mini_adr></a>";
			echo "<a href = 'Download_full.php?pic=$vibor'> Download </a></td>";
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

include "../2/zad2.php";
Counter_Page();
?>


<br> <br> <br> 
<a href="zad44.php"><span style="font-size:20px;"> <<< Назад (Demo) >>> </span></a> <br> 
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница >>> </span></a>
</center>
</body>
</html>