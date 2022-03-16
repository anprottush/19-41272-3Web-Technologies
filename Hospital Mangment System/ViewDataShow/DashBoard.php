<?php
include('Header.php');
session_start();
if(!isset($_SESSION['username']))
{
    header("Location:../ViewDataShow/Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>
</head>
<body>
<fieldset>
<?php
echo "<h2>Welcome,".$_SESSION['username']."</h2>";
echo "<h4>Home Page</h4>";
echo "<h4 style='text-align: right;'><a style='text-decoration: none;'href='Logout.php'>Logout</a></h4>"
?>	
</fieldset>
<h3 style="text-align: left;">
		<a style="text-decoration: none;" href="../ControllerCheck/ProfileView.php">Doctor Profile</a></h3>
<h3 style="text-align: left;">
		<a style="text-decoration: none;" href="DoctorInformation.php">Doctor Information</a></h3>       
 <h3 style="text-align: left;">
		<a style="text-decoration: none;" href="../ViewDataShow/DoctorSchedule.php">Doctor Schedule</a></h3> 

        <h3 style="text-align: left;">
		<a style="text-decoration: none;" href="">Patient Information</a></h3> 

        <h3 style="text-align: left;">
		<a style="text-decoration: none;" href="ProfileDelete.php">Profile Delete</a></h3>

        <h3 style="text-align: left;">
		<a style="text-decoration: none;" href="ProfileUpdate.php">Profile Update</a></h3>
    
        <h3 style="text-align: left;">
		<a style="text-decoration: none;" href="ChangePassword.php">Change Password</a></h3>
    
   
    <h4>Profile View(userlist)</h4>
   
   
        <!-- <a href="">Doctor Profile</a>
        <a href="DoctorInformation.php">Doctor Information(search)id,name,address,phonenumber</a><br>
        <a href="">Doctor Schedule</a><br>
        <a href="">Patient Information</a><br>
        <a href="ProfileDelete.php">Profile Delete</a><br> -->







   <?php
    include('footer.php');
   
    ?>
</body>
</html>