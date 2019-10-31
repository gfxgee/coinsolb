<section id="administrator" class="bg-main-color">
	<div class="container">
		
		<h1 class="text-white pt-4"><a href="<?php echo base_url('administrator'); ?>" class="link-primary">Back to Dashboard</a></h1>

<!-- 		<div class="row py-4 ">
			
				
			<div class="pb-3 col-lg-2 col-sm-6 col-6 text-white">
				<p class="card-title m-0">Users</p>
				<h2 class="fs-50 card-text admin-user-count"></h2>		
			</div>


			<div class="pb-3 col-lg-2 col-sm-6 col-6 text-white">
				<p class="card-title m-0">Withdrawals</p>
				<h2 class="fs-50 card-text"></h2>		
			</div>

			<div class="col-lg-3 col-sm-6 col-6 text-white">
				<p class="card-title m-0">Games Played Today</p>
				<h2 class="fs-50 card-text admin-games-count mb-0"></h2>
				<div class="dropdown-divider"></div>
				<p class="m-0">Total Games Played</p>
				<h4 class="text-highlights games_played_count"><?php echo $games_played_count; ?></h4>
			</div>

			<div class="col-lg-5 col-md-6 col-sm-6 p-0 m-0 text-right" >
				<h2 class="fs-50 text-highlights m-0">$<span class="get_total_users_earned"></span></h2>
				<p class="text-white m-0">Total Earned from Users</p>
                <div class="dropdown-divider"></div>
				<p class="text-white m-0">Total Amount Payable</p>
				<h4 class="text-highlights">$<span class="get_total_payable"></span></h4>
			</div>

		</div> -->
	
		<div class="row bg-secondary-color p-3 mb-5">
			<div class="col-sm-12 pb-5 pt-4">
				
				<h1 class="text-white">User Details</h1>
				

				<div class="row pt-4 mb-4">
					<div class="col-lg-4 text-white">
						<p class=" m-0">Full Name</p>
						<h3 class="m-0 text-highlights"><?php echo $user_data->first_name.' '.$user_data->last_name; ?></h3>
						<a href="<?php echo base_url('auth/edit_user/'). $user_data->id; ?>" class="link-primary">Edit User</a>
					</div>

					<div class="col-lg-4 text-white">
						<p class=" m-0">Email</p>
						<h3 class="m-0 text-highlights"><?php echo $user_data->email; ?></h3>
					</div>

					<div class="col-lg-4 text-white text-right">
						<h2 class="m-0 text-highlights">$<?php echo $current_earnings_left; ?></h2>
						<p class=" m-0">Current Earnings</p>
					</div>

				</div>


				
				<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link m-2 rounded-100 dashboard-tabs active" id="user-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Points</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link m-2 rounded-100 dashboard-tabs" id="withdrawal-tab" data-toggle="tab" href="#withdrawal" role="tab" aria-controls="withdrawal" aria-selected="false">Withdrawals</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link m-2 rounded-100 dashboard-tabs" id="top-user-tab" data-toggle="tab" href="#top-users" role="tab" aria-controls="top-users" aria-selected="false">Referrals</a>
				  </li>
				</ul>


				<div class="tab-content text-white mt-4" id="myTabContent">
				  <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="user-tab">
					<table id="points-table" class="table table-borderless data-table-tables text-white display" style="width:100%">
					    <thead>
					        <tr>
					            <th>Date</th>
					            <th>Score</th>
					            <th>Origin</th>
					        </tr>
					    </thead>
					    <tfoot>
					        <tr>
					        </tr>
					    </tfoot>
					</table>
					
				  </div>
				  <div class="tab-pane fade" id="withdrawal" role="tabpanel" aria-labelledby="withdrawal-tab">
					
					<table id="withdrawal-table" class="table table-borderless data-table-tables text-white display" style="width:100%">
					    <thead>
					        <tr>
					            <th>Date</th>
					            <th>Type of Payment</th>
					            <th>Amount</th>
					            <th>Status</th>
					        </tr>
					    </thead>
					    <tfoot>
					        <tr>
					        </tr>
					    </tfoot>
					</table>

				  </div>
				  <div class="tab-pane fade" id="top-users" role="tabpanel" aria-labelledby="top-user-tab">
				  	<table id="referral-table" class="table table-borderless data-table-tables text-white display" style="width:100%">
					    <thead>
					        <tr>
					            <th>Name</th>
					            <th>Email</th>
					            <th>Date</th>
					            <th>Status</th>
					        </tr>
					    </thead>
					    <tfoot>
					        <tr>
					        </tr>
					    </tfoot>
					</table>
				  </div>
				</div>

			</div>
		</div>
	</div>
</section>


<script>

$(document).ready(function(){

	$('#points-table').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('coin_solve/getPointsLists/').$user_data->id; ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [],
            "orderable": false
        }]
    });

	$('#withdrawal-table').DataTable({
	        // Processing indicator
	        "processing": true,
	        // DataTables server-side processing mode
	        "serverSide": true,
	        // Initial no order.
	        "order": [],
	        // Load data from an Ajax source
	        "ajax": {
	            "url": "<?php echo base_url('coin_solve/getPlayerWithdrawalsLists/').$user_data->id; ?>",
	            "type": "POST"
	        },
	        //Set column definition initialisation properties
	        "columnDefs": [{ 
	            "targets": [],
	            "orderable": false
	        }]
	    });

	$('#referral-table').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('coin_solve/getReferralLists/').$user_data->id; ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [],
            "orderable": false
        }]
    });

 //    setInterval(function(){
	// 	$.get('<?php echo base_url(); ?>/coin_solve/administrator/realtime' , function(data){
	//     	$('.admin-games-count').text(data.games_played_count_today);
	//     	$('.admin-user-count').text(data.user_count);
	//     	$('.get_total_users_earned').text(data.get_total_users_earned/10000);
	//     	$('.all_time_game_played').text(data.all_time_game_played);
	//     	$('.games_played_count').text(data.games_played_count);
	//     	$('.get_total_payable').text(data.get_total_payable/10000);
	    	
	//     } , 'json');
	// } , 1000);


});
</script>