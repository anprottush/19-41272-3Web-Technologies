<?php
    include('Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information</title>
</head>
<body>
    <h1>Doctor Information</h1>
    <fieldset>
        <legend>Doctor Information</legend>
        <form action="../ControllerCheck/DoctorInformationCheck.php" method="POST" novalidate>
        <div class="">
        <label for=""  id="">Search Information:</label><br>
        <input type="text" name="id" id="" placeholder="" required>
      </div><br>

      <div class="searchbutton">
        <input type="submit" name="submit"id="submit" value="Search">
      </div><br>
    </form>
    </fieldset>
</body>
</html>
<?php
    include('footer.php');
    ?>