

<div class="col-md-4">
	<div class="card-body border shadow-sm text-center p-0">
		<div class="row row-eq-height text-center ">
			<div class="col-6  text-white dark-bg" style="background:linear-gradient(135deg, #dc2e45 0%,#322cf6 100%);">
				<i class="fa fa-users fa-2x mt-4" aria-hidden="true"></i>
			</div>
			<div class="col-6 ">
				<p class="lead"><small>Total Member</small></p>
				<h3 class="text-primary">
					<?php 
					include_once("includes/model.php");
					$counter = new Query();
					echo $counter->count_total_members();
					?>
				</h3>
			</div>
		</div>
	</div>
</div>

<div class="col-md-4">
	<div class="card-body border shadow-sm text-center p-0">
		<div class="row row-eq-height text-center ">
			<div class="col-6  text-white dark-bg" style="background:linear-gradient(135deg, #dc2e45 0%,#322cf6 100%);">
				<i class="fa fa-male fa-2x mt-4" aria-hidden="true"></i>
			</div>
			<div class="col-6 ">
				<p class="lead"><small>Total Male</small></p>
				<h3 class="text-primary">
					<?php 
					include_once("includes/model.php");
					$counter = new Query();
					echo $counter->count_total_males();
					?>
				</h3>
			</div>
		</div>
	</div>
</div>

<div class="col-md-4">
	<div class="card-body border shadow-sm text-center p-0" style="border-radius: 25px; overflow: hidden;">
		<div class="row row-eq-height text-center ">
			<div class="col-6  text-white" style="background:linear-gradient(135deg, #dc2e45 0%,#322cf6 100%);">
				<i class="fa fa-female fa-2x mt-4" aria-hidden="true"></i>
			</div>
			<div class="col-6 ">
				<p class="lead"><small>Total Female</small></p>
				<h3 class="text-primary">
					<?php 
					include_once("includes/model.php");
					$counter = new Query();
					echo $counter->count_total_females();
					?>
				</h3>
			</div>
		</div>
	</div>
</div>