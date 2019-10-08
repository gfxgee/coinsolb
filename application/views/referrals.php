<section class="bg-main-color " id="dashboard">
	<div class="container pb-5">

		<div class="row">

			<?php $this->load->view('templates/dashboard-main-menu'); ?>

		</div>

		<div class="row bg-secondary-color text-white">

			<div class="col-lg-12 p-4">

				<?php $this->load->view('templates/dashboard-menu'); ?>

				<div class="tab-content mt-5 pb-60" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-referrals" role="tabpanel" aria-labelledby="pills-referrals-tab">
						<div class="col-12 col-lg-12 p-0 text-left">
							<p>Here are the people that used your referral code and at the same time check the status of your referral code.</p>						
							<p>To know more about referrals please follow this article: <a href="<?php echo base_url('discussions'); ?>" class="link-primary fs-16">How referral works Referral.</a>
							<div class="row p-3">
								<div class="col-12 col-lg-3 p-0 pt-2">
									<h6 class="text-custom-muted">Total Referrals</h6>
									<h2 class="pt-2"><?php echo $total_referrals; ?></h2>
								</div>
								<div class="col-12 col-lg-9 p-0 pt-2">
									<h6 class="text-custom-muted">Your Referral Link</h6>										
									<p class="referral_link fs-22 link-primary"><?php echo base_url('register/').$user_referral_code; ?></p>

									<button class="btn banner-button rounded-100 copy-link" onclick="copyToClipboard('.referral_link')"  data-toggle="tooltip" data-placement="top"><i class="far fa-clipboard"></i> Copy Link</button>
									<p class="mt-3 text-white fs-14">User this referral code to redeem extra points.</p>								
								</div>
							</div>
							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2 text-highlights">Referral Status</h5>
							<div class=" my-4"></div>
							<table id="referrals-table" class="table table-borderless" style="width:100%"></table>
						</div>
					</div>
				
				</div>
			</div>
		</div>

	</div>
</section>

<?php $this->load->view('templates/faq'); ?>
