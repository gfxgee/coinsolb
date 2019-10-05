<section class="bg-main-color " id="dashboard">
	<div class="container pt-5 pb-5">

		<div class="row">

			<?php $this->load->view('templates/dashboard-main-menu'); ?>

		</div>

		<div class="row bg-secondary-color text-white">

			<div class="col-lg-12 p-4">

				<?php $this->load->view('templates/dashboard-menu'); ?>

				<div class="tab-content mt-5 pb-60" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-withdrawals" role="tabpanel" aria-labelledby="pills-withdrawals-tab">
						<div class="col-lg-12 p-0 text-left">
							<p class="card-text">Your current balance <span class="text-highlights">$<?php echo $current_earnings_left; ?></span> converted to Pesos: <?php echo $current_earnings_left*51; ?>. </p>
						    <p class="card-text">Minimum amount withdrawn on <span class="text-highlights">GCash, E-Load and Razer Gold (for Mobile Legends, PUBG, Rules of survival</span> and many more...) is $2 = ₱100. </p>
							<p class="card-text">Minimum amount withdrawn on <span class="text-highlights">Palawan and Steam wallet</span>: $5 = ₱250.00.</p>
							
							<div class="row p-3">

								<div class="col-lg-3 p-0 pt-2">
									<h6 class="text-custom-muted">Current Balance</h6>
									<h2 class="pt-2">$<span><?php echo $current_earnings_left; ?></span></h2>
									<a href="<?php echo base_url('/withdraw'); ?>" class="link-primary">Withdraw Now</a>
								</div>

							</div>

							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2">History</h5>
							<div class=" my-4"></div>
							<table id="withdrawals-table" class="table table-borderless" style="width:100%"></table>

						</div>
					</div>
				
				</div>
			</div>
		</div>

	</div>
</section>

<?php $this->load->view('templates/faq'); ?>
