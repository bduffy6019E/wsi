<?php

require 'utility_library.php';

/**
* Parse out url query string into an associative array
* Merge an associative array containing input Key/Value pairs
* with an associative array containing default Key/Value pairs.
* Only keys that exist in the defualt array will be retained.
*
* @param $parameters Array
* @param $defaults Array
* @return Array
*/
function getParameterPairs($parameters, $defaults) {
  $result = array();

  // Look at each key/value pair in the defaults array
  //---------------------------------------------------
  foreach ($defaults as $key => $value) {
    // See if the key is also in the parameters array and its
    // value is not an empty string. If so, save the parameter 
    // value, otherwise save the default value
    //---------------------------------------------------------
    $result[$key] = (
        array_key_exists($key, $parameters) && !isempty($parameters[$key]) ? 
        $parameters[$key] : 
        $value
    );

    // Make sure the parameter only contains valid characters
    //--------------------------------------------------------
    $result[$key] = preg_replace('/[^a-z0-9_]+/i', '', $result[$key]);
  }

  // Return the results array.  Note that any extra key/value
  // pairs in the parameters array that do not correspond 
  // with a key/value pair in the defaults array are ignored.
  //----------------------------------------------------------
  return $result;
}

?>