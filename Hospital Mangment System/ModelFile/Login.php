<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login </h1>
    <?php
    session_start();
  
    
    if ($_SERVER['REQUEST_METHOD'] === "GET")
    {
        $username=$_GET['username'];
        $password=$_GET['password'];
        $confirmpassword=$_GET["confirmpassword"];
    }
    else
    {
        die("Invalid Request");
    }
    
    ?>
    <?php
   
    ?>
</body>
</html>