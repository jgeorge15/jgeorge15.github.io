<?php
   include("connectDatabase.php");
   session_unset(); 
   session_destroy(); 
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT UID FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         header("location: mainMenu.php");
		 $_SESSION["username"] = $myusername;
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>  
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="login.css">
	</head>
   
	<body>
		<div id='firstDiv'>
        <div id='secondDiv'>
            <div id='thirdDiv'><b>Login</b></div>	
            <div id='fourthDiv'>   
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Login "/><br />
               </form>
               <a href='register.php'><p>Register<p></a>
               <div id='errorDiv'><?php echo $error; ?></div>
			</div>	
			</div>	
		</div>
		<a href="https://youtu.be/uS6lp12k7_w">YouTube Link</a>
   </body>
</html>