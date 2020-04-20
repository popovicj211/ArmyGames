<?php
session_start();
if(isset($_GET['a'])) {
    require_once "../../config/connection.php";
    $token = $_GET['a'];
    $updateAct = "UPDATE user SET active = 1 WHERE token = :token";
    $statement = $connection->prepare($updateAct);
    $statement->bindParam(":token", $token);

    try {
        $statement->execute();
        if($statement->rowCount()) {
            $message = "Register is success, please login!";
        } else {
            $message = "Register is not success!";
        }
    } catch (PDOException $e) {
        $dataError = $e->getMessage();
        $message = "Register is not success!";
    }

} else {

    $message = "Page not found!";
}

header("Location: ".BASE_URL."index.php?page=login");
$_SESSION['active'] = $message;