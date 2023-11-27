<?php
require_once 'database/dbconnection.php'; 
include_once 'navbar.php';
require 'includes/login.check.user.php';
require 'includes/login.user.php';

$sql = 'select * from post';
$stmt=$conn->prepare($sql);
if(!$stmt){
    header('location:index.php?error=queryerror');
    exit();
}
$stmt->execute();
$result= $stmt->get_result();
$stmt->close();
?>
<main>
<div id="showcase">
            <div class="container">
                <div class="showcase-content">
                    <h1><span class="text-primary">Norse Mystic </span> School of Arts</h1>
                    <p class="lead">"You can look at a picture for a week and never think of it again. You can also look at the picture for a second and think of it all your life."</p>
                    <a class="btn" href="about.php">About Our School</a>
                </div>
            </div>
        </div>
<section>
    <div class="main-content">
        <h1 style="text-align: center;">Posts</h1>
        <div class="post-parent">
            <?php while($row=$result->fetch_assoc()){
                ?>
                <div class="post">
                    <div class="post-title">
                        <h3><?php echo $row['headline'] ?></h3>
                    </div>
                    <div class="post-content">
                        <p><?php echo $row['description'] ?></p>
                    </div>
                    <div class="post-image">
                        <img src="assets/uploads/<?php echo $row['post_image'] ?>" />
                    </div>
                    <div class="icons">
                        <i class="fas fa-heart fa-2x"></i>
                        <i class="fas fa-comment fa-2x"></i>
                        <i class="fas fa-share fa-2x"></i>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
</section>
</main>
<section id="features">
    <div class="box bg-light">
      <i class="fas fa-school fa-3x"></i>
      <h3>Peaceful Environment</h3>
    </div>
    <div class="box bg-primary">
        <i class="fas fa-lightbulb fa-3x" aria-hidden="true"></i>
        <h3>Learn Differently</h3>
    </div>
    <div class="box bg-light">
        <i class="fas fa-users fa-3x"></i>
        <h3>Wider Choice</h3>
    </div>
  </section>
<?php
include_once('footer.php');
?>