<?php

ini_set('display_errors', 'On');

include 'api_library.php';

// Get the HTTP method, request, and input values
//-------------------------------------------------
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

echo($method . '<br/>');
echo('Array(' . count($request) . ')<br/>');
echo($input . '<br/>');

// Set default values for the query string parameters
//-----------------------------------------------------
$defaults = array(
  'q' => 'default_q',
  'x' => 'default_x',
  't' => 'default_t'
);

// Retrieve the parameters from the request string 
// and use the default values for any missing parameters
//-------------------------------------------------------
$query = geteQueryPairs($_GET, $defaults);

// Display the query parameters (just to prove they are there)
//-------------------------------------------------------------
echo('<br/><br/>');
foreach ($query as $key => $value) {
  echo($key . ' = ' . $value . '<br/>');
}

?>