<?php 
require '../database/dbconnection.php';

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
    $is_superuser = 1;

    $sql = 'update users set is_superuser=? where id=?';
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        header('location:index.php?error=queryerror');
        exit();
    }
    $stmt->bind_param("ii",$is_superuser,$userid);
    $stmt->execute();
    $stmt->close();
    header('location:index.php?promote=success');
    exit();
}