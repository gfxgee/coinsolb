

  <!-- Footer -->
  <footer class="bg-footer-color pt-60 pb-30">
    <div class="container">
      <div class="row">

        <div class="col-4 pr-5">
          <a href="/"><img class="footer-logo" src="<?php echo base_url(); ?>assets/images/300ppi/logo.png"/></a>
          <p class="mt-4 text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        </div>

        <div class="col-2 pl-5">
          <h6 class="font-weight-bold text-footer-header">Links</h6>
          <ul class="footer-links mt-4">
            <li><a class="js-scroll-trigger scroll" href="#banner-section">Home</a></li>
            <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
            <li><a href="">FAQ's</a></li>
            <li><a href="">Discussions</a></li>
            <li><a href="">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-3 pl-5">
          <h6 class="font-weight-bold text-footer-header mb-4">Contacts</h6>
          <a class="text-white footer-contacts" href="mailto:coinsolbinfo@gmail.com">coinsolbinfo@gmail.com</a>
        </div>

        <div class="col-2 pl-5">
          <h6 class="font-weight-bold text-footer-header mb-4">Follow Us</h6>
          <a class="text-white footer-contacts" href=""><span style="font-size: 20px"><i class="fab fa-facebook-square"></i></span> &nbsp;&nbsp; CoinSolb</a>
        </div>

      </div>
      <hr class="footer-divider mt-5">

      <div class="row">
        <div class="col-6 text-left">
          <p class="text-white">© 2019 Coinsolb &nbsp;&nbsp; | &nbsp;&nbsp; All Rights Reserved</p>
        </div>
        <div class="col-6 text-right">
          <p class="text-white"><a href="" class="footer-contacts">Terms & Conditions</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="" class="footer-contacts">Privacy</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="" class="footer-contacts">Cookies</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/data-tables/datatables.min.js"></script>

  
  <!-- Load game -->
  <script src="<?php echo base_url(); ?>assets/game_library/app.js"></script>
  
  <!-- Load custom javascripts -->
  <script src="<?php echo base_url(); ?>assets/custom.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){ 
      var time_left = <?php echo (isset($replay_time_left)) ? 3600 - $replay_time_left : 0; ?>;
      var minutes, seconds;
      var time_run = setInterval ( function () { 
        minutes = Math.floor( time_left / 60 );
        seconds = time_left - (minutes*60);
        
        if ( minutes > 0 ) $('.running-time').text( minutes + ' : ' + seconds );

        else $('.running-time').text( seconds );

        time_left--; 

        if ( time_left == 0 ) {
          location.reload();
        }

      } , 1000);
    });
  </script>

</body>

</html>
