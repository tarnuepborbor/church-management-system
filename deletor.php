
<?php 
session_start();


if(isset($_SESSION['isLogin']) !== "" && $_GET['id'] !== ""){
	

	include("includes/model.php");

	$table = $_GET['table'];
	$id = $_GET['id'];

	$pdo = new Query();

	if($pdo->delete($table, $id)){
		echo "<script>window.location = 'membership.php?message=your delete action was successful'</script>";
	}
}