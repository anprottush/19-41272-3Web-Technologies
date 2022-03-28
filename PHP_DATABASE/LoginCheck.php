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
    if(empty($username) or empty($password))
    {
       echo "Please fill up the fields properly";
       
    }
    else
    {
        $flag=0;
       require("Connection.php");
       $connection=getconnection();
       $quary="SELECT username,password FORM information";
       $result=ExecuteQuary($connection,$quary);
       if(mysqli_num_rows($result)>0)
       {
           while($row=mysqli_fetch_assoc($result))
           {
               if($row["username"]==$username and $row["password"]==$password)
               {
                $flag=1;
                break;
               }
               else
               {
                   $flag=0;
               }
           }
    
        }  
        if($flag==1)
        {
         header("Location:Index.php");
        }
        else
        {
            echo "Login failed";
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
