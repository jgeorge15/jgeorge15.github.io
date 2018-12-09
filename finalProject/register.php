<!doctype html>
<?php
// Start the session
session_start();
?>
<?php
   include("connectDatabase.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_POST['userName']);
      $email = mysqli_real_escape_string($db,$_POST['email']); 
	  $password = mysqli_real_escape_string($db,$_POST['psw']);
      $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
	  $lastName = mysqli_real_escape_string($db,$_POST['lastName']);
      
      $sql = "SELECT UID FROM users WHERE username = '$myusername' OR emailID = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If username or email already exists
		
		if($count == 1) {
			$error = "Username or Email already in use";
		}else {
			$query = "INSERT INTO users(username,password,fNAME,lName,emailID) VALUES('$myusername','$password','$firstName','$lastName','$email')";
			mysqli_query($db, $query);
			$error = "Succesfully Created";
		}
    }
?>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
<form action="" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
	
	<label for="userName"><b>Username</b></label>
    <input type="text" placeholder="Username" name="userName" required>
	
	<label for="firstName"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="firstName" required>
	
	<label for="lastName"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="lastName" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" id="myInput" placeholder="Enter Password" name="psw" required>
	<input type="checkbox" onclick="myFunction()">Show Password

    <hr>

    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
	<div><h2 id='error'><?php echo $error; ?></h2></div>
  </div>
</form>
</body>
<script>
	function myFunction() {
		var x = document.getElementById("myInput");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>
</html>