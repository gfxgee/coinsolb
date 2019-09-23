  
  <section class="bg-main-color d-flex align-items-center py-100" id="login-section">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-lg-6 text-left">
        <h1 class="text-white font-weight-bold mb-3"><?php echo lang('create_user_heading');?></h1>

        <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("register");?>

          <div class="form-group">
            <input type="text" name="first_name" class="form-control main-input" id="first_name" aria-describedby="emailHelp" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <input type="text" name="last_name" class="form-control main-input" id="last_name" aria-describedby="emailHelp" placeholder="Enter Last Name">
          </div>
          
          <div class="form-group">
            <input type="email" name="email" class="form-control main-input" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
          </div>
      
          <div class="form-group">
            <input type="password" name="password" class="form-control main-input" id="password" placeholder="Password">
          </div>

          <div class="form-group">
            <input type="password" name="password_confirm" class="form-control main-input" id="password_confirm" placeholder="Confirm Password">
          </div>
          <p class="text-white">Got a Referral code? Type your referral code below (Optional)</p>
          <div class="form-group">
            <input type="text" name="referral_code" class="form-control main-input" id="referral_code" aria-describedby="emailHelp" placeholder="Enter Referral Code" value="<?php echo $referral_code_from_link; ?>">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
            <label class="form-check-label text-white" for="defaultCheck1">
              I accept the <a class="link-primary fs-16" href="<?php echo base_url('term-condition'); ?>">Terms and Conditions</a>.
            </label>
          </div>
          
          <div class="row mt-3">
            <div class="col col-lg-4">
              <button type="submit" name="create_user_submit_btn" class="btn banner-button rounded-100 px-5">Register</button>
            </div>
            <div class="col d-flex align-items-center">
              <p class="m-0 text-white">Have an account? <a class="link-primary fs-16" href="<?php echo base_url('login'); ?>">Login Here</a></p>
            </div>
          </div>

        

        <?php echo form_close();?>
        <br>
        </div>

        <div class="col-lg-6 text-left">
          <img src="<?php echo base_url() ?>assets/images/300ppi/grid-circle.png" alt="" width="100%">
        </div>  
      </div>
    </div>
  </section>