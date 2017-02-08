<?php

ini_set('display_errors', 'On');

// Get the HTTP method, request, and input values
//-------------------------------------------------
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

echo($method . '<br/>');
echo('Array(' . count($request) . ')<br/>');
echo($input . '<br/>');

// Retrieve the parameters from the request string
//-------------------------------------------------
echo('<br/><br/>');
$index = 0;
foreach ($request as &$value) {
  $value = preg_replace('/[^a-z0-9_]+/i', '', $value);
  if (!is_null($value)) {
    echo('parm ' . $index . ' = ' . $value . '<br/>');
  }
  $index += 1;
}

?>