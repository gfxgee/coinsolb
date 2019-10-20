			<div class="col-12 p-3 m-0 d-block d-sm-none text-left">
				<h2 class="fs-50 text-highlights">$<span><?php echo $current_earnings_left; ?></span></h2>
				<small class="text-white">Current earnings. <a href="<?php echo base_url('withdraw'); ?>" class="link-primary">Withdraw Now</a></small>
			</div>

			<div class="mt-5 col-6 col-lg-3 col-md-4 col-sm-6 text-left p-3 bg-secondary-color text-white rounded-top-10">
				<h4 class="text-left"><i class="fal fa-user-circle"></i> Dashboard</h4>
				<small class="mt-2">Your personal informations</small>
			</div>
			
			<?php if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) { ?>


			<div class="mt-5 col-6 col-lg-3 col-md-4 col-sm-6 text-left pt-0 mb-3">
				<a href="<?php echo base_url('administrator'); ?>" class="btn text-custom-secondary bg-yellow-color rounded-10 p-3">
					<h4 class="text-left"><i class="far fa-user-lock"></i> Administrator </h4>
					<small class="mt-2 ml-0">Manage User Data</small>
				</a>
			</div>

			<?php } else { ?>

			<div class="mt-5 col-6 col-lg-3 col-md-4 col-sm-6 text-left pt-0 mb-3">
				<a href="<?php echo base_url('choose'); ?>" class="btn text-custom-secondary bg-yellow-color rounded-10 p-3">
					<h4 class="text-left"><i class="fas fa-gamepad"></i> Play Now! </h4>
					<small class="mt-2">And grow your earnings!</small>
				</a>
			</div>
	
			<?php } ?>

			<div class="mt-5 col-lg-6 col-md-4 col-sm-6 p-0 m-0 d-none d-lg-block d-md-block text-right" >
				<h2 class="fs-50 text-highlights">$<span><?php echo $current_earnings_left; ?></span></h2>
				<small class="text-white">Current earnings. <a href="<?php echo base_url('withdraw'); ?>" class="link-primary">Withdraw Now</a></small>
			</div>