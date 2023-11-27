<?php 
require '../database/dbconnection.php';

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];

    $sql = 'delete from users where id=?';
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        header('location:index.php?error=queryerror');
        exit();
    }
    $stmt->bind_param("i",$userid);
    $stmt->execute();
    $stmt->close();
    header('location:index.php?delete=success');
    exit();
}