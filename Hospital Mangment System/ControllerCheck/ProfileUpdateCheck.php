<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Update Action</title>
</head>
<body>

	<h1>Profile Update Action</h1>

	<?php 
	$flag=0;
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function getdata($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			$id=getdata(@$_POST['id']);
            $username=getdata(@$_POST['username']);
            $address =getdata(@$_POST['address']);
            $number=getdata(@$_POST['phonenumber']);
            $age=getdata(@$_POST['age']);
            $date=getdata(@$_POST['date']);
            $email=getdata(@$_POST['email']);
            $gender=getdata(@$_POST['gender']);

            if(empty($id) or empty($username) or empty($email) or empty($gender) or empty($date) or empty($age) or empty($number) or empty($address))
            {
                echo "Fields are required";
            }
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				echo "Please check your email again";
			  }
			else {
				define("FILENAME", "../ModelFile/RegistrationInformation.json");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME)+1);
				$arr = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");
				for ($i = 0; $i < count($arr); $i++) {
					if ($id == $arr[$i]->Id) {
                        $arr[$i]->UserName=$username;
                        $arr[$i]->Gender=$gender;
                        $arr[$i]->Date=$date;
                        $arr[$i]->Age=$age;
                        $arr[$i]->Address=$address;
                        $arr[$i]->PhoneNumber=$number;
                        $arr[$i]->Email=$email;
						$flag=1;
						break;

					}
					else
					{
						$flag=0;
					}
				}

				$data = json_encode($arr);
				$fw = fwrite($handle, $data);
		
				$fc = fclose($handle);

				if ($flag==1) {
					echo "<h3>Profile Update Successful</h3>";
				}
				else 
				{
					echo "<h3>User not found</h3>";
					echo "<h3>Invalid User</h3>";
				}

			}

		}
		else
		{
			echo "Invalid request<br>";
		}
	?>


	

</body>
</html>