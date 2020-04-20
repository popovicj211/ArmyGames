<?php

require_once "config.php";


/*
define("ERROR_FILE", ABSOLUTE_PATH."/data/error.txt");
*/
function SiteException($dataError){
    $openError = fopen(ERROR_FILE,"a");
   $fw = fwrite($openError, $dataError);
    fclose($openError);
    return $fw;
}

try {
    $connection = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    $dataError ="Error database connection:".$ex->getMessage()."\n";
    SiteException($dataError);
}

function executeQuery($query){
    global $connection;
    return $connection->query($query)->fetchAll();
}

/*
$openLog = fopen(LOG_FILE, "a");
  fwrite($openLog, $_SERVER['PHP_SELF']."?page=".$_GET['page']."\t".$_SERVER['REMOTE_ADDR']."\t".date('d-m-Y H:m:s')."\n");
//fwrite($openLog, $_SERVER['PHP_SELF']."\t".$_SERVER['REMOTE_ADDR']."\t".date('d-m-Y H:m:s')."\n");
  fclose($openLog); 
*/