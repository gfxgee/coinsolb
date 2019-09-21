  <!-- About Section -->
  <section class="bg-main-color py-60 h-100" id="login-section">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-lg-6 text-left">
        <h4 class="text-white mb-4">Don't have an account yet? <a href="<?php echo base_url('register'); ?>" class="fs-22 link-primary">Register Here</a></h4>
        <h1 class="text-white font-weight-bold"><?php echo lang('login_heading');?></h1>

        <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("login");?>

          <div class="form-group">
            <label for="identity" class="text-white">Email address</label>
            <input type="email" name="identity" class="form-control" id="identity" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
        
          <div class="form-group">
            <label for="password" class="text-white">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <p class="text-white">
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            <?php echo lang('login_remember_label', 'remember');?>
          </p>

          <button type="submit" name="login" class="btn banner-button rounded-100 px-5">Login</button>

        <?php echo form_close();?>
        <br>
        <p><a href="forgot_password" class="text-white"><?php echo lang('login_forgot_password');?></a></p>
        </div>

        <div class="col-lg-6 text-left">
          <img src="<?php echo base_url() ?>assets/images/300ppi/grid-circle.png" alt="" width="100%">
        </div>  
      </div>
    </div>
  </section>
