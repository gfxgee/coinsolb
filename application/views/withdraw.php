<section class="bg-main-color " id="dashboard">
	<div class="container pb-5">

		<div class="row">

			<?php $this->load->view('templates/dashboard-main-menu'); ?>

		</div>

		<div class="row bg-secondary-color text-white">

			<div class="col-12 col-lg-12 col-md-12 p-4">

				<?php $this->load->view('templates/dashboard-menu'); ?>

				<div class="tab-content mt-5" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-referrals" role="tabpanel" aria-labelledby="pills-referrals-tab">
						
						<div class="col-lg-12 p-0">

							<div class="row">
								<div class="col-12 col-lg-6 col-md-6 col-sm-12 ">

									<?php if ( isset($messages)) { 
											if ( $messages == true ) { ?>
												<div class="alert alert-success bg-success rounded-100 border-white text-white alert-dismissible fade show" role="alert">
												  <strong>Success!</strong> Your request has now been processed. Please wait until further notice.
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true text-success">&times;</span>
												  </button>
												</div>
									<?php 	} else if ( $messages == false ){ ?>
											<div class="alert alert-danger bg-danger rounded-100 border-white text-white alert-dismissible fade show" role="alert">
												  <strong>Sorry!</strong> Your request was denied. Please ensure that you meet the requirements and try again or you may have pending withdrawal request.
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true text-danger">&times;</span>
												  </button>
												</div>
									<?php	} 
									} ?>

									<div class="text-white mb-3">
									  <div class="">
									    <h3 class="card-title text-highlights pb-4">Balance: $<span><?php echo $current_earnings_left; ?></span></h3>
									    <p class="card-text">Your current balance converted to pesos: <?php echo $current_earnings_left*50; ?></p>
									   	
									   	<h5 class="pt-2">Minimum Withdrawals</h5>
									   	<div class="row">
										   	<div class="col-sm-6 text-left pt-2">
										   		<h2>$2</h2>
												
												<p class="mb-2"><i class="fas fa-check text-highlights mr-2"></i>Paypal</p>
												<p class="mb-2"><i class="fas fa-check text-highlights mr-2"></i>Gcash</p>
												<p class="mb-2"><i class="fas fa-check text-highlights mr-2"></i>BitCoin</p>
												<p class="mb-2"><i class="fas fa-check text-highlights mr-2"></i>Razer Gold</p>

										   	</div>	
										   	<div class="col-sm-6 text-left">
										   		<h2>$5</h2>
												
												<p class="mb-2"><i class="fas fa-check text-highlights mr-2"></i>Palawan</p>
												<p class="mb-2"><i class="fas fa-check text-highlights mr-2"></i>Steam Wallet</p>
										   	</div>	
										</div>
										
									   	<h5 class="pt-5">Working Days</h5>

										<p>The payments are made within 5 - 15 business days (Mon-Fri) right after the administrator checks your account.</p>

										<p>There are no withdrawal fees upon requesting for a withdrawal. Everything you earn will be yours. No strings attached!</p>

									  </div>
									</div>
								</div>

								<div class="col-12 col-lg-6 col-md-6 col-sm-12 mt-5">

									<form id="withdraw_form" method="post" action="<?php echo base_url('/withdraw');?>">
									<div class="p-0 form-group pt-3">
										<h5 for="select-payment">Available payment type</h5>
										<select class="mt-3 form-control main-input border-white" name="select-payment" id="select-payment" placeholder="Type of Payment" <?php echo ($current_earnings_left >= $minimun_withdrawal ) ? '' : 'disabled'; ?>>
											<option value="gcash">Gcash</option>
											<option value="e-load">E-Load</option>
											<option value="steam-wallet">Steam Wallet</option>
											<option value="mobile-legend">Mobile Legend</option>
											<option value="palawan">Palawan</option>
											<option value="paypal">PayPal</option>
											<option value="bitcoin">BitCoin</option>
										</select>
										<label for="select-payment" class="mt-3 fs-12 text-danger" <?php echo ($current_earnings_left >= $minimun_withdrawal ) ? 'style="display:none;"' : 'style="display:block;"'; ?>>This option will enable after you meet the requirements</label>
									</div>

									<h5 class="mt-5">Please enter the details</h5>

			  							<div class="account mt-3" id="account-details-gcash">
											<div class="form-group">
												<label for="account-name">Account Name</label>
												<input type="text" name="account-name" class="form-control main-input" id="account-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Account Holder Name">
											</div>
											<div class="form-group">
												<label for="phone-number">Phone Number</label>
												<input type="text" name="phone-number" class="form-control main-input" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
											</div>
										</div>

										<div class="account" id="account-details-e-load" style="display: none;">
											<div class="form-group">
												<label for="phone-number">Phone Number</label>
												<input type="text" name="phone-number" class="form-control main-input" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
											</div>
										</div>

										<div class="account" id="account-details-steam-wallet" style="display: none;">
											<div class="form-group">
												<label for="account-name">Account Name</label>
												<input type="text" name="account-name" class="form-control main-input" id="account-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Account Holder Name">
											</div>
											<div class="form-group">
												<label for="phone-number">Phone Number</label>
												<input type="text" name="phone-number" class="form-control main-input" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
											</div>
										</div>

										<div class="account" id="account-details-palawan" style="display: none;">
											<div class="form-group">
												<label for="first-name">Enter First Name</label>
												<input type="text" name="first-name" class="form-control main-input" id="first-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="First Name">
											</div>
											<div class="form-group">
												<label for="middle-initial">Enter Middle Initial</label>
												<input type="text" name="middle-initial" class="form-control main-input" id="middle-initial" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Middle Initial">
											</div>
											<div class="form-group">
												<label for="last-name">Enter Last Name</label>
												<input type="text" name="last-name" class="form-control main-input" id="last-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Last Name">
											</div>
											<div class="form-group">
												<label for="full-address">Enter Full Address</label>
												<input type="text" name="full-address" class="form-control main-input" id="full-address" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Full Address">
											</div>
											<div class="form-group">
												<label for="phone-number">Enter Phone Number</label>
												<input type="text" name="phone-number" class="form-control main-input" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
											</div>
										</div>

										<div class="account" id="account-details-paypal" style="display: none;">
											
											<div class="form-group">
												<label for="email">Email Address</label>
												<input type="text" name="email" class="form-control main-input" id="email" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Email Address">
											</div>
										</div>

										<div class="account" id="account-details-bitcoin" style="display: none;">
											
											<div class="form-group">
												<label for="wallet-address">Bitcoin Wallet Address</label>
												<input type="text" name="wallet-address" class="form-control main-input" id="wallet-address" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Bitcoin Wallet Address">
											</div>
										</div>

										<div class="account" id="account-details-mobile-legend" style="display: none;">
											
											<div class="form-group">
												<label for="ml-user-id">Mobile Legend UserID</label>
												<input type="text" name="ml-user-id" class="form-control main-input" id="ml-user-id" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Mobile Legend UserID">
											</div>
										</div>

										<div class="form-group">
											<label for="withdrawal-amount">Amount</label>
											<input type="text" name="withdrawal-amount" class="form-control main-input" id="withdrawal-amount" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Enter amount to withdraw:">
											<small class="text-muted">Please enter amount in dollar ($) currency.</small>
										</div>

										<button type="submit" class="btn banner-button rounded-100" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?>>Withdraw</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>


		
		<div class="row bg-secondary-color text-white">

			<div class="col-lg-12 p-4">

				<div class="tab-content pb-60" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-withdrawals" role="tabpanel" aria-labelledby="pills-withdrawals-tab">
						<div class="col-lg-12 p-0 text-left">

							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2 text-highlights">History</h5>
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

