<!doctype html>
<html>
<?php
include("connectDatabase.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$_SESSION["parkingSpot"] = $_POST["whichSpot"];
}
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Parking</title>
	<meta name="description" content="finalProject"></meta>
	<meta name="keywords" content="HTML"></meta>
	<meta name="author" content="Jaibu George"></meta>
	<link rel="stylesheet" href="sidebar.css"></link>
</head>
<body>
<ul>
  <li><a href="mainMenu.php">Home</a></li>
  <li><a href="inventory.php">Car inventory</a></li>
  <li><a class="active" href="parking.php">Parking Spots</a></li>
  <li><a href="viewCart.php">View Cart</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div id="mainPageContent">
  <h1>Parking Spots</h1>
  <h3>Click tabs on the left to navigate</h3>
  <p>Spots 1-20 are closest and cost $40 a day. Spots 21-40 cost $30 a day. Spots 41-60 cost $20 a day.</p>
  
 <form action='' method='post'>
  <table border="1" align="center">
	<tr>
		<td>Number</td>
		<td>Availablity</td>
		<td>Choose</td>
	</tr>
<?php

$query = mysqli_query($db, "SELECT * FROM parkingSpots")
   or die (mysqli_error($db));
$x=0;
while ($row = mysqli_fetch_array($query)) {
  $x = $x+1;
  if ($row['spot'] == 0){
	echo
   "<tr>
    <td>{$row['id']}</td>
    <td>Not Available</td>
    <td><input type=\"radio\" name=\"whichSpot\" value=\"{$x}\"></td>
   </tr>\n";  
  }else{
  echo
   "<tr>
    <td>{$row['id']}</td>
    <td>Available</td>
    <td><input type=\"radio\" name=\"whichSpot\" value=\"{$x}\"></td>
   </tr>\n";
  }
}

?> 
<input type="submit" value="Add to Cart">
</form>
</div>