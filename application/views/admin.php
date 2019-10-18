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
	
		<div class="dropdown-divider my-4"></div>
		
	
		<div class="row">
			<div class="col-sm-12 pb-5">
				<h3 class="text-highlights">User Data</h3>

				<table id="memListTable" class="table table-borderless data-table-tables text-white display" style="width:100%">
				    <thead>
				        <tr>
				            <th>First name</th>
				            <th>Last name</th>
				            <th>Email</th>
				            <th>Total Score</th>
				            <th>User Id</th>
				            <th>Actions</th>
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
</section>


<script>
$(document).ready(function(){
    $('#memListTable').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('coin_solve/getLists'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0 , 1 , 2 , 5],
            "orderable": false
        }]
    });
});
</script>