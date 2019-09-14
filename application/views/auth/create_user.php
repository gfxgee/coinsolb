  <!-- About Section -->
  <section class="page-section py-5" id="login-section">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-lg-6 text-left">
        <h1 class="text-uppercase font-weight-bold"><?php echo lang('create_user_heading');?></h1>

        <div id="infoMessage"><?php echo $message;?></div>

        <small><?php echo lang('create_user_subheading');?></small>

        <?php echo form_open("register");?>

          <div class="form-group mt-5">
            <label for="referral_code">Enter Referral Code:</label>
            <input type="text" name="referral_code" class="form-control" id="referral_code" aria-describedby="emailHelp" placeholder="Enter Referral Code" value="<?php echo $referral_code_from_link; ?>">
          </div>

          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="emailHelp" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp" placeholder="Enter Last Name">
          </div>
          
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
          </div>
      
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Confirm Password">
          </div>

          <p>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            <?php echo lang('login_remember_label', 'remember');?>
          </p>

          <button type="submit" name="create_user_submit_btn" class="btn btn-light btn-xl">Register</button>

        <?php echo form_close();?>
        <br>
        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
        </div>

        <div class="col-lg-6 text-left">

        </div>
      </div>
    </div>
  </section>
