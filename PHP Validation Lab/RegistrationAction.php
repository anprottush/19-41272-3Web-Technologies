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
    $usernameErr=$passwordErr=$confirmpasswordErr=$firstnameErr = $lastnameErr=$genderErr=$dateErr=$religionErr=$presentaddressErr=$permanentaddressErr=$numberErr=$emailErr="";
    $username=$password=$confirmpassword=$firstname =$lastname=$gender=$date=$religion=$presentaddress=$permanentaddress=$number=$email="";

    $isValid = true;
	$isChecked = false;


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
    $confirmpassword=getdata(@$_POST['confirmpassword']);
    $firstname=getdata(@$_POST['firstname']);
    $lastname=getdata(@$_POST['lastname']);
    $religion=getdata(@$_POST['religion']);
    $date=getdata(@$_POST['date']);
    $presentaddress=getdata(@$_POST['presentaddress']);
    $email=getdata(@$_POST['email']);
    $gender=getdata(@$_POST['gender']);

    $isChecked = true; 
		if (empty($username)) {
			$isValid = false;
			$usernameErr = "User Name is required";		
		}
		if(empty($password))
		{
			$isValid = false;
			$passwordErr = "Password is required";
		}
       

			if (empty($confirmpassword)) {
				$isValid = false;
				$confirmpasswordErr = "Password is required";
				
			}
          
            if(empty($firstname))
            {
                $isValid=false;
                $firstnameErr="First Name is required";
            }
           
            if(empty($lastname))
            {
                $isValid=false;
                $lastnameErr="Last Name is required";
            }
           
            if(empty($gender))
            {
                $isValid=false;
                $genderErr = "Gender is required";
            } 
    
			if(empty($date)){
				$isValid = false;
				$dateErr = "Date is required";
			}
           
            if(empty($religion))
            {
                $isValid = false;
				$religionErr = "Religion is required";
            }
           
            if(empty($presentaddress))
            {
                $isValid=false;
                $presentaddressErr="Present Address is required";
            }
          
			if(empty($email)){
				$isValid = false;
				$emailErr = "Email is required";
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$isValid = false;
				$emailErr = "Please check your email again";
			  }
            
        
    
}
?>
<fieldset>
	<legend>Information</legend>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" novalidate>
			<label for="username">User Name: </label>
			<input type="text" name="username" id="username"  maxlength="5" value="<?php echo $username;?>">
            <span> <?php echo $usernameErr;?></span>
			<br><br>
			
			<label for="password">Password: </label>
			<input type="password" name="password" id="password" value="<?php echo $password;?>">
            <span> <?php echo $passwordErr;?></span>
			<br><br>
		
			<label for="confirmpassword">Confirm Password:</label>
			<input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword;?>">
            <span> <?php echo $confirmpasswordErr;?></span>
			<br><br>
			
            <label for="firstname">First Name:</label>
			<input type="text" name="firstname" id="firstname" value="<?php echo $firstname;?>">
            <span> <?php echo $firstnameErr;?></span>
            <br><br>
			
            <label for="lastname">Last Name:</label>
			<input type="text" name="lastname" id="lastname"value="<?php echo $lastname;?>">
            <span> <?php echo $lastnameErr;?></span>

            <br><br>
			<label for="gender">Gender:</label>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Others 
            <span> <?php echo $genderErr;?></span>
            <br><br>
			
            <label for="date">Date of Birth:</label>
			<input type="date" name="date" id="date"value="<?php echo $date;?>">
            <span> <?php echo $dateErr;?></span>

            <br><br>

            <label for="religion" >Religion:</label>
            <select name="religion" id="religion">
            <option name="religion" id="religion" value="islam">Islam</option> 
            <option name="religion" id="religion" value="hindu"selected>Hindu</option>
            <option name="religion" id="religion" value="buddhist">Buddhist</option>
            <option name="religion" id="religion" value="christianity">Christianity</option>
            <span> <?php echo $religionErr;?></span>
            </select>
            
            <br><br>

            <label for="presentaddress">Present Address:</label><br><br>
            <textarea name="presentaddress" id="presentaddress" cols="40" rows="3"value="<?php echo $presentaddress;?>"></textarea>
            <span> <?php echo $presentaddressErr;?></span>

            <br><br>

            <label for="permanentaddress">Permanent Address:</label><br><br>
            <textarea name="permanentaddress" id="permanentaddress" cols="40" rows="3"value="<?php echo $permanentaddress;?>"></textarea>
            <br><br>
           
            <label for="phonenumber">Phone Number:</label>
			<input type="number" name="phonenumber" id="phonenumber" value="<?php echo $number;?>">

            <br><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="<?php echo $email;?>">
            <span> <?php echo $emailErr;?></span>

            <br><br>

            <label for="link">Personal Website:</label>
            <a href="https://github.com/anprottush"target="_blank" name="link" id="link">Link</a>
            
            <br><br>

			<input type="submit" name="submit" value="Submit">
		</form>
</fieldset>
<?php 
		if ($isChecked and $isValid) {
			    echo "User Name: " . $username;
				echo "<br><br>";
				echo "Password: " . $password;
				echo "<br><br>";
				echo "Confirm Password: " . $confirmpassword;
                echo "<br><br>";
                echo "First Name: " . $firstname;
                echo "<br><br>";
                echo "Last Name: ".$lastname;
                echo "<br><br>";
                echo "Gender: ".$gender;
                echo "<br><br>";
                echo "Date Of Birth: ".$date;
                echo "<br><br>";
                echo "Religion: ".$religion;
                echo "<br><br>";
                echo "Present Address: ".$presentaddress;
                echo "<br><br>";
                echo "Parmanent Address: ".$permanentaddress;
                echo "<br><br>";
                echo "Phone Number: ".$number;
                echo "<br><br>";
                echo "E-mail: ".$email;
            

		}
	?>
</body>
</html>






















