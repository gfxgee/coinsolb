<section class="page-section h-100" id="dashboard">
	<div class="container pt-5 pb-5">

		<div class="row">

			<div class="col-lg-3 text-left pt-0 pl-0">
				<a href="<?php echo base_url('/dashboard'); ?>" class="col-lg-12 btn rounded-0 text-white text-left bg-custom-gray p-3">
					<h3 class="text-left">Dashboard</h3>
					<small class="mt-2">Your personal informations</small>
				</a>
			</div>

			<div class="col-lg-2 text-left p-4 bg-white">
				<h3 class="text-left">Play Now</h3>
				<small class="mt-2">And grow your earnings!</small>
			</div>


			<div class="col-lg-7 p-0 m-0 text-right ">
				<p class="counter text-custom-orange">$<span><?php echo $current_earnings_left; ?></span></p>
				<small>Current earnings</small>
			</div>

		</div>
		
		<div class="row bg-white" id="select-game">
			<div class="col-lg-8 m-auto p-5 text-center">
				<h2>Choose the mode you want to play.</h2>
					
				<div class="row">
					<div class="col-lg-6 p-3 text-center">
						<div class="bg-custom-play p-5 text-center text-white">
							<h3>Normal Mode</h3>
							<p class="fs-50 font-weight-bold"><i class="fas fa-plus"></i> <i class="fas fa-minus"></i></p>
							<button class="btn btn-lg btn-secondary btn-custom-orange rounded-0 px-5" id="play-normal">Play Now</button>
						</div>
						<p class="p-4 text-muted">Addition and Subtraction 80 seconds playing time  Will refresh every 1 hour 1 point for every correct answer.</p>
					</div>


					<div class="col-lg-6 p-3 text-center">
						<div class="bg-custom-play p-5 text-center text-white">
							<h3>Hard Mode</h3>
							<p class="fs-50 font-weight-bold"><i class="fas fa-divide"></i> <i class="fas fa-times"></i></p>
							<button class="btn btn-lg btn-secondary btn-custom-orange rounded-0 px-5" id="play-hard">Play Now</button>
						</div>
						<p class="p-4 text-muted">Multiplication and Division 60 seconds playing time Will refresh every 2 hours 1 point for every correct answer.</p>
					</div>
				</div>

				<small class="text-muted">Bonus: Will instantly receive extra <strong>$2</strong> after <strong>30,000 points</strong></small>
			</div>
		</div>

		<div class="row bg-white" id="game-container" style="display: none;">
			<div class="col-lg-8 m-auto p-5 text-center">
				<h2 id="game-type">Game Type</h2>
				<h6 id="game-operators">Addition and Subtraction</h6>
				<div class="row p-3 pt-4">
					<div class="col-lg-7 p-4 px-5 text-center bg-custom-verylightgray rounded rounded-lg play-area">
						<div class="row text-center">
							<div class="col-4 col-lg-4 col-sm-4">
								<h2><span class="first-number font-weight-bold fs-70">0</span></h2>
							</div>
							<div class="col-4 col-lg-4 col-sm-4 d-flex align-items-center justify-content-center">
								<h2><span class="number-operator"><i class="fas fa-plus"></i></span></h2>
							</div>
							<div class="col-4 col-lg-4 col-sm-4">
								<h2><span class="second-number font-weight-bold fs-70">0</span></h2>
							</div>
						</div>
						<input id="userAnswer" type="text" name="user-answer" class="mt-3 mb-3" readonly>
						<small class="font-weight-bold text-muted result-message">Press Enter after answering.</small>
					</div>
					<div class="col-lg-4 p-2 px-4 text-left">
						<p class="text-muted mb-2"><i class="far fa-clock"></i> Time left</p>
						<h2><span class="time-left mt-0">0</span> <small>seconds</small></h2>
						<div class="mt-4"></div>
						<p class="text-muted"><i class="fas fa-check"></i> Time left</p>
						<h2><span class="points-earned mt-0">0</span></h2>

						<div class="play-button-container mt-4">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 play-button bg-custom-orange text-white">Start</button>
						</div>
						<div class="replay-button-container mt-4" style="display: none;">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 replay-button bg-custom-orange text-white">Replay</button>
						</div>
						<div class="pause-button-container mt-4" style="display: none;">
							<button type="submit" class="btn btn-lg rounded-100 p-3 px-5 pause-button bg-custom-orange text-white">Pause</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
 