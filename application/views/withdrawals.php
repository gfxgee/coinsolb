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

					<div class="tab-pane fade show active" id="pills-withdrawals" role="tabpanel" aria-labelledby="pills-withdrawals-tab">
						<div class="col-lg-12 p-0 text-left">
							<p>Minimum withdrawal for Paypal, Bitcoin, GCash, and for E-Load (TM-Globe-Smart) is $2 (Php 100).</p>
							<p>For Steam Wallet, Mobile Legend Diamonds, and Palawan Express is $5 (Php 250).</p>
							<p>The payments are made within 5 - 15 business days (Mon-Fri) right after the administrator checks your account.</p>
							<p>There are no withdrawal fees upon requesting for a withdrawal. Everything you earn will be yours. No strings attached!</p>
							<p>You may setup your payment accounts in <a class="link-primary" id="pills-withdrawals-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawals" aria-selected="false">My Wallet</a> page.</p>
							
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
