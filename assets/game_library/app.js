// global variables
var spamFlag = 0;
// set default score
var score = 0.0000;
var start = 0;
var gameMode = '';
var points = 0;
var isPause = false;

// Generates the random equations
function generateEquation (){

	var operators;

	if ( gameMode == 'normal' ) operators = ["adds","less than"];
	else operators = ["divided by","multiplied by"];

	var firstNumber = 0, secondNumber = 0, finalAnswer = 0; holder = 0;

	// Generate random operator
	var operator = operators[Math.floor(Math.random()*operators.length)];
	var operator_render;

	// Generate random numbers
	if ( gameMode == 'normal' ) {
		firstNumber = Math.floor(Math.random() * 10);
		secondNumber = Math.floor(Math.random() * 10);
	}
	else {
		firstNumber = Math.floor(Math.random() * 7) + 3;
		secondNumber = Math.floor(Math.random() * 7) + 3;
	}

	// validate number for to avoid negative value
	if ( firstNumber <= secondNumber ) {
		holder = firstNumber;
		firstNumber = secondNumber;
		secondNumber = holder;
	}
	
	// prohibits 0 value on the second number
	if ( secondNumber == 0 ) {
		secondNumber++;
	}


	// Show users the equation
	$('.first-number').text(firstNumber);
	$('.second-number').text(secondNumber);

	// perform calculation to generate randmon answer
	switch ( operator ) 
	{
		case "adds":

			finalAnswer = firstNumber + secondNumber;

			operator_render = '<i class="fas fa-plus"></i>';
			
			break;

		case "less than":

			finalAnswer = firstNumber - secondNumber;

			operator_render = '<i class="fas fa-minus"></i>';
			
			break;
			
		case "divided by":

			finalAnswer = Math.floor(firstNumber / secondNumber);

			operator_render = '<i class="fas fa-divide"></i>';
			
			break;

		case "multiplied by":
			
			finalAnswer = firstNumber * secondNumber;

			operator_render = '<i class="fas fa-times"></i>';
			
			break;

		default: 
		
	} 

	$('.number-operator').html(operator_render);

	return finalAnswer;
}

// validates the users answer for possible points
function validateUserAnswer ( systemGeneratedAnswer , userAnswer ) {

	// returns points validation
	if ( userAnswer == systemGeneratedAnswer ) {

		return true;
	}
	
	else {

		return false;
	}

}

// if time is up game will be disabled
function gameOver () {

	start = 0;

	// save result to user database
	$.post('coin_solve/save_points_details' , { score : score , points_origin : 'App Game' } , function ( result ) {});	


	if ( spamFlag > 0 ) {

		// reset game for spamming
		score = 0.0000;
		$('.play-area').html('<h5 class="mt-3 text-danger"><strong class="fs-22">Game Over!</strong></h5><br><p class="pt-30">You scored '+score+' points for spamming the game. You can play again after an hour.</p>');

	}

	else $('.play-area').html('<h5 class="mt-3"><strong>Game Over!</strong><br>You scored</h5><h4 class="m-0 points fs-70 text-yellow-highlights">'+score+'</h4><h5>points</h5>');

	$('.pause-button-container').fadeOut();
	$('.replay-button-container').fadeIn();
	$('.replay-button').click (function(){
		location.reload();
	});

}

// start game throught aloted time
function gameStart() {

	var time;

	if ( gameMode == 'normal' ) time = 80;
	else time = 60;


	$('.time-left').text(time);

	// start game timer
	var gameStartTimer = setInterval( function (){

		// display user real time timer
		$('.time-left').text(time);


		if ( time > 30 && spamFlag > 30 ) {

			// if is game over
			gameOver();
			clearInterval ( gameStartTimer );
		}

		if ( time == 0 ) {

			// if is game over
			spamFlag = 0;
			gameOver();
			clearInterval ( gameStartTimer );
		}

		if ( !isPause ) time--;


	}, 1000);

}


$( document ).ready(function(){

	'use strict';

	// generates initial random equation
	var systemGeneratedAnswer;
	var userAnswer;

	$('#play-normal').click(function(){

		$('#select-game').fadeOut(function(){

			$('#game-container').fadeIn();
			$('#game-type').text('Normal Mode');
			$('#game-operators').text('Addition and Subtraction');

			gameMode = 'normal';
			points = 1;

			systemGeneratedAnswer = generateEquation();

		});

	});

	$('#play-hard').click(function(){

		$('#select-game').fadeOut(function(){

			$('#game-container').fadeIn();
			$('#game-type').text('Hard Mode');
			$('#game-operators').text('Multiplication and Subtraction');

			gameMode = 'hard';
			points = 2;

			systemGeneratedAnswer = generateEquation();

		});

	});


	$('.play-button').click(function(){

		if ( gameMode != '' ) {

			$('#userAnswer').removeAttr('readonly');

			$('.play-button-container').fadeOut('fast' , function (){

				// reset score every new game
				score = 0.0000;
				spamFlag = 0;
				
				start = 1;
				// initialize game time

				$('.pause-button-container').fadeIn();
				$('#userAnswer').removeAttr('placeholder');

				gameStart( true );

			});
		}
	});

	$('.pause-button').click( function (){

		location.reload();

	});


	// get user input after entering
	$('#userAnswer').keypress( function ( event ) {

		if (event.which == 13 && start == 1 && isPause == false) {

			// span counter
			spamFlag++;

			// secures to get the user answer
			userAnswer = parseInt($(this).val());

			// validations of user answer
			if ( validateUserAnswer ( systemGeneratedAnswer , userAnswer ) ) {
				
				// show user validated answer
				$('.result-message').html('<span class="text-success"> Your answer is correct. </span>');

				setTimeout( function () {
					$('.result-message').html('Press Enter after answering.');
				}, 800);

				score = score + points;

				// generates new random equation
				systemGeneratedAnswer = generateEquation();
			}
			else {

				$('.result-message').html('<span class="text-warning"> Your answer is wrong. </span>');
				
				setTimeout( function () {
					$('.result-message').html('Press Enter after answering.');
				}, 800);

				// generates new random equation
				systemGeneratedAnswer = generateEquation();
			}

			// clears user input
			$(this).val('');

			// display user score real time
			$('.points-earned').text(score);

		}
	
	});

});