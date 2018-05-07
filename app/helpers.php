<?php 

 function SeoFriendlyUrl($string){
	$turkish = array("ı", "ğ", "ü", "ş", "ö", "ç", "İ", "Ğ", "Ü", "Ş", "Ö", "Ç");
	$english = array("i", "g", "u", "s", "o", "c", "i", "g", "u", "s", "o", "c");
	$string = str_replace($turkish, $english, $string);
	$string = str_replace(array('[\', \']'), '', $string);
	$string = preg_replace('/\[.*\]/U', '', $string);
	$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
	$string = htmlentities($string, ENT_COMPAT, 'utf-8');
	$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
	$string = str_replace(["acute","uml","circ","grave","ring","cedil","slash","tilde","caron","lig","quot","rsquo"], ["","","","","","","","","","","",""], $string);
	$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
	return strtolower(trim($string, '-'));

}


?>