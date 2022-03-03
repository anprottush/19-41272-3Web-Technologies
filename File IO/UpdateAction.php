<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Action</title>
</head>
<body>

	<h1>Update Action</h1>

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
				define("FILENAME", "users.txt");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME)+1);
				$arr = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");

				for ($i = 0; $i < count($arr); $i++) {
					if ($username == $arr[$i]->UserName) {
						$arr[$i]->Password = $password;
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
					echo "<h3>Password Update Successful</h3>";
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