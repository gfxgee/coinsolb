<section class="bg-main-color">
	<div class="container pb-5">
	
		<div class="row mt-5 bg-secondary-color text-white" id="game-container">
			<div class="col-sm-12 mb-4 m-auto p-5">
				<?php $this->load->view('templates/ad_left'); ?>
			</div>
			<div class="col-sm-2 p-3">
				<?php $this->load->view('templates/ad_right'); ?>
			</div>
			<div class="col-lg-8 m-auto p-5 text-center">
				<h2 id="game-type">Practice Game</h2>
				<h6 id="game-operators">Answer without worrying about the time without limit for practice.</h6>
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
						<h6 class="text-highlights mb-2"><i class="far fa-check"></i> Correct</h6>
						<h2><span class="points-correct mt-0">0</span></h2>
						<div class="mt-4"></div>
						<h6 class="text-danger"><i class="fas fa-times"></i> Wrong</h6>
						<h2><span class="points-wrong mt-0">0</span></h2>

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

				<p class="text-warning">Note: This game(s) will not be recorded.</p>
			</div>
			<div class="col-sm-2 p-3">
				<?php $this->load->view('templates/ad_jpet_right'); ?>
			</div>
		</div>


	</div>
</section>
 

<?php $this->load->view('templates/faq'); ?>
