				<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">

					<li class="nav-item">
						<a class="nav-link px-2 ml-0 mr-3 rounded-100 dashboard-tabs <?php echo (isset($page) && $page == 'dashboard')? 'active' : '';?>" href="<?php echo base_url('dashboard'); ?>" >Account</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 rounded-100 dashboard-tabs <?php echo (isset($page) && $page == 'stats')? 'active' : '';?>" href="<?php echo base_url('stats'); ?>">Earning Stats</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 rounded-100 dashboard-tabs <?php echo (isset($page) && $page == 'points-history')? 'active' : '';?>" href="<?php echo base_url('points'); ?>">Points History</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mx-3 rounded-100 dashboard-tabs <?php echo (isset($page) && $page == 'referrals')? 'active' : '';?>" href="<?php echo base_url('referrals'); ?>">Referrals</a>
					</li>

					<li class="nav-item">
						<a class="nav-link px-2 mr-0 ml-3 rounded-100 dashboard-tabs <?php echo (isset($page) && $page == 'withdraw')? 'active' : '';?>" href="<?php echo base_url('withdraw'); ?>">Withdraw</a>
					</li>

				</ul>