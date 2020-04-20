<?php
  

function getLogFile(){
    $openLog = fopen( LOG_FILE , "r");
    //    fwrite($openLog, $_SERVER['PHP_SELF']."?page=".$_GET['page']."\t".$_SERVER['REMOTE_ADDR']."\t".date('d-m-Y H:m:s')."\n");
         $fileLog = file(LOG_FILE);
       //  fclose($openLog);
         return $fileLog;
  }

function isEmpty($count , $arr){
     if(!isset($count)){
             $count = 1;
             $arr[] = 0;
    }
    return $count;
}

function Percent( $count , $sum){
   
  $perPage = round(($count / $sum ) * 100, 2);

  return $perPage;
}

function UpdateLogin($setLog ,$whereLog , $id  ){
  global $connection;
        $queryUpLog = "UPDATE user SET login = :setLog WHERE login = :whereLog AND user_id = :id";
      
        $queryPrepare = $connection -> prepare($queryUpLog);
        $queryPrepare -> bindParam(":setLog" , $setLog);
        $queryPrepare -> bindParam(":whereLog" , $whereLog);    
         $queryPrepare -> bindParam(":id" , $id);
        $queryExec = $queryPrepare -> execute();
        return $queryExec;
}


function CountUsersLog($logC){
  global $connection;
       $queryCountLog = "SELECT count(user_id) AS countUsers FROM user WHERE login = ?";
       $queryPrepareCL = $connection -> prepare($queryCountLog);
       $queryExecCl = $queryPrepareCL -> execute([$logC]); 
      $queryResCl = $queryPrepareCL -> fetch();
      return $queryResCl;
}