<?php
header("Content-Type: application/json");
require_once "../../config/connection.php";
require_once "functions.php";
/*
 $storeFilter = executeQuery(getQueryC());
  echo json_encode($storeFilter);
*/

$status = 404;
$storeQuery = null;

$storeFilter = executeQuery(getQueryC());

if($storeFilter){
  $status = 200;
    $storeQuery = $storeFilter;
}else{
  $status = 500;
    
}
http_response_code($status);
echo json_encode($storeQuery);
 