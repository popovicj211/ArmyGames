<?php
session_start();
header("Content-Type:application/json");

 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
 /*
 require '../php_mailer/src/Exception.php';
 require '../php_mailer/src/PHPMailer.php';
 require '../php_mailer/src/SMTP.php';

 */

require '../mailer/vendor/autoload.php';

$code = 404;
$message = "Page not found";

   

if($_SERVER['REQUEST_METHOD'] != "POST"){
   echo "You don't have access on this page!";
}


if(isset($_POST['btnreg'])) 
   {
      require_once '../../config/connection.php';

       $username = $_POST['regusername']; 
       $email = $_POST['regemail'];
       $password = $_POST['regpass'];
   
    $verifyPasword = $_POST['regverpass'];
    
     
         $regUseR ="/^[\w\-\@\s\.]{3,20}$/";

       $regPassR ="/^[A-z0-9]{6,20}$/";
      $arrayErrors = [];
      $fid = 2;

      if(!preg_match($regUseR, $username))
      {
         array_push($arrayErrors, "Invalid username");
      }

      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
         array_push($arrayErrors, "Invalid email");
      }

      if(!preg_match($regPassR,  $password))
      {
         array_push($arrayErrors, "Invalid password");
      }

      if(!preg_match($regPassR, $verifyPasword))
      {
         array_push($arrayErrors, "Invalid verify password");
      }

      if(count($arrayErrors) != 0)
      {
    
     $code = 422;
    //s $message = ["message" => $arrayErrors];
            $message = "Data are not validate!";
      }else {
         
         $query = 'INSERT INTO user (user_id ,username,email,password,verifypassword,token , function_id)
           values (null,:usernm, :email, :pass, :verifypass,:token, :fid)';
           $password = md5($password);
           $verifyPasword = md5($verifyPasword);
         $statement = $connection->prepare($query);
         $statement->bindParam(":usernm", $username);
         $statement->bindParam(":email", $email);
         $statement->bindParam(":pass", $password);
         $statement->bindParam(":verifypass", $verifyPasword );
         $token = md5(time().$email);
         $statement->bindParam(":token", $token );
         $statement->bindParam(":fid", $fid);
        
    try{
      $resInsert = $statement->execute();
        if($resInsert){
             if($statement->rowCount()){
               $code = 201;
                $_SESSION['verify'] = "Please verify your email address";

             //  $message = ["message" => "Register is successfully"];
                 $message= "Please verify your email address";
     $mail = new PHPMailer(true);            
try {
   //Server settings
   $mail->SMTPDebug = 3;                                      // Enable verbose debug output
 //  $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name'
//=> false,'allow_self_signed' => true));
   $mail->isSMTP();                                            // Set mailer to use SMTP
   $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
   $mail->Username   = 'armygamesict2@gmail.com';                     // SMTP username
   $mail->Password   = 'Ar25Gam2*';                               // SMTP password
   $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
   $mail->Port       = 587;                                    // TCP port to connect to
 // $mail->Port = 465;
   //Recipients
   $mail->setFrom('armygamesict2@gmail.com', 'Registration Form');
  // $mail->addAddress($email);     // Add a recipient
  $mail->addAddress('armygamesict@gmail.com');
   // Content
   $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = 'Activate your account';
   $href = "http://localhost:8080/phppraktikums/models/user/activate.php?a=" . $token;
    $mail->Body   = 'To activate your account please fallow <a href="' . $href . '">this</a> link';

   $mail->send();
   echo 'Message has been sent';

} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
             }
                
          }else{
            $code = 500;
            $message = "Error on server";
          }
    }catch(PDOException $e){
          $code = 500;
         $dataError = $e -> getMessage();
       //  SiteException($dataError);
        $message = "Error!";
    }
        
     }

   }
$_SESSION['verify'] = $message;
http_response_code($code);
echo json_encode([ "message" => $message]);
 
  