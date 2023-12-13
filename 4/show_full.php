<?php
    $dir_img = './file/foto/';
    $img_name = $_GET['pic'];
    $img_file = $dir_img.$img_name;
    if (file_exists($img_file))
    {
        $img = imagecreatefromjpeg($img_file);
        header('Content-type: image/jpg');
        imagejpeg($img);
	imagedestroy($img);

	include "../2/zad2.php";
	Counter_Page();
    }
?>