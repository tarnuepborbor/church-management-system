<?php
session_start();

if(!isset($_SESSION['isLogin'])){
	echo "<script>window.location = 'index.php'</script>";
}

$title = "finance";

include 'includes/header.php';

?>

<div class="container-fluid  " style="height: 100vh;">
	<div class="row h-100 align-items-center">
		<div class="col-md-12 ">
			<div class="card shadow-lg pt-0">
			<?php include("includes/nav_bar.php"); ?>
				<div class="card-body" >

					<div class="row">
						<!-- include the summary slides -->
						<?php include("includes/finance_summary_slides.php"); ?>
					</div>

					<div class="card-body  mt-4 shadow-lg ">
						<div class="row mt-4 align-items-center">
							<div class="col-md-8 "><h3 class="text-primary">All Financial Payment Table</h3></div>
							<div class="col-md-4">
								<button class="btn my-btn-outline btn-block btn-lg mb-2 shadow-lg" data-toggle="modal" data-target="#financial_report_form">Generate Financial Report</button>
							</div>
							<hr>
						</div>
						<div class="table-responsive" style="width: 100%; ">
							<!-- include the payment summary table here --> 
							<?php include("includes/payment_table.php"); ?>
						</div>

						<div class="row">
							<div class="col-md-8  p-4">
								<button class="btn my-btn mt-2 shadow-lg btn-lg " data-toggle="modal" data-target="#record_income">Record Church Income</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	/* this allows you view payment form */
	$(document).on('click', '.log_payment', function(){
		var mem_id = $(this).attr('id');

		$.ajax({
			type: "POST",
			url: "includes/log_payment.php",
			data:{
				member_id: mem_id,
				another_data:1
			},
			success: function(datas){
				
				$(".payment_form").html(datas);
				$("#payment_model").modal('show');
			}
		});
	});


</script>

<!-- user profile modal -->
<div class="modal fade" id="record_income" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body profile_details">
				<?php include("includes/income_form.php"); ?>
			</div>
		</div>
	</div>
</div>


<!-- user payment model -->
<div class="modal fade" id="payment_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body payment_form">
				...
			</div>
		</div>
	</div>
</div>


<?php
include('includes/generate_financial_report_form.php');
include('includes/footer.php');
?>
