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
            $permanentaddress =getdata(@$_POST['permanentaddress']);
            $number=getdata(@$_POST['phonenumber']);
            $firstname=getdata(@$_POST['firstname']);
            $lastname=getdata(@$_POST['lastname']);
            $religion=getdata(@$_POST['religion']);
            $date=getdata(@$_POST['date']);
            $presentaddress=getdata(@$_POST['presentaddress']);
            $email=getdata(@$_POST['email']);
            $gender=getdata(@$_POST['gender']);

            if(empty($firstname) or empty($lastname) or empty($gender) or empty($date) or empty($username) or empty($id) or empty($religion) or empty($presentaddress) or empty($email))
            {
                echo "Fields are required";
            }
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				echo "Please check your email again";
			  }
			else {
				define("FILENAME", "users.txt");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME)+1);
				$arr = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");
				for ($i = 0; $i < count($arr); $i++) {
					if ($id == $arr[$i]->Id) {
                        $arr[$i]->UserName=$username;
                        $arr[$i]->FirstName=$firstname;
                        $arr[$i]->LastName=$lastname;
                        $arr[$i]->Gender=$gender;
                        $arr[$i]->DateofBirth=$date;
                        $arr[$i]->Religion=$religion;
                        $arr[$i]->PresentAddress=$presentaddress;
                        $arr[$i]->PermanentAddress=$permanentaddress;
                        $arr[$i]->PhoneNumber=$number;
                        $arr[$i]->Email=$email;
						$flag=1;
						break;
					}
					else
					{
						$flag=0;
						break;
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
	?>


	<a href="UserList.php">User List</a>

</body>
</html>