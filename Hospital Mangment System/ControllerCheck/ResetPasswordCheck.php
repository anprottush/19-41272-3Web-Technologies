<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Check</title>
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
    $newpassword=getdata(@$_POST['newpassword']);
    $confirmpassword=getdata(@$_POST['confirmpassword']);
    if(empty($newpassword) or empty($confirmpassword))
    {
       echo "Please fill up the fields properly";
       
    }
    else
    {
        header("Location:../ModelFile/Reset.php?newpassword=$newpassword&confirmpassword=$confirmpassword");
    }
    
}

?>

</body>
</html>
