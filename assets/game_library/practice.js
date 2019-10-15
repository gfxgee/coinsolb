// global variables
var spamFlag = 0;
// set default score
var score = 0.0000;
var wrong_score = 0.0000;
var start = 0;
var gameMode = '';
var points = 0;
var isPause = false;

// Generates the random equations
function generateEquation (){

	var operators = ["divided by","multiplied by","adds","less than"];

	var firstNumber = 0, secondNumber = 0, finalAnswer = 0; holder = 0;

	// Generate random operator
	var operator = operators[Math.floor(Math.random()*operators.length)];
	var operator_render;

	firstNumber = Math.floor(Math.random() * 10);
	secondNumber = Math.floor(Math.random() * 10);


	if ( firstNumber == 0 && ( operator == "divided by" || operator == "multiplied by" ) ){
		firstNumber =+ 3;
	}
	if ( secondNumber == 0 && ( operator == "divided by" || operator == "multiplied by" ) ){
		secondNumber =+ 3;
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

	if ( spamFlag > 0 ) {

		// reset game for spamming
		score = 0.0000;
		$('.play-area').html('<h5 class="mt-3 text-danger"><strong class="fs-22">Game Over!</strong></h5><br><p class="pt-30">You scored '+score+' points for spamming the game. You can play again after an hour.</p>');

	}

	else $('.play-area').html('<h5 class="mt-3"><strong>Game Over!</strong><br>You scored</h5><h4 class="m-0 points fs-70 text-yellow-highlights">'+score+'</h4><h5>points</h5>');

	$('.pause-button-container').fadeOut();
	$('.replay-button-container').fadeIn();

}

// start game throught aloted time
function gameStart() {

	var penalty = 15, offset = 0;

	// start game timer
	var gameStartTimer = setInterval( function (){


		if ( offset < offset + 5 && spamFlag > 15 ) {

			$('#userAnswer').attr({ readonly : 'true' , placeholder : 'You have '+penalty+' second penalty.'});
			$('.result-message').html('<span class="text-danger">You have been spamming.</span>');

			// if is game over
			if ( penalty > 0 ) {
				isPause = true;
				penalty--;
			}

			else {
				penalty = 15;
				isPause = false;
				spamFlag = 0;
				offset = 0;
			}
		}

		else if ( offset > 5 ) {

			spamFlag = 0;
			offset = 0;
		}

		else {
			$('#userAnswer').removeAttr('readonly');
			$('#userAnswer').removeAttr('placeholder');
			$('.result-message').html('Press Enter after answering.');
		}

		offset++;

	}, 1000);

}


$( document ).ready(function(){

	'use strict';

	// generates initial random equation
	var systemGeneratedAnswer;
	var userAnswer;


	$('.play-button').click(function(){


		systemGeneratedAnswer = generateEquation();

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

	});

	$('.replay-button').click( function (){

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

				score++;

				// generates new random equation
				systemGeneratedAnswer = generateEquation();
			}
			else {

				$('.result-message').html('<span class="text-warning"> Your answer is wrong. </span>');
				
				setTimeout( function () {
					$('.result-message').html('Press Enter after answering.');
				}, 800);

				wrong_score++;

				// generates new random equation
				systemGeneratedAnswer = generateEquation();
			}

			// clears user input
			$(this).val('');

			// display user score real time
			$('.points-correct').text(score);

			$('.points-wrong').text(wrong_score);

		}
	
	});

});