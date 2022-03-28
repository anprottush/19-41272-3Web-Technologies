<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>
    <?php
    function getconnection()
    {
        try
        {
            $servername="localhost";
            $username="root";
            $password="";
            $databasename="information";
            $connection=mysqli_connect($servername,$username,$password,$databasename);
            if(!$connection)
            {
                die("Connection failed".mysqli_connection_error());
            }
            else
            {
                
                return $connection;
            }
        }
        catch(Exception $e)
        {
            echo $e->getmassege;
        }
       
    }
    function ExecuteQuary($connection,$quary)
    {
        $result=mysqli_query($connection,$quary);
        return $result;
    }
    function CloseConnection($connection)
    {
        mysqli_close($connection);
    }
   
    ?>
</body>
</html>