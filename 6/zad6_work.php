<?php
    function transform($input){
        $truestring = "Поставьте 5";
        if(!iconv_strlen($input)) return '';
        else if(iconv_strlen($input) <= iconv_strlen($truestring)) 
            return substr($truestring, 0, iconv_strlen($input)*2);
        else return $truestring;
    }

    if(isset($_GET['inputText'])) {
        echo transform($_GET['inputText']);
    }
?>

