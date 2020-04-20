<?php

function UpdateLogin($setLog ,$whereLog , $id , $trufal ){
    global $connection;
          $queryUpLog = "UPDATE user SET login = :setLog WHERE login = :whereLog";
          if($trufal == true){
              $queryUpLog .= " AND user_id = :id";
          }
          $queryPrepare = $connection -> prepare($queryUpLog);
          $queryPrepare -> bindParam(":setLog" , $setLog);
          $queryPrepare -> bindParam(":whereLog" , $whereLog);  
          if($trufal == true){  
           $queryPrepare -> bindParam(":id" , $id);
          }
          $queryExec = $queryPrepare -> execute();
          return $queryExec;
  }


  
function UpdateLogin2($setLog ,$whereLog ){
    global $connection;
          $queryUpLog = "UPDATE user SET login = :setLog WHERE login = :whereLog "; 
          $queryPrepare = $connection -> prepare($queryUpLog);
          $queryPrepare -> bindParam(":setLog" , $setLog);
          $queryPrepare -> bindParam(":whereLog" , $whereLog);    
          $queryExec = $queryPrepare -> execute();
          return $queryExec;
  }



