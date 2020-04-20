<?php
header("Content-Type: application/json");

/*
if(isset($_GET['show'])){
    $start = 0 + intval($_GET['show']) ;
    $length = 4 + intval($_GET['show']) ;
   
    var_dump($_GET['show']);
}else{
    $start = 0;
     $length = 4;
     
}
*/

$status = 400;
//$data = ["message"=> "Sorting games are not successful!"];
$data = null;

 if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
        require_once "../../config/connection.php";
         require_once "functions.php";

         $filter= null;
         $trueFalse = false;
         $countFIlt = null;
   //     $querySorting = getQueryPC();

      //  $start = 0;
      //  $length = 4;
            
   /*     $start = isset($_GET['show']) ? intval($_GET['show']) : 0 ; 
        $length = isset($_GET['show']) ? intval($_GET['show']) + 4 : 4 ;
       switch($sort){

           case 1:  $querySorting .= " ORDER BY g.name ASC LIMIT ".$start.",".$length ;
           break;
           case 2:  $querySorting .= " ORDER BY g.name DESC LIMIT ".$start.",".$length;
           break;
           case 3:  $querySorting .= " ORDER BY g.price ASC LIMIT ".$start.",".$length;
           break;
           case 4:  $querySorting .= " ORDER BY g.price DESC LIMIT ".$start.",".$length;
           break;
           default: $querySorting .= " LIMIT 0,4" ;
       }
       
        
       $result = executeQuery($querySorting);
*/


$exeCount = CountExtra($countFIlt, $filter, $trueFalse);
$per_page = 4; 
$number_of_rows = ceil($exeCount->counts/$per_page); 
$number = $per_page * $number_of_rows;
//$from = $per_page * ($number - 1);




// $start = isset($_GET['show']) ? intval($_GET['show']) : 0 ; 
$start = 0 ;
$length = isset($_GET['show']) ? $number : 4 ;



switch($sort){

   case 1:  $append = " ORDER BY g.name ASC LIMIT ".$start.",".$length ;
   break;
   case 2:  $append  = " ORDER BY g.name DESC LIMIT ".$start.",".$length;
   break;
   case 3:  $append  = " ORDER BY g.price ASC LIMIT ".$start.",".$length;
   break;
   case 4:  $append  = " ORDER BY g.price DESC LIMIT ".$start.",".$length;
   break;
   default: $append  = " LIMIT 0,4" ;
}


$querySorting = getQueryPCId($filter , $append);
       

     /* $arrsort =  array(
              "broj" => $exeCount,
              "querysort" => $querySorting
        );  */

         if($querySorting){
            $status = 200;
            $data = $querySorting;
         }else{
            $status = 500;
           
         }
      

      



}

http_response_code($status);
echo json_encode($data);