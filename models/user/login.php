<?php
 //ob_start();
session_start();

   header("Content-Type:application/json");
   $code = 404;
$message = null;



if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "You don't have access on this page!";
 }

               if(isset($_POST['btnlog'])) {
                
                require_once '../../config/connection.php';
                include "functions.php";
                  $userL = $_POST['logusername'];
                  $passwordL = $_POST['logpass'];
                $errorsL = [];
                $regUserL="/^[\w\-\@\s\.]{3,20}$/";
                $regPassL ="/^[A-z0-9]{6,20}$/";
                   
                if(!preg_match($regUserL,$userL)){
                    $errorsL[] ="Invalid username";
                }

                if(!preg_match($regPassL,$passwordL)){
                    $errorsL[] ="Invalid password";
                }

                if(count($errorsL) > 0){
                        $_SESSION['errors'] = $errorsL;
                        $code = 422;
                        header("Location: ".BASE_URL."index.php?page=register");
                        $message = ["message" => $errorsL];
                }else {

                 
                  $queryL = "SELECT * FROM user WHERE active = 1 AND username = :usrL AND password = :passwordL";
                  $passwordL = md5($_POST['logpass']);
                  $prepareL = $connection->prepare($queryL);
                  $prepareL->bindParam(":usrL", $userL);
                  $prepareL->bindParam(":passwordL", $passwordL);

              try{    
                  $restL = $prepareL->execute();
                  if($restL){
                      if($prepareL->rowCount()==1){
                        $userRow = $prepareL->fetch();
                        $message = ["message" => "LogIn is succesfully"];
                        $code=200;
                        $_SESSION['user_id'] = $userRow->user_id;
                        $_SESSION['user'] = $userRow;

                          header("Location: ".BASE_URL."index.php?page=store");

                        if($_SESSION['user']->function_id == 1){
                    
                            header("Location: ".BASE_URL."index.php?page=table");
                        } else {
                            header("Location: ".BASE_URL."index.php?page=index");
                        }
                        
                        if(isset($_SESSION['user'])){

                       
                        UpdateLogin($setLog = 1 ,$whereLog = 0 , $_SESSION['user']->user_id , $trufal = true );
                       }

                       
                      } else {
                       
                        
                        if($prepareL->rowCount() == 0){
                           // echo "<br/> You are not registered!!";
                           $message = ["message" => "LogIn is not valid!"];
                            $code = 500;
                        }
        
                   
                  }
                  
               
              
              } else {
                $code = 500;
                $message = ["message" => "Error on server!"];
            }
        }catch(PDOExeception $e){
            $dataError = $e->getMessage();
            SiteException($dataError);
        } 
            
        }
        echo json_encode($message);
        http_response_code($code);
 }     