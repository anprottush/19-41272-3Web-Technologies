
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor's Information</title>
</head>
<body>

	<h1>Doctor's Information</h1>

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
		$id=getdata($_POST['id']);
		
		if(empty($id))
		{
		   echo "Field required";
		   
		}
		else
		{
			$flag=0;
			define("FILENAME", "../ModelFile/RegistrationInformation.json");
		$handle = fopen(FILENAME, "r");
		$fr = fread($handle, filesize(FILENAME)+1);
		$arr = json_decode($fr);
		$fc = fclose($handle);

		if ($arr === NULL) {
			echo "No Doctor's Information";
		}
			else
			{
				for ($i = 0; $i < count($arr); $i++) {
					if($arr[$i]->Id==$id)
					{
						$name=$arr[$i]->UserName;
						$email=$arr[$i]->Email;
						$gender=$arr[$i]->Gender;
						$date=$arr[$i]->Date;
						$age=$arr[$i]->Age;
						$address=$arr[$i]->Address;
						$phonenumber=$arr[$i]->PhoneNumber;
						$flag=1;
						break;
					} 
					else
					{
						$flag=0;
					}
				 }
				 if($flag==1)
				 {
					 
					echo "<table border='1'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th>Name</th>";
					echo "<th>E-mail</th>";
					echo "<th>Gender</th>";
					echo "<th>Joining Date and Time</th>";
					echo "<th>Age</th>";
					echo "<th>Address</th>";
					echo "<th>Phone Number</th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
			
						echo "<tr>";
						echo "<td>" .$name . "</td>";
						echo "<td>" . $email. "</td>";
						echo "<td>" . $gender. "</>";
						echo "<td>" . $date. "</td>";
						echo "<td>" . $age. "</td>";
						echo "<td>" . $address. "</td>";
						echo "<td>" . $phonenumber. "</td>";
						echo "</tr>";
					
					echo "</tbody>";
					echo "</table>";
					 
				 }
				else
				  {
					    echo "<h3>Doctor's id not found</h3>";
				  }
			}
		}
		
	}
	else
	{
		die("Invalid Request");
	}
	?>

	<br><br>

	<a href="../ViewDataShow/DashBoard.php">Go back</a>


</body>
</html>

