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
                
                  $flag=1;
                  break;
              } 
           }
           if($flag==1 )
           {
               
               
                header("Location:../ViewDataShow/DashBoard.html");
             
               
               
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
    ?>
</body>
</html>