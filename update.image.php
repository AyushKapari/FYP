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
    <form class="signup-form" action="update.image.inc.php" method='post' 
    enctype="multipart/form-data" 
    style="flex-direction:column; margin:0 20px;">
        <h1 class="page-title">Update Profile Image</h1>
        <?php
        if(isset($_GET['error'])){
            echo "<div class='errors'>";
            if($_GET['error']=='invalidfiletype'){
                echo "<p>Invalid File Type</p>";
            }
            else if($_GET['error']=='filetoolarge'){
                echo "<p>File is too large</p>";
            }
            else if($_GET['error']=='filemoveerror'){
                echo "<p>File move error</p>";
            }
            echo "</div>";
        }
        ?>
        <div class="form-element">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" required>

            <div class="current-image">
                Current Image:<hr/>
                <?php 
                    if($row['profile_image'] !== null){
                        ?>
                        <img src="../assets/uploads/<?php echo $row['profile_image'] ?>" width="200">
                        <?php
                    }
                    else{
                        echo "<p style='color:red;'>You have not uploaded profile image yet.</p>";
                    }
                ?>
            </div>
        </div>
        <div class="">
            <button type="submit" class="btn-submit" name="submit">Upload</button>
        </div>

    </form>
    
</div>