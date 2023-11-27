<?php
include 'header.php';
include '../database/dbconnection.php';
require 'data.php';
require '../includes/login.check.admin.php';
require '../includes/login.admin.php';
$all_members = allMembers($conn);
?>

<div class="main-content">
    <h1 style="text-align:center">All Members</h1>
    <a href="#" class="btn-table-top">Add Member</a>
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
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $all_members->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['firstname'] ?></td>
                            <td><?php echo $row['middlename'] ?></td>
                            <td><?php echo $row['lastname'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td></td>
                            <td><?php echo $row['joined_date'] ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
