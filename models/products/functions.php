<?php
//require_once "../../config/connection.php";

/*
function getProductsWithCategory(){
    $result = executeQuery(getQueryPC());
    return $result;
}
*/


/*
function getQueryPC(){
    return "SELECT g.game_id, g.name, g.src, g.alt, g.price, g.year as game_year, c.name as company_name  FROM games g INNER JOIN company c ON g.comp_id = c.comp_id";
}

function getCategory(){
    $result = executeQuery(getQueryC());
    return $result;
}
function getQueryC(){
    return "SELECT c.name, c.comp_id FROM company c GROUP BY comp_id";
}

function getQueryCount(){
    return "SELECT COUNT(*) as counts  FROM games g INNER JOIN company c ON g.comp_id = c.comp_id";
}

*/


function getQueryPC(){
    return "SELECT g.game_id, g.name, g.src, g.price, g.year as game_year, c.name as company_name  FROM games g INNER JOIN company c ON g.comp_id = c.comp_id";
}




function getQueryPCId($filter , $append){
   /*global $connection;
    $queryFilt = getQueryPC();
   //  $queryFilt .=" WHERE g.comp_id= :id";
   $queryFilt .= $append;
     $preparedFilt = $connection -> prepare($queryFilt); 
    $preparedFilt -> bindParam(":id", $filter);
     $preparedFilt -> execute();
    $filtRes = $preparedFilt -> fetchAll();
    return $filtRes;*/

    global $connection;
    $queryFilt = getQueryPC();
    $queryFilt .= $append;
     $preparedFilt = $connection -> prepare($queryFilt); 
    $preparedFilt -> bindParam(":id", $filter);
    $execFilt = $preparedFilt -> execute();
    $filtRes = $preparedFilt -> fetchAll();
  //  StatusCode($filtRes);
  
    return $filtRes;
  
}


function StatusCode($result){
    if($result){
        
           $codeFilt = 200;
        }else{
            $codeFilt = 500;
        }
         return $codeFilt;
       // return http_response_code($codeFilt) ;
}

function getQueryPCLimit($limit){
    global $connection;
    $queryStore = getQueryPC();
   // $queryStore .= " LIMIT 0,4";
   $queryStore .= $limit;
    $resultPCLimit = executeQuery($queryStore);
    StatusCode($resultPCLimit);
    return $resultPCLimit;
}

/*
function executeQueryOneRow($queryRow){
    global $connection;
    $result = $connection->query($queryRow)->fetch();
      return $result;
}

function executeQueryCount(){
     return executeQueryOneRow("SELECT COUNT(*) as counts FROM games g INNER JOIN company c ON g.comp_id = c.comp_id");
 }
 */

function CountExtra($countFIlt, $filter, $trueFalse){
     global $connection;
    $queryCount = "SELECT COUNT(*) as counts FROM games g INNER JOIN company c ON g.comp_id = c.comp_id";
    //$queryCount .= " WHERE g.comp_id = :idC";
    if($trueFalse == true){
        $queryCount .= $countFIlt;
       
    }
    $countPrepare = $connection->prepare($queryCount);
    //$countPrepare -> bindParam(":idC", $filter);
    if($trueFalse == true){
        $countPrepare -> execute([$filter]);
    }else{
        $countPrepare -> execute();
    }
     
     $execCount = $countPrepare -> fetch();
    return $execCount;
}

function getQueryC(){
    return "SELECT c.name, c.comp_id FROM company c GROUP BY comp_id";
}

function getCategory(){
    $result = executeQuery(getQueryC());
    return $result;
}

function Menu(){
    return  executeQuery("SELECT * FROM menu");  
 }

 function Gallery($gd){
     global $connection;
    $queryGal = 'SELECT  g.gal_id, g.href as gale_link , g.src as gale_src , g.alt as gale_des FROM gallery g INNER JOIN games_gallery gg ON g.gal_id = gg.gal_id  WHERE gg.game_id = ?';
    $preparedGal = $connection->prepare($queryGal);
    $preparedGal ->execute([$gd]);
    $galResult = $preparedGal ->fetchAll();
    return $galResult;
 }

 function Description($gd){
    global $connection;
    $queryDes ="SELECT description FROM games WHERE game_id = ?";
    $preparedDes = $connection->prepare($queryDes);
    $preparedDes -> execute([$gd]);
    $desResult = $preparedDes -> fetchAll();
    return $desResult;
 }