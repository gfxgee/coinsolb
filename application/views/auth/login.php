
  <section class="bg-main-color d-flex align-items-center py-100" id="login-section">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-lg-6 text-left">
        <h4 class="text-white mb-4">Don't have an account yet? <a href="<?php echo base_url('register'); ?>" class="fs-22 link-primary">Register Here</a></h4>
        <h1 class="text-white font-weight-bold mb-3"><?php echo lang('login_heading');?></h1>
      
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
          </p>
          <div class="row">
            <div class="col col-lg-3">
              <button type="submit" name="login" class="btn banner-button rounded-100 px-5">Login</button>
            </div>
            <div class="col d-flex align-items-center">
              <a href="forgot_password" class="link-primary"><?php echo lang('login_forgot_password');?></a>
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

<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
  <div class="toast" data-delay="5000" style="position: absolute; top: 0; right: 0;">
    <div class="toast-header">
      <strong class="mr-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>