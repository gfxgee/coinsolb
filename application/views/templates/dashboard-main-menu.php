			<div class="col-6 col-lg-3 text-left p-3 bg-secondary-color text-white rounded-top-10">
				<h4 class="text-left"><i class="fal fa-user-circle"></i> Dashboard</h4>
				<small class="mt-2">Your personal informations</small>
			</div>

			<div class="col-6 col-lg-3 text-left pt-0 mb-3">
				<a href="<?php echo base_url('choose'); ?>" class="btn text-custom-secondary bg-yellow-color rounded-10 p-3">
					<h4 class="text-left"><i class="far fa-play-circle"></i> Play Now! </h4>
					<small class="mt-2">And grow your earnings!</small>
				</a>
			</div>

			<div class="col-lg-6 p-0 m-0 text-right" >
				<h2 class="fs-50 text-highlights">$<span><?php echo $current_earnings_left; ?></span></h2>
				<small class="text-white">Current earnings. <a href="<?php echo base_url('withdraw'); ?>" class="link-primary">Withdraw Now</a></small>
			</div>