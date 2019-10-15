<section class="bg-main-color " id="dashboard">
	<div class="container pb-5">

		<div class="row">

			<?php $this->load->view('templates/dashboard-main-menu'); ?>
			
		</div>

		<div class="row bg-secondary-color text-white">

			<div class="col-lg-12 p-4">

				<?php $this->load->view('templates/dashboard-menu'); ?>

				<div class="tab-content mt-5 pb-60" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">						
						<div class="col-12 col-lg-12 p-0 text-left">
							<div class="row p-0 px-3"> 
								<div class="col-6 col-lg-4 p-0 m-0 text-left ">
									<h6 class="mb-2 text-custom-muted">Full Name</h6>
									<h3 class="mt-2"><?php echo $user_info->first_name . ' ' . $user_info->last_name; ?></span></h3>
								</div>
								<div class="col-6 col-lg-8 p-0">
									<h6 class="mb-2 text-custom-muted">Referral Code</h6>
									<h3 class="mt-2"><?php echo $user_referral_code; ?></h3>
								</div>
							</div>

							<div class="row p-0 px-3"> 
								<div class="col-6 col-lg-4 p-0 m-0 text-left mt-4">
									<h6 class="mb-2 text-custom-muted">Email Address</h6>
									<h3 class="mt-2"><?php echo $user_info->email; ?></h3>
								</div>
								<div class="col-12 col-lg-8 p-0 mt-4">
									<h6 class="text-custom-muted">Your Referral Link</h6>										
									<p class="referral_link fs-22 link-primary"><?php echo base_url('/register/').$user_referral_code; ?></p>

									<button class="btn banner-button rounded-100 copy-link" onclick="copyToClipboard('.referral_link')"  data-toggle="tooltip" data-placement="top"><i class="far fa-clipboard"></i> Copy Link</button>
									<p class="mt-3 text-white fs-14">Use this referral code to redeem extra points.</p>		
								</div>
							</div>
								
							<a href="" class="btn mt-3 text-custom-secondary px-3 py-1 rounded-100 banner-button" data-toggle="modal" data-target="#exampleModal">Edit Informations</a>
							

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-5 text-white bg-main-color">
      <div class="modal-header no-border">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
      	 <?php if ( isset($form_data['message']) ) { ?>      
  
        <div class="alert alert-custom-danger alert-dismissible fade show" role="alert">
          <?php echo $form_data['message'];?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <?php } ?>

        <form method="post" action="<?php echo base_url('account'); ?>">
		  <div class="form-group">
		    <label for="">First Name</label>
		    <input type="text" class="form-control main-input" id="first_name" name="first_name" placeholder="<?php echo $user_info->first_name; ?>" value="<?php echo $user_info->first_name; ?>">
		  </div>
		  <div class="form-group">
		    <label for="">Last Name</label>
		    <input type="text" class="form-control main-input" id="last_name" name="last_name" placeholder="<?php echo $user_info->last_name; ?>" value="<?php echo $user_info->last_name; ?>">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">New Password</label>
		    <input type="password" class="form-control main-input" id="password" name="password" placeholder="New Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Confirm New Password</label>
		    <input type="password" class="form-control main-input" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
		  </div>
      </div>
      <div class="modal-footer no-border">
        <button type="submit" class="btn rounded-100 banner-button px-3 py-1 bg-yellow-color no-border">Save changes</button>
      </div>
		</form>
    </div>
  </div>
</div>


<?php $this->load->view('templates/faq'); ?>
