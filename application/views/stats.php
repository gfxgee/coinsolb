<section class="bg-main-color " id="dashboard">
	<div class="container pt-5 pb-5">

		<div class="row">

			<?php $this->load->view('templates/dashboard-main-menu'); ?>

		</div>

		<div class="row bg-secondary-color text-white">

			<div class="col-lg-12 p-4">

				<?php $this->load->view('templates/dashboard-menu'); ?>

				<div class="tab-content mt-5 pb-60" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">						
						<div class="col-lg-12 p-0 text-left">
							<div class="row p-0 px-3"> 
								<div class="col-lg-4 p-0 m-0 text-left ">
									<h6 class="mb-2 text-custom-muted">Current Earnings</h6>
									<h2 class="">$<span><?php echo $current_earnings_left; ?></span></h2>
									<a href="<?php echo base_url('/withdraw'); ?>" class="link-primary">Withdraw Now</a>
								</div>
								<div class="col-lg-4 p-0">
									<h6 class="mb-2 text-custom-muted">Total Points Earned</h6>
									<h2 class=""><?php echo $total_score; ?></h2>
								</div>
								<div class="col-lg-4 p-0 ">
									<h6 class="mb-2 text-custom-muted">Points from Referrals</h6>
									<h2 class=""><?php echo $total_referral_score; ?></h2>
									<a href="<?php echo base_url('/discussion'); ?>" class="link-primary">Read Discussions</a>
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>

	</div>
</section>

<?php $this->load->view('templates/faq'); ?>
