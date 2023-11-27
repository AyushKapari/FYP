<?php 
require_once '../database/dbconnection.php';
if(isset($_GET['postid'])){
    $postid = $_GET['postid'];

    $sql = 'select * from post where id=?';
    $stmt=$conn->prepare($sql);
    if(!$stmt){
        header('location:post.view.php?error=queryerror');
        exit();
    }
    $stmt->bind_param('i', $postid);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();
    if($row['post_image']!==null){
        $file_to_delele = '../assets/uploads/'.$row['post_image'];
        unlink($file_to_delele);
    }

    $sql2 = 'delete from post where id=?';
    $stmt2= $conn->prepare($sql2);
    if(!$stmt2){
        header('location:post.view.php?error=queryerror');
        exit();
    }
    $stmt2->bind_param('i', $postid);
    $stmt2->execute();
    $stmt2->close();
    header('location:post.view.php?success=post-delete');
    exit();
}
