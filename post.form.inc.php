<?php 
require_once '../database/dbconnection.php';

if(isset($_POST['submit'])){
    $headline = $_POST['headline'];
    $description = $_POST['description'];
    $description= str_replace("<", "&lt;", $description);
    $description= str_replace(">", "&gt;", $description);
    $file = $_FILES['image'];

    addPost($conn, $headline, $description, $file);
}


function addPost($conn, $headline, $description, $file){
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
                //now run the update query to update the image
                $sql = "insert into post (headline, description, post_image) values (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    header("location:post.form.php?error=queryerror");
                    exit();
                }
                $stmt->bind_param("sss", $headline, $description,$fileNewName);
                $stmt->execute();
                $stmt->close();
                header("location:index.php?success=post-create");
                exit();
            } else {
                header("location:post.form.php?error=filemoveerror");
                exit();
            }
        } else {
            header("location:post.form.php?error=filetoolarge");
            exit();
        }
    } else {
        header("location:post.form.php?error=invalidfiletype");
        exit();
    }

}