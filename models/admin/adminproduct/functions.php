<?php

function Brand(){
    return executeQuery("SELECT * FROM company");
  }

  function queryGames(){
    return "SELECT g.*, c.name as name_brand FROM games g INNER JOIN company c ON g.comp_id=c.comp_id";
  }

  
function DeleteGames(){
    return "DELETE FROM games WHERE game_id = :id";
    }

    function getLimitUser($from , $per_page){
      return  " LIMIT ".$from.", $per_page";
  }

  function executeQueryOneRow($query){
    global $connection;
    return $connection->query($query)->fetch();
}
  

  function getQueryULimit($limit){
    global $connection;
    $queryStore = queryGames();
   $queryStore .= $limit;
    $resultPCLimit = executeQuery($queryStore);
    return $resultPCLimit;
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
         $numberIns = isset($_GET[$getIns]) ? $_GET[$getIns] : 1; 
        $from = $per_page * ($numberIns - 1);
        $arrPg = array(
          "from" => $from,
          "link" => $number_of_links
        );
      return $arrPg;
  }
  
  function NumbOfLinks($number_of_links){
    $number_of_links = ceil($insc->counts/$per_page);
    return $number_of_links;
  }

  function DeleteId($id) {
    global $connection;
      $delete = DeleteGames(); 
    $queryDel = $connection->prepare($delete);
    $queryDel->bindParam(':id', $id);
        $resDel = $queryDel->execute();
    return $resDel;
  }

  
  function InsertGame($name ,  $image , $desc , $price, $brand ,$year , $pathImgAGF ,  $pathImgAGF_newimage  , $pathImgAGS ,  $pathImgAGS_newimage , $pathImgAGT ,  $pathImgAGT_newimage ){
    global $connection;
    $br = 1;
    $alt = $name." image ".$br++;


/*
    $queryInset = "INSERT INTO games (game_id ,name,src,description,price ,comp_id, year)
    values (null,:nm, :img, :descr, :price ,:cid, :yer)";
    $insertGame = $connection->prepare($queryInset);
    $insertGame->bindParam(":nm", $name);
    $insertGame->bindParam(":img", $image);
    $insertGame->bindParam(":descr", $desc);
    $insertGame->bindParam(":price", $price);
    $insertGame->bindParam(":cid", $brand);
    $insertGame->bindParam(":yer", $year);
    $InsertG =  $insertGame->execute(); 
    return $InsertG;
*/
try{
$connection->beginTransaction();

$queryInset = "INSERT INTO games (game_id ,name,src,description,price ,comp_id, year)
values (null,?, ?, ?, ? , ?, ?)";
$insertGame = $connection->prepare($queryInset);
$insertGame->execute([$name , $image , $desc , $price , $brand , $year ]);

$gameId = $connection -> lastInsertId();
//$idGal = $connection -> lastInsertId(); 


$arrGal = [intval($gameId) - 2  , intval($gameId) - 1 , intval($gameId)];

foreach($arrGal as $galVal){
  $queryParams[] = "(NULL,?,?)";

  $values[] = $gameId; // ono sto menja prvi "?"
  $values[] = $galVal; // ono sto menja drugi "?"
}



$GameGallery = $connection -> prepare("INSERT INTO games_gallery ( gagal_id , game_id , gal_id  ) VALUES " . implode(",", $queryParams));
 $GameGallery -> execute($values);

//$galId = $connection -> lastInsertId();



     InsertGameGal($pathImgAGF ,  $pathImgAGF_newimage , $alt );
     InsertGameGal($pathImgAGS ,  $pathImgAGS_newimage , $alt );
     InsertGameGal($pathImgAGT ,  $pathImgAGT_newimage , $alt );
   
  $transaction = $connection->commit();
}catch(PDOException $e){
  $connection->rollback();
          echo $e -> getMessage();

}
 return $transaction;
  }

  function InsertGameGal($href ,  $src , $alt ){
    global $connection;
    $queryInsetG = "INSERT INTO gallery (gal_id ,href,src,alt)
    values (null,? , ? ,?)";
    $insertGal = $connection->prepare($queryInsetG);
    $InsertGAF =  $insertGal->execute([$href , $src , $alt]); 
    return $InsertGAF;
  }


function imagedata($image){
  $nameImg = $image['name'];
  $tmp_nameImg = $image['tmp_name'];
  $sizeImg = $image['size'];
  $typeImg = $image['type'];
   $arrImgData = array(
     "nameImg" => $nameImg , 
    "tmpImg" => $tmp_nameImg,
    "sizeImg" => $sizeImg,
    "typeImg" => $typeImg
);
return $arrImgData;
}


  function Inarray($typeImg , $imageTypes, $arrayErrors){
    $resIA = null;
           if(!in_array($typeImg , $imageTypes)){
     array_push($arrayErrors , "Type file isn't ok");
     $resIA = $arrayErrors;
        }
      return $resIA;
  }

  function SizeImage($sizeImg , $sizeMax , $arrayErrors ){
    $resS = null;
    if($sizeImg > $sizeMax){
       array_push($arrayErrors , "Size file isn't ok");
       $resS = $arrayErrors;
     }
     return $resS;
  }



  function imageresize($tmp_nameImg,  $newWidth ,$typeImg , $path_newimage){


    list($width, $height) = getimagesize($tmp_nameImg);

    $existingImage = null;
    switch($typeImg){
        case 'image/jpeg':
            $existingImage = imagecreatefromjpeg($tmp_nameImg);
            break;
        case 'image/png':
            $existingImage = imagecreatefrompng($tmp_nameImg);
            break;
    }

 //   $newWidth = 262;
    $newHeight = ($newWidth/$width) * $height;
 // $newHeight = 381;
    $newImage = imagecreatetruecolor($newWidth,  $newHeight );

    imagecopyresampled($newImage, $existingImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);


    switch($typeImg){
       case 'image/jpeg':
           imagejpeg($newImage, '../../../'.$path_newimage, 75);
           break;
       case 'image/png':
           imagepng($newImage, '../../../'.$path_newimage);
           break;
   }
   return $path_newimage;
  }

/*

function imageSizeAdmin($filename){
  //$filename = 'test.jpg';
  $percent = 0.5;

  // Get new sizes
  list($width, $height) = getimagesize($filename);
  $newwidth = $width * $percent;
  $newheight = ($newwidth/$width) * $height;
  
  // Load
  $thumb =  imagecreatetruecolor($newwidth, $newheight);
  $source =  imagecreatefromjpeg($filename);
   imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
  
  return $filename;
}

*/