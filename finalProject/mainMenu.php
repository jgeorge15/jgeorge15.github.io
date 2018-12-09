<!doctype html>
<html>
<?php
// Start the session
session_start();
$_SESSION["compact"] = 0;
$_SESSION["mid-size"] = 0;
$_SESSION["SUV"] = 0;
$_SESSION["luxury"] = 0;
$_SESSION["compactMiles"] = 0;
$_SESSION["mid-sizeMiles"] = 0;
$_SESSION["SUVMiles"] = 0;
$_SESSION["luxuryMiles"] = 0;
$_SESSION["parkingSpot"] = 0;
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Main Menu</title>
	<meta name="description" content="finalProject"></meta>
	<meta name="keywords" content="HTML"></meta>
	<meta name="author" content="Jaibu George"></meta>
	<link rel="stylesheet" href="sidebar.css"></link>
</head>
<body>
<ul>
  <li><a class="active" href="mainMenu.php">Home</a></li>
  <li><a href="inventory.php">Car inventory</a></li>
  <li><a href="parking.php">Parking Spots</a></li>
  <li><a href="viewCart.php">View Cart</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div id="mainPageContent">
  <h1>Main Menu</h1>
  <h3>Click tabs on the left to navigate</h3>
  <a href="https://youtu.be/uS6lp12k7_w">YouTube Link</a>
  <a href="../index.html">Back to my homepage</a>
</div>