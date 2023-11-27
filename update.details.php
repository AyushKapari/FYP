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
    <form class="signup-form" action="update.details.inc.php" method="post" 
    style="flex-direction: column;margin:0 20px">
        <h1 class="page-title">Update Details</h1>
        <div class="form-element">
            <label for="firstname">Firstname</label>
            <input type="text" id="firstname" name="firstname"
            value="<?php echo $row['firstname'] ?>"/>
        </div>
        <div class="form-element">
            <label for="middlename">Middlename</label>
            <input type="text" id="middlename" name="middlename"
            value="<?php echo $row['middlename'] ?>"/>
        </div>
        <div class="form-element">
            <label for="lastname">Lastname</label>
            <input type="text" id="lastname" name="lastname"
            value="<?php echo $row['lastname'] ?>"/>
        </div>
        <div class="form-element">
            <button class="btn-submit" type="submit" name="submit">Submit</button>
        </div>
    </form>

</div>