
<section id="post_<?php echo $posts->post_id; ?>">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-lg-8 py-5">
				
				<small class="text-highlights text-uppercase"><?php echo $posts->post_type; ?></small>
				<h1 class="text-white m-0"><?php echo $posts->post_title; ?></h1>
				<!-- <small class="text-muted"><?php echo date("d M. Y  h:i a", strtotime($posts->post_timestamp)); ?></small> -->

				<img width="100%" src="<?php echo base_url(); ?>/assets/images/image-temp.jpg" alt="" class="mt-4" />
				
				<div class="mt-4 text-white"><?php echo $posts->post_content; ?></div>

			</div>

			<div class="col-lg-4 pt-5 pl-60">
				<h5 class="text-center px-5 py-3 bg-highlights text-white text-uppercase">Recent Posts</h5>
				<ul class="recent_posts p-0">
					<?php foreach($recent_posts as $recent_post) { ?>

					<li class="mt-2">
						
						<a href="<?php echo base_url('discussions/').$recent_post->post_slug; ?>" class="mt-0 text-white mb-0"><h6 class="m-0"><span class="text-highlights text-uppercase"><?php echo $recent_post->post_type; ?>:</span> <?php echo $recent_post->post_title; ?></h6></a>

					</li>

					<?php } ?>
				</ul>

			</div>

		</div>

	</div>


</section>

