<section class="page-section h-100" id="withdraw">
	<div class="container pt-5 pb-5">

		<div class="row">

			<div class="col-3 text-left p-4 bg-white">
				<h3 class="text-left">Withdraw</h3>
				<small class="mt-2">Here you can withdraw your earnings.</small>
			</div>

			<div class="col p-0 m-0 text-right ">
				<p class="counter text-custom-orange">$<span><?php echo $current_earnings_left; ?></span></p>
				<small>Current earnings. <a href="#" class="badge badge-custom-orange">Withdraw Now</a></small>
			</div>

		</div>

		<div class="row bg-white">
			<div class="col-lg-12 p-4">

				<div class="row">
					<div class="col-4">
						<div class="card bg-dark text-white mb-3">
						  <div class="card-header">Select type of Payment</div>
						  <div class="card-body">
						    <h3 class="card-title text-custom-orange">Balance: $<span><?php echo $current_earnings_left; ?></span></h3>
						    <small class="card-text">Your current balance $<?php echo $current_earnings_left; ?> converted to Pesos: <?php echo $current_earnings_left*51; ?>. Minimum amount withdrawn on GCash, E-Load and Razer Gold (for Mobile Legends, PUBG, Rules of survival and many more...) is $2 = ₱100. Minimum amount withdrawn on Palawan and Steam wallet: $5 = ₱250.00.</small>
						    
						<form id="withdraw_form" method="post" action="<?php echo base_url('/withdraw');?>">
							<div class="form-group mt-4">
								<label for="select-payment">Available payment type</label>
								<select class="form-control" name="select-payment" id="select-payment" <?php echo ($current_earnings_left >= $minimun_withdrawal ) ? '' : 'disabled'; ?>>
									<option value="gcash">Gcash</option>
									<option value="e-load">E-Load</option>
									<option value="steam-wallet">Steam Wallet</option>
									<option value="palawan">Palawan</option>
								</select>
							</div>

						  </div>
						</div>
					</div>

					<div class="col-8 p-3">
						<h4>Please enter the details</h4>

  						<div class="dropdown-divider my-3"></div>

  							<div class="account" id="account-details-gcash">
								<div class="form-group">
									<label for="account-name">Account Name</label>
									<input type="text" name="account-name" class="form-control" id="account-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Account Holder Name">
								</div>
								<div class="form-group">
									<label for="phone-number">Phone Number</label>
									<input type="text" name="phone-number" class="form-control" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
								</div>
							</div>

							<div class="account" id="account-details-e-load" style="display: none;">
								<div class="form-group">
									<label for="phone-number">Phone Number</label>
									<input type="text" name="phone-number" class="form-control" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
								</div>
							</div>

							<div class="account" id="account-details-steam-wallet" style="display: none;">
								<div class="form-group">
									<label for="account-name">Account Name</label>
									<input type="text" name="account-name" class="form-control" id="account-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Account Holder Name">
								</div>
								<div class="form-group">
									<label for="phone-number">Phone Number</label>
									<input type="text" name="phone-number" class="form-control" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
								</div>
							</div>

							<div class="account" id="account-details-palawan" style="display: none;">
								<div class="form-group">
									<label for="first-name">Enter First Name</label>
									<input type="text" name="first-name" class="form-control" id="first-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="First Name">
								</div>
								<div class="form-group">
									<label for="middle-initial">Enter Middle Initial</label>
									<input type="text" name="middle-initial" class="form-control" id="middle-initial" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Middle Initial">
								</div>
								<div class="form-group">
									<label for="last-name">Enter Last Name</label>
									<input type="text" name="last-name" class="form-control" id="last-name" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Last Name">
								</div>
								<div class="form-group">
									<label for="full-address">Enter Full Address</label>
									<input type="text" name="full-address" class="form-control" id="full-address" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Full Address">
								</div>
								<div class="form-group">
									<label for="phone-number">Enter Phone Number</label>
									<input type="text" name="phone-number" class="form-control" id="phone-number" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Phone Number">
								</div>
							</div>

	
							<div class="form-group">
								<label for="withdrawal-amount">Amount</label>
								<input type="text" name="withdrawal-amount" class="form-control" id="withdrawal-amount" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?> placeholder="Enter amount to withdraw:">
								<small class="text-muted">Please enter amount in dollar ($) currency.</small>
							</div>

							<button type="submit" class="btn btn-primary" <?php echo ($current_earnings_left >= $minimun_withdrawal) ? '' : 'disabled'; ?>>Withdraw</button>
						</form>
					</div>
				</div>
			</div>
		</div>

</section>