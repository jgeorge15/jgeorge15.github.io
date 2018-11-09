myBlurFunction = function(state) {
    /* state can be 1 or 0 */
    var containerElement = document.getElementById('main_container');
    var overlayEle = document.getElementById('overlay');
	
    if (state) {
        overlayEle.style.display = 'block';
        containerElement.setAttribute('class', 'blur');
    } else {
        overlayEle.style.display = 'none';
        containerElement.setAttribute('class', null);
    }
}
var count = 0;
var hours = [];
var pay = [];
function itWasCalled() {
	var count = 0;
	var hours = [];
	var pay = [];
	document.getElementById('prompt').innerHTML = 'This helps show your employees payrolls enter the number of hours and click the Enter key type -1 or any negative number to finish';
}
function calcPay(ele) {
    if(event.keyCode == 13) {
        var numEntered = ele.value;
		if(numEntered < 0) {
			if(count == 0){
				document.getElementById('prompt').innerHTML = 'Nobody has been entered yet. Enter hours for 1st employee';
			}else{
				makeTable();
				myBlurFunction(0);
			}
		}
		if(numEntered > 40) {
			if(count==0){
				document.getElementById('prompt').innerHTML = 'Recorded, enter next employee hours or -1 to quit';
			}
			var payOut = 40*15;
			var theRest = 22.5*(numEntered - 40);
			payOut = payOut+theRest;
			hours.push(numEntered);
			pay.push(payOut);
			count = count+1;
			ele.value='';
		}if(numEntered < 41 && numEntered>=0){
			if(count==0){
				document.getElementById('prompt').innerHTML = 'Recorded, enter next employee hours or -1 to quit';
			}
			var payOut = numEntered*15;
			hours.push(numEntered);
			pay.push(payOut);
			count = count+1;
			ele.value='';
		}
	}
}
function makeTable() {
	var table = document.createElement("TABLE");
        table.style.width  = '500px';
		table.style.border = '1px solid black';
		var tableBody = document.createElement("TBODY");
        table.appendChild(tableBody);
        var myTableDiv = document.getElementById("mytable");
		var tr1 = document.createElement("TR");
                tableBody.appendChild(tr1);
                var th = document.createElement("TH");
                tr1.appendChild(th);
                th.appendChild(document.createTextNode("Employee"));
				var th1 = document.createElement("TH");
                tr1.appendChild(th1);
                th1.appendChild(document.createTextNode("Hours")); 
				var th2 = document.createElement("TH");
                tr1.appendChild(th2);
                th2.appendChild(document.createTextNode("Pay")); 

        for (var r = 0; r < count; r++)
            {
                var tr = document.createElement("TR");
                tableBody.appendChild(tr);
                var td = document.createElement("TD");
                td.style.border = '1px solid black';
				tr.appendChild(td);
                td.appendChild(document.createTextNode(r+1));
				var td1 = document.createElement("TD");
                td1.style.border = '1px solid black';
				tr.appendChild(td1);
                td1.appendChild(document.createTextNode(hours[r]));
				var td2 = document.createElement("TD");
                td2.style.border = '1px solid black';
				tr.appendChild(td2);
                td2.appendChild(document.createTextNode("$"+pay[r]));
            }
     myTableDiv.appendChild(table);
}
	