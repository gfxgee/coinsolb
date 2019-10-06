<?php 

$data['page_banner_title'] = 'Frequently Asked Question';
$this->load->view('templates/page-title-header' , $data); 

?>

<!-- Faqs section -->
<section id="faq-section" class="bg-main-color">
	<div class="container">
		
		<?php $this->load->view('templates/faq-contents'); ?>
		
	</div>
</section>

<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); } ?>