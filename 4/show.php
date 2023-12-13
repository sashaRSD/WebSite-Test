<?php
    $dir_img = './file/foto/';
    $img_name = $_GET['pic'];
    $img_file = $dir_img.$img_name;
    if (file_exists($img_file))
    {
        $img = imagecreatefromjpeg($img_file);
        $img_size = getimagesize($img_file);
	if ($img_size[0]>$img_size[1])
        $widthheight = intval($img_size[0] / 20);
	else
        $widthheight = intval($img_size[1] / 20);

        imagettftext($img, $widthheight, -10, $widthheight, $widthheight, 0xF9F9F9, 'file/tekst_shrift.ttf', '*vk.com/id150260354*');
        header('Content-type: image/jpg');
        imagejpeg($img);
        imagedestroy($img);

	include "../2/zad2.php";
	Counter_Page();
    }
?>