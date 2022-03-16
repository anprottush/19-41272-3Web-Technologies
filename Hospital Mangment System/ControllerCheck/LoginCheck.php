<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Check</title>
</head>
<body>
    <h1>Login Check</h1>
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
    $username=getdata($_POST['username']);
    $password=getdata($_POST['password']);
    $confirmpassword=getdata($_POST['confirmpassword']);
    if(empty($username) or empty($password) or empty($confirmpassword))
    {
       echo "Please fill up the fields properly";
       
    }
    else
    {
        $flag=0;
        define("FILENAME", "../ModelFile/RegistrationInformation.json");
        $handle = fopen(FILENAME, "r");
        $fr = fread($handle, filesize(FILENAME)+1);
        $arr = json_decode($fr);
        $fc = fclose($handle);
        if ($arr === NULL) {
            echo "No record(s) found";
        }
        else
        {
            for ($i = 0; $i < count($arr); $i++) {
                if($arr[$i]->UserName==$username and $arr[$i]->Password==$password and $password==$confirmpassword)
                {
                    $name=$arr[$i]->UserName;
                    $flag=1;
                    break;
                } 
             }
             if($flag==1)
             {
                 $_SESSION['username']=$name;
                header("Location:../ViewDataShow/DashBoard.php");
                 
             }
  
            else if($password!=$confirmpassword)
             {
                 echo "Password not match";
             }
            else
              {
                  $_SESSION['errormsg']="Log in failed";

                  header("Location:../ViewDataShow/Login.php");
              }
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
