<?php
function perevod($value){
$converter = array(
	'а' => '.- ',      'б' => '-... ',    'в' => '.-- ',     'г' => '--. ',     'д' => '-.. ',
	'е' => '. ',       'ё' => '. ',       'ж' => '...- ',    'з' => '--.. ',    'и' => '.. ',
	'й' => '.--- ',    'к' => '-.- ',     'л' => '.-.. ',    'м' => '-- ',      'н' => '-. ',
	'о' => '--- ',     'п' => '.--. ',    'р' => '.-. ',     'с' => '... ',     'т' => '- ',
	'у' => '..- ',     'ф' => '..-. ',    'х' => '.... ',    'ц' => '-.-. ',    'ч' => '---. ',
	'ш' => '---- ',    'щ' => '--.- ',    'ь' => '-..- ',    'ы' => '-.-- ',    'ъ' => '-..- ',
	'э' => '..-.. ',   'ю' => '..-- ',    'я' => '.-.- ',

	'А' => '.- ',      'Б' => '-... ',    'В' => '.-- ',     'Г' => '--. ',     'Д' => '-.. ',
	'Е' => '. ',       'Ё' => '. ',       'Ж' => '...- ',    'З' => '--.. ',    'И' => '.. ',
	'Й' => '.--- ',    'К' => '-.- ',     'Л' => '.-.. ',    'М' => '-- ',      'Н' => '-. ',
	'О' => '--- ',     'П' => '.--. ',    'Р' => '.-. ',     'С' => '... ',     'Т' => '- ',
	'У' => '..- ',     'Ф' => '..-. ',    'Х' => '.... ',    'Ц' => '-.-. ',    'Ч' => '---. ',
	'Ш' => '---- ',    'Щ' => '--.- ',    'Ь' => '-..- ',    'Ы' => '-.-- ',    'Ъ' => '-..- ',
	'Э' => '..-.. ',   'Ю' => '..-- ',    'Я' => '.-.- ',

	'1' => '.--- ',    '2' => '..--- ',   '3' => '...-- ',   '4' => '....- ',   '5' => '..... ',
	'6' => '-.... ',   '7' => '--... ',   '8' => '---.. ',   '9' => '----. ',   '0' => '----- ',
	'.' => '...... ',  ',' => '.-.-.- ',  ';' => '-.-.- ',   ':' => '---... ',  '?' => '..--.. ',
	'!' => '--..-- ',  '-' => '-....- ',  '+' => '.-.-. ',   '(' => '-.--.- ',  ')' => '-.--.- ',
	'/' => '-..-. ',   '"' => '.-..-. ',  

	'a' => '.- ',      'b' => '-... ',    'c' => '-.-. ',    'd' => '-.. ',     'e' => '. ',
	'f' => '..-. ',    'g' => '--. ',     'h' => '.... ',    'i' => '.. ',      'j' => '.--- ',
	'k' => '-.- ',     'l' => '.-.. ',    'm' => '--- ',     'n' => '-. ',      'o' => '--- ',
	'p' => '.--. ',    'q' => '--.- ',    'r' => '.-. ',     's' => '... ',     't' => '- ',
	'u' => '..- ',     'v' => '...- ',    'w' => '.-- ',     'x' => '-..- ',    'y' => '-.-- ',
	'z' => '--.. ',      

	'A' => '.- ',      'B' => '-... ',    'C' => '-.-. ',    'D' => '-.. ',     'E' => '. ',
	'F' => '..-. ',    'G' => '--. ',     'H' => '.... ',    'I' => '.. ',      'J' => '.--- ',
	'K' => '-.- ',     'L' => '.-.. ',    'M' => '--- ',     'N' => '-. ',      'O' => '--- ',
	'P' => '.--. ',    'Q' => '--.- ',    'R' => '.-. ',     'S' => '... ',     'T' => '- ',
	'U' => '..- ',     'V' => '...- ',    'W' => '.-- ',     'X' => '-..- ',    'Y' => '-.-- ',
	'Z' => '--.. ',  
	
	);
 
$value = strtr($value, $converter);
return $value;
}

    if(isset($_GET['inputText'])) {
        echo perevod($_GET['inputText']);
    }
?>

