<?php
include 'header.php';
require '../database/dbconnection.php';
require '../includes/login.check.admin.php';
require '../includes/login.admin.php';

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];

    $sql = 'select * from users where id=?';
    $stmt= $conn->prepare($sql);
    if(!$stmt){
        header('location:profile.php?error=queryerror');
        exit();
    }
    $stmt->bind_param('i', $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}
?>

<div class="main-content">
    <h1 style="text-align: center;">User Profile</h1>
    <div class="parent">
        <div class="child1">
                <h1 class="profile-text">Firstname:<?php echo $row['firstname'] ?></h1>
                <h1 class="profile-text">Middlename:<?php echo $row['middlename'] ?></h1>
                <h1 class="profile-text">Lastname:<?php echo $row['lastname'] ?></h1>
                <h1 class="profile-text">Username:<?php echo $row['username'] ?></h1>
                <h1 class="profile-text">Email:<?php echo $row['email'] ?></h1>
                <br/>
                <hr/>
                <p style="color:red; font-size:12px;font-weight:900">** Username and Email 
                Cannot be Updated</p>
                <a href="update.details.php" class="edit">Update Details</a>
            </div>
        <div class="child2">
            <?php
            if ($row['profile_image']!=null){
                ?>
               <img src="../assets/uploads/<?php echo $row['profile_image']; ?>"  width="200"/>
               <?php
            }
            else{
                echo "<img src='../assets/images/man.jpg' width='200'  />";
            }

            
             ?>
            <br/>
            <hr/>
            <a href="update.image.php" class="edit">Update Image</a>
        </div>
    </div>
</div>
