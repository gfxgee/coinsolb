<section class="page-section h-100" id="dashboard">
	<div class="container pt-5 pb-5">

		<div class="row">

			<div class="col-lg-3 text-left p-4 bg-white">
				<h3 class="text-left">Dashboard</h3>
				<small class="mt-2">Your personal informations</small>
			</div>

			<div class="col-lg-3 text-left pt-0">
				<a href="<?php echo base_url('/play'); ?>" class=" btn rounded-0 text-white bg-custom-gray p-3">
					<h3 class="text-left">Play Now!</h3>
					<small class="mt-2">And grow your earnings!</small>
				</a>
			</div>

			<div class="col-lg-6 p-0 m-0 text-right ">
				<p class="counter text-custom-orange">$<span><?php echo $total_score/10000; ?></span></p>
				<small>Current earnings. <a href="#" class="badge badge-custom-orange">Withdraw Now</a></small>
			</div>

		</div>

		<div class="row bg-white">

			<div class="col-lg-12 p-4">

				<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">

					<li class="nav-item">
						<a class="nav-link px-2 ml-0 mr-3 text-custom-gray bg-custom-lightgray rounded-0 active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="false">Earning Stats</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 text-custom-gray bg-custom-lightgray rounded-0" id="pills-points-tab" data-toggle="pill" href="#pills-points" role="tab" aria-controls="pills-points" aria-selected="false">Points History</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 text-custom-gray bg-custom-lightgray rounded-0" id="pills-referrals-tab" data-toggle="pill" href="#pills-referrals" role="tab" aria-controls="pills-referrals" aria-selected="false">Referrals</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 text-custom-gray bg-custom-lightgray rounded-0" id="pills-withdrawals-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawals" aria-selected="false">Withdrawals</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mr-0 ml-3 text-custom-gray bg-custom-lightgray rounded-0" id="pills-referrals-tab" data-toggle="pill" href="#pills-referrals" role="tab" aria-controls="pills-referrals" aria-selected="false">Referrals</a>
					</li>

				</ul>

				<div class="tab-content mt-5" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">						
						<div class="col-lg-12 p-0 text-left">
							<div class="row p-0 px-3"> 
								<div class="col-lg-4 p-0 m-0 text-left ">
									<div class="card" style="width: 18rem;">
										<div class="card-body">
											<h6 class="card-subtitle mb-2 text-muted">Current Earnings</h6>
											<p class="counter text-custom-orange">$<span><?php echo $total_score/10000; ?></span></p>
											<a href="<?php echo base_url('/withdraw'); ?>" class="badge badge-secondary badge-custom-orange">Withdraw Now</a>
										</div>
									</div>
								</div>
								<div class="col-lg-2 p-0">
									<p class="mb-0">Total Points Earned</p>
									<h2 class="mt-0"><?php echo $total_score; ?></h2>
								</div>
								<div class="col-lg-2 p-0 ">
									<p class="mb-0">Points from Referrals</p>
									<h2 class=""><?php echo $total_referral_score; ?></h2>
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="pills-points" role="tabpanel" aria-labelledby="pills-points-tab">
						<div class="col-lg-12 p-0 text-left">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo molestias ad, optio, voluptas explicabo itaque! Voluptates in eum asperiores at, architecto alias a dolorum nulla earum laudantium id aut, quisquam.</p>
							<div class="row p-3"> 
								<div class="col-lg-3 p-0 pt-2">
									<p>Total Points Earned</p>
									<h2 class="pt-2"><?php echo $total_score; ?></h2>
								</div>
								<div class="col-lg-3 p-0 pt-2">
									<p>Current Points</p>
									<h2 class="pt-2"><?php echo $total_score; ?></h2>
								</div>
							</div>
							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2">Points History</h5>
							<small class="">List of all the points you gathered.</small>
							<div class=" my-4"></div>
							<table id="score-table" class="table table-striped table-bordered" style="width:100%"></table>
						</div>
					</div>

					<div class="tab-pane fade" id="pills-referrals" role="tabpanel" aria-labelledby="pills-referrals-tab">
						<div class="col-lg-12 p-0 text-left">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo molestias ad, optio, voluptas explicabo itaque! Voluptates in eum asperiores at, architecto alias a dolorum nulla earum laudantium id aut, quisquam.</p>						
							<div class="row p-3">
								<div class="col-lg-3 p-0 pt-2">
									<p>Total Referrals</p>
									<h2 class="pt-2"><?php echo $total_referrals; ?></h2>
								</div>
								<div class="col-lg-6 p-0 pt-2">
									<p>Your Referral Code</p>									
									<div class="input-group mb-3">										
										<input type="text" readonly class="form-control text-custom-orange" placeholder="" aria-label="Enter your " aria-describedby="basic-addon2" value="<?php echo base_url('/register/').$user_referral_code; ?>">										
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" type="button">Copy</button>
										</div>
									</div>
									<small class="text-black-50">User this referral code to redeem extra points.</small>								
								</div>
							</div>
							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2">Referral History</h5>
							<small class="">List of all the referrals you gathered.</small>
							<div class=" my-4"></div>
							<table id="referrals-table" class="table table-striped table-bordered" style="width:100%"></table>
						</div>
					</div>

					<div class="tab-pane fade" id="pills-withdrawals" role="tabpanel" aria-labelledby="pills-withdrawals-tab">
						<div class="col-lg-12 p-0 text-left">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo molestias ad, optio, voluptas explicabo itaque! Voluptates in eum asperiores at, architecto alias a dolorum nulla earum laudantium id aut, quisquam.</p>
							
							<div class="row p-3">

								<div class="col-lg-3 p-0 pt-2">
									<p>Current Balance</p>
									<h2 class="pt-2">$<span><?php echo $total_score/10000; ?></span></h2>
								</div>
	
								<div class="col-lg-3 p-0 pt-2">
									<p>Total Withdrawals</p>
									<h2 class="pt-2">$<span><?php echo $total_score/10000; ?></span></h2>
								</div>

							</div>

							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2">Referral History</h5>
							<small class="">List of all the referrals you gathered.</small>
							<div class=" my-4"></div>
							<table id="referrals-table" class="table table-striped table-bordered" style="width:100%"></table>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</section>