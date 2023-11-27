<?php
include 'header.php';
require '../database/dbconnection.php';
require '../includes/login.check.admin.php';
require '../includes/login.admin.php';

if(isset($_GET['postid'])){
    $postid=$_GET['postid'];

    $sql = 'select * from post where id=?';
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        header('location:post.edit.php?postid='.$postid.'&&error=queryerror123');
        exit();
    }
    $stmt->bind_param('i', $postid);
    $stmt->execute();
    $result= $stmt->get_result();
    $row=$result->fetch_assoc();
    $stmt->close();
}
?>


<div class="main-content">
    <form class="signup-form" action="post.edit.inc.php" method='post' 
    enctype="multipart/form-data" 
    style="flex-direction:column; margin:0 20px;">
        <h1 class="page-title">Update Post</h1>
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
            <input type="text" id="headline" name="headline" 
            value="<?php echo $row['headline'] ?>" required/>
        </div>
        <div class="form-element">
            <label for="description">Description</label><br/>
            <textarea name="description" id="description" rows="10" cols="100" required            
            ><?php echo $row['description']?></textarea>
        </div>

        <input type="hidden" name='postid' value="<?php echo $row['id'] ?>" /> 

        <div class="form-element">
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>
        <div class="current_image">
            Current Image:<br/>
            <img src="../assets/uploads/<?php echo $row['post_image'] ?>" width="200">
        </div>

        <div class="">
            <button type="submit" class="btn-submit" name="submit">Update Post</button>
        </div>

    </form>
    
</div>