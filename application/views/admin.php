<section id="administrator" class="bg-main-color">
	<div class="container">
		
		<h1 class="text-white pt-5">Administrator</h1>

		<div class="row py-5">
			
			<div class="col-lg-4">
			    <div class="card">
					<div class="card-body">
						<h5 class="card-title">Users</h5>
						<p class="card-text fs-50"><?php echo $user_count; ?></p>
						<a href="#" class="btn btn-primary">See all users</a>
					</div>
				</div>				
			</div>

			<div class="col-lg-4">
			    <div class="card">
					<div class="card-body">
						<h5 class="card-title">Withdrawals</h5>
						<p class="card-text fs-50"><?php echo $withdrawal_count; ?></p>
						<a href="#" class="btn btn-primary">See all withdrawals</a>
					</div>
				</div>				
			</div>

			<div class="col-lg-4">
			    <div class="card">
					<div class="card-body">
						<h5 class="card-title">Total Games Played</h5>
						<p class="card-text fs-50"><?php echo $games_played_count_today; ?></p>
						<a href="#" class="btn btn-primary">See all games</a>
					</div>
				</div>				
			</div>


		</div>


		<div class="row pb-5">

			<div class="col-lg-4">
			    <div class="card">
					<div class="card-body">
						<h5 class="card-title">Total Earned from Users</h5>
						<p class="card-text fs-50">$<?php echo $get_total_users_earned/10000; ?></p>
						<a href="#" class="btn btn-primary">See all games</a>
					</div>
				</div>				
			</div>
		</div>

		<table id="memListTable" class="display" style="width:100%">
		    <thead>
		        <tr>
		            <th>First name</th>
		            <th>Last name</th>
		            <th>Email</th>
		            <th>Total Score</th>
		            <th>User Id</th>
		        </tr>
		    </thead>
		    <tfoot>
		        <tr>
		        </tr>
		    </tfoot>
		</table>
		
	</div>
</section>


