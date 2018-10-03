<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>PHP Functions and Arrays</title>
	<meta name="description" content="Fuctions"></meta>
	<meta name="keywords" content="HTML"></meta>
	<meta name="author" content="Jaibu George"></meta>
	<style>
		.black{
			background-color: black;
			width: 35px;
			height: 35px;
		}
		.red{
			background-color: red;
			width: 35px;
			height: 35px;
		}
		body {
			background-color: powderblue;
		}
		table {
			border-spacing: 1px;
			width: 300px;
		}
		td {
			padding: 1px;
			border: 1px;
		}
		h1 {
			text-align: center;
		}
		p {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>Assignment 3</h1>
	<p> Author: Jaibu George </p>
	<h3>Question 1:</h3>
	<?php
	function isBitten() {
		$random = rand(0,1); 
		if ($random == 1) {
		echo 'Charlie ate my lunch!';
		}else{ 
		echo 'Charlie did not eat my lunch';
		}
	}
	isBitten();
	?>
	<br />
	<br />
	<h3>Question 2:</h3>
	<table>
		<?php
			for($x=1; $x<=8; $x++){
				echo "<tr>";
				for($y=1; $y<=4; $y++){
					if($x % 2 == 0){
						echo '<td class="black"></td>';
						echo '<td class="red"></td>';
					}
					else{
						echo '<td class="red"></td>';
						echo '<td class="black"></td>';
					}
				}
			echo "</tr>";
			}
		?>
	</table>
	<br />
	<h3>Question 3:</h3>
	<?php
		$month = array('January', 'February', 'March', 'April','May', 'June', 'July', 'August','September', 'October', 'November', 'December');
		$sort1 = [];
		$sort2 = [];
		echo 'Printing array using For: ';
		for ($i=0;$i<12;$i++){
			print_r($month[$i]);
			if ($i<11){
			echo ', ';
			}
		}
		echo '<br />';
		echo 'Printing sorted array using For: ';
		function sortFor($itemToSort){
			sort($itemToSort);
			$aLength = count($itemToSort);
			for ($x=0;$x<$aLength;$x++) {
				print_r($itemToSort[$x]);
				if ($x<11){
				echo ', ';
				}
			}
		}
		sortFor($month);
		echo '<br />';
		echo 'Printing array using Foreach: ';
		foreach ($month as &$val) {
			print_r($val);
			echo ', ';
		}
		echo '<br />';
		echo 'Printing sorted array using Foreach: ';
		function sortForeach ($itemToSort1) {
			sort($itemToSort1);
			foreach ($itemToSort1 as &$value) {
				print_r($value);
				echo ', ';
			}
		}
		sortForeach($month);
	?>
	<br />
	<h3>Question 4:</h3>
	<?php
		$eat = array(
			'Chama Gaucha' => "40.50",
			'Aviva by Kameel' => "15.00",
			'Bone\'s Restaurant' => "65.00",
			'Umi Sushi Buckhead' => "40.50",
			'Fandangles' => "30.00",
			'Capital Grille' => "60.50",
			'Canoe' => "35.50",
			'One Flew South' => "21.00",
			'Fox Bros. BBQ' => "15.00",
			'South City Kitchen Midtown' => "29.00"
			);
		echo '<table>';
		echo '<tr>';
		echo '<th>Name</th>';
		echo '<th>Average Cost</th>';
		echo '</tr>';
		foreach ($eat as $z => $z_value){
			echo "<tr>";
			echo '<td>';
			echo $z;
			echo '</td>';
			echo '<td>';
			echo "$".$z_value;
			echo '</td>';
			echo "</tr>";
		}
		echo '</table>';
		echo '<p> Ordered By Price: </p>';
		function sortFood($thisA) {
			asort($thisA);
			echo '<table>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th>Average Cost</th>';
			echo '</tr>';
			foreach ($thisA as $z1 => $z1_value){
				echo "<tr>";
				echo '<td>';
				echo $z1;
				echo '</td>';
				echo '<td>';
				echo "$".$z1_value;
				echo '</td>';
				echo "</tr>";
			}
			echo '</table>';
		}
		sortFood($eat);
		echo '<p> Ordered By Name: </p>';
		function sortFood1($thisA1) {
			ksort($thisA1);
			echo '<table>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th>Average Cost</th>';
			echo '</tr>';
			foreach ($thisA1 as $z1 => $z1_value){
				echo "<tr>";
				echo '<td>';
				echo $z1;
				echo '</td>';
				echo '<td>';
				echo "$".$z1_value;
				echo '</td>';
				echo "</tr>";
			}
			echo '</table>';
		}
		sortFood1($eat);
		?>
	<br />
	<p><a href="../index.html">Go back to my Home Page</a></p>
</body>
</html>