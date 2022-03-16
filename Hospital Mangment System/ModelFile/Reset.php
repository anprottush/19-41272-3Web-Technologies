<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
</head>
<body>
    <h1>Reset </h1>
    <?php
      if ($_SERVER['REQUEST_METHOD'] === "GET") {
          $validemail=$_GET["validemail"];
          $validphonenumber=$_GET["validphonenumber"];
          $currentpassword=$_GET["currentpassword"];
        $newpassword=$_GET["newpassword"];
        $confirmpassword=$_GET["confirmpassword"];
      }
    ?>
    <?php
    $flag=0;
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
			if ($arr[$i]->Email== $validemail and $arr[$i]->PhoneNumber==$validphonenumber and $currentpassword==$arr[$i]->Password) {
				$arr[$i]->Password = $newpassword;
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

		if ($flag==1)
        {
            echo "<h3>Password Reset Successful</h3>";
		}
        else if($newpassword!=$confirmpassword)
        {
            echo "Please Re-type Password";
        }
		else 
        {
            echo "<h3>User not found</h3>";
			echo "<h3>Invalid User</h3>";
		}
    }
    ?>
</body>
</html>