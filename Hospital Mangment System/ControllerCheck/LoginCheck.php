<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Check</title>
</head>
<body>
<?php
session_start();
$flag=0;
if ($_SERVER['REQUEST_METHOD'] === "POST")

{
    function getdata($data)
    {
        $data=trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username=getdata($_POST['username']);
    $password=getdata($_POST['password']);
    $confirmpassword=getdata($_POST['confirmpassword']);
    if(empty($username) or empty($password) or empty($confirmpassword))
    {
       echo "Please fill up the fields properly";
       
    }
    else
    {
         header("Location:../ModelFile/Login.php?username=$username&password=$password&confirmpassword=$confirmpassword");
    }
    
}
else
{
    die("Invalid Request");
}

?>
</body>
</html>
