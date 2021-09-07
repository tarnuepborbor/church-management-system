<?php 

include 'connect.php'; // include the file that connects to the database

Class Query extends Dbh {


// this method varify if the person is a ligetimate login user

	public function login($email, $password){

		$stmt = $this->connection()->prepare('SELECT * FROM users WHERE email = ? AND password=?'); 
		$stmt->execute([$email, $password]); 
		$count = $stmt->rowCount();
		return $count;

	}



	public function users_info($email){
		$sql = "SELECT * FROM users WHERE email= '$email'";
		$stmt = $this->connection()->query($sql);
		return  $stmt;
	}	// this will load users details details in edit profile form


	public function update_user_profile($userName, $email, $userType, $phone, $password, $pic, $old_email){
		$sql = "UPDATE users SET userName = '$userName', email = '$email', userType = '$userType', phone = $phone, password = '$password', pic = '$pic' WHERE email = '$old_email'";
		$stmt = $this->connection()->query($sql);
		return $stmt;

	}// this will update user profile

// inset/save a new member 
	public function save_new_member($mem_pic, $fName, $mName, $lName, $sex, $dob, $occupation,  $entity,  $country, $county, $province,  $home_or_city, $nationality, $email, $address, $matital_status,  $btsml_status, $former_reg, $prev_church, $contact, $department, $phy_status, $member_id){
		$sql = "INSERT INTO membership_table(mem_pic, fName, mName, lName, sex, dob, occupation, entity,  country, county, province, home_or_city, nationality, email, address, matital_status,  btsml_status, former_reg, prev_church, contact, department, phy_status, member_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$stmt= $this->connection()->prepare($sql);

		if($stmt->execute(
			[$mem_pic, $fName, $mName, $lName, $sex, $dob, $occupation,  $entity,  $country, $county, $province,  $home_or_city, $nationality, $email, $address, $matital_status,  $btsml_status, $former_reg, $prev_church, $contact, $department, $phy_status, $member_id]
		)){
			return True;
		}else{
			return False;
		}
	}



// this method select all records from any table

	public function select_data($tableName){
		$sql = $this->connection()->query("SELECT * FROM $tableName  ORDER BY id DESC ");
		return $sql;

	}


	public function show_member_profile($member_id){
		$stmt = $this->connection()->prepare('SELECT * FROM membership_table WHERE member_id = ?'); 
		$stmt->execute([$member_id]);
		$product_data = array();


		while ($row = $stmt->fetch()){
			array_push($product_data, $row['mem_pic']);
			array_push($product_data, $row['fName']);
			array_push($product_data, $row['mName']);
			array_push($product_data, $row['lName']);
			array_push($product_data, $row['sex']);
			array_push($product_data, $row['dob']);
			array_push($product_data, $row['occupation']);
			array_push($product_data, $row['entity']);
			array_push($product_data, $row['country']);
			array_push($product_data, $row['county']);
			array_push($product_data, $row['province']);
			array_push($product_data, $row['home_or_city']);
			array_push($product_data, $row['nationality']);
			array_push($product_data, $row['email']);
			array_push($product_data, $row['matital_status']);
			array_push($product_data, $row['btsml_status']);
			array_push($product_data, $row['former_reg']);
			array_push($product_data, $row['prev_church']);
			array_push($product_data, $row['contact']);
			array_push($product_data, $row['department']);
			array_push($product_data, $row['phy_status']);
			array_push($product_data, $row['member_id']);
			array_push($product_data, $row['address']);
			array_push($product_data, $row['id']);
		}

		return $product_data;

	}// this method will load member info in the array and return 

	public 	function save_payment($recorded_by, $currency, $amount, $payment_for, $paymentDate, $member_id, $description){
		$sql = "INSERT INTO payment_table(recorded_by, currency, amount, payment_for, paymentDate, member_id, description) VALUES(?,?,?,?,?,?,?)";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$recorded_by, $currency, $amount, $payment_for, $paymentDate, $member_id, $description]);
		return $stmt;
}// this method save a payment in database 




public function load_payments_in_table(){

	$sql = "SELECT membership_table.fname, membership_table.mName, membership_table.lName, payment_table.amount, payment_table.payment_for, membership_table.member_id, payment_table.currency, payment_table.paymentDate, payment_table.id FROM membership_table INNER JOIN payment_table ON membership_table.member_id = payment_table.member_id";

	$stmt = $this->connection()->query($sql);

	return  $stmt;

	}// this method will select and load all payments records 

	public function load_users_table(){
		$sql = "SELECT * FROM users";
		$stmt = $this->connection()->query($sql);

		return  $stmt;
	}



	public function payment_history($member_id){
		$sql = "SELECT * FROM payment_table WHERE member_id = '$member_id'";
		$stmt = $this->connection()->query($sql);
		return  $stmt;

	}


	public function count_total_members(){
		$sql = "SELECT COUNT(*) FROM membership_table";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}// count total members

	public function count_total_males(){
		$sql = "SELECT COUNT(*) FROM membership_table WHERE sex = 'M'";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}

	public function count_total_females(){
		$sql = "SELECT COUNT(*) FROM membership_table WHERE sex = 'F'";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}

	public function auser_detail($email){
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$stmt = $this->connection()->query($sql);
		return $stmt;
	}

	public function add_user($userName, $email, $userType, $phone, $password, $pic){
		$sql = "INSERT INTO users(userName, email, userType, phone, password, pic) VALUES(?,?,?,?,?,?)";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$userName, $email, $userType, $phone, $password, $pic]);
		return $stmt;


	}


	public function sum_total_usd(){
		$sql = "SELECT SUM(amount) FROM payment_table WHERE currency = 'USD' AND payment_for != 'expenditure'";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}// this will sum total expeniture of usd 

	public function sum_total_usd_expenditure(){
		$sql = "SELECT SUM(amount) FROM payment_table WHERE currency = 'USD' AND payment_for = 'expenditure'";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}// this will sum all usd in the database / payment

	public function sum_total_lrd_expenditure(){
		$sql = "SELECT SUM(amount) FROM payment_table WHERE currency = 'LRD' AND payment_for = 'expenditure'";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}// this will sum all lrd in the database / payment

	public function sum_total_lrd(){
		$sql = "SELECT SUM(amount) FROM payment_table WHERE currency = 'LRD' AND payment_for != 'expenditure'";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}// this will sum all ld in table - payment 


	public function expendit_lrd_in_report($currency, $start_date, $end_date){
		$sql = "SELECT SUM(amount) FROM payment_table WHERE currency = '$currency' AND payment_for = 'expenditure' AND paymentDate BETWEEN '$start_date' AND '$end_date'";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();

	}// this will sum all ld in report base on the date passed  

	


	public function delete($table, $id){
		$stmt = $this->connection()->prepare("DELETE FROM $table WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt;
	}// this will delete any item in any table base on the table name and id passed



	public function generate_report($start_date, $end_date){

		$sql = "SELECT membership_table.fName, membership_table.mName, membership_table.lName, payment_table.amount, payment_table.payment_for, payment_table.paymentDate, payment_table.recorded_by, payment_table.currency FROM membership_table INNER JOIN payment_table ON membership_table.member_id = payment_table.member_id WHERE payment_table.paymentDate BETWEEN '$start_date' AND '$end_date'";

		$stmt = $this->connection()->query($sql);
		return $stmt;

	}// this will generate report table of all colection from 



	public function sum_all_in_report($currency, $start_date, $end_date){
		$sql = "SELECT SUM(amount) FROM payment_table WHERE currency = '$currency' AND payment_for != 'expenditure' AND paymentDate  BETWEEN '$start_date' AND '$end_date' ";
		$stmt = $this->connection()->query($sql);
		return $stmt->fetchColumn();
	}



	public function get_incomeAndExpenditureTable_for_repeort($start_date, $end_date){

		$sql = "SELECT * FROM payment_table WHERE payment_for = 'income' OR payment_for = 'expenditure' AND paymentDate BETWEEN '$start_date' AND '$end_date'";

		$stmt = $this->connection()->query($sql);
		return $stmt;
	}



}
