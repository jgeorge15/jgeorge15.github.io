<!doctype html>
<html>
<?php
   include("connectDatabase.php");
   session_start();
   ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cart</title>
	<meta name="description" content="finalProject"></meta>
	<meta name="keywords" content="HTML"></meta>
	<meta name="author" content="Jaibu George"></meta>
	<link rel="stylesheet" href="sidebar.css"></link>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link href="card-js.min.css" rel="stylesheet" type="text/css" />
	<script src="card-js.min.js"></script>
	<style type="text/css">
    .my-custom-class {
      border: 1px dashed #f00 !important;
    }
  </style>
</head>
<body>
<ul>
  <li><a href="mainMenu.php">Home</a></li>
  <li><a href="inventory.php">Car inventory</a></li>
  <li><a href="parking.php">Parking Spots</a></li>
  <li><a class="active" href="viewCart.php">View Cart</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div id="mainPageContent">
<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST['action'] == 'Checkout') {
		$lastPurchase = "";
		$user = $_SESSION["username"];
		if($_SESSION['luxuryMiles'] > 0){
			mysqli_query($db, "UPDATE cars SET inventory=inventory-1 WHERE carType ='luxury'");
			$miles = $_SESSION['luxuryMiles'];
			$lastPurchase .= "Luxury Car $miles miles. ";
			$_SESSION["luxury"] = 0;
			$_SESSION["luxuryMiles"] = 0;

		}
		if($_SESSION['SUVMiles'] > 0){
			mysqli_query($db, "UPDATE cars SET inventory=inventory-1 WHERE carType ='SUV'");
			$miles = $_SESSION['SUVMiles'];
			$lastPurchase .= "SUV $miles miles. ";
			$_SESSION["SUV"] = 0;
			$_SESSION["SUVMiles"] = 0;
		}
		if($_SESSION['mid-sizeMiles'] > 0){
			mysqli_query($db, "UPDATE cars SET inventory=inventory-1 WHERE carType ='mid-size'");
			$miles = $_SESSION['mid-sizeMiles'];
			$lastPurchase .= "Mid-size Car $miles miles. ";
			$_SESSION["mid-size"] = 0;
			$_SESSION["mid-sizeMiles"] = 0;
		}
		if($_SESSION['compactMiles'] > 0){
			mysqli_query($db, "UPDATE cars SET inventory=inventory-1 WHERE carType ='compact'");
			$miles = $_SESSION['compactMiles'];
			$lastPurchase .= "Compact Car $miles miles. ";
			$_SESSION["compact"] = 0;
			$_SESSION["compactMiles"] = 0;
		}
		if ($_SESSION["parkingSpot"] > 0){
			$theSpot = $_SESSION["parkingSpot"];
			$lastPurchase .= "Parking Spot: $theSpot";
			mysqli_query($db, "UPDATE parkingSpots SET spot=spot-1 WHERE id ='$theSpot'");
			$_SESSION["parkingSpot"] = 0;
		}
		echo "<h3>Payment Succesful</h3>";
	mysqli_query($db, "UPDATE users SET lastPurchase='$lastPurchase' WHERE username ='$user'");
	} else if ($_POST['action'] == 'Delete') {
		if ($_POST["luxuryCar"] == 1){
			$_SESSION["luxury"] = 0;
			$_SESSION["luxuryMiles"] = 0;
		}
		if ($_POST["SUVCar"] == 1){
			$_SESSION["SUV"] = 0;
			$_SESSION["SUVMiles"] = 0;
		}
		if ($_POST["mid-sizeCar"] == 1){
			$_SESSION["mid-size"] = 0;
			$_SESSION["mid-sizeMiles"] = 0;
		}
		if ($_POST["compactCar"] == 1){
			$_SESSION["compact"] = 0;
			$_SESSION["compactMiles"] = 0;
		}
		if ($_POST["parking"] == 1){
			$_SESSION["parkingSpot"] = 0;
	}
	} else {
    //invalid action!
	}
   }
   ?>
  <h1>Cart</h1>
<form action='' method='post'>
  <table border="1" align="center">
	<tr>
		<td>Item</td>
		<td>Number of Miles</td>
		<td>Cost</td>
		<td>Remove</td>
	</tr>
<?php
$finalCost = 0;

if ($_SESSION["compactMiles"] > 0){
	$totalCost = $_SESSION["compactMiles"] * .20;
		echo "<tr>
			<td>Compact Car</td>
			<td>{$_SESSION["compactMiles"]}</td>
			<td>{$totalCost}</td>
			<td><input type=\"checkbox\" name=\"compactCar\" value=1></td>
			</tr>";
		$finalCost = $finalCost + $totalCost;
}
if ($_SESSION["mid-sizeMiles"] > 0){
	$totalCost = $_SESSION["mid-sizeMiles"] * .35;
		echo "<tr>
			<td>Mid-Size Car</td>
			<td>{$_SESSION["mid-sizeMiles"]}</td>
			<td>{$totalCost}</td>
			<td><input type=\"checkbox\" name=\"mid-sizeCar\" value=1></td>
			</tr>";
			$finalCost = $finalCost + $totalCost;
}
if ($_SESSION["SUVMiles"] > 0){
	$totalCost = $_SESSION["SUVMiles"] * .50;
		echo "<tr>
			<td>SUV</td>
			<td>{$_SESSION["SUVMiles"]}</td>
			<td>{$totalCost}</td>
			<td><input type=\"checkbox\" name=\"SUVCar\" value=1></td>
			</tr>";
			$finalCost = $finalCost + $totalCost;
}
if ($_SESSION["luxuryMiles"] > 0){
	$totalCost = $_SESSION["luxuryMiles"] * .99;
		echo "<tr>
			<td>Luxury Car</td>
			<td>{$_SESSION["luxuryMiles"]}</td>
			<td>{$totalCost}</td>
			<td><input type=\"checkbox\" name=\"luxuryCar\" value=1></td>
			</tr>";
			$finalCost = $finalCost + $totalCost;
}
if ($_SESSION["parkingSpot"] > 0){
	if ($_SESSION["parkingSpot"] > 0 && $_SESSION["parkingSpot"] <21) {
		$totalCost = 40;
	} elseif ($_SESSION["parkingSpot"] > 20 && $_SESSION["parkingSpot"] <41) {
		$totalCost = 30;
	} else {
		$totalCost = 20;
	}
		echo "<tr>
			<td>Parking</td>
			<td>Spot: {$_SESSION["parkingSpot"]}</td>
			<td>{$totalCost}</td>
			<td><input type=\"checkbox\" name=\"parking\" value=1></td>
			</tr>";
			$finalCost = $finalCost + $totalCost;
}
echo "<tr>
		<td></td>
		<td></td>
		<td>{$finalCost}</td>
		<td></td>
		<tr>";
?>
<input type="submit" name="action" value="Checkout" />
<input type="submit" name="action" value="Delete" />
</div>
  <div class="card-js" id="my-card" data-capture-name="true">
    <input class="card-number my-custom-class">
    <input class="name" id="the-card-name-element">
    <input class="expiry-month">
    <input class="expiry-year">
    <input class="cvc">
  </div>
  <br/>
  
  </body>
</html>