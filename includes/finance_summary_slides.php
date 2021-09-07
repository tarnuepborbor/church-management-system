<!-- <div class="col-md-3">
	<div class="card-body border shadow-sm text-center" style="border-radius: 25px">
		<img src="imgs/1.jpg" class="img-responsive img-fluid w-100 img-thumbnail">
		<button class="btn btn-outline-primary mt-2 bgn-block" data-toggle="modal" data-target="#add_users_form">Add User</button>
	</div>
</div>
<div class="col-md-3">
	<div class="card-body border shadow-sm text-center" style="border-radius: 25px">
		<img src="imgs/2.jpg" class="img-responsive img-fluid w-100 img-thumbnail">
		<button class="btn btn-outline-primary mt-2 bgn-block" >Add Member</button>
	</div>
</div> -->

<div class="container">
	<div class="row">
		<div class="col-md-3 mb-md-2">
	<div class="row row-eq-height shadow-sm text-center" style="border-radius: 20px">
		<div class="col-12 ">
			<p class="lead lead mb-1"><small>Total USD Incom</small></p>
			<h3 class="text-primary">
				<?php 
				include_once('includes/model.php');
				$pdo = new Query();
				echo $pdo->sum_total_usd();
				?>
				<span style="font-size:12px">USD</span></h3>
			</div>
		</div>
	</div>


	<div class="col-md-3 mb-md-2">
		<div class="row row-eq-height  shadow-sm text-center" style="border-radius: 20px">
			<div class="col-12 ">
				<p class="lead lead mb-1"><small>Total LRD Incom</small></p>
				<h3 class="text-primary">
					<?php 
					include_once('includes/model.php');
					$pdo = new Query();
					echo $pdo->sum_total_lrd();
					?>
					<span style="font-size:12px">LRD</span></h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-md-2 shadow-sm text-center" style="border-radius: 20px">
			<div class="col-12 ">
				<p class="lead lead mb-1"><small>USD Expenditure</small></p>
				<h3 class="text-primary">
					<?php 
					include_once('includes/model.php');
					$pdo = new Query();
					echo $pdo->sum_total_usd_expenditure();
					?>
					<span style="font-size:12px">USD</span></h3>
				</div>
			</div>


			<div class="col-md-3 mb-md-2 shadow-sm shadow-sm text-center" style="border-radius: 20px;">
				<div class="col-12 ">
					<p class="lead mb-1"><small>LRD Expenditure</small></p>
					<h3 class="text-primary">
						<?php 
						include_once('includes/model.php');
						$pdo = new Query();
						echo $pdo->sum_total_lrd_expenditure();
						?>
						<span style="font-size:12px">USD</span></h3>
					</div>
				</div>


	</div>
</div>


