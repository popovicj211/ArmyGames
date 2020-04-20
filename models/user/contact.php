<?php

 header("Content-Type:application/json");
 $code = 404;
$message = null;

if(isset($_POST['btncontact'])) 
   {
      require_once '../../config/connection.php';
       $fullname = $_POST['contactname']; 
       $email = $_POST['contactemail'];
       $text = $_POST['context'];
  
       $regFullname ="/^[A-ZČĆŠĐŽ][a-zčćšđž]{3,}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,})+$/";
       $regText ="/^[A-ZČĆŠĐŽa-zčćšđž\d\s\.\,\*\+\?\!\-\_\/\'\:\;]{5,}$/";
      $arrayErrors = [];
     

      if(!preg_match($regFullname, $fullname))
      {
         array_push($arrayErrors, "Invalid fullname");
      }

      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
         array_push($arrayErrors, "Invalid email");
      }

      if(!preg_match($regText,  $text))
      {
         array_push($arrayErrors, "Invalid text");
      }

      if(count($arrayErrors) != 0)
      {
       
     $code = 422;
     $message = ["message" => $arrayErrors];
  
 
      }else {
         
         $queryCont = 'INSERT INTO contact (cont_id,fullname,email,text)
           values ("", :fuln, :emailC, :textC)';
         $statement = $connection->prepare($queryCont);
         $statement->bindParam(":fuln", $fullname);
         $statement->bindParam(":emailC", $email);
         $statement->bindParam(":textC", $text);
        $resInsert = $statement->execute(); 
        
          if($resInsert){
             if($statement->rowCount()){
               $code = 201;
               $message = ["message" => "Contact is successfully"];
            
             }
                
          }else{
            $code = 500;
            $message = ["message" => "Error on server"];
          }
         
        
     }

     http_response_code($code);
     echo json_encode($message); 
    

   }
 