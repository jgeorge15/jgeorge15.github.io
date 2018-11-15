(function(){
'use strict';
	function Cell(row, col) {
	
		var selected = this;
		var	$this = null;
		var	alive = false;

		this.giveItLife = function () {
			alive = true;
			$this.addClass('aliveCell');
		};
		this.killed = function () {
			alive = false;
			$this.removeClass('aliveCell');
		};
		this.checkLife = function () {
			return alive;
		};
		this.getRow = function () {
			return row;
		};
		this.getCol = function () {
			return col;
		};
		this.getJqueryElement = function () {
			return $this;
		};
		if (null === $this) {
			$this = $('<div>').addClass('eachCell').data('cell', selected);
		}
		return this;
	}
	
	function myGame(selector, numRows, numCols) { //whole logic for the game
		var $parent = $(selector);
		var	selected = this;
		var	rows = numRows;
		var	cols = numCols; 
		var	cells = []; 
		var	aliveMap = [];
		var	speedOfLife = 150;
		var	intervalId;
		var	running = false;
		var initialize = function () {
			for (var i = 0; i < rows; i++) {
				cells[i] = [];
				var $row = $('<div>').addClass('cellRow');
				for (var j = 0; j < cols; j++) {
					var cell = cells[i][j] = new Cell(i, j);
					var $cell = cell.getJqueryElement();
					$cell.on('click', function (event) {
						var thisCell = $(this).data('cell');	
						thisCell.checkLife() ? thisCell.killed() : thisCell.giveItLife();
						selected.reMap();
					});
					$row.append($cell);
				}
				$parent.append($row);
			}
		};
		this.reMap = function () {
			for (var i = 0; i < rows; i++) {
				for (var j = 0; j < cols; j++) {
					var cell = cells[i][j];
					cell.checkLife() ? cell.giveItLife() : cell.killed();
				}
			}
		};
		this.glider = function () {
			var ranRow3 = Math.floor(Math.random() * rows);
			var ranCol3 = Math.floor(Math.random() * cols);
			var cell50 = cells[ranRow3][ranCol3];
			var cell51 = cells[ranRow3+1][ranCol3+1];
			var cell52 = cells[ranRow3+2][ranCol3+1];
			var cell53 = cells[ranRow3+2][ranCol3];
			var cell54 = cells[ranRow3+2][ranCol3-1];
			cell50.giveItLife();
			cell51.giveItLife();
			cell52.giveItLife();
			cell53.giveItLife();
			cell54.giveItLife();
			selected.reMap();
		};
		this.addStillLife = function () {
			var ranRow = Math.floor(Math.random() * rows);
			var ranCol = Math.floor(Math.random() * cols);
			var cell1 = cells[ranRow][ranCol];
			var cell2 = cells[ranRow][ranCol+1];
			var cell3 = cells[ranRow+1][ranCol];
			var cell4 = cells[ranRow+1][ranCol+1];
			cell1.giveItLife();
			cell2.giveItLife();
			cell3.giveItLife();
			cell4.giveItLife();
			selected.reMap();
		};
		this.addLine = function () {
			var ranRow1 = Math.floor(Math.random() * rows);
			var ranCol1 = Math.floor(Math.random() * cols);
			var cell5 = cells[ranRow1][ranCol1];
			var cell6 = cells[ranRow1+1][ranCol1];
			var cell7 = cells[ranRow1+2][ranCol1];
			cell5.giveItLife();
			cell6.giveItLife();
			cell7.giveItLife();
			selected.reMap();			
		};
		this.addToad = function () {
			var ranRow2 = Math.floor(Math.random() * rows);
			var ranCol2 = Math.floor(Math.random() * cols);
			var cell8 = cells[ranRow2][ranCol2];
			var cell9 = cells[ranRow2][ranCol2+1];
			var cell10 = cells[ranRow2][ranCol2+2];
			var cell11 = cells[ranRow2+1][ranCol2-1];
			var cell12 = cells[ranRow2+1][ranCol2];
			var cell13 = cells[ranRow2+1][ranCol2+1];
			cell8.giveItLife();
			cell9.giveItLife();
			cell10.giveItLife();
			cell11.giveItLife();
			cell12.giveItLife();
			cell13.giveItLife();
			selected.reMap();
		};
		this.findCellsAround = function (cell) {
			var cellsAround = 0,
			row = cell.getRow(),
			col = cell.getCol();
			var rAbove = cells[row - 1];
			var rBelow = cells[row + 1];
			if (rAbove) {
				if (rAbove[col - 1] && rAbove[col - 1].checkLife()) cellsAround++;
				if (rAbove[col] && rAbove[col].checkLife()) cellsAround++;
				if (rAbove[col + 1] && rAbove[col + 1].checkLife()) cellsAround++;
			}
			if (cells[row][col - 1] && cells[row][col - 1].checkLife()) cellsAround++;
			if (cells[row][col + 1] && cells[row][col + 1].checkLife()) cellsAround++;
			if (rBelow) {
				if (rBelow[col - 1] && rBelow[col - 1].checkLife()) cellsAround++;
				if (rBelow[col] && rBelow[col].checkLife()) cellsAround++;
				if (rBelow[col + 1] && rBelow[col + 1].checkLife()) cellsAround++;
			}
			return cellsAround;
		};
		this.reMap = function () {
			for (var i = 0; i < rows; i++) {
				aliveMap[i] = [];
		
				for (var j = 0; j < cols; j++) {
					var cell = cells[i][j];
					aliveMap[i][j] = selected.findCellsAround(cell);
				}
			}
		};
		this.upOneLife = function () {
			for (var i = 0; i < rows; i++) {
				for (var j = 0; j < cols; j++) {
					var cell = cells[i][j];
					var lifeValue = aliveMap[i][j];
					if (cell.checkLife() && (lifeValue < 2 || lifeValue > 3)) {
						cell.killed();
					} else if (lifeValue === 3){
						cell.giveItLife();
					}
				}
			}
			selected.reMap();
		};
		this.next = function () {
			selected.upOneLife();
			selected.reMap();
		};
		this.play = function () {
			this.PlayPause();
		};
		this.PlayPause = function () {
			if (running) {
				clearInterval(intervalId);
				running = !running;
				return;
			}
			intervalId = setInterval(selected.next, speedOfLife);
			running = !running;
		}
		if (cells.length === 0) {
			initialize();
		}
		return this;
	}

	$(function () { //going to run once page loads
		var sizeX = $('#sizeofX');
		var sizeY = $('#sizeofY');
		$('#createButton').on('click', function () {
			document.getElementById('playButton').style.visibility = 'visible';
			document.getElementById('nextButton').style.visibility = 'visible';
			document.getElementById('button23').style.visibility = 'visible';
			document.getElementById('stillLife').style.visibility = 'visible';
			document.getElementById('lineCells').style.visibility = 'visible';
			document.getElementById('addAToad').style.visibility = 'visible';
			document.getElementById('gliderButton').style.visibility = 'visible';
			document.getElementById('resetButton').style.visibility = 'visible';
			delete this.game;
			var creatingMyGame = document.getElementsByClassName('myLifeGame')[0];
			while (creatingMyGame.firstChild) {
				creatingMyGame.removeChild(creatingMyGame.firstChild);
			}
			var game = new myGame('.myLifeGame', sizeY.val(), sizeX.val());
			$('#nextButton').on('click', function () {
				game.next();
			});
			$('#gliderButton').on('click', function () {
				game.glider();
			});
			$('#resetButton').on('click', function () {
				$("#createButton").trigger("click");
			});
			$('#stillLife').on('click', function () {
				game.addStillLife();
			});
			$('#lineCells').on('click', function () {
				game.addLine();
			});
			$('#addAToad').on('click', function () {
				game.addToad();
			});
			$('#button23').on('click', function () {
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
				$("#nextButton").trigger("click");
			});
			$('#playButton').on('click', function () {
				game.play();
			});		
		});
	});
 })();
 