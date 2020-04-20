<?php
include 'functions.php';

$statusCode = 404;


if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "You don't have access on this page!";
}

if(isset($_POST['id'])){
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
