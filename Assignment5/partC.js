var clicks = 0;
var firstchoice;
var secondchoice;
var match = 0;
var backcard = "dog.jpg"; 
var faces = []; 
faces[0] = 'husky.jpg';
faces[1] = 'husky.jpg';
faces[2] = 'guideDog.jpg';
faces[3] = 'guideDog.jpg';
faces[4] = 'whiteDog.jpg';
faces[5] = 'whiteDog.jpg';
faces[6] = 'multiDog.jpg';
faces[7] = 'multiDog.jpg';
faces[8] = 'germanShep.jpg';
faces[9] = 'germanShep.jpg';
faces[10] = 'youngDog.jpg';
faces[11] = 'youngDog.jpg';
faces[12] = 'cute.jpg';
faces[13] = 'cute.jpg';
faces[14] = 'cute1.jpg';
faces[15] = 'cute1.jpg';
faces.sort(function() { return 0.5 - Math.random() });

function choose(card) {
        if (clicks == 2) {
            return;
        }
        if (clicks == 0) {
            firstchoice = card;
            document.images[card].src = faces[card];
            clicks = 1;
        } else {
            clicks = 2;
            secondchoice = card;
            document.images[card].src = faces[card];
            timer = setInterval("check()", 1000);
        }
}
function check() {
    clearInterval(timer); //stop timer
    if (faces[secondchoice] == faces[firstchoice]) {
        match++;
        document.getElementById('matches').innerHTML = match;
		clicks=0;
    } else {
        document.images[firstchoice].src = backcard;
        document.images[secondchoice].src = backcard;
        clicks = 0;
        return;
    }
}

