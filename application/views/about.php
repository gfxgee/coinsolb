<?php 

$data['page_banner_title'] = 'About Us';
$this->load->view('templates/page-title-header' , $data); 

?>

<!-- about -->
<section id="about-details-section" class="bg-secondary-color">
	<div class="container">
		<div class="row text-left">
			<div class="col col-lg-6 col-sm-12 text-white py-60">
				<p class="pt-3">Mathematics is perhaps one of the dreaded subjects in school. It’s not a secret that a considerable percentage of the population hates math. Some consider it boring while others find the principles difficult to comprehend.</p>

				<p class="pt-3">For school teachers and tutors, making students become interested in math can be challenging. But it does not mean there is no way to catch the student’s attention and make them love the subject. There are now many tools available to help children learn while having fun.</p>

				<p class="pt-3">Coinsolb makes math learning more exciting by turning it into a game anyone can play using their personal computer or mobile devices. Children can improve their addition, subtraction, multiplication, and division skills while playing games online. Plus, they can accumulate points as they play and receive rewards!</p>

			</div>
	
			<div class="col-12 col-lg-6 col-sm-12 d-flex justify-content-center align-items-center py-60">
				<img src="<?php echo base_url(); ?>assets/images/coinsolb-logo-large.png" alt="">
			</div>

		</div>
	</div>
</section>


<!-- features -->
<section id="features-section" class="bg-main-color">
	<div class="container py-60">

		<div class="row">
			<div class="col-12 col-lg-9 col-sm-12 text-white text-left">
				<h2 class="banner-headline"><span class="text-highlights">How it works</span></h2>
				<p class="pt-3">The steps are simple. Sign up and start solving math problems. You can select Normal mode which shows addition and subtraction problems or Hard mode for multiplication and division problems.</p>
			</div>
		</div>
	</div>
</section>



<!-- Accomplishment section -->
<section id="accomplish-section" class="bg-secondary-color">
	<div class="container">
		<div class="row text-center">
			<div class="col col-lg-10 col-sm-12 text-white pt-60 pb-30 m-auto">
				<h2 class="banner-headline">Our Accomplishments and<br><span class="text-highlights">What they say about us</span></h2>
				<p class="pt-3">Coinsolb has helped thousands of people learn to love math. Don’t just take our word for it. Trust the numbers and try it for yourself.</p>

				<div class="row">

					<div class="col col-lg-4 col-md-4 col-sm-6 m-auto py-20">
						<h6>Registered Users</h6>
						<h2 class="text-highlights fs-50 mt-3"><?php echo (isset($user_count)) ? number_format($user_count) : ''; ?></h2>
					</div>

					<div class="col col-lg-4 col-md-4 col-sm-6 m-auto py-20">
						<h6>Total problems solved</h6>
						<h2 class="text-highlights fs-50 mt-3"><?php echo (isset($total_problems_solved)) ? number_format($total_problems_solved) : ''; ?></h2>
					</div>

					<div class="col col-lg-4 col-md-4 col-sm-6 m-auto py-20">
						<h6>Total Paid ($)</h6>
						<h2 class="text-highlights fs-50 mt-3">$<?php echo (isset($get_total_payable)) ? number_format(($get_total_payable/10000)+200, 2) : ''; ?></h2>
					</div>

				</div>

			</div>
		</div>
		<hr class="features-divider"/>
		<div class="row">

			<div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-30 pb-60">
				<p class="fs-70 text-highlights p-0 m-0"><i class="fas fa-quote-left"></i></p>
				<p class="font-italic text-white fs-20 ">This app is really recommended for anyone who want's to improve their Math skills and stay motivated in their studies.</p>
				<h6 class="text-white mt-4 fs-20">Jerry Castillo</h6>
			</div>


			<div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-30 pb-60">
				<p class="fs-70 text-highlights p-0 m-0"><i class="fas fa-quote-left"></i></p>
				<p class="font-italic text-white fs-20 ">I like their point system and rewards, it keeps me motivated to use Coinsolb always since I can use it on mobile also.</p>
				<h6 class="text-white mt-4 fs-20">Juan Mabini</h6>
			</div>

		</div>
	</div>
</section>
