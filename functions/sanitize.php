/*
http://php.net/manual/en/function.htmlspecialchars.php 
ENT_QUOTES : Will convert both double and single quotes.
*/
<?php 
function escape($string){
	return htmlentities($string,ENT_QUOTES,'UTF-8');
}
?>
