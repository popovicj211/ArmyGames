<?php
session_start();
header("Content-type: application/json"); 

$code =404;
$data = null;

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "You don't have access on this page!";
}

 	if(isset($_POST['id']) && $_SESSION['user']->function_id == 1){
		require_once '../../../config/connection.php';
		require_once "functions.php";
         $upIsd = intval($_POST['id']);

		$data = getUser($upIsd);
	    if($data){
			$code = 200;
		}else{
			$code = 500;
		}

 	}
http_response_code($code);
echo json_encode($data);