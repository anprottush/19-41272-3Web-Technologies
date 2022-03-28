<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2 style="text-align: center;">Registration From</h2>

 <fieldset style="width: 30%; margin-left: 34%">
     <legend>Registration Information</legend>
     <form action="RegistrationCheck.php" method="POST" novalidate>
        <div class="username">
            <label for="username"  id="namelabel">User Name</label><br>
            <input type="text" name="username" id="nametext" placeholder="Enter Username" required>
        </div><br>
    
    <div class="email">
      <label for="email"  id="emaillabel">Email</label><br>
      <input type="email" name="email" id="emailtext" placeholder="Enter Email" required>
    </div><br>
    
    <div class="password">
      <label for="password"  id="passlabel">Password</label><br>
      <input type="password" name="password" id="passwordtext" placeholder="Enter Password" required>
    </div><br>
    
    <div class="address">
      <label for="address" id="addresslebel">Address</label><br>
      <textarea name="address" id="addresstext" cols="25" rows="1" placeholder="Enter Address" required></textarea>
    </div><br>
      
    <div class="phonenumber">
      <label for="phonenumber" id="numberlabel">Phone Number</label><br>
      <input type="tel" name="phonenumber" id="numbertext" placeholder="Enter Phone Number" required >
    </div><br>
     
    <div class="age">
        <label for="age" id="agelabel">Age</label><br>
        <input type="text" name="age" id="agetext" placeholder="Enter Age" required >
      </div><br>

    
    <div class="date">
      <label for="date" id="datelabel">Date</label><br>
      <input type="datetime-local" name="date" id="datetext" placeholder="dd-mm-yyyy" required>
    </div><br>
    
    <div class="gender">
      <label for="gender" id="genderlabel" >Gender:</label>
      <input type="radio" name="gender" id="malegender" value="male">Male
      <input type="radio" name="gender" id="femalegender" value="female">Female
      <input type="radio" name="gender" id="othergender" value="others">Others
    </div><br>
    
    <div class="link">
        <p>Already have an account?
        <a href="Login.php" name="link" id="link" style="text-decoration: none;">Please Login</a><br>
    </p>
    </div>
    
    <div class="button">
      <input type="submit" name="submit" id="submit" value="Sing Up">
    </div>
     </form>
 </fieldset>
</body>
</html>