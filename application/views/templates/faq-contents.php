
<div class="row pb-60 pt-4">		
<?php 

	$questions = array (
		'1'	=> array ( 
			'faq_title' 	=> 'How many points will I receive upon signup?',
			'faq_content'	=> '<p>You not be recieving points upon sign up but in the other hand it is completely free to use our application and improve your math skills</p>' ),
		'2'	=> array (
			'faq_title' 	=> 'How does referral works?',
			'faq_content'	=> '<p>Upon signing up your account on Coinsolb the system will automatically generates a code (which will serve as your referral code) that you can use to share the our application to other and earn addition extra points.</p> <a href="'.base_url('discussions/how-to-use-coinsolb').'" class="link-primary fs-16"> Continue here.</a>' ),
		'3'	=> array (
			'faq_title' 	=> 'Where can I find my referral link?',
			'faq_content'	=> '<p>You can find you referral code in the dashboard and navigate to the account tab or referrals tab upon <a class="link-primary fs-16" href="'.base_url('login').'">logging in</a>.</p>' ),
		'4'	=> array (
			'faq_title' 	=> 'Is Coinsolb free of use?',
			'faq_content'	=> '<p>Yes it is absolutely free to use. We at Coinsolb wants to help out those who are needing improvements on their basic math skills.</p><a href="'.base_url('discussions/free-of-use').'" class="link-primary fs-16"> Learn more.</a>' ),
		'5'	=> array (
			'faq_title' 	=> 'Does it help my children improve math skills?',
			'faq_content'	=> '<p>Absolutely! Coinsolb developed this application as alternative way to let your kids learn math. And we choose basic math as it is one of the most effictive way to learn math.</p>' ),
		'6'	=> array (
			'faq_title' 	=> 'Do I need to practice?',
			'faq_content'	=> '<p>If you are already a great mathematician then you will find this as easy and earn great points from the game but if you are having difficulties then you can <a href="'.base_url('practice').'" class="fs-16 link-primary">practice</a> the game and improve to earn higher points.</p>' ),
		'7'	=> array (
			'faq_title' 	=> 'Where can I find my all my earn points?',
			'faq_content'	=> '<p>You can find the total of all your points in the points tab under you account dashboard but be sure to login.</p><p> Go to my <a href="'.base_url('points').'" class="fs-16 link-primary">Points Tab</a></p>' ),
		'8'	=> array (
			'faq_title' 	=> 'How many points I get on each correct answer?',
			'faq_content'	=> '<p>Upon playing you will get to choose between <a href="'.base_url('play?type=normal').'" class="fs-16 link-primary">Normal</a> or <a href="'.base_url('play?type=hard').'" class="fs-16 link-primary">Hard</a>. By playing normal mode you will get 1 points each correct answer and 2 points on hard mode.' ),
	 );

 	foreach ($questions as $question => $value ) {
 ?>

			<div class="col-12 col-lg-6 col-sm-12 text-white mt-3">

				<div class="accordion" id="accordionExample">
				  <div class="card rounded-20 bg-secondary-color text-white no-border p-3">
				    <div class="card-header rounded-top-20 no-border bg-transparent" id="headingOne">
				      <h2 class="fs-16 mb-0">
				        <a class="text-white text-right toggle-custom-button" data-toggle="collapse" data-target="#collapse<?php echo $question; ?>" aria-expanded="true" aria-controls="collapse<?php echo $question; ?>">
				      	<?php echo $value['faq_title']; ?>
				         <span class="text-yellow-highlights mt-1 float-right"><i class="fas fa-plus"></i> </span>
				        </a>
				      </h2>
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