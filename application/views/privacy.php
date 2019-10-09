<!-- contact banner -->
<?php 

$data['page_banner_title'] = 'Privacy Policy';
$this->load->view('templates/page-title-header' , $data); 

?>
<!-- features -->
<section id="features-section" class="bg-secondary-color">
	<div class="container">

		<div class="row">
			<div class="col-12 col-lg-10 col-sm-12 py-60 text-white">

				<h3 class="banner-headline"><span class="text-highlights">Privacy Policy</span></h3>

				<p class="pt-3">Your Privacy is imperative to us. It is Coinsolb's strategy to regard your security with respect to any data we may gather from you over our site, https://coinsolb.com, and different locales we possess and work. </p>
				
				<p class="pt-3">We request individual data when we really need it to give assistance to you. We gather it by reasonable and legitimate methods, with your insight and assent. We likewise let you realize for what reason we're gathering it and how it will be utilized.</p>

				<p class="pt-3">We just hold gathered data for whatever length of time that is important to furnish you with your mentioned service. What information we store, we'll secure inside industrially satisfactory intends to anticipate misfortune and burglary, just as unapproved get to, revelation, replicating, use or alteration.</p>

				<p class="pt-3">Our site may have a connection to outer locales that are not worked by us. If it's not too much trouble know that we have no influence over the substance and practices of these destinations, and can't acknowledge duty or obligation for their individual protection arrangements.</p>

				<p class="pt-3">You are allowed to deny our solicitation for your own data, with the understanding that we might be not able to give you a portion of your ideal access to the site.</p>

				<p class="pt-3">Your continued utilization of our site will be viewed as an acknowledgment of our practices around protection and individual data. In the event that you have any inquiries concerning how we handle client information and individual data, don't hesitate to get in touch with us.</p>

			</div>

		</div>
	</div>
</section>


<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); } ?>


