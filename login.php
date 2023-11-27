<?php
include_once 'navbar.php';
?>
<main>
    <h1 class="page-title">Log In</h1>
        <div class="forms_login">
           

            <div class="signup-form">
                <form action="includes/login.inc.php" method="post" class="myForm">
                    <?php
                    if (isset($_GET["signup"])) {
                        echo "<div class='success'>";
                        echo "<p>User registered successfully</p>";
                        echo "</div>";
                    }
                    ?>
                    <div class="errors">
            <?php
            if(isset($_GET['error'])){
                if($_GET['error']=="emptyInputs"){
                    echo "<p class='msg'>You missed something.</p>";
                }
                if($_GET['error']=="userdoesnotexist"){
                    echo "<p class='msg'>Credential do not match.</p>";
                }
                if($_GET['error']=="incorrectpassword"){
                    echo "<p class='msg'>Password you have entered is incorrect.</p>";
                }
                if($_GET['error']=="queryError"){
                    echo "<p>Query Error</p>";
                }
                if($_GET['error']=="inactiveaccount"){
                    echo "<p>Your account has been deactivated</p>";
                }
            }

            if(isset($_GET['user'])){
                echo "<p class='msg'>User authorization is required.</p>";
            }
            ?>
            <script>
                $('.msg').delay(3000).fadeOut();
            </script>
            
            </div>
                    <div class="form-element">

                        <div class="form-element">
                            <label for="username" class="form-label">User</label><br />
                            <input type="text" id="username" name="username1" />
                        </div>

                        <div class="form-element">
                            <label for="password" class="form-label">Password</label><br />
                            <input type="password" id="password" name="password1" />
                        </div>
                        <div class="">
                            <button type="submit" class="btn-submit" name="submit">Login</button>
                        </div>
                </form>

            </div>
        </div>
    
</main>
<?php
include_once('footer.php');
?>