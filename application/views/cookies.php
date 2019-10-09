<!-- contact banner -->
<?php 

$data['page_banner_title'] = 'Coinsolb Cookies Policy';
$this->load->view('templates/page-title-header' , $data); 

?>
<!-- features -->
<section id="features-section" class="bg-secondary-color">
	<div class="container">

		<div class="row">
			<div class="col-12 col-lg-10 col-sm-12 py-60 text-white">

				<p class="pt-3">This is the Cookie Policy for Coinsolb, accessible from https://coinsolb.com.</p>

				<h2 class="banner-headline mt-5 text-highlights">What Are Cookies</h2>

				<p class="pt-3">As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. This page describes what information they gather, how we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies from being stored however this may downgrade or 'break' certain elements of the sites functionality.</p>

				<p class="pt-3">For more general information on cookies see the Wikipedia article on HTTP Cookies.

				<h2 class="banner-headline mt-5 text-highlights">How We Use Cookies</h2>

				<p class="pt-3">We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.</p>

				<h2 class="banner-headline mt-5 text-highlights">Disabling Cookies</h2>

				<p class="pt-3">You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of the this site. Therefore it is recommended that you do not disable cookies.</p>

				<h2 class="banner-headline mt-5 text-highlights">The Cookies We Set</h2>

				<h5 class="pt-3">Account related cookies</h5>

				<p class="pt-3">If you create an account with us then we will use cookies for the management of the signup process and general administration. These cookies will usually be deleted when you log out however in some cases they may remain afterwards to remember your site preferences when logged out.</p>

				<h5 class="pt-3">Login related cookies</h5>

				<p class="pt-3">We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access restricted features and areas when logged in.</p>

				<h5 class="pt-3">Site preferences cookies</h5>

				<p class="pt-3">In order to provide you with a great experience on this site we provide the functionality to set your preferences for how this site runs when you use it. In order to remember your preferences we need to set cookies so that this information can be called whenever you interact with a page is affected by your preferences.</p>

				<h2 class="banner-headline mt-5 text-highlights">Third Party Cookies</h2>

				<p class="pt-3">In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you might encounter through this site.</p>
				<ul>
					<li class="pt-3 pl-3">
						<p>This site uses Google Analytics which is one of the most widespread and trusted analytics solution on the web for helping us to understand how you use the site and ways that we can improve your experience. These cookies may track things such as how long you spend on the site and the pages that you visit so we can continue to produce engaging content.</p>

						<p>For more information on Google Analytics cookies, see the official Google Analytics page.</p>
					</li>

					<li class="pt-3 pl-3">
						<p>The Google AdSense service we use to serve advertising uses a DoubleClick cookie to serve more relevant ads across the web and limit the number of times that a given ad is shown to you.</p>
						<p>For more information on Google AdSense see the official Google AdSense privacy FAQ.</p>
					</li>

					<li class="pt-3 pl-3">We also use social media buttons and/or plugins on this site that allow you to connect with your social network in various ways. For these to work the following social media sites including; {List the social networks whose features you have integrated with your site?:12}, will set cookies through our site which may be used to enhance your profile on their site or contribute to the data they hold for various purposes outlined in their respective privacy policies.</li>

				</ul>
				<p class="pt-3">However if you are still looking for more information then you can contact us through one of our preferred contact methods:</p>
				<p class="pt-3">Email: coinsolbinfo@gmail.com</p>


			</div>

		</div>
	</div>
</section>


<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); } ?>


