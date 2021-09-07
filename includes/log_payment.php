<?php



if(isset($_POST['member_id'])){

	include('model.php');

	$member_id =  $_POST['member_id'];

	$mem = new Query();
	$data_array = $mem->show_member_profile($member_id);

}else{

}

?>

<div class="row">
	<div class="col-12 text-center pb-4">
		<h3 class=" text-primary font-width-bold">Log a payment for <?php echo $data_array[1].' '.$data_array[2].' '.$data_array[3] ?> </h3> <hr>
	</div>
	<div class="col-md-4">
		<div class="col-md-12 mb-4 pt-4 pb-4" >
			<div class="card-body shadow " style="border: 3px blue; border-radius: 20px">
				<center>
					<img src="uploads/<?php echo $data_array[0] ?>" class="img rounded-circle img-fluid img-thumbnail" style="max-width: 150px; ">
					<h5 class="lead "><?php echo $data_array[1].' '.$data_array[2].' '.$data_array[3] ?> </h5><hr>
					<p>This payment, when saved will be recorded as payment made for <?php echo $data_array[1].' '.$data_array[2].' '.$data_array[3] ?></p>
				</center>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card shadow-lg">
			<div class="card-body pt-4">
				<form method="POST" action="includes/save_payment.php">
					<div class="row">
						<div class="col-12">
							<p>Amount Paid</p>
							<input type="number" name="amount" class="form-control-lg form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<p>Currency:</p>
							<select class="form-control form-control-lg" name="currency" required>
								<option value="">Choose...</option>
								<option value="USD">USD</option>
								<option value="LRD">LRD</option>
							</select>
						</div>
						<div class="col-12">
							<p class="mb-0 mt-2">Description of income/expenditure</p>
							<textarea class="form-control pt-4 mt-0 mb-2" name="description"></textarea>
						</div>
						<div class="col-6">
							<p>Payment For</p>
							<select class="form-control form-control-lg" name="payment_for" required>
								<option value="">Choose...</option>
								<option value="tithe">Tithe</option>
								<option value="past_appreciation">Pst Appreciation</option>
								<option value="donation">Donation</option>
								<option value="pledge">pledge</option>
							</select>
						</div>

						<div class="col-12 mt-2 mb-4">
							<p>Payment Date</p>
							<input type="date" name="paymentDate" class="form-control form-control-lg" required>
						</div>
						<div class="col-12 mt-2 mb-4">
							<input type="hidden" name="member_id" value="<?php echo $data_array[21] ?>" class="form-control form-control-lg">
						</div>

					</div>
					<button name='save_payment_in_db' class="btn btn-block btn-lg btn-outline-info" style="border-radius: 20px">Save Payment</button>
				</form>
			</div>
		</div>
	</div>
</div>

