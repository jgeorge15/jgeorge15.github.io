<html>
<body>

Team 1 score:<?php echo $_POST["team1"]; ?><br>
Team 2 score:<?php echo $_POST["team2"]; ?>
<style>
body {
	background:powderblue;
}
</style>
<?php
	$val = $_POST["team1"];
	$val1 = $_POST["team2"];
	$check = (int)$val;
	$check2 = (int)$val1;
	if ($check>$check2)
		echo "<h1>Team 1 wins</h1>";
	elseif ($check2>$check1)
		echo "<h1>Team 2 wins</h1>";
	else
		echo "<h1>Did you guys even play?</h1>";
	?>
	<br/><br/><br/><br/><br/><br/><br/>
<a href="project2.php">Play again</a>
</body>
</html>

