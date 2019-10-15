<!-- banner -->
<section id="banner-section" class="bg-main-color d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6 col-sm-12 text-white  py-100">
				<h1 class="banner-headline fs-60">
					<span class="text-highlights">Improve</span> your <br>
					<span class="text-highlights">Math skills</span> with Coinsolb.
				</h1>
				<p class="fs-22 my-3">Struggling with math? Improve your math skills while having fun. Learn while playing games.</p>
				<a href="<?php echo (!$this->ion_auth->logged_in()) ? base_url('register') : base_url('play') ; ?>" class="btn mt-3 text-custom-secondary px-5 py-2 fs-22 rounded-100 banner-button">Get Started</a>
			</div>

			<div class="col-12 col-lg-6 col-sm-12 d-none d-sm-block py-100">
				<img class="banner-image" src="<?php echo base_url(); ?>assets/images/banner-image.png" alt="Coin Solb Banner Image" width="100%"/>
			</div>

		</div>
	</div>
</section>

<!-- about -->
<section id="about-section" class="bg-secondary-color">
	<div class="container">
		<div class="row text-center">
			<div class="col col-lg-10 col-sm-12 text-white py-60 m-auto">
				<h2 class="banner-headline">About Us</h2>
				<p class="pt-3">Math is perhaps one of the dreaded subjects in school. It’s not a secret that a considerable percentage of the population hates math. Some consider it boring while others find the principles difficult to comprehend.</p>

				<p class="pt-3">Coinsolb makes math learning more exciting by turning it into a game anyone can play using their personal computer or mobile devices. Children can improve their addition, subtraction, multiplication, and division skills while playing games online. Plus, they can accumulate points as they play and receive rewards!</p>

				<a href="<?php echo base_url('about-us'); ?>" class="btn mt-3 text-custom-secondary px-5 py-2 fs-22 rounded-100 banner-button">Read More</a>

			</div>
		</div>
	</div>
</section>


<!-- features -->
<section id="features-section" class="bg-main-color">
	<div class="container py-60">

		<div class="row">
			<div class="col col-lg-10 col-sm-12 text-white">
				<h2 class="banner-headline"><span class="text-highlights">Features</span> you're gonna love</h2>
				<p class="pt-3">There are many things to love about Coinsolb. You will not only learn how to add, subtract, multiply and divide, you will also earn points and rewards as you play!</p>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-12 col-lg-6 col-sm-12">

				<div class="card bg-secondary-color text-white rounded-20 no-border p-2">
					<div class="card-body">
						<h5 class="card-title"><span class="text-highlights mr-2"><i class="fas fa-plus"></i> <i class="fas fa-minus"></i></span> Normal Mode (Addition & Subtraction)</h5>
						<p class="card-text">80 seconds of Playing time and will refresh after 1 hour. You will earn 1 point for every correct answer. <a class="link-primary" href="<?php echo ($this->ion_auth->logged_in())? base_url('play?type=normal') : base_url('login'); ?>">Play Now!</a></p>
					</div>
				</div>

				<div class="card bg-secondary-color text-white rounded-20 no-border p-2 mt-4">
					<div class="card-body">
						<h5 class="card-title"><span class="text-highlights mr-2"><i class="fas fa-divide"></i> <i class="fas fa-times"></i></span> Hard Mode (Multiplication & Division)</h5>
						<p class="card-text">60 seconds of Playing time and will refresh after 1 hour. You will earn 2 points for every correct answer. <a class="link-primary" href="<?php echo ($this->ion_auth->logged_in())? base_url('play?type=hard') : base_url('login'); ?>">Play Now!</a></p>
					</div>
				</div>

				<div class="card bg-secondary-color text-white rounded-20 no-border p-2 mt-4">
					<div class="card-body">
						<h5 class="card-title"><span class="text-highlights mr-2"><i class="fas fa-users"></i></span> Referral Commision and Bonus</h5>
						<p class="card-text"> You’ll be given referral points everytime the user successfully sign up with your referral code and play 5 times in our game. <a class="link-primary" href="<?php echo base_url('referrals'); ?>">Invite now!</a></p>
					</div>
				</div>

				<div class="card bg-secondary-color text-white rounded-20 no-border p-2 mt-4">
					<div class="card-body">
						<h5 class="card-title"><span class="text-highlights mr-2"><i class="fas fa-gamepad"></i> </span> Practice Mode</h5>
						<p class="card-text">Here you can practice before or after playing the game to get more efficient scores and earn higher points <a class="link-primary" href="<?php echo base_url('practice'); ?>">Practice now!</a></p>
					</div>
				</div>

			</div>

			<div class="col-12 col-lg-6 col-sm-12 d-flex justify-content-center">
				<img class="features-image" src="<?php echo base_url(); ?>assets/images/features-image.png" alt="Coin Solb Features Image"/>
			</div>

		</div>
	</div>
</section>


<!-- Accomplishment section -->
<section id="accomplish-section" class="bg-secondary-color">
	<div class="container">
		<div class="row text-center">
			<div class="col-12 col-lg-10 col-sm-12 text-white pt-60 pb-30 m-auto">
				<h2 class="banner-headline px-3">Our Accomplishments and<br><span class="text-highlights">What they say about us</span></h2>
				<p class="pt-3">Coinsolb has helped thousands of people learn to love math. Don’t just take our word for it. Trust the numbers and try it for yourself.</p>

				<div class="row">

					<div class="col col-lg-4 col-md-4 col-sm-6 m-auto py-20">
						<h6>Registered Users</h6>
						<h2 class="text-highlights fs-50 mt-3">9,136</h2>
					</div>

					<div class="col col-lg-4 col-md-4 col-sm-6 m-auto py-20">
						<h6>Total problems solved</h6>
						<h2 class="text-highlights fs-50 mt-3">95,662</h2>
					</div>

					<div class="col col-lg-4 col-md-4 col-sm-6 m-auto py-20">
						<h6>Total Paid ($)</h6>
						<h2 class="text-highlights fs-50 mt-3">136</h2>
					</div>

				</div>

			</div>
		</div>
		<hr class="features-divider"/>
		<div class="row m-auto">

			<div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-30 pb-60">
				<p class="fs-70 text-highlights p-0 m-0"><i class="fas fa-quote-left"></i></p>
				<p class="font-italic text-white fs-20 ">This app is really recommended for anyone who want's to improve their Math skills and stay motivated in their studies.</p>
				<h6 class="mt-4 fs-20 text-highlights">Jerry Castillo</h6>
			</div>


			<div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-30 pb-60">
				<p class="fs-70 text-highlights p-0 m-0"><i class="fas fa-quote-left"></i></p>
				<p class="font-italic text-white fs-20 ">I like their point system and rewards, it keeps me motivated to use Coinsolb always since I can use it on mobile also.</p>
				<h6 class="mt-4 fs-20 text-highlights">Juan Mabini</h6>
			</div>

		</div>
	</div>
</section>


<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); }?>

<?php $this->load->view('templates/faq'); ?>