<!DOCTYPE html>
<?php 
require_once '../database/dbconnection.php';
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($title)) {echo $title;}
            else {echo "Norse Mystic Academy";} ?></title>
            
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <link rel="icon" href="../assets/images/logo.png" type="image/jpg">
</head>
<body>  
    <header>
        <nav>
            <div class="logo">
                <img src="../assets/images/logo.png" alt="logo" width="80"/>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    
                    <?php
                    if(isset($_SESSION['userid'])){
                        echo "<li><a href='../includes/logout.inc.php'>Logout</a></li>";
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='#'>".$_SESSION['username']."</a></li>";
                    }
                    else{
                        echo "<li><a href='../login.php'>Login</a></li>";
                        echo "<li><a href='../signup.php'>Register</a></li>";
                    } 
                    ?>
                </ul>
            </div>
        </nav>
    </header>

    
