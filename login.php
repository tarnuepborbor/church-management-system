<?php


$title = "login";

$error = "";
$email_error = "";

include 'includes/header.php';
session_start();

if(isset($_SESSION['isLogin'])){
	echo "<script>window.location = 'membership.php'</script>";
}

if(isset($_POST['login'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 0;
	} else {
		$email_error = "Your email is not valid";
		$error = 1;
	}


	include("includes/model.php");

	$loginobj = new Query();

	if($error !== 1){

		if($loginobj->login($email, $password) > 0 ){
		

			$user_data = $loginobj->auser_detail($email);

			while ($row = $user_data->fetch()) {
				$_SESSION['email'] = $row['email'];
				$_SESSION['pic'] = $row['pic'];
				$_SESSION['userName'] = $row['userName'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['userType'] = $row['userType'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['userId'] = $row['id'];
			}

			$_SESSION['isLogin'] = 'Yes';

			echo "<script>window.location = 'membership.php'</script>";

		}else{
			echo "<script>alert('Your credentials does not match any user of our system')</script>";
		}
	}



}

?>

<div class="container-fluid  " style="height: 100vh;">
	<div class="row h-100 align-items-center">
		<div class="col-md-4 offset-md-4">
			<div class="card p-4 " style="border-radius: 20px">
				<div class="card-header text-left bg-white" style="border: none;">
					<h3 class="display-4"><strong>Log in</strong></h3>
				</div>
				<form method="POST" action="login.php">
					<div class="card-body text-center" style="padding-bottom: 100px">
						<div class="row text-left align-items-center ">
							<div class="col-6 lead"><strong>Email</strong></div>
							<div class="col-6 text-info text-right">Don't have account</div>
						</div>
						<input type="email" name="email" placeholder="Email" class=" text-white bg- transparent text-primary form-control form-control-lg rounded-0 p-4 required">
						<small class="text-danger"><?php echo $email_error; ?></small>
						<div class="row text-left align-items-center mt-4 strong">
							<div class="col-6 lead"><strong>Password</strong></div>
							<div class="col-6 text-info text-right"><i class="fa fa-eye" aria-hidden="true"></i> Show</div>
						</div>
						<input type="password" name="password" placeholder="Password" class="text-white bg-transparent text-primary form-control mb-4 form-control-lg rounded-0 p-4 required">
						<button name="login" name="login" class="btn btn-lg btn-block btn-lg"  style="margin-top: 50px; border-radius: 30px; color: white; font-size: 25px; font-weight: bold; background-color: #04aa6d;">Login</button>
						<a href="#" class="text-secondary mt-2" style="">Forgot password</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




