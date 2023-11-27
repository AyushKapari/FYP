<?php

function allMembers($conn){
    $sql = 'select * from users';
    $stmt=$conn->prepare($sql);
    if(!$stmt){
        header("location:index.php?error=queryError");
        exit();
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

function allAdmins($conn){
    $is_superuser = 1;
    $is_active = 1;
    $sql = 'select * from users where is_superuser=? and is_active=?';
    $stmt=$conn->prepare($sql);
    if(!$stmt){
        header('location:index.php?error=queryError');
        exit();
    }
    $stmt->bind_param("ii", $is_superuser, $is_active);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    return $result;
}

function allUsers($conn){
    $is_superuser = 0;
    $is_active = 1;
    $sql = 'select * from users where is_superuser=? and is_active=?';
    $stmt=$conn->prepare($sql);
    if(!$stmt){
        header('location:index.php?error=queryError');
        exit();
    }
    $stmt->bind_param("ii", $is_superuser, $is_active);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    return $result;
}

function allInactiveAdmins($conn){
    $is_superuser = 1;
    $is_active = 0;
    $sql = 'select * from users where is_superuser=? and is_active=?';
    $stmt=$conn->prepare($sql);
    if(!$stmt){
        header('location:index.php?error=queryError');
        exit();
    }
    $stmt->bind_param("ii", $is_superuser, $is_active);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    return $result;
}

function allInactiveUsers($conn){
    $is_superuser = 0;
    $is_active = 0;
    $sql = 'select * from users where is_superuser=? and is_active=?';
    $stmt=$conn->prepare($sql);
    if(!$stmt){
        header('location:index.php?error=queryError');
        exit();
    }
    $stmt->bind_param("ii", $is_superuser, $is_active);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    return $result;
}

function allPosts($conn){
    $sql = 'select * from post';
    $stmt=$conn->prepare($sql);
    if(!$stmt){
        header("location:index.php?error=queryError");
        exit();
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}


