<!-- contact banner -->
<?php 

$data['page_banner_title'] = 'Terms and Condition';
$this->load->view('templates/page-title-header' , $data); 

?>
<!-- features -->
<section id="features-section" class="bg-secondary-color">
	<div class="container">

		<div class="row">
			<div class="col-12 col-lg-10 col-sm-12 py-60 text-white">

				<h2 class="banner-headline"><span class="text-highlights">1. Terms</span></h2>
				<p class="pt-3">By getting to the site at Coinsolb.com, you are consenting to be bound by these terms of administration, every appropriate law, and guidelines, and concur that you are answerable for consistence with any relevant neighborhood laws. On the off chance that you don't concur with any of these terms, you are denied from utilizing or getting to this site. The materials contained in this site are ensured by appropriate copyright and trademark law.</p>

				<h2 class="banner-headline mt-5"><span class="text-highlights">2. Terms of Service</span></h2>
				<p class="pt-3">1. You should not utilize Coinsolb.com for any unlawful purposes.</p>
				<p class="pt-2">2. You should not access or generally assault Coinsolb.com or Coinsolb.com's servers.</p>
				<p class="pt-2">3. All maltreatment to Coinsolb or Coinsolb' servers will bring the permanent account to disable.</p>
				<p class="pt-2">4. Coinsolb.com keep the privilege to end your record whenever under any conditions.</p>
				<p class="pt-2">5. On the off chance that Coinsolb.com suspects altering or some other deceitful conduct in the referral system, we keep the right to end your record with no notice.</p>
				<p class="pt-2">6. We are not answerable for harm to you, your servers, your clients or your clients' equipment caused legitimately or by implication by Coinsolb.com.</p>
				<p class="pt-2">7. You may not utilize Coinsolb.com on gadgets that you do not have consent to utilize. On the off chance that suspicious action is discovered, we will send your account on permanent disable.</p>
				<p class="pt-2">8. Self-referrals, span referrals, and dummy emails are restricted in Coinsolb.com.</p>
				<p class="pt-2">9. Multiple accounts owned by the same user in Coinsolb.com are not allowed.</p>

				<h2 class="banner-headline mt-5"><span class="text-highlights">3 . Limitations</span></h2>
				<p class="pt-3">In no occasion will Coinsolb or its providers be subject for any harms (including, without restriction, harms for loss of information or benefit, or because of business interference) emerging out of the utilization or powerlessness to utilize the materials on Coinsolb' site, regardless of whether Coinsolb or a Coinsolb approved person has been advised orally or recorded as a hard copy of the plausibility of such harm. Since certain jurisdiction doesn't permit constraints on inferred guarantees, or restrictions of obligation for important or accidental harms, these confinements may not concern you.</p>

				<h2 class="banner-headline mt-5"><span class="text-highlights">4. Accuracy of materials</span></h2>
				<p class="pt-3">The materials showing up on Coinsolb's site could incorporate technical, typographical, or photographic fault. Coinsolb doesn't warrant that any of the materials on its site are precise, finished or current. Coinsolb may make changes to the materials contained on its site whenever without notification. In any way, Coinsolb doesn't make any responsibility to refresh the materials.</p>

				<h2 class="banner-headline mt-5"><span class="text-highlights">5. Links</span></h2>
				<p class="pt-3">Coinsolb has not looked into the majority of the destinations connected to its site and isn't responsible for the substance of any such connected site. The incorporation of any connection doesn't infer underwriting by Coinsolb of the site. Utilization of any such connected site is at the client's own hazard.</p>
				

				<h2 class="banner-headline mt-5"><span class="text-highlights">5. Modifications</span></h2>
				<p class="pt-3">Coinsolb may modify these terms of administration for its site whenever without notification. By utilizing this site you are consenting to be bound by the then present adaptation of these terms of administration.</p>
			
			</div>

		</div>
	</div>
</section>


<?php if( !$this->ion_auth->logged_in()) { $this->load->view('templates/users-count'); } ?>


