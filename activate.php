<?php 
require '../database/dbconnection.php';

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
    $is_active = 1;

    $sql = 'update users set is_active=? where id=?';
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        header('location:index.php?error=queryerror');
        exit();
    }
    $stmt->bind_param("ii",$is_active,$userid);
    $stmt->execute();
    $stmt->close();
    header('location:index.php?activate=success');
    exit();
}