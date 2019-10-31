<?php 

$data['page_banner_title'] = 'Discussions';
$this->load->view('templates/page-title-header' , $data); 

?>

<section id="faq-section" class="bg-main-color">
	<div class="container">
		<div class="col-sm-12 mb-4 m-auto p-5">
				<?php $this->load->view('templates/main_ad'); ?>
			</div>			
		<div class="row my-5">
			
			<?php foreach ($posts as $post) { ?>

			<div class="col-12 col-lg-6 col-md-6 col-sm-12 text-white my-3">
				<div class="card rounded-20 bg-secondary-color text-white no-border p-3">
					<div class="card-header rounded-top-20 no-border bg-transparent" id="headingOne">
						<h5 class="mb-0"><a class="discussions-post-link text-white fs-20" href="<?php echo base_url('discussions/').$post->post_slug; ?>"><span class="text-highlights text-uppercase"><?php echo $post->post_type; ?>:</span> <?php echo $post->post_title; ?></a></h5>
					</div>

					<div class="card-body">
						<p class="m-0 fs-14"><?php echo mb_strimwidth($post->post_content , 0 , 200 , ' . . .'); ?></p>
					</div>
					
					<div class="card-footer bg-transparent no-border">
						<a href="<?php echo base_url('discussions/').$post->post_slug; ?>" class="link-primary">Read more</a>
					</div>

				</div>
			</div>


			<?php } ?>
			
			
		</div>

	</div>

</section>

<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); } ?>
