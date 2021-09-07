<?php
session_start();

if(!isset($_SESSION['isLogin'])){
	echo "<script>window.location = 'index.php'</script>";
}

$title = "login";

include 'includes/header.php';

?>

<div class="container-fluid  " style="height: 100vh;">
  <div class="row h-100 align-items-center">
    <div class="col-md-8 offset-md-2">
      <?php include('includes/payment_history_processor.php') ?>
    </div>
  </div>
</div>

