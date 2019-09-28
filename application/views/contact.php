<!-- contact banner -->
<section id="contact-us-section" class="bg-main-color d-flex align-items-center py-100">
	<div class="container">
		<div class="row">

			<div class="col col-lg-6 col-sm-12 text-white">
				<h1 class="banner-headline fs-60">Contact Us</h1>
			</div>

		</div>
	</div>
</section>

<!-- contact details -->
<section id="contact-details-section" class="bg-main-color">
	<div class="container">

		<div class="row pb-100">
			<div class="col-12 col-lg-6 col-sm-12 py-60 text-white">
				<h2 class="banner-headline"><span class="text-highlights">Questions?</span></h2>
				<p class="pt-3">Drop us a line, and we'll get back to you shortly.</p>
				<a href="mailto:coinsolbinfo@gmail.com" class="btn mt-3 text-custom-secondary px-5 py-2 fs-22 rounded-100 banner-button">coinsolbinfo@gmail.com</a>
			</div>
			<div class="col-12 col-lg-6 col-sm-12 py-60 text-white">
				<h2 class="banner-headline"><span class="text-highlights">Be Updated!</span></h2>
				<p class="pt-3">For more updates, Like and follow us on Facebook.</p>
				<a href="#" class="btn mt-3 text-custom-secondary px-5 py-2 fs-22 rounded-100 banner-button"><i class="fab fa-facebook-square"></i> Coinsolb</a>
			</div>

		</div>
	</div>
</section>


<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); } ?>