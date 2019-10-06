

  <!-- Footer -->
  <footer class="bg-footer-color pt-60 pb-30">
    <div class="container">
      <div class="row">

        <div class="col-12 col-lg-4 col-md-6 pr-5 pb-5">
          <a href="/"><img class="footer-logo" src="<?php echo base_url(); ?>assets/images/300ppi/logo.png"/></a>
          <p class="mt-4 text-white">Struggling with math? Improve your math skills while having fun. Learn while playing games.</p>
        </div>

        <div class="col-12 col-lg-2 col-md-2 pb-5">
          <h6 class="font-weight-bold text-footer-header">Links</h6>
          <ul class="footer-links mt-4">
            <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
            <li><a href="<?php echo base_url('faq'); ?>">FAQ's</a></li>
            <li><a href="<?php echo base_url('discussions'); ?>">Discussions</a></li>
            <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-12 col-lg-3 col-md-2 pb-5">
          <h6 class="font-weight-bold text-footer-header mb-4">Contacts</h6>
          <a class="text-white footer-contacts" href="mailto:coinsolbinfo@gmail.com">coinsolbinfo@gmail.com</a>
        </div>

        <div class="col-12 col-lg-3 pb-5">
          <h6 class="font-weight-bold text-footer-header mb-4">Follow Us</h6>
          <div class="fb-like text-white" data-href="https://www.facebook.com/coinsolb" data-width="200" data-layout="standard" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>

        </div>

      </div>
      <hr class="footer-divider mt-5">

      <div class="row">
        <div class="col-12 col-lg-6 text-left">
          <p class="text-white">© 2019 Coinsolb &nbsp;&nbsp; | &nbsp;&nbsp; All Rights Reserved</p>
        </div>
        <div class="col-12 col-lg-6 text-right">
          <p class="text-white"><a href="<?php echo base_url('terms-conditions'); ?>" class="footer-contacts">Terms & Conditions</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="" class="footer-contacts">Privacy</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="" class="footer-contacts">Cookies</a></p>
        </div>
      </div>
    </div>
  </footer>

  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/data-tables/datatables.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  
  <!-- Load custom javascripts -->
  <script src="<?php echo base_url(); ?>assets/custom.js"></script>


  <!-- Load game -->
  <?php if (isset($page) && ($page == 'play' || $page == 'choose') ) { ?>
  <script src="<?php echo base_url(); ?>assets/game_library/app.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){ 
      var time_left = <?php echo (isset($replay_time_left)) ? 3600 - $replay_time_left : 0; ?>;
      var minutes, seconds;
      var time_run = setInterval ( function () { 
        minutes = Math.floor( time_left / 60 );
        seconds = time_left - (minutes*60);
        
        if ( minutes > 0 ) { 
          if ( seconds < 10 ) seconds = '0' + seconds;
          if ( minutes < 10 ) minutes = '0' + minutes;
          $('.running-time').text( minutes + ' : ' + seconds);
        }

        else { 
          $('.running-time').text( seconds ); 
          $('.time-type').text('Seconds');
        }

        time_left--; 

        if ( time_left == 0 ) {

          location.href = 'choose';

        }

      } , 1000);
    });
  </script>
  <?php } ?>


<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</body>

</html>
