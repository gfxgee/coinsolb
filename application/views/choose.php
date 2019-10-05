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
		
	
		<div class="row bg-secondary-color" id="select-game">

			<div class="col-lg-10 m-auto p-5 text-center text-white">
				<h2 class="mt-5">Choose the mode you want to play:</h2>
					
				<div class="row text-center">
					<div class="col-12 col-lg-6 col-md-6 p-3 text-center">
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


					<div class="col-12 col-lg-6 col-md-6 p-3 text-center">
						<div class="p-5 text-center">
							<p class="fs-70 font-weight-bold text-highlights"><i class="fas fa-divide"></i> <i class="fas fa-times"></i></p>
							<h3>Hard</h3>
							<button class="mt-4 mb-3 btn btn-lg rounded-100 px-5 banner-button font-weight-bold" id="play-hard">Play Now</button>
							<p class="m-0 mt-4"><i class="fas fa-check text-highlights mr-2"></i>Multiplication and Division</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>60 seconds playing time</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>Will refresh every 1 hour</p>
							<p class="m-0"><i class="fas fa-check text-highlights mr-2"></i>2 points for every correct answer</p>
							
						</div>
					</div>
					
				</div>
				<p class="text-muted fs-14 font-italic">Bonus: Will instantly receive extra <strong>$2</strong> after <strong>30,000 points</strong></p>
			</div>
		</div>

	</div>
</section>
 

<?php $this->load->view('templates/faq'); ?>
