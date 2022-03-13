<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<?php
    include('Header.php');
    ?>
<?php
session_start();

define("FILENAME", "../ModelFile/RegistrationInformation.json");
	//	$id = $firstname = $lastname = "";
		if (isset($_SESSION['id'])) {		
			$id = $_SESSION['id'];
			$handle = fopen(FILENAME, "r");
			$fr = fread($handle, filesize(FILENAME)+1);
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			for ($i = 0; $i < count($arr1); $i++) {
				if ($id === $arr1[$i]->Id) {
          $validemail=$arr1[$i]->Email;
          $validphonenumber=$arr1[$i]->PhoneNumber;
          $currentpassword=$arr1[$i]->Password;
				}
			}
    }
		else {
			die("session not found");
		}
?>
    <h2 style="text-align: center;">Reset Password Form</h2>
    <fieldset style="width: 30%; margin-left: 34%;">
        <legend>Reset Information</legend>
<form action="../ControllerCheck/ResetPasswordCheck.php"method="post" novalidate>
    <div class="validemail">
        <label for="validemail"  id="emaillabel">Valid Email:</label><br>
        <input type="email" name="validemail" id="emailtext" placeholder="Enter Valid Email" required>
      </div><br>

      <div class="validphonenumber">
        <label for="validphonenumber" id="numberlabel">Valid Phone Number</label><br>
        <input type="tel" name="validphonenumber" id="numbertext" placeholder="Enter Valid Phone Number" required >
      </div><br>

    <div class="currentpassword">
        <label for="currentpassword"  id="passwordlabel">Current Password</label><br>
        <input type="password" name="currentpassword" id="passwordtext" placeholder="Enter Current Password" required>
    </div><br>

    <div class="newpassword">
        <label for="newpassword"  id="passwordlabel">New Password</label><br>
        <input type="password" name="newpassword" id="passwordtext" placeholder="Enter New Password" required>
      </div><br>

    <div class="confirmpassword">
        <label for="confirmpassword"  id="confirmpasswordlabel">Confirm Password</label><br>
        <input type="password" name="confirmpassword" id="confirmpasswordtext" placeholder="Enter Confirm Password" required>
    </div><br>
    <div class="loginbutton">
        <input type="submit" name="submit"id="submit" value="Reset">
      </div><br>
      <div class="link">
        <a href="Login.php" name="link" id="link" style="text-decoration: none;color:black">Login</a><br>
       
    </div>
</form>

    </fieldset>
    <?php
    include('footer.php');
    ?>
</body>
</html>