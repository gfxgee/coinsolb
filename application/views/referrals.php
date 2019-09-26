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

					<div class="tab-pane fade show active" id="pills-referrals" role="tabpanel" aria-labelledby="pills-referrals-tab">
						<div class="col-lg-12 p-0 text-left">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo molestias ad, optio, voluptas explicabo itaque! Voluptates in eum asperiores at, architecto alias a dolorum nulla earum laudantium id aut, quisquam.</p>
							<p>When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>						
							<div class="row p-3">
								<div class="col-lg-3 p-0 pt-2">
									<h6 class="text-custom-muted">Total Referrals</h6>
									<h2 class="pt-2"><?php echo $total_referrals; ?></h2>
								</div>
								<div class="col-lg-6 p-0 pt-2">
									<h6 class="text-custom-muted">Your Referral Link</h6>										
									<a class="fs-22 link-primary" href="<?php echo base_url('/register/').$user_referral_code; ?>"><?php echo base_url('/register/').$user_referral_code; ?></a>
									<p class="mt-3 text-white fs-14">User this referral code to redeem extra points.</p>								
								</div>
							</div>
							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2 text-highlights">Referral Status</h5>
							<div class=" my-4"></div>
							<table id="referrals-table" class="table table-bordered" style="width:100%"></table>
						</div>
					</div>
				
				</div>
			</div>
		</div>

	</div>
</section>

<?php $this->load->view('faq'); ?>
