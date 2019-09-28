
  <section class="bg-main-color d-flex align-items-center py-100" id="login-section">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-lg-6 text-left">
        <h1 class="text-white font-weight-bold mb-5"><?php echo lang('login_heading');?></h1>
      
        <?php if ( $message ) { ?>      
  
        <div class="alert alert-custom-danger alert-dismissible fade show" role="alert">
          <?php echo $message;?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <?php } ?>

        <?php echo form_open("login");?>

          <div class="form-group">
            <input type="email" name="identity" class="form-control main-input" id="identity" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
        
          <div class="form-group">
            <input type="password" name="password" class="form-control main-input" id="password" placeholder="Password">
          </div>
          <p class="text-white">
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            <?php echo lang('login_remember_label', 'remember');?> 
              <a href="forgot_password" class="link-primary float-right"><?php echo lang('login_forgot_password');?></a>
          </p>
          <div class="row">
            <div class="col col-lg-3">
              <button type="submit" name="login" class="btn banner-button rounded-100 px-5">Login</button>
            </div>
            <div class="col d-flex align-items-center ml-3">
              <p class="text-white m-0">Don't have an account yet? <a href="<?php echo base_url('register'); ?>" class="fs-16 link-primary">Register Here</a></p>
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
