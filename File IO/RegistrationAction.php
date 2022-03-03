<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Action</title>
</head>
<body>
    <h1>Registration Form</h1>

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
    $password=getdata(@$_POST['password']);
    $permanentaddress =getdata(@$_POST['permanentaddress']);
    $number=getdata(@$_POST['phonenumber']);
    $firstname=getdata(@$_POST['firstname']);
    $lastname=getdata(@$_POST['lastname']);
    $religion=getdata(@$_POST['religion']);
    $date=getdata(@$_POST['date']);
    $presentaddress=getdata(@$_POST['presentaddress']);
    $email=getdata(@$_POST['email']);
    $gender=getdata(@$_POST['gender']);

            if(empty($firstname) or empty($lastname) or empty($gender) or empty($date) or empty($username) or empty($password) or empty($religion) or empty($presentaddress) or empty($email))
            {
                echo "Fields are required";
            }
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				echo "Please check your email again";
			  }
              else
              {
                define("FILENAME", "users.txt");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME)+1);
				$arr = json_decode($fr);
				$fc = fclose($handle);
                $handle = fopen(FILENAME, "w");
                if ($arr === NULL)
                {
                    $id = 1;
					$data=array("Id" => $id,"FirstName"=>"$firstname","LastName"=>"$lastname","Gender"=>"$gender","DateofBirth"=>"$date","UserName"=>"$username","Password"=>"$password","Religion"=>"$religion","PresentAddress"=>"$presentaddress","PermanentAddress"=>"$permanentaddress","PhoneNumber"=>"$number","Email"=>"$email");
					$data = array($data);
					$data = json_encode($data);
					$fw = fwrite($handle, $data);
                   
                }
                else
                {
                    $id = $arr[count($arr) - 1]->Id;
					$data=array("Id" => $id+1,"FirstName"=>"$firstname","LastName"=>"$lastname","Gender"=>"$gender","DateofBirth"=>"$date","UserName"=>"$username","Password"=>"$password","Religion"=>"$religion","PresentAddress"=>"$presentaddress","PermanentAddress"=>"$permanentaddress","PhoneNumber"=>"$number","Email"=>"$email");
					$arr[] = $data;
					$data = json_encode($arr);
					$fw = fwrite($handle, $data);
                }
                $fc = fclose($handle);
               if($fw)
               {
                   echo "<h2>Data Insertion Successful</h2>";
               }
            }
            
              
}
?>
	<a href="Registration.html">Create User</a>	
</body>
</html>






















