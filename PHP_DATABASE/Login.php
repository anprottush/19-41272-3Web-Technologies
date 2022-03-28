<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h3>Login Information</h3>
    <fieldset style="width: 30%; margin-left: 34%;">
        <legend>Login Information</legend>
<form action="LoginCheck.php"method="post" novalidate>
    <div class="name">
        <label for="username"  id="namelabel">User Name</label><br>
        <input type="text" name="username"id="nametext" placeholder="Enter Username" required>
    </div><br>
    <div class="password">
        <label for="password"  id="passwordlabel">Password</label><br>
        <input type="password" name="password" id="passwordtext" placeholder="Enter Password" required>
    </div><br>
    <div class="loginbutton">
        <input type="submit" name="submit"id="submit" value="Log In">
      </div><br>
      <div class="link">
        <a href="Registration.php" name="link" id="link" style="text-decoration: none;color:black">Create an Account</a><br>
        <a href="ResetPassword.php" name="link" id="link" style="text-decoration: none;color:black">Reset Password</a>
    </div>
</form>

    </fieldset>
    <?php
   
    // if(isset($_SESSION['errormsg']))
    // {
    //     echo "<p>". $_SESSION['errormsg'] . "</p>";
    // }
    ?>
</body>
</html>