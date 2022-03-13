<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>
</head>
<body>
<?php
    include('Header.php');
    ?>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>Feature 1</th>
                <th>Feature 2</th>
                <th>Feature 3</th>
                <th>Feature 4</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="">Doctor Profile</a><br>
                </td>
                <td>
                    <a href="">Doctor Information(search)id,name,address,phonenumber</a><br>
                </td>
                <td>
                    <a href="">Doctor Schedule</a><br>
                </td>
                <td>
                    <a href="">Patient Information</a><br>
                </td>
            </tr>
        </tbody>
       
    </table>
    <h1>It is a Dash Board making </h1>
    <a href="ChangePassword.html" name="link" id="link" style="text-decoration: none;color:black">Change Password</a>
    <h4>Profile View(userlist)</h4>
    <h4>Profile Update(all information update)</h4>
    <?php
    include('footer.php');
    ?>
</body>
</html>