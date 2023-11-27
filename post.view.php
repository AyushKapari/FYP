<?php
include 'header.php';
include '../database/dbconnection.php';
require '../includes/login.check.admin.php';
require '../includes/login.admin.php';

$sql = 'select * from post';
$stmt=$conn->prepare($sql);
if(!$stmt){
    header("location:index.php?error=queryError");
    exit();
}
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<div class="main-content">
    <h1 style="text-align:center">All Posts</h1>
    <a href="post.form.php" class="btn-table-top">Add New Post</a>
    <?php 
    if(isset($_GET['success'])){
        echo "<div class='success'>";
        echo "<p class='msg'>Post Deleted Successfully</p>";    
        echo "</div>";
    }
    ?>
    <div class="data">
        <table>
            <thead>
                <tr>
                    <th>Headline</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['headline'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><img src="../assets/uploads/<?php echo $row['post_image'];?>" width="300"></td>
                
                            <td>
                                <a href="post.edit.php?postid=<?php echo $row['id'] ?>" class="edit" onClick="javascript:return confirm('Are you sure?')">Edit</a>
                                <a href="post.delete.php?postid=<?php echo $row['id'] ?>" class="delete" onClick="javascript:return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
