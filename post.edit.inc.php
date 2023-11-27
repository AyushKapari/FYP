<?php
require_once '../database/dbconnection.php';
if(isset($_POST['submit'])){
    $headline = $_POST['headline'];
    $description = $_POST['description'];
    // $description= str_replace("<", "&lt;", $description);
    // $description= str_replace(">", "&gt;", $description);
    $file = $_FILES['image'];
    $postid= $_POST['postid'];

    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        updatePostWithImage($conn, $headline, $description, $file, $postid);
    }
    else{
        updatePostOnly($conn, $headline, $description, $postid);
    }
    
}

function updatePostOnly($conn, $headline, $description, $postid){
    $sql = 'update post set headline=?, description=? where id=?';
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        header('location:post.edit.php?postid='.$postid.'&&error=queryerror');
        exit();
    }
    $stmt->bind_param('ssi', $headline, $description, $postid);
    $stmt->execute();
    $stmt->close();
    header('location:post.view.php?success=post-update');
    exit();
}

function updatePostWithImage($conn, $headline, $description, $file, $postid){
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];

    $fileExtension = explode(".", $fileName);
    $actualFileExtension = strtolower(end($fileExtension));
    $allowed_files = array("jpg", "jpeg", "png", 'gif');
   
    if (in_array($actualFileExtension, $allowed_files)) {
        if ($fileSize < 1000000) {
            // file size is in bytes i.e, 1MB=1000000 bytes
            $fileNewName = uniqid('post', true) . "." . $actualFileExtension;
            $fileDestination = '../assets/uploads/' . $fileNewName;
            $success = move_uploaded_file($fileTmpName, $fileDestination);
            if ($success) {

                //get the current file and delete the file
                $query = "SELECT * from post where id=?";
                $stmt1 = $conn->prepare($query);
                $stmt1->bind_param("i", $postid);
                $stmt1->execute();
                $result = $stmt1->get_result();
                $row = $result->fetch_assoc();
                if ($row['post_image'] !== null) {
                    $file_to_delete = '../assets/uploads/' . $row['post_image'];
                    unlink($file_to_delete);
                }

                //now run the update query to update the image
                $sql = "UPDATE post set headline=?, description=?, post_image=? where id=?";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    header("location:post.edit.php?postid=".$postid."&&error=queryerror");
                    exit();
                }
                $stmt->bind_param("sssi", $headline, $description, $fileNewName, $postid);
                $stmt->execute();
                $stmt->close();
                header("location:post.edit.php?postid=".$postid."&&success=profileupdate");
                exit();
            } else {
                header("location:post.edit.php?postid=".$postid."&&error=filemoveerror");
                exit();
            }
        } else {
            header("location:post.edit.php?postid=".$postid."&&error=filetoolarge");
            exit();
        }
    } else {
        header("location:post.edit.php?postid=".$postid."&&error=invalidfiletype");
        exit();
    }

}