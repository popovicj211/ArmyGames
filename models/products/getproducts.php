<?php
header("Content-Type: application/json");
require_once "../../config/connection.php";
require_once "functions.php";

$data = null;
$status = 404;

if(isset($_GET['type'])){
    $filter = $_GET['type'];

   /* $queryFilt = getQueryPC();
    $queryFilt .=" WHERE g.comp_id= :id";
     $preparedFilt = $connection -> prepare($queryFilt); 
    $preparedFilt -> bindParam(":id", $filter);
     $preparedFilt -> execute();
    $filtRes = $preparedFilt -> fetchAll();

    $queryCount = getQueryCount();
    $queryCount .= " WHERE g.comp_id = :idC";
$countPrepare = $connection->prepare($queryCount);
$countPrepare -> bindParam(":idC", $filter);
$countPrepare -> execute();
$exeCount = $countPrepare -> fetch(); 

   $array = array(
    "prod" => $filtRes,
    "broj" => $exeCount
); */

 $append = " WHERE g.comp_id= :id"; 
 $filtRes = getQueryPCId($filter , $append);

 $statusCode = StatusCode($filtRes);

 $trueFalse = true;
 $countFIlt = " WHERE g.comp_id = ?";
 $exeCount = CountExtra($countFIlt, $filter, $trueFalse);

 $array = array(
    "prod" => $filtRes,
    "broj" => $exeCount
);

if($array){
    $status = 200;
    $data = $array;
}else{
    $status = 500;

}

echo json_encode($data);
http_response_code($status);

} else{

 /*  $queryStore = getQueryPC();
   $queryStore .= " LIMIT 0,4";
    $preparedStore = $connection->query($queryStore);
    $store = $preparedStore ->fetchAll();

    $queryCountOneRow = executeQueryOneRow('SELECT COUNT(*) as counts FROM games g INNER JOIN company c ON g.comp_id = c.comp_id');
    
   $array2 = array(
    "prod" => $store,
    "broj" => $queryCountOneRow
);*/

$limit = " LIMIT 0,4"; 
$store = getQueryPCLimit($limit);

$trueFalse = false;
$countFIlt = null;
$filter = null;
$queryCountOneRow = CountExtra($countFIlt, $filter, $trueFalse);

$array2 = array(
    "prod" => $store,
    "broj" => $queryCountOneRow
);

if($array2){
    $status = 200;
    $data = $array2;
}else{
    $status = 500;
    
}

http_response_code($status);
echo json_encode($data);
}

