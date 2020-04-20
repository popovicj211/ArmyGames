<?php
header("Content-type: application/json");

require_once "../../config/connection.php";
require_once "functions.php";
/*
$exeCount = executeQueryOneRow('SELECT COUNT(*) as counts  FROM games g INNER JOIN company c ON g.comp_id = c.comp_id');
$per_page = 4; 
$number_of_links = ceil($exeCount->counts/$per_page); 
$number = isset($_GET['numb']) ? $_GET['numb'] : 1; 
$from = $per_page * ($number - 1);

$queryPag = getQueryPC();
$queryPag .= " LIMIT $from, $per_page";
    $preparedPag = $connection->prepare($queryPag);
    $preparedPag -> execute();
    $pag = $preparedPag ->fetchAll();
 $array = array(
    "broj" => $exeCount,
    "pag" => $pag
);
*/

$status = 404;
$data = null;

$filter = null;
$trueFalse = false;
$countFIlt = null;

$exeCount = CountExtra($countFIlt, $filter, $trueFalse);
$per_page = 4; 
$number_of_links = ceil($exeCount->counts/$per_page); 
$number = isset($_GET['numb']) ? $_GET['numb'] : 1; 
$from = $per_page * ($number - 1);

$limit = " LIMIT $from, $per_page";
$pag = getQueryPCLimit($limit);

 $array = array(
    "broj" => $exeCount,
    "pag" => $pag
);

if($array){
    $status = 200;
    $data = $array;
}else{
    $status = 500;
}

echo json_encode($data);


