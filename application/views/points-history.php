<section class="bg-main-color " id="dashboard">
	<div class="container pb-5">

		<div class="row">

			<?php $this->load->view('templates/dashboard-main-menu'); ?>

		</div>

		<div class="row bg-secondary-color text-white">

			<div class="col-lg-12 p-4">

				<?php $this->load->view('templates/dashboard-menu'); ?>

				<div class="tab-content mt-5 pb-60" id="pills-tabContent">

					
					<div class="tab-pane fade show active" id="pills-points" role="tabpanel" aria-labelledby="pills-points-tab">
						<div class="col-lg-12 p-0 text-left">Check out your progress here by scanning through all the points you gathered and see you if you have improved and earned more points.</p>
							<div class="row p-3"> 
								<div class="col-lg-3 p-0 pt-2">
									<h6 class="text-custom-muted">Current Points</h6>
									<h2 class="pt-2"><?php echo $current_earnings_left*10000; ?></h2>
								</div>
								<div class="col-lg-3 p-0 pt-2">
									<h6 class="text-custom-muted">Total Points Earned</h6>
									<h2 class="pt-2"><?php echo $total_score; ?></h2>
								</div>
							</div>
							<div class="dropdown-divider my-4"></div>
							<h5 class="m-0 mt-2 text-highlights">History</h5>
							<div class=" my-4"></div>

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
            "url": "<?php echo base_url('coin_solve/getPointsLists/').$this->ion_auth->get_user_id(); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [],
            "orderable": false
        }]
    });
});
</script>

<?php $this->load->view('templates/faq'); ?>
