<?php 

if(isset($_POST['save_payment_in_db'])){

	$recorded_by = 'admin';	
	$currency	= $_POST['currency'];
	$amount	= $_POST['amount'];
	$payment_for = $_POST['payment_for'];
	$paymentDate = $_POST['paymentDate'];
	$member_id = $_POST['member_id'];
	$description = $_POST['description'];



  include_once('model.php');

  $pdo = new Query();
  if($pdo->save_payment($recorded_by, $currency, $amount, $payment_for, $paymentDate, $member_id, $description)
){
  	header("location: ../finance.php?message=Payment record have successfully be saved");
  }else{
  	header("location: ../membership.php?message=An unexpected error occured");
  }
}



?>