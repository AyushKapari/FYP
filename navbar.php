<!DOCTYPE html>
<?php 
require_once 'database/dbconnection.php';
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
    <link rel="stylesheet" href="assets/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="assets/images/logo.png" />
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="assets/images/logo.png" alt="logo" width="80"/>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                   
                    <?php
                    if(isset($_COOKIE['userid'])){
                        echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                        echo "<li><a href='#'>Profile</a></li>";
                        echo "<li><a href='#'>".$_SESSION['username']."</a></li>";
                    }
                    else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='signup.php'>Register</a></li>";
                    } 
                    ?>
                </ul>
            </div>
        </nav>
    </header>
   

    
