<?php
 session_start();
 header("Content-type: application/json");

 $code = 404;
$message = null;

if($_SERVER['REQUEST_METHOD'] != "POST"){
   echo "You don't have access on this page!";
}

if(isset($_POST['btnins']) && $_SESSION['user']->function_id == 1) 
   {
      require_once '../../../config/connection.php';
      require_once 'functions.php';
       $username = $_POST['insusername']; 
       $email = $_POST['insemail'];
       $password = $_POST['inspass'];
      $verifyPasword = $_POST['insverpass'];
       $listUsers =  isset($_POST['userslist']) ? $_POST['userslist'] : null;
    

         $regUseR ="/^[\w\-\@\s\.]{3,20}$/";
         $regEmail ="[a-z][\w\.\d]+\@((gmail\.com)|(ict\.edu\.rs))";
        $regPassR ="/^[A-z0-9]{6,20}$/";

      $arrayErrors = [];

      if(!preg_match($regUseR, $username))
      {
         array_push($arrayErrors, "Invalid username");
      }

      if(!filter_var( $email, FILTER_VALIDATE_EMAIL ))
      {
         array_push($arrayErrors, "Invalid email");
      }

      if(!preg_match($regPassR, $password))
      {
         array_push($arrayErrors, "Invalid password");
      }

      if(!preg_match($regPassR, $verifyPasword))
      {
         array_push($arrayErrors, "Invalid verify password");
      }

      if(!isset($_POST['userslist'])){
         array_push($arrayErrors, "You don't choose user ");
      }

      if(count($arrayErrors) != 0)
      {
       
         $code = 422;
         $message = ["message" => $arrayErrors]; 
          
      }else {


      $password = md5($_POST['inspass']);
 $verifyPasword = md5($_POST['insverpass']);

 try{
    $data = InsertUser($username,  $email, $password ,  $verifyPasword, $activ = 0 , $listUsers );
      if($data){
           $code = 201;
          $message = ["message" => "User is successfully inserted"];
            
      }else{
       $code = 500;
        $message = ["message" => "User are exist or error on server"];
     }
       
   } catch(PDOExeption $e){
              $dataError = $e->getMessage();
              SiteException("Error on insert:".$e->getMessage()."\n");
   }
     }


  
   }
 
   http_response_code($code);
   echo json_encode($message); 
