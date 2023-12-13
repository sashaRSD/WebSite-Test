
<!DOCTYPE HTML>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="file/one.ico">
	<meta charset="utf-8">
	<title>Работа №1</title>
</head>
<body bgcolor="silver" vlink="navy" link="navy">
<center>
<?php

$SetSite=$_SERVER['PHP_SELF'];
$countvizit="..$SetSite.counter.txt";
if (!file_exists($countvizit)) {
	$newvizit = fopen($countvizit,"w+");
	$vizit=0;
	fwrite($newvizit, $vizit);
	fclose($newvizit);
	}
$newvizit = file("$countvizit");
$vizit = $newvizit[0];
$newvizit = fopen($countvizit,"w+");
$vizit++;
fwrite($newvizit, $vizit);
fclose($newvizit);
echo ' <span style="font-weight:bold; font-size:28px; margin-left:25px;"> Количество посещений на сайт за все время: </span>';
echo ' <span style="color:red;font-size:35px;">'.sprintf ("%d",$vizit).'</span>';


$TimeFile="..$SetSite.time.txt";
$countvizit2="..$SetSite.kolvo2.txt";
date_default_timezone_set('Europe/Moscow');
$visit_counter = 0;
$NowDate=new DateTime();
$sec = 15; 
if(!file_exists("$countvizit2")){
        $fp = fopen("$countvizit2", 'w+');
        fwrite($fp, $visit_counter);
        fclose($fp);
    }
    if(!file_exists("$TimeFile")){
        $fp = fopen("$TimeFile", 'w+');
        fwrite($fp, $NowDate->format('Y-m-d H:i:s'));
        fclose($fp);
    }
    $DateOriginal=OpenDate("$TimeFile");
    if(abs(strtotime($DateOriginal) - strtotime($NowDate->format('Y-m-d H:i:s')))>$sec){
        $visit_counter=CounterTimer("$countvizit2", 1);
        file_put_contents($TimeFile, $NowDate->format('Y-m-d H:i:s'));
    }
    else{
        $visit_counter=CounterTimer("$countvizit2", false);
    }
echo '<br><br>';
echo '<span style="font-weight:bold; font-size:28px; margin-left:25px;"> Количество посещений за последние '.sprintf ("%d",$sec).' секунд: </span> ';
echo ' <span style="color:red;font-size:35px;">'.sprintf ("%0"."d",$visit_counter).'</span>';

    function OpenDate($FileName){
        $file=fopen($FileName, "r+");
        $array=file($FileName);    
        $DateInFile = $array[0]; 
        fclose($file);
        return $DateInFile;
    }

    function CounterTimer($FileName, $Status){
        $array=file($FileName);   
        $Counter=$array[0];       
        $Counter++;
	if ($Status == True)
	{
 	 $Counter=1;
	}
        file_put_contents($FileName, $Counter);
        return $Counter;
	}
include "../2/zad2.php";
Counter_Page();
?>
<br><br><br> 
<a href="//test2.ru"><span style="font-size:20px;"> <<< Главная страница >>> </span></a>
</center>
</body>
</html>