<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Action</title>
</head>
<body>
    <h1>Login Form</h1>
<?php
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
    $username=getdata(@$_POST['username']);
    $password=getdata(@$_POST['password']);
    $confirmpassword=getdata(@$_POST['confirmpassword']);
    if(empty($username) or empty($password) or empty($confirmpassword))
    {
        echo "Fields are required";
    }
    else
    {

        define("FILENAME", "users.txt");
		$handle = fopen(FILENAME, "r");
		$fr = fread($handle, filesize(FILENAME)+1);
		$arr = json_decode($fr);
        $fc = fclose($handle);
         for ($i = 0; $i < count($arr); $i++) {
            if($arr[$i]->UserName==$username and $arr[$i]->Password==$password and $password==$confirmpassword)
            {
                $flag=1;
                break;
            } 
         }
         if($flag==1)
         {
            header("Location:WelcomePage.html");
         }
        else if($password!=$confirmpassword)
         {
             echo "Password not match";
         }
        else
          {
              echo "No data found";
          }
    }
    
}
else
{
    die("Invalid Request");
}
 
?>
</body>
</html>