<!-- about banner -->
<section id="faq-page-section" class="bg-main-color d-flex align-items-center py-100">
	<div class="container">
		<div class="row">

			<div class="col col-lg-12 col-sm-12 text-white">
				<h1 class="banner-headline fs-60">Frequently Asked Questions</h1>
			</div>

		</div>
	</div>
</section>

<!-- Faqs section -->
<section id="faq-section" class="bg-main-color">
	<div class="container">
		
		<?php $this->load->view('templates/faq-contents'); ?>
		
	</div>
</section>

<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); } ?>