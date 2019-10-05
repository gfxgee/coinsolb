<section class="bg-main-color">
	<div class="container pb-5">
		<div class="row">

			<div class="col-12 p-3 m-0 d-block d-sm-none text-left">
				<h2 class="fs-50 text-highlights">$<span><?php echo $current_earnings_left; ?></span></h2>
				<small class="text-white">Current earnings. <a href="<?php echo base_url('withdraw'); ?>" class="link-primary">Withdraw Now</a></small>
			</div>

			<div class="mt-5 col-6 col-lg-3 col-md-5 col-sm-6 text-left pt-0 mb-3">
				<a href="<?php echo base_url('dashboard'); ?>" class="btn text-custom-secondary text-left col-12 bg-yellow-color rounded-10 p-3">
					<h4><i class="fal fa-user-circle"></i> Dashboard</h4>
					<small>Your personal informations</small>
				</a>
			</div>

			<div class="mt-5 col-6 col-lg-2 col-md-3 col-sm-6 text-left p-3 bg-secondary-color text-white rounded-top-10">
				
				<h4 class="text-left"><i class="fas fa-gamepad"></i> Play Now!</h4>
				<small class="mt-2">And grow your earnings!</small>
				
			</div>

			<div class="mt-5 col-12 col-lg-7 col-md-4 p-0 m-0 d-none d-lg-block d-md-block text-right ">
				<h2 class="fs-50 text-highlights">$<span><?php echo $current_earnings_left; ?></span></h2>
				<small class="text-white">Current earnings. <a href="<?php echo base_url('withdraw'); ?>" class="link-primary">Withdraw Now</a></small>
			</div>

		</div>
		
		
		<?php if ($replay_time_left >= 3600 ) { ?>
	
		<div class="row bg-secondary-color text-white" id="game-container">
			<div class="col-lg-8 m-auto p-5 text-center">
				<h2 id="game-type">Game Type</h2>
				<h6 id="game-operators">Addition and Subtraction</h6>
				<div class="row p-3 pt-4">
					<div class="col-12 col-lg-7 col-md-7 p-4 px-5 mb-4 text-center bg-tertiary-color rounded rounded-lg play-area pb-4">
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
					<div class="col-12 col-lg-5 col-md-5 p-2 px-4 text-left">
						<h6 class="text-highlights mb-2"><i class="far fa-clock"></i> Time left</h6>
						<h2><span class="time-left mt-0">0</span> <span class="fs-22">seconds</span></h2>
						<div class="mt-4"></div>
						<h6 class="text-highlights"><i class="fas fa-check"></i> Points</h6>
						<h2><span class="points-earned mt-0">0</span></h2>

						<div class="play-button-container mt-4">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 play-button bg-yellow-color text-white">Start</button>
						</div>
						<div class="replay-button-container mt-4" style="display: none;">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 replay-button bg-yellow-color text-white">Replay</button>
						</div>
						<div class="pause-button-container mt-4" style="display: none;">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 bg-yellow-color text-white" disabled>Started</button>
						</div>
					</div>
				</div>

				<p class="text-white mt-5">You can change game modes <a class="link-primary" href="<?php echo base_url('choose'); ?>">here</a>.</p>
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
					<div class="col-lg-5 p-2 px-4 text-center">
						<h6 class="text-highlights fs-14 mb-2 mt-5"><i class="far fa-clock"></i> Time left until next game.</h6>
						<h2><span class="running-time fs-50">00 : 00</span></h2>
						<p class="time-type">Minutes</p>
					</div>
				</div>

			</div>
		</div>

		<?php } ?>

	</div>
</section>
 

<?php $this->load->view('templates/faq'); ?>
