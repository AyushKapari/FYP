<?php
include 'header.php';
require '../database/dbconnection.php';
require '../includes/login.check.admin.php';
require '../includes/login.admin.php';

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}
?>

<div class="main-content">
    <form class="signup-form" action="post.form.inc.php" method='post' 
    enctype="multipart/form-data" 
    style="flex-direction:column; margin:0 20px;">
        <h1 class="page-title">Add New Post</h1>
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
            <label for="headline">Headline</label>
            <input type="text" id="headline" name="headline" required/>
        </div>
        <div class="form-element">
            <label for="description">Description</label><br/>
            <textarea name="description" id="description" rows="10" cols="100" required></textarea>
           
        </div>

        <div class="form-element">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" required>
        </div>

        <div class="">
            <button type="submit" class="btn-submit" name="submit">Create Post</button>
        </div>

    </form>
    
</div>