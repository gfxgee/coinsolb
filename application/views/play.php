<section class="bg-main-color">
	<div class="container pt-5 pb-5">
		<div class="row">

			<div class="col-lg-3 text-left pt-0">
				<a href="<?php echo base_url('dashboard'); ?>" class="btn text-custom-secondary bg-yellow-color rounded-10 p-3 pr-80">
					<h4 class="text-left">Dashboard</h4>
					<small class="mt-2">Your personal informations</small>
				</a>
			</div>

			<div class="col-lg-2 text-left p-4 bg-secondary-color text-white rounded-top-10">
				
				<h4 class="text-left">Play Now!</h4>
				<small class="mt-2">And your earnings!</small>
				
			</div>

			<div class="col col-lg-7 p-0 m-0 text-right ">
				<h2 class="fs-50 text-highlights">$<span><?php echo $current_earnings_left; ?></span></h2>
				<small class="text-white">Current earnings. <a href="<?php echo base_url('withdraw'); ?>" class="link-primary">Withdraw Now</a></small>
			</div>

		</div>
		
		<?php if ($replay_time_left >= 3600 ) { ?>

		<div class="row bg-secondary-color" id="select-game">
			<div class="col-lg-10 m-auto p-5 text-center text-white">
				<h2 class="mt-5">Choose the mode you want to play:</h2>
					
				<div class="row">
					<div class="col-lg-6 p-3 text-center">
						<div class="p-5 text-center text-white">
							<p class="fs-70 font-weight-bold text-highlights"><i class="fas fa-plus"></i> <i class="fas fa-minus"></i></p>
							<h3>Normal</h3>
							<button class="mt-4 mb-3 btn btn-lg rounded-100 px-5 banner-button font-weight-bold" id="play-normal">Play Now</button>
							<p class="m-0 mt-4"><i class="fas fa-check text-highlights mr-2"></i>Addition and Subtraction</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>80 seconds playing time</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>Will refresh every 1 hour</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>1 point for every correct answer</p>
						</div>
					</div>


					<div class="col-lg-6 p-3 text-center">
						<div class="p-5 text-center">
							<p class="fs-70 font-weight-bold text-highlights"><i class="fas fa-divide"></i> <i class="fas fa-times"></i></p>
							<h3>Hard</h3>
							<button class="mt-4 mb-3 btn btn-lg rounded-100 px-5 banner-button font-weight-bold" id="play-hard">Play Now</button>
							<p class="m-0 mt-4"><i class="fas fa-check text-highlights mr-2"></i>Multiplication and Division</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>60 seconds playing time</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>Will refresh every 1 hour & 30 minutes</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>2 points for every correct answer</p>
							
							<p class="text-muted mt-5 fs-14 font-italic">Bonus: Will instantly receive extra <strong>$2</strong> after <strong>30,000 points</strong></p>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="row bg-secondary-color text-white" id="game-container" style="display: none;">
			<div class="col-lg-8 m-auto p-5 text-center">
				<h2 id="game-type">Game Type</h2>
				<h6 id="game-operators">Addition and Subtraction</h6>
				<div class="row p-3 pt-4">
					<div class="col-lg-7 p-4 px-5 text-center bg-tertiary-color rounded rounded-lg play-area">
						<div class="row text-center">
							<div class="col-4 col-lg-4 col-sm-4">
								<h2><span class="first-number text-highlights font-weight-bold fs-70">0</span></h2>
							</div>
							<div class="col-4 col-lg-4 col-sm-4 d-flex align-items-center justify-content-center">
								<h2><span class="number-operator"><i class="fas fa-plus"></i></span></h2>
							</div>
							<div class="col-4 col-lg-4 col-sm-4">
								<h2><span class="second-number text-highlights font-weight-bold fs-70">0</span></h2>
							</div>
						</div>
						<input id="userAnswer" type="text" name="user-answer" class="mt-3 mb-3 bg-main-color text-yellow-highlights" readonly autocomplete="off" placeholder="Press start to begin the game">
						<small class="font-weight-bold text-muted result-message">Press Enter after answering.</small>
					</div>
					<div class="col-lg-4 p-2 px-4 text-left">
						<h6 class="text-highlights mb-2"><i class="far fa-clock"></i> Time left</h6>
						<h2><span class="time-left mt-0">0</span> <span class="fs-22">seconds</span></h2>
						<div class="mt-4"></div>
						<h6 class="text-highlights"><i class="fas fa-check"></i> Time left</h6>
						<h2><span class="points-earned mt-0">0</span></h2>

						<div class="play-button-container mt-4">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 play-button bg-yellow-color text-white">Start</button>
						</div>
						<div class="replay-button-container mt-4" style="display: none;">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 replay-button bg-yellow-color text-white">Replay</button>
						</div>
						<div class="pause-button-container mt-4" style="display: none;">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 pause-button bg-yellow-color text-white">Pause</button>
						</div>
					</div>
				</div>

				<p class="text-white mt-5">You can change game modes <a class="link-primary" href="<?php echo base_url('play'); ?>">here</a>.</p>
			</div>
		</div>

		<?php } else {?>

		<div class="row bg-secondary-color text-white" id="select-game">
			<div class="col-lg-8 m-auto p-5 text-center">
				<h2 id="game-type">Game Over!</h2>
				<div class="row p-3 pt-4">
					<div class="col-lg-7 py-5 px-2 text-center bg-tertiary-color rounded rounded-lg play-area">
						<div class="row text-center mb-5">
							<div class="col col-lg-12 col-sm-12 text-center">
								<h4>Well done mate :)</h4>
								<p>Please wait until the game will be refreshed</p>
							</div>
						</div>
						
						<small class="mt-5text-white result-message">While waiting you can practice <a class="link-primary" href="<?php echo base_url('play'); ?>">here</a>.</small>
					</div>
					<div class="col-lg-4 p-2 px-4 text-left">
						<h6 class="text-highlights fs-14 mb-2"><i class="far fa-clock"></i> Time left until next game.</h6>
						<h4><span class="running-time">00:00</span> seconds</h4>
						
						<div class="pause-button-container mt-4" style="display: none;">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 pause-button bg-yellow-color text-white">Pause</button>
						</div>
					</div>
				</div>

			</div>
		</div>

		<?php } ?>

	</div>
</section>
 

<?php $this->load->view('templates/faq'); ?>
