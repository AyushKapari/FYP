<?php
include 'header.php';
include '../database/dbconnection.php';
require 'data.php';
require '../includes/login.check.admin.php';
require '../includes/login.admin.php';
$all_users = allInactiveUsers($conn)
?>

<div class="main-content">
    <h1 style="text-align:center">All Inactive Users</h1>
    <div class="data">
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Joined Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $all_users->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['firstname'] ?></td>
                            <td><?php echo $row['middlename'] ?></td>
                            <td><?php echo $row['lastname'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td></td>
                            <td><?php echo $row['joined_date'] ?></td>
                            <td>
                                <a href="promote.php?userid=<?php echo $row['id'] ?>" class="edit" onClick="javascript:return confirm('Are you sure?')">Promote</a>
                                <a href="activate.php?userid=<?php echo $row['id'] ?>" class="deactivate" onClick="javascript:return confirm('Are you sure?')">Activate</a>
                                <a href="delete.php?userid=<?php echo $row['id'] ?>" class="delete" onClick="javascript:return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
