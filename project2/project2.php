<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Jeopardy!</title>
<script src="project2.js" type="text/javascript">
</script>
<script>
var x = 0;
var addScore = 0;
var questions = ['A type of computer programming (software design) in which programmers define not only the data type of a data structure, but also the types of operations (functions) that can be applied to the data structure.','An ______ is a programming conditional statement that, if proved true, performs a function or displays information.', 'A notation resembling a simplified programming language, used in program design.','The brain of any computer system is?','The term used for describing the judgmental or commonsense part of problem solving?'];
var answers = ['What is object oriented programming','What is an if statement','What is pseudo code','What is the CPU','What are heuristics']
function askQuestion(){
  document.getElementById('answer1').style.visibility = 'visible';
  document.getElementById('team1Score').style.visibility = 'hidden';
  document.getElementById('team2Score').style.visibility = 'hidden';
  document.getElementById('nobody').innerHTML = '';
  document.getElementById('buttonClicked').innerHTML = '';
  document.getElementById('question').innerHTML = questions[x];
}
function showAnswer(){
	document.getElementById('answer1').style.visibility = 'hidden';
  document.getElementById('team1Score').style.visibility = 'visible';
  document.getElementById('team2Score').style.visibility = 'visible';
  document.getElementById('nobody').innerHTML = 'Nobody Got it Right';
  document.getElementById('buttonClicked').innerHTML = answers[x];
  x++;
}
function myFunction(td) {
    var text = document.getElementById(td).textContent;
    addScore = parseInt(text,10);
    document.getElementById(td).innerHTML = "";
}
function team1Scoring() {
	var changeScore = document.getElementById("score1").value;
  var turn2Number = parseInt(changeScore,10);
  var finalScore = turn2Number+addScore;
  var text = finalScore.toString();
  document.Scores.team1.value = text;
}
function team2Scoring() {
	var changeScore = document.getElementById("score2").value;
  var turn2Number = parseInt(changeScore,10);
  var finalScore = turn2Number+addScore;
  var text = finalScore.toString();
  document.Scores.team2.value = text;
}
</script>
<link href="project2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="overlay"><div id="popup"><p id="question">
Popup text... </p><input id="answer1" type="button" value="Click Here For Answer" onclick='showAnswer()'/><p id="buttonClicked">
</p>
<a href="javascript:myBlurFunction(0);"><p id='nobody'>
Nobody got it right</p></a>
<input id="team1Score" type="button" value="Team 1 Correct" onclick='javascript:myBlurFunction(0);team1Scoring();'/><input id="team2Score" type="button" value="Team 2 Correct" onclick='javascript:myBlurFunction(0);team2Scoring();'/>
</div></div>
<div id="main_container">
<h1>Jeopardy!</h1>
<table>
	<tr>
		<th>Comp Sci</th>
		<th>Math</th>
		<th>Sports</th>
		<th>Technology</th>
		<th>Misc.</th>
	</tr>
	<tr>
  <td id="compSci"><a href="javascript:myBlurFunction(1);myFunction('compSci');askQuestion();">100</a></td>
		<td>100</td>
		<td>100</td>
		<td>100</td>
		<td>100</td>
	</tr>
	<tr>
		<td id="compSci1"><a href="javascript:myBlurFunction(1);myFunction('compSci1');askQuestion();">200</a></td>
		<td>200</td>
		<td>200</td>
		<td>200</td>
		<td>200</td>
	</tr>
	<tr>
		<td id="compSci2"><a href="javascript:myBlurFunction(1);myFunction('compSci2');askQuestion();">300</a></td>
		<td>300</td>
		<td>300</td>
		<td>300</td>
		<td>300</td>
	</tr>
	<tr>
		<td id="compSci3"><a href="javascript:myBlurFunction(1);myFunction('compSci3');askQuestion();">400</a></td>
		<td>400</td>
		<td>400</td>
		<td>400</td>
		<td>400</td>
	</tr>
	<tr>
		<td id="compSci4"><a href="javascript:myBlurFunction(1);myFunction('compSci4');askQuestion();">500</a></td>
		<td>500</td>
		<td>500</td>
		<td>500</td>
		<td>500</td>
	</tr>
</table>
</div>
<div>
<form name="Scores" action="winner.php" method="POST">
Team 1: <input id="score1" type="text" name="team1" value="0" readonly/><br />
Team 2: <input id="score2" type="text" name="team2" value="0" readonly/><br />
<input type="submit" />
</form>
</div>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<a href="../index.html">Back to my homepage</a>
</body>
</html>