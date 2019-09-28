<section class="bg-main-color " id="dashboard">
	<div class="container pt-5 pb-5">

		<div class="row">

			<div class="col-lg-3 text-left p-4 bg-secondary-color text-white rounded-top-10">
				<h4 class="text-left">Dashboard</h4>
				<small class="mt-2">Your personal informations</small>
			</div>

			<div class="col-lg-3 text-left pt-0">
				<a href="<?php echo base_url('/play'); ?>" class="btn text-custom-secondary bg-yellow-color rounded-10 p-3">
					<h4 class="text-left">Play Now!</h4>
					<small class="mt-2">And grow your earnings!</small>
				</a>
			</div>

			<div class="col-lg-6 p-0 m-0 text-right ">
				<h2 class="fs-50 text-highlights">$<span><?php echo $current_earnings_left; ?></span></h2>
				<small class="text-white">Current earnings. <a href="<?php echo base_url('withdraw'); ?>" class="link-primary">Withdraw Now</a></small>
			</div>

		</div>

		<div class="row bg-secondary-color text-white">

			<div class="col-lg-12 p-4">

				<?php $this->load->view('templates/dashboard-menu'); ?>

				<div class="tab-content mt-5 pb-60" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">						
						<div class="col-lg-12 p-0 text-left">
							<div class="row p-0 px-3"> 
								<div class="col-lg-4 p-0 m-0 text-left ">
									<h6 class="mb-2 text-custom-muted">Full Name</h6>
									<h3 class="mt-2"><?php echo $user_info->first_name . ' ' . $user_info->last_name; ?></span></h3>
								</div>
								<div class="col-lg-8 p-0">
									<h6 class="mb-2 text-custom-muted">Referral Code</h6>
									<h3 class="mt-2"><?php echo $user_referral_code; ?></h3>
								</div>
							</div>

							<div class="row p-0 px-3 mt-4"> 
								<div class="col-lg-4 p-0 m-0 text-left ">
									<h6 class="mb-2 text-custom-muted">Email Address</h6>
									<h3 class="mt-2"><?php echo $user_info->email; ?></h3>
								</div>
								<div class="col-lg-8 p-0">
									<h6 class="mb-2 text-custom-muted">Referral Link</h6>
									<a class="fs-22 link-primary" href="<?php echo base_url('/register/').$user_referral_code; ?>"><?php echo base_url('/register/').$user_referral_code; ?></a>
								</div>
							</div>
								
							<a href="<?php echo base_url('account'); ?>" class="btn mt-3 text-custom-secondary px-3 py-1 rounded-100 banner-button">Edit Informations</a>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</section>

<?php $this->load->view('templates/faq'); ?>
