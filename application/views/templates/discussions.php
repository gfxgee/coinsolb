<!-- Faqs section -->
<section id="faq-section" class="bg-main-color">
	<div class="container">
		
		<div class="col-12 col-lg-12 col-sm-12 text-white pt-5 pb-3">
			<h2 class="banner-headline">Discussions</h2>
		</div>

		<div class="row pb-3">
		<?php foreach ($recent_posts as $post) { ?>

			<div class="col-12 col-lg-4 col-md-4 col-sm-12 text-white my-3">
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
	
			
		<div class="col text-center">
			<a href="<?php echo base_url('discussions'); ?>" class="btn mb-5 text-custom-secondary px-5 py-2 fs-22 rounded-100 banner-button">More Discussions</a>
		</div>
	</div>

</section>
