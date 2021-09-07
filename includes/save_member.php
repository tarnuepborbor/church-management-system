

<?php 

// this scripts upload member's image and save info


if(isset($_POST['save_member'])){
	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$lName = $_POST['lName'];
	$sex = $_POST['sex'];
	$dob = $_POST['dob'];
	$occupation = $_POST['occupation'];
	$entity = $_POST['entity'];
	$nationality = $_POST['nationality'];
	$country  = $_POST['country'];
	$county = $_POST['county'];
	$province = $_POST['provence'];
	$region_county = $_POST['region_county'];
	$email  = $_POST['email'];
	$address = $_POST['address'];
	$mariTlStatus = $_POST['mariTlStatus'];
	$btsmStatus = $_POST['btsmStatus'];
	$formerRelig = $_POST['formerRelig'];
	$previous_church = $_POST['previous_church'];
	$contact = $_POST['contact'];
	$department = $_POST['department'];
	$physical_status = $_POST['physical_status'];
	$member_id = random_int(100, 70000)+random_int(100, 200)+random_int(100, 50000);

	echo $_POST['member_id'];

/// member image processor 
  $member_pic = $_FILES['mImage']['tmp_name']; // get the temporary lcation
  $mem_pic_name = $_FILES['mImage']['name']; // get the file name
  $new_pic_name = md5(time() . $mem_pic_name)."_".$mem_pic_name; // generate a unique name

  $img_dir = "../uploads/".$new_pic_name; // pic upload directory

  
  include_once('model.php');
  $insertData = new Query();

  if(move_uploaded_file($member_pic, $img_dir)){

  	// if the member's photo is uploaded successfully, save the data in the database
  	if($insertData->save_new_member($new_pic_name, $fName, $mName, $lName, $sex, $dob, $occupation,  $entity,  $country, $county, $province,  $region_county, $nationality, $email, $address, $mariTlStatus,  $btsmStatus, $formerRelig, $previous_church, $contact, $department, $physical_status, $member_id)){
  		header("location: ../membership.php?message=A new member has successfully been added");
  	}else{
  		header("location: ../membership.php?message=There was an error saving the user information"); 
  	}

  }else{
  	header("location: ../membership.php?message=An error occured in uploading the member image");
  };











}
