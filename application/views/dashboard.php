<section class="bg-main-color " id="dashboard">
	<div class="container mt-80 pt-5 pb-5">

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

				<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">


					<li class="nav-item">
						<a class="nav-link px-2 ml-0 mr-3 rounded-100 dashboard-tabs active" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false">Account</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 rounded-100 dashboard-tabs" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="false">Earning Stats</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 rounded-100 dashboard-tabs" id="pills-points-tab" data-toggle="pill" href="#pills-points" role="tab" aria-controls="pills-points" aria-selected="false">Points History</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 rounded-100 dashboard-tabs" id="pills-referrals-tab" data-toggle="pill" href="#pills-referrals" role="tab" aria-controls="pills-referrals" aria-selected="false">Referrals</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 rounded-100 dashboard-tabs" id="pills-withdrawals-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawals" aria-selected="false">Withdrawals</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mr-0 ml-3 rounded-100 dashboard-tabs" id="pills-referrals-tab" data-toggle="pill" href="#pills-referrals" role="tab" aria-controls="pills-referrals" aria-selected="false">Referrals</a>
					</li>

				</ul>

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

					<div class="tab-pane fade" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">						
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
					
					<div class="tab-pane fade" id="pills-points" role="tabpanel" aria-labelledby="pills-points-tab">
						<div class="col-lg-12 p-0 text-left">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
							<div class="row p-3"> 
								<div class="col-lg-3 p-0 pt-2">
									<h6 class="text-custom-muted">Current Points</h6>
									<h2 class="pt-2"><?php echo $current_earnings_left*10000; ?></h2>
								</div>
								<div class="col-lg-3 p-0 pt-2">
									<h6 class="text-custom-muted">Total Points Earned</h6>
									<h2 class="pt-2"><?php echo $total_score; ?></h2>
								</div>
							</div>
							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2 text-highlights">History</h5>
							<div class=" my-4"></div>
							<table id="score-table" class="table table-striped table-bordered" style="width:100%"></table>
						</div>
					</div>

					<div class="tab-pane fade" id="pills-referrals" role="tabpanel" aria-labelledby="pills-referrals-tab">
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
							<table id="referrals-table" class="table table-striped table-bordered" style="width:100%"></table>
						</div>
					</div>

					<div class="tab-pane fade" id="pills-withdrawals" role="tabpanel" aria-labelledby="pills-withdrawals-tab">
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
							<table id="withdrawals-table" class="table table-striped table-bordered" style="width:100%"></table>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</section>

<?php $this->load->view('faq'); ?>
