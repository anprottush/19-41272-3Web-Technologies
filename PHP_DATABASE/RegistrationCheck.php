<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Check</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    function getdata($data)
    {
        $data=trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username=getdata(@$_POST['username']);
    $email=getdata(@$_POST['email']);
    $password=getdata(@$_POST['password']);
    $address=getdata(@$_POST['address']);
    $phonenumber=getdata(@$_POST['phonenumber']);
    $age=getdata(@$_POST['age']);
    $date=getdata(@$_POST['date']);
    $gender=getdata(@$_POST['gender']);
    if(empty($username) or empty($email) or empty($password) or empty($address) or empty($phonenumber) or empty($age) or empty($date) or empty($gender))
    {
       echo "Please fill up the fields properly";
       
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
        echo "Please check your email again";
      }
    else
    {
       require("Connection.php");
       $connection=getconnection();
       $quary="INSERT INTO information(username,email,password,address,phonenumber,age,date,gender) VALUES('$username','$email','$password','$address','$phonenumber','$age','$date','$gender')";
       $result=ExecuteQuary($connection,$quary);
       if($result)
       {
            echo "<h2>Data Insert Successful</h2>";
        }
        else
        {
            echo "<h2>Data Insert Unsuccessful</h2>";
        }
        CloseConnection($connection);
    }
    
    
}
else
{
    die("Invalid Request");
}
?>
<br>
<a href="Registration.php" name="link" id="link" style="text-decoration: none;color:black">Create User</a><br>
<a href="ProfileView.php" name="link" id="link" style="text-decoration: none;color:black">User List</a>
</body>
</html>
