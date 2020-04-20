<?php
 //ob_start();
session_start();

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "You don't have access on this page!";
}

$code = 404;

if(isset($_POST['btnup']) && $_SESSION['user']->function_id == 1){
    require_once '../../../config/connection.php';
    require_once 'functions.php';

    $userID = $_POST['hiddenUserId'];
  
    $email = $_POST['upemail'];

   
	$username = explode("@",$email);
			

   // $active = isset($_POST['upactive']) ? $_POST['upactive'] : false;
    
    $pass = $_POST['uppass'];
    $verpass = $_POST['upverpass'];
    
    $funcName = $_POST['users-list-up'];

      try{
        $execUp = UpdateUser($username[0] , $email , $pass , $verpass  , $userID );
        if($execUp){
           echo "<h4>User is successfully updated </h4>";
           $code = 204;
               header("Location: ".BASE_URL."index.php?page=table");
        }else { 
           echo "<h4>Error: User isn't updated.</h4>";
           $code = 500;
       }  
    }catch(PDOExeption $e){
               $dataError = $e->getMessage();
               SiteException($dataError);
    }
 //   }
 
}

http_status_code($code);
