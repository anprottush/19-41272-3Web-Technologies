<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <?php
    session_start();
    $username=$_SESSION['username'];
    $email=$_SESSION['email'];
    $password= $_SESSION['password'];
    $address= $_SESSION['address'];
    $phonenumber= $_SESSION['phonenumber'];
    $age=$_SESSION['age'];
    $date=$_SESSION['date'];
    $gender=$_SESSION['gender'];
    ?>
    <?php
    define("FILENAME", "RegistrationInformation.json");
     $handle = fopen(FILENAME, "r");
     $fr = fread($handle, filesize(FILENAME)+1);
     $arr = json_decode($fr);
     $fc = fclose($handle);
     $handle = fopen(FILENAME, "w");
     if ($arr === NULL)
     {
         $id = 1;
         $data=array("Id" => $id,"UserName"=>"$username","Email"=>"$email","Password"=>"$password","Address"=>"$address","PhoneNumber"=>"$phonenumber","Age"=>"$age","Date"=>"$date","Gender"=>"$gender");
         $data = array($data);
         $data = json_encode($data);
         $fw = fwrite($handle, $data);
         
     }
     else
     {
         $id = $arr[count($arr) - 1]->Id;
         $data=array("Id" => $id+1,"UserName"=>"$username","Email"=>"$email","Password"=>"$password","Address"=>"$address","PhoneNumber"=>"$phonenumber","Age"=>"$age","Date"=>"$date","Gender"=>"$gender");
         $arr[] = $data;
         $data = json_encode($arr);
         $fw = fwrite($handle, $data);
     }
     $fc = fclose($handle);
     if($fw)
     {
         echo "<h2>Data Insert Successful</h2>";
     }
    ?>
    <a href="../ControllerCheck/UserList.php" name="link" id="link" style="text-decoration: none;color:black">User List</a>
</body>
</html>