<?php
 
 header("Content-type: application/json");
 $code = 404;
$message = null;

if($_SERVER['REQUEST_METHOD'] != "POST"){
   echo "You don't have access on this page!";
}


if(isset($_POST['btninspro'])) 
   {
      require_once '../../../config/connection.php';
         require_once "functions.php"; 

        // define("FILE_SIZE", 2000000);
           $sizeMax = 2 * (1024 * 1024);
         $imageTypes = ['image/jpeg','image/jpg','image/png'];

       

    $imgGame = imagedata($_FILES['insproimg']);
   
    
    
      $file = time()."_".$imgGame['nameImg'];
      $path = "../../../assets/images/".$file;
      $path_newimage = "assets/images/new_".$file;

      $arrayErrors = [];


Inarray($imgGame['typeImg'] , $imageTypes, $arrayErrors);

SizeImage($imgGame['sizeImg'] ,  $sizeMax , $arrayErrors );


// first image about game , page readmore.php


$imgAboutGameF = imagedata($_FILES['insproimggal1']);

$fileImgAGF = time()."_".$imgAboutGameF['nameImg'];
$pathImgAGF = "../../../assets/images/gallery/".$fileImgAGF;
$pathImgAGF_newimage = "assets/images/gallery/new_".$fileImgAGF;
$pathImgAGFDB = "assets/images/gallery/".$fileImgAGF;
Inarray($imgAboutGameF['typeImg'] , $imageTypes, $arrayErrors);

SizeImage($imgAboutGameF['sizeImg'] ,  $sizeMax , $arrayErrors );



// second image about game , page readmore.php

$imgAboutGameS = imagedata($_FILES['insproimggal2']);
$fileImgAGS = time()."_".$imgAboutGameS['nameImg'];
$pathImgAGS = "../../../assets/images/gallery/".$fileImgAGS;
$pathImgAGSDB = "assets/images/gallery/".$fileImgAGS;
$pathImgAGS_newimage = "assets/images/gallery/new_".$fileImgAGS;

Inarray($imgAboutGameS['typeImg'] , $imageTypes, $arrayErrors);

SizeImage($imgAboutGameS['sizeImg'] ,  $sizeMax , $arrayErrors );

// third image about game , page readmore.php

$imgAboutGameT = imagedata($_FILES['insproimggal3']);
$fileImgAGT = time()."_".$imgAboutGameT['nameImg'];
$pathImgAGT = "../../../assets/images/gallery/".$fileImgAGT;
$pathImgAGTDB = "assets/images/gallery/".$fileImgAGT;
$pathImgAGT_newimage = "assets/images/gallery/new_".$fileImgAGT;

Inarray($imgAboutGameT['typeImg'] , $imageTypes, $arrayErrors);

SizeImage($imgAboutGameT['sizeImg'] ,  $sizeMax , $arrayErrors );

     if(count($arrayErrors) == 0 ){



  $imgResize = imageresize($imgGame['tmpImg'],  $newWidth = 262 , $imgGame['typeImg'] , $path_newimage);

  // first image about game resize , page readmore.php

  $imgAGFResize = imageresize($imgAboutGameF['tmpImg'],  $newWidth = 260 , $imgAboutGameF['typeImg'] , $pathImgAGF_newimage);

  // second image about game resize , page readmore.php

  $imgAGSResize = imageresize($imgAboutGameS['tmpImg'],  $newWidth = 260 , $imgAboutGameS['typeImg'] , $pathImgAGS_newimage);

  // third image about game resize , page readmore.php

  $imgAGTResize = imageresize($imgAboutGameT['tmpImg'],  $newWidth = 260 , $imgAboutGameT['typeImg'] , $pathImgAGT_newimage);


        if(move_uploaded_file($imgGame['tmpImg'] , $path) && move_uploaded_file($imgAboutGameF['tmpImg'] , $pathImgAGF)  && move_uploaded_file($imgAboutGameS['tmpImg'] , $pathImgAGS) && move_uploaded_file($imgAboutGameT['tmpImg'] , $pathImgAGT)){
                
         $name = $_POST['insproname']; 
         $brand = $_POST['insprobrend'];
        $year = $_POST['insproyear'];
        $price = $_POST['insproprice'];
        $desc = $_POST['insprodesc'];
       //  $arrGal = [ $_POST['hiddenImageGal1Id'] ,  $_POST['hiddenImageGal2Id'] ,  $_POST['hiddenImageGal3Id']];

                  
      $regName = "/^[\w\-\/\s]{4,40}$/";
      $regPrice = "/^[1-9]([0-9])?(\.)[0-9][0-9]$/";
      $regDesc = "/^[\w\-\/\=\!\@\#\%\&\*\+\?\.\,\:\;\s\'\"]{4,}$/";

      if(!preg_match($regName, $name ))
      {
         array_push($arrayErrors, "Invalid name of game!");
      }

      if(!isset($_POST['insprobrend'])){
        array_push($arrayErrors, "Please choose brand");
     }

      
     if(!isset($_POST['insproyear'])){
        array_push($arrayErrors, "Please choose year");
     }

      if(!preg_match( $regPrice, $price))
      {
         array_push($arrayErrors, "Invalid price of game!");
      }

      if(!preg_match($regDesc, $desc))
      {
         array_push($arrayErrors, "Invalid description!");
      }

      if(count($arrayErrors) != 0)
      {
       
         $code = 422;
         $message = ["message" => $arrayErrors]; 
          
      }else {
        
           $br = 1;
         $alt = $name." image ".$br++;
  
        $data = InsertGame($name ,  $imgResize , $desc , $price, $brand ,$year , $pathImgAGFDB , $imgAGFResize ,$pathImgAGSDB ,  $imgAGSResize , $pathImgAGTDB ,   $imgAGTResize );

        // insert first image about game  , page readmore.php
      //  $dataImg1 = InsertGameGal($pathImgAGF ,  $pathImgAGF_newimage , $alt );

           // insert second image about game  , page readmore.php
        //   $dataImg2 = InsertGameGal($pathImgAGS ,  $pathImgAGS_newimage , $alt );

              // insert third image about game  , page readmore.php
          //    $dataImg3 = InsertGameGal($pathImgAGT ,  $pathImgAGT_newimage , $alt );

        if($data){  
         $code = 201;
        $message = ["message" => "Game is successfully inserted"];
        header("Location: ".BASE_URL."index.php?page=adminproduct");
          
        }else{
            $code = 500;
          $message = ["message" => "Game is exist or error on server"];
   }
        
     }

   
   
     }

     //imagedestroy($postojecaSlika);
     //imagedestroy($novaSlika);

   }
}

   http_response_code($code);
   echo json_encode($message); 








     /*  $queryInset = "INSERT INTO user (game_id ,name,src, description,price, comp_id , year)
           values (null,?, ?, ?, ? ,?, ?)"; 
         $insertUsers = $connection->prepare($queryInset);
        $Insert = $insertUsers->execute([$name,  $image ,  $desc , $price, $brand ,$year ]); 
        
        if($Insert){
         if($insertUsers->rowCount()){
           $code = 201;
           $message = ["message" => "User is successfully inserted"];
        
         }
            
      }else{
        $code = 500;
        $message = ["message" => "User are exist or error on server"];
      }
         
        */