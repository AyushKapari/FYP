<?php 
include_once 'navbar.php';
?>
<main>

<div class="signup-form">

    <form action="includes/signup.inc.php" method="post" class="myForm">
    <h1 class="page-title">Signup page</h1>
    <div class="errors">
    <?php
    if(isset($_GET['error'])){
        if($_GET['error']=="emptyInputs"){
            echo "<p>Some fields are missing.</p>";
        }
        if($_GET['error']=="invalidUsername"){
            echo "<p>Username is invalid</p>";
        }
        if($_GET['error']=="invalidEmail"){
            echo "<p>Email is invalid</p>";
        }
        if($_GET['error']=="passwordLevel"){
            echo "<p>Password must contain at least 8 characters, special, uppercase, lowercase letter.</p>";
        }
        if($_GET['error']=="passwordMatch"){
            echo "<p>Passwords do not match</p>";
        }
        if($_GET['error']=="userTaken"){
            echo "<p>User already exists</p>";
        }
    }
    ?>
    </div>

        <div class="form-element">
        <label for="firstname" class="form-label">Firstname</label><br/>
        <input type="text" id="firstname" name="firstname"/>
        </div>
        <div class="form-element">
        <label for="middlename" class="form-label">Middlename</label><br/>
        <input type="text" id="middlename" name="middlename"/>
        </div>
        <div class="form-element">
        <label for="lastname" class="form-label">Lastname</label><br/>
        <input type="text" id="lastname" name="lastname"/>
        </div>
        <div class="form-element">
        <label for="email" class="form-label">Email</label><br/>
        <input type="email" id="email" name="email"/>
        </div>
        <div class="form-element">
        <label for="username" class="form-label">Username</label><br/>
        <input type="text" id="username" name="username"/>
        </div>

        <div class="form-element">
        <label for="password" class="form-label">Password</label><br/>
        <input type="password" id="password" name="password"/>
        </div>

        <div class="form-element">
        <label for="c-password" class="form-label">Confirm Password</label><br/>
        <input type="password" id="c-password" name="c-password"/>
        </div>
        <div class="">
            <button type="submit" class="btn-submit" name="submit">Register</button>
        </div>
    </form>

</div>
</main>
<?php
include_once('footer.php');
?>