<?php
session_start();

if(!isset($_SESSION['isLogin'])){
	echo "<script>window.location = 'index.php'</script>";
}

$title = "users";

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
<?php 
include("includes/add_users_form.php");

?>



<div class="container " style="height: 100vh;">
	<div class="row h-100 align-items-center">
		<div class="col-md-12 ">
			<div class="card shadow-lg">
				<?php include("includes/nav_bar.php"); ?>
				<div class="card-body p-2 shadow-lg" >
					<?php 
						include("includes/current_user_profile.php");
					?>
				</div>
				<div class="card-footer bg-white">
					<?php 
						include("includes/users_table.php");
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include('includes/membership_form.php');
include('includes/footer.php');
?>
