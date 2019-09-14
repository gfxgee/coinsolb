  <!-- About Section -->
  <section class="page-section bg-primary h-100" id="login-section">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-lg-6 text-left">
        <h1 class="text-uppercase text-white font-weight-bold"><?php echo lang('login_heading');?></h1>

        <p class="text-white"><?php echo lang('login_subheading');?></p>

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

          <button type="submit" name="login" class="btn btn-light btn-xl">Submit</button>

        <?php echo form_close();?>
        <br>
        <p><a href="forgot_password" class="text-white"><?php echo lang('login_forgot_password');?></a></p>
        </div>

        <div class="col-lg-6 text-left">

        </div>
      </div>
    </div>
  </section>
