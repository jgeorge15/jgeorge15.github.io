var guessCount = 10;
var timerVar = setInterval(countTimer, 1000);
var totalSeconds = 0;
var theNumToGuess = Math.floor(Math.random() * 100) + 1;
function startTheTime() {
	totalSeconds = 0;
	document.getElementById('min').style.visibility = 'visible';
	document.getElementById('sec').style.visibility = 'visible';
	document.getElementById('colon').style.visibility = 'visible';
	document.getElementById('guessButton').style.visibility = 'visible';
	document.getElementById('guessSubmit').style.visibility = 'visible';
	document.getElementById('prompt1').style.visibility = 'visible';
	document.getElementById('timeButton').style.visibility = 'hidden';
}
function countTimer() {
	++totalSeconds;
	var minute = Math.floor(totalSeconds/60);
	var seconds = totalSeconds - (minute*60);
	document.getElementById("min").innerHTML = pad(minute);
	document.getElementById("sec").innerHTML = pad(seconds);
}
function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}
function guess() {
	var numEntered = document.getElementById('guessButton').value;
	checkNumber(numEntered);
	document.getElementById('guessButton').value='';
}
function checkNumber(numEntered) {
	if(numEntered <= 0 || numEntered>100) {
		document.getElementById('prompt').innerHTML = 'Invalid guess';
		}
	else if(numEntered > theNumToGuess) {
		document.getElementById('prompt').innerHTML = 'High';
		--guessCount;
		document.getElementById('prompt1').innerHTML = 'You have '+guessCount+ ' guesses left';
	}else if(numEntered < theNumToGuess){
		document.getElementById('prompt').innerHTML = 'Low';
		--guessCount;
		document.getElementById('prompt1').innerHTML = 'You have '+guessCount+ ' guesses left';
	}else if(numEntered == theNumToGuess){
		document.getElementById('prompt').innerHTML = 'That is correct. Play again!';
		document.getElementById('lastGame').innerHTML = 'It took you ' + totalSeconds + ' seconds to win';
		totalSeconds = 0;
		theNumToGuess = Math.floor(Math.random() * 100) + 1;
		guessCount = 10;
		document.getElementById('prompt1').innerHTML = 'You have '+guessCount+ ' guesses left';
	}
	if (guessCount==0){
		document.getElementById('prompt').innerHTML = 'You ran out of guesses. Restarting game.';
		totalSeconds = 0;
		theNumToGuess = Math.floor(Math.random() * 100) + 1;
		guessCount = 10;
		document.getElementById('prompt1').innerHTML = 'You have '+guessCount+ ' guesses left';
	}
}