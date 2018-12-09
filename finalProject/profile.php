<!doctype html>
<?php
   include("connectDatabase.php");
   session_start();
   ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Profile</title>
	<meta name="description" content="finalProject"></meta>
	<meta name="keywords" content="HTML"></meta>
	<meta name="author" content="Jaibu George"></meta>
	<link rel="stylesheet" href="sidebar.css"></link>
</head>
<body>
<ul>
  <li><a href="mainMenu.php">Home</a></li>
  <li><a href="inventory.php">Car inventory</a></li>
  <li><a href="parking.php">Parking Spots</a></li>
  <li><a href="viewCart.php">View Cart</a></li>
  <li><a class="active" href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div id="mainPageContent">
  <h1>Profile</h1>
  <h3>Click tabs on the left to navigate</h3>
  <table border="1" align="center">
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		<td>Last Purchase</td>
	</tr>
<?php
$name = $_SESSION['username'];
$query = mysqli_query($db, "SELECT * FROM users WHERE username='$name'")
   or die (mysqli_error($db));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['fNAME']}</td>
    <td>{$row['lName']}</td>
    <td>{$row['emailID']}</td>
	<td>{$row['username']}</td>
	<td>{$row['lastPurchase']}</td>
   </tr>\n";
}

?>
</div>