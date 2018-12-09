<!doctype html>
<html>
<?php
   include("connectDatabase.php");
   session_start();
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION["compactMiles"] = $_SESSION["compactMiles"]+ $_POST["1"];
	$_SESSION["mid-sizeMiles"] = $_SESSION["mid-sizeMiles"]+ $_POST["2"];
	$_SESSION["SUVMiles"] = $_SESSION["SUVMiles"]+ $_POST["3"];
	$_SESSION["luxuryMiles"] = $_SESSION["luxuryMiles"]+ $_POST["4"];
}
   ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Inventory</title>
	<meta name="description" content="finalProject"></meta>
	<meta name="keywords" content="HTML"></meta>
	<meta name="author" content="Jaibu George"></meta>
	<link rel="stylesheet" href="sidebar.css"></link>
</head>
<body>
<ul>
  <li><a href="mainMenu.php">Home</a></li>
  <li><a class="active" href="inventory.php">Car inventory</a></li>
  <li><a href="parking.php">Parking Spots</a></li>
  <li><a href="viewCart.php">View Cart</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div id="mainPageContent">
  <h1>Car Inventory</h1>
<form action='' method='post'>
  <table border="1" align="center">
	<tr>
		<td>Car Type</td>
		<td>Price Per Mile</td>
		<td>Stock</td>
		<td>Number of Miles</td>
	</tr>
<?php

$query = mysqli_query($db, "SELECT * FROM cars")
   or die (mysqli_error($db));
$x=0;
while ($row = mysqli_fetch_array($query)) {
  $x = $x+1;
  if ($row['inventory'] == 0){
	  echo
		"<tr>
			<td>{$row['carType']}</td>
			<td>{$row['pricePerMile']}</td>
			<td>{$row['inventory']}</td>
			<td><input type=\"number\" name=\"{$x}\" min=\"1\" readonly></td>
			<td></td>
		</tr>\n";
  }else{
  echo
   "<tr>
    <td>{$row['carType']}</td>
    <td>{$row['pricePerMile']}</td>
    <td>{$row['inventory']}</td>
	<td><input type=\"number\" name=\"{$x}\" min=\"1\"></td>
   </tr>\n";
  }
}

?>
<input type="submit" value="Add to Cart">
</form>
</div>
</body>
</html>