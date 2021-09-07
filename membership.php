<?php

session_start();

if(!isset($_SESSION['isLogin'])){
	echo "<script>window.location = 'index.php'</script>";
}


$title = "members";

include 'includes/header.php';

?>

<div class="modal fade" id="history_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body history_table">
				...
			</div>
		</div>
	</div>
</div>


<!-- user profile modal -->
<div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-body profile_details">
				...
			</div>
			<div class="modal-footer ">
				<button class="btn btn-block btn-outline-primary" onclick="alert('this function is not available')">Edit User</button>
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



<div class="container-fluid  " style="height: 100vh;">
	<div class="row h-100 align-items-center">
		<div class="col-md-12 ">
			<div class="card shadow-lg">
				<?php include("includes/nav_bar.php"); ?>
				<div class="card-body" >

					<div class="row">
						<!-- include the summary slides -->
						<?php include("includes/membership_summary_slide.php"); ?>
					</div>

					<div class="card-body  mt-4 shadow-lg " style="border-radius: 25px">
						<?php 
						if(isset($_GET['message'])){
							?>
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<p class="lead"> <?php echo $_GET['message'] ?></p>
							</div>
							<?php 
						}
						?>
						<div class="row mt-4 align-items-center">
							<div class="col-md-9 "><h3 class="text-primary">All Members Table</h3></div>
							<div class="col-md-3">
								<button class="btn btn-outline-primary shadow-sm btn-block btn-sm mb-2" data-toggle="modal" data-target="#membership_model" style="border-radius: 30px">Add New Member</button>
							</div>
							<hr>
						</div>
						<div class="table-responsive" style="width: 100%; ">
							<!-- include the member table here --> 
							<?php include("includes/member_table.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include('includes/membership_form.php');
include('includes/footer.php');
?>
