<?php
    include('../ViewDataShow/Header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password Check</title>
</head>
<body>

	<h1>Change Password Action</h1>

	<?php 
	$flag=0;
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function getdata($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$username = getdata($_POST['username']);
			$password = getdata($_POST['password']);

			if (empty($username) or empty($password)) {
                echo "Fields are required";
			}
			else {
				define("FILENAME", "../ModelFile/RegistrationInformation.json");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME)+1);
				$arr = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");
				if ($arr === NULL) {
					echo "No record(s) found";
				}
				else
				{
					for ($i = 0; $i < count($arr); $i++) {
						if ($username == $arr[$i]->UserName) {
							$arr[$i]->Password = $password;
							$name=$arr[$i]->UserName;
							
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
						setcookie("username", $name, time() + (86400 * 30));//86400sec = 1 day
						echo "<h3>Password Change Successful</h3>";
					}
					else 
					{
						echo "<h3>User not found</h3>";
						echo "<h3>Invalid User</h3>";
					}
				}

				

			}

		}
		else
		{
			die("Invalid request");
		}
	?>


	<a href="ProfileView.php">Prof</a>
	<?php
   include('../ViewDataShow/Footer.php');
   if(!isset($_COOKIE['username'])) {
	echo "Cookie named '" . $name . "' is not set!";
  } else {
	echo "Cookie '" . $name . "' is set!<br>";
	echo "Value is: " . $_COOKIE['username'];
  }
?>
</body>
</html>
