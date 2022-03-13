<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List</title>
</head>
<body>

	<h1>User List</h1>

	<?php 
	session_start();
		define("FILENAME", "../ModelFile/RegistrationInformation.json");
		$handle = fopen(FILENAME, "r");
		$fr = fread($handle, filesize(FILENAME)+1);
		$arr = json_decode($fr);
		$fc = fclose($handle);

		if ($arr === NULL) {
			echo "No record(s) found";
		}
		else {
			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>User Name</th>";
            echo "<th>E-mail</th>";
			echo "<th>Gender</th>";
			echo "<th>Date</th>";
			echo "<th>Age</th>";
			echo "<th>Address</th>";
			echo "<th>Password</th>";
			echo "<th>Phone Number</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			for ($i = 0; $i < count($arr); $i++) {
				echo "<tr>";
				echo "<td>" . $arr[$i]->Id . "</td>";
				echo "<td>" . $arr[$i]->UserName . "</td>";
                echo "<td>" . $arr[$i]->Email. "</td>";
				echo "<td>" . $arr[$i]->Gender. "</>";
				echo "<td>" . $arr[$i]->Date. "</td>";
				echo "<td>" . $arr[$i]->Age. "</td>";
				echo "<td>" . $arr[$i]->Address. "</td>";
				echo "<td>" . $arr[$i]->Password. "</td>";
				echo "<td>" . $arr[$i]->PhoneNumber. "</td>";
				$_SESSION['id']=$arr[$i]->Id;
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	?>

	<br><br>

	<a href="../ViewDataShow/Registration.php">Create User</a>


</body>
</html>