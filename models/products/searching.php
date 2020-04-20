<?php
header("Content-Type: application/json");

$data = null;
$status = 400;

if(isset($_GET['search'])){
    require_once "../../config/connection.php";
    require_once "functions.php";

  /*  $name = "%".strtolower($_GET['search'])."%";
    $querySearch = getQueryPC();

    $querySearch .= " WHERE LOWER(g.name) LIKE :name LIMIT 0,4";


    $result = $connection->prepare($querySearch);
    $result->bindParam(":name", $name);
  
    $result->execute();

    $products = $result->fetchAll();
    */
    $name = "%".strtolower($_GET['search'])."%";
    $append = " WHERE LOWER(g.name) LIKE :id LIMIT 0,4";
    $querySearch = getQueryPCId($name , $append);
    
    if($querySearch){
      $status = 200;
      $data = $querySearch;
    }else{
      $status = 500;
    }
   

} 
    http_response_code($status);
    echo json_encode($data);