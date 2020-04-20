<?php
 //ob_start();
 require_once '../../config/connection.php';
 include "functions.php";
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['register'])){
    unset($_SESSION['user']);
    unset($_SESSION['register']);
    session_destroy();
    header("Location: ".BASE_URL."index.php?page=index");
    UpdateLogin($setLog = 0 ,$whereLog = 1 , $id = null , $trufal = false );
}

