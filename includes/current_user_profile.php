<div class="bg-white shadow-lg m-2 p-1" style="border-radius: 30px">
	<div class="row">

	<div class="col-md-12 text-right p-3 ">
		<h1 class=" text-info">Your Profile Info</h1>
		<a href="logout.php" style="border-radius: 20px" class="btn mr-4 btn-danger">Log Out of System</a>
	</div>
</div>
<div class="container">
	<div class="row align-items-center row-eq-height">
		<div class="col-md-8">
			<table class="table ">
				<tr>
					<td>User Name</td>
					<td><?php echo $_SESSION['userName'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $_SESSION['email'] ?></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><button class="btn  btn-outline-info" onclick='alert("Your Password is: <?php echo $_SESSION['password'] ?>")'>View Passord</button></td>
				</tr>
				<tr>
					<td>Account Type</td>
					<td><?php echo $_SESSION['userType'] ?></td>
				</tr>
			</table>
			<a href="update_profile.php" class="mb-4 btn my-btn-outline btn-lg">Edit Profile</a>
		</div>
		<div class="col-md-4 mb-2">
			<div class="card-body p-2 bg-light shadow-lg">
				<center>
					<img src="uploads/<?php echo $_SESSION['pic'] ?>" class="img img-thumbnail img-fluid " style="max-width: 200px">
					<div>
						
					</div>

				</center>
			</div>
		</div>
	</div>
</div>
</div>