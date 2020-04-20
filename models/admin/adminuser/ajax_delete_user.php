<?php
session_start();
   $statusCode = 404;


if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "You don't have access on this page!";
}

if(isset($_POST['id'])&& $_SESSION['user']->function_id == 1){
    require_once '../../../config/connection.php';
    require_once 'functions.php';
    $id = $_POST['id'];

  DeleteId($id);
  if(DeleteId($id)){
    $statusCode = 204;
  }else{
    $statusCode = 500;
  }


}

http_response_code($statusCode);
