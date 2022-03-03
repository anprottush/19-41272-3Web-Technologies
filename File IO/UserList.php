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
		define("FILENAME", "users.txt");
		$handle = fopen(FILENAME, "r");
		$fr = fread($handle, filesize(FILENAME)+1);
		$arr = json_decode($fr);
		$fc = fclose($handle);
	?>

	<?php 
		if ($arr === NULL) {
			echo "No record(s) found";
		}
		else {
			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Gender</th>";
			echo "<th>Date of Birth</th>";
			echo "<th>Religion</th>";
			echo "<th>Present Address</th>";
			echo "<th>Permanent Address</th>";
			echo "<th>Phone Number</th>";
			echo "<th>E-mail</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

			for ($i = 0; $i < count($arr); $i++) {
				echo "<tr>";
				echo "<td>" . $arr[$i]->Id . "</td>";
				echo "<td>" . $arr[$i]->FirstName . "</td>";
				echo "<td>" . $arr[$i]->LastName. "</td>";
				echo "<td>" . $arr[$i]->Gender. "</td>";
				echo "<td>" . $arr[$i]->DateofBirth. "</td>";
				echo "<td>" . $arr[$i]->Religion. "</td>";
				echo "<td>" . $arr[$i]->PresentAddress. "</td>";
				echo "<td>" . $arr[$i]->PermanentAddress. "</td>";
				echo "<td>" . $arr[$i]->PhoneNumber. "</td>";
				echo "<td>" . $arr[$i]->Email. "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	?>

	<br><br>

	<a href="registration.html">Create User</a>


</body>
</html>