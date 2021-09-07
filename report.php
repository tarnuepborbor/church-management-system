<?php
session_start();

if(!isset($_SESSION['isLogin'])){
	echo "<script>window.location = 'index.php'</script>";
}

if(!isset($_POST['gen_financial_report'])){
	echo "<script>window.location = 'finance.php'</script>";
}

$title = "finance";
include 'includes/header.php';


$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
include_once('includes/model.php');
$pdo = new Query();

$prefix = "All ";

$total_ld = 0;
$total_usd = 0;
$ld = "LRD";
$us = "USD";


$data = $pdo->generate_report($start_date, $end_date);
$data2 = $pdo->get_incomeAndExpenditureTable_for_repeort($start_date, $end_date);

$total_usd = $pdo->sum_all_in_report($us, $start_date, $end_date);
$total_ld = $pdo->sum_all_in_report($ld, $start_date, $end_date);
$expenditure_lrd = $pdo->expendit_lrd_in_report($ld, $start_date, $end_date);
$expenditure_us = $pdo->expendit_lrd_in_report($us, $start_date, $end_date);




?>

<div class="container-fluid " style="height: 100vh;">
	<div class="row h-100 ">
		<div class="col-md-12 ">
			<div class="card shadow-lg">
				<?php include("includes/nav_bar.php"); ?>
				<div class="card-body p-2 m-1 bg-light shadow-lg" >
					<center>
						<h5 class="text-primary" style="font-size: 30px"><?php echo ucwords($prefix); ?> financial report for <?php echo $start_date.' to '.$end_date; ?> </h5>
					</center>
					
					<div class="container">
						<div class="row">
							<div class=" col-md-8 bg-white table-info table-bordered shadow-lg  mb-2 p-2" style="max-height: 300px">
							<div class="card">
								<div class="card-header">
									<h3  class="lead text-primary">Income Summary of in USD & LRD </h3><hr>
								</div>
								<div class="card-body">
										
								<table class="table table-hover table-sm table-striped ">
									<tr>
										<td></td>
										<td>LRD</td>
										<td>USD</td>
									</tr>
									<tr>
										<td>Income</td>
										<td><?php echo $total_ld; ?></td>
										<td><?php echo $total_usd; ?></td>
									</tr>
									<tr>
										<td>Expenditure</td>
										<td><?php echo $expenditure_lrd; ?></td>
										<td><?php echo $expenditure_us; ?></td>
									</tr>
									<tr>
										<td>Balance</td>
										<td><?php echo $total_ld-$expenditure_lrd; ?></td>
										<td><?php echo $total_usd - $expenditure_us; ?></td>
									</tr>
								</table>
								</div>
							</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<?php  include('includes/report_chart.php'); ?>
									</div>
								</div>
							</div>
							<div class="col-md-12 mt-4">
								<div class="card shadow-lg" style="border-radius: 25px; overflow: hidden;">
									<div class="card-header">
										<h3>Others income and Expenditure Table</h3>
									</div>
									<div class="card-body table-responsive">

										<table class="table table-hover table-striped table-sm table-info">
											<tr class="">
												<th>Amount</th>
												<th>Currency</th>
												<th>Income/Expend.</th>
												<th>Date</th>
												<th>Details</th>
												<th>By</th>
											</tr>
											<?php 
											while($rows = $data2->fetch()){
												?>
												<tr>
													<td><?php echo $rows['amount'] ?></td>
													<td><?php echo $rows['currency'] ?></td>
													<td><?php echo $rows['payment_for'] ?></td>
													<td><?php echo $rows['paymentDate'] ?></td>
													<td><?php echo $rows['description'] ?></td>
													<td><?php echo $rows['recorded_by'] ?></td>
												</tr>

												<?php 
											}
											?>

										</table>	
									</div>
								</div>							
							</div>
						</div>
					</div>
					<div class="card shadow-lg mt-4" style="border-radius: 25px; overflow: hidden;">
						<div class="card-header">
							<h1>Collection Members Log/Table</h1>
						</div>
						<div class="card-body bg-white">
							<div class="bg-white shadow-lg shadow-lg table-responsive" >
								<table class="table table-sm" id="#exampleTable">
									<tr>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Amount</th>
										<th>Currency</th>
										<th>Payment for</th>
										<th>Date</th>
										<th>Recorded By</th>
									</tr>
									<?php 
									while ($row = $data->fetch()) {
										?>
										<tr>
											<td>
												<?php echo $row['fName']; ?>
											</td>
											<td>
												<?php echo $row['mName']; ?>
											</td>
											<td>
												<?php echo $row['lName']; ?>
											</td>
											<td>
												<?php echo $row['amount']; ?>
											</td>
											<td>
												<?php echo $row['currency']; ?>
											</td>
											<td>
												<?php echo $row['payment_for']; ?>
											</td>
											<td>
												<?php echo $row['paymentDate']; ?>
											</td>
											<td>
												<?php echo $row['recorded_by']; ?>
											</td>
										</tr>
										<?php 
									}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
include('includes/generate_financial_report_form.php');
include('includes/footer.php');
?>



