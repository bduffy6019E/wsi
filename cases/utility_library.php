<?php

/**
* See if the specified string is either NULL or 
* composed of only white space
*
* @param $str String
* @return Boolean
*/
function isempty($str){
  return (!isset($str) || trim($str) === '');
}

?>