<?php
require_once '../database/dbconnection.php';

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];

    if(emptyInputsUpdate($firstname, $lastname)==true){
        header('location:update.details.php?error=emptyinputs');
        exit();
    }
    updateUser($conn, $firstname, $middlename, $lastname);
}

function emptyInputsUpdate($firstname, $lastname){
    $result = "";
    if(empty($firstname) || empty($lastname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function updateUser($conn, $firstname, $middlename, $lastname){
    session_start();
    $userid = $_SESSION['userid'];
    $sql = 'update users set firstname=?, middlename=?, lastname=? where id=?';
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        header('location:update.details.php?error=queryerror');
        exit();
    }
    $stmt->bind_param("sssi", $firstname, $middlename, $lastname, $userid);
    $stmt->execute();
    $stmt->close();
    header('location:update.details.php?success=updatedetails');
    exit();
}