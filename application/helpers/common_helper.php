<?php 
function subword($string)
{
	$s = substr($string, 0, 300);
   $result = substr($s, 0, strrpos($s, ' '))." ....";
   return $result;
}
?>