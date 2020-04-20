<?php

function Func(){
    return executeQuery("SELECT * FROM  func");
}

function queryUserFunc(){
    return "SELECT * FROM user u INNER JOIN func f ON u.function_id=f.function_id";
}

function DeleteUsers(){
    return "DELETE FROM user WHERE user_id = :id";
  }


function getUser($upId){
    global $connection;
    $queryGet = queryUserFunc();
    $queryGet.= " WHERE user_id = :id";
    $upPrepare = $connection->prepare($queryGet);
    $upPrepare->bindParam(":id",  $upId );
       $upPrepare->execute();
         $upUsers = $upPrepare->fetch();
         return $upUsers;
  }




function InsertUser($username,  $email, $password ,  $verifyPasword, $activ , $listUsers ){
    global $connection;
  $queryInset = "INSERT INTO user (user_id ,username,email,password,verifypassword ,token, function_id)
  values (null,:usernm, :email, :pass, :verifypass ,:token, :fid)";
  $insertUsers = $connection->prepare($queryInset);
  $insertUsers->bindParam(":usernm", $username);
  $insertUsers->bindParam(":email", $email);
  $insertUsers->bindParam(":pass", $password);
  $insertUsers->bindParam(":verifypass", $verifyPasword);
  $token = md5(time().$email);
  $insertUsers->bindParam(":token", $token);
  $insertUsers->bindParam(":fid", $listUsers);
  $Insert = $insertUsers->execute(); 
  
  return $Insert;
  }


  function DeleteId($id) {
    global $connection;
      $delete = DeleteUsers(); 
    $queryDel = $connection->prepare($delete);
    $queryDel->bindParam(':id', $id);
        $resDel = $queryDel->execute();
    return $resDel;
  }


  function CountAdmin(){
    global $connection;
    $queryCount = "SELECT COUNT(*) as counts FROM games g INNER JOIN company c ON g.comp_id = c.comp_id";
    $countPrepare = $connection->prepare($queryCount);
        $countPrepare -> execute();
     $insCount = $countPrepare -> fetch();
    return $insCount;
  }
  


  function Pagination($per_page , $getIns ){
    global $connection;  
    $insc = CountAdmin(); 
       $number_of_links = ceil($insc->counts/$per_page);
      // NumbOfLinks($number_of_links);
         $numberIns = isset($_GET[$getIns]) ? $_GET[$getIns] : 1; 
        $from = $per_page * ($numberIns - 1);
        $arrPg = array(
          "from" => $from,
          "link" => $number_of_links
        );
       // echo json_encode($arrPg);
      return $arrPg;
  }
  
  function NumbOfLinks($number_of_links){
    $number_of_links = ceil($insc->counts/$per_page);
    return $number_of_links;
  }


function getLimitUser($from , $per_page){
    return  " LIMIT ".$from.", $per_page";
}


  function getQueryULimit($limit){
    global $connection;
    $queryStore = queryUserFunc();
   $queryStore .= $limit;
    $resultPCLimit = executeQuery($queryStore);
    return $resultPCLimit;
}

/*
function UpdateWithPass(){
  global $connection;
  $query = "UPDATE user SET username=:usr, email=:email,
  password=:pass, verifypassword=:verpass ,active=:act  WHERE user_id=:id";

  $pass=md5($pass);
  $verpass=md5($verpass);
  $ins = $connection->prepare($query);
  $ins->bindParam(":usr",$username[0]);
  $ins->bindParam(":email",$email);
  $ins->bindParam(":pass",$pass);
  $ins->bindParam(":verpass",$verpass);
  $ins->bindParam(":act",$active);
  $ins->bindParam(":id",$userID);
 $resultUp = $ins->execute();
  return $resultUp;
}

function UpdateWithOutPass(){
         global $connection;
  $query = "UPDATE user SET username=:usr, email=:email ,active=:act WHERE user_id=:id";
        $ins = $connection->prepare($query); 
        $ins->bindParam(":usr",$username[0]);
        $ins->bindParam(":email",$email);
        $ins->bindParam(":act",$active);
        $ins->bindParam(":id",$userID);
        $resultUp = $ins->execute();
  return $resultUp;
}*/


function UpdateUser($username , $email , $pass , $verpass  , $userID ){
  global $connection;
  $query = "UPDATE user SET username=:usr, email=:email,
  password=:pass, verifypassword=:verpass  WHERE user_id=:id";
  $pass=md5($pass);
  $verpass=md5($verpass);
  $ins = $connection->prepare($query);
  $ins->bindParam(":usr",$username);
  $ins->bindParam(":email",$email);
  $ins->bindParam(":pass",$pass);
  $ins->bindParam(":verpass",$verpass);
  $ins->bindParam(":id",$userID);
 $resultUp = $ins->execute();
  return $resultUp;
}


