<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Profile Check</title>
</head>
<body>
<?php
    include('../ViewDataShow/Header.php');
?>

	<h1>Profile Delete Action</h1>


	<?php 
	$flag=0;
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function getdata($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$id = getdata($_POST['id']);

			if (empty($id)) {
                echo "Fields are required";
			}
			else {




				define("FILENAME", "../ModelFile/RegistrationInformation.json");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME)+1);
				$arr = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");
                $arr2 = array();
                if ($arr === NULL) {
					echo "No record(s) found";
				}
                else
                {
                    for ($i = 0; $i < count($arr); $i++) {
                        if ($id != $arr[$i]->Id) {
                            array_push($arr2, $arr[$i]);
                            $flag=1;
                        }
                        // else
                        // {
                        //     $flag=0;
                        //    // break;
                        // }
                       
                    }
                    
				$data = json_encode($arr2);
				$fw = fwrite($handle, $data);
		
				$fc = fclose($handle);

				if ($flag=1) {
                    echo "<h3>Delete Successful</h3>";
                   
					
				}
				//  else 
				//  {
                //     echo "<h3>User not found</h3>";
                // 	echo "<h3>Invalid User</h3>";
				//  }
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
?>
</body>
</html>
<?php
//  foreach($arr as $key=>$value)
//  {
//      if ($id == $value->Id)
//      {
//          $arr2[]=$key;
//          $flag=1;
//          break;
//      }
//      else
//      {
//          $flag=0;
//      }

//  }
//  foreach($arr2 as $i)
//  {
//      unset($arr[$i]);
//  }
//  $arr3=array_values($arr);
?>

