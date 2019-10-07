
<div class="row pb-60">		
<?php 

	$questions = array (
		'1'	=> array ( 
			'faq_title' 	=> 'How many points will I receive upon signup?',
			'faq_content'	=> 'You not be recieving points upon sign up but in the other hand it is completely free to use our application and improve your math skills' ),
		'2'	=> array (
			'faq_title' 	=> 'How does referral works?',
			'faq_content'	=> 'Upon signing up your account on Coinsolb the system will automatically generates a code (which will serve as your referral code) that you can use to share the our application to other and earn addition extra points. <a href="'.base_url('discussion').'" class="link-primary"> Continue here.</a>' ),
	 );

 	foreach ($questions as $question => $value ) {
 ?>

			<div class="col-12 col-lg-6 col-sm-12 text-white mt-5">

				<div class="accordion" id="accordionExample">
				  <div class="card rounded-20 bg-secondary-color text-white no-border p-3">
				    <div class="card-header rounded-top-20 no-border bg-transparent" id="headingOne">
				      <h5 class="mb-0">
				        <a class="text-white text-right toggle-custom-button" data-toggle="collapse" data-target="#collapse<?php echo $question; ?>" aria-expanded="true" aria-controls="collapse<?php echo $question; ?>">
				      	<?php echo $value['faq_title']; ?>
				         <span class="text-yellow-highlights mt-1 float-right"><i class="fas fa-plus"></i> </span>
				        </a>
				      </h5>
				    </div>

				    <div id="collapse<?php echo $question; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body">
				        <p class="m-0 fs-14">
				      	<?php echo $value['faq_content']; ?></p>
				      </div>
				    </div>
				  </div>

				</div>
			</div>

<?php } ?>


		</div>