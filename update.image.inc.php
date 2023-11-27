<?php
require_once('../database/dbconnection.php');

if (isset($_POST["submit"])) {
    $file = $_FILES['image'];
    updateImage($conn, $file);
} else {
    header("location:profile.php?error=someerror");
    exit();
}


function updateImage($conn, $file)
{
    // echo "<pre>";
    // print_r($file) ;
    // echo "</pre>";
    // exit();
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];

    $fileExtension = explode(".", $fileName);
    $actualFileExtension = strtolower(end($fileExtension));
    $allowed_files = array("jpg", "jpeg", "png", 'gif');
   
    if (in_array($actualFileExtension, $allowed_files)) {
        if ($fileSize < 1000000) {
            // file size is in bytes i.e, 1MB=1000000 bytes
            $fileNewName = uniqid('image', true) . "." . $actualFileExtension;
            $fileDestination = '../assets/uploads/' . $fileNewName;
            $success = move_uploaded_file($fileTmpName, $fileDestination);
            if ($success) {

                //getting user id from the session
                session_start();
                $userid=$_SESSION['userid'];

                //get the current file and delete the file
                $query = "SELECT * from users where id=?";
                $stmt1 = $conn->prepare($query);
                $stmt1->bind_param("i", $userid);
                $stmt1->execute();
                $result = $stmt1->get_result();
                $row = $result->fetch_assoc();
                if ($row['profile_image'] !== null) {
                    $file_to_delete = '../assets/uploads/' . $row['profile_image'];
                    unlink($file_to_delete);
                }

                //now run the update query to update the image
                $sql = "UPDATE users set profile_image=? where id=?";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    header("location:update.image.php?error=queryerror");
                    exit();
                }
                $stmt->bind_param("si", $fileNewName, $userid);
                $stmt->execute();
                $stmt->close();
                header("location:profile.php?success=profileupdate");
                exit();
            } else {
                header("location:update.image.php?error=filemoveerror");
                exit();
            }
        } else {
            header("location:update.image.php?error=filetoolarge");
            exit();
        }
    } else {
        header("location:update.image.php?error=invalidfiletype");
        exit();
    }
}
