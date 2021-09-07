<?php 


if(isset($_POST['update_profile'])){
  
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $new_pic_name = $user_data[4];
  $old_email = $user_data[0];


if(isset($_POST['mImage'])){
/// member image processor 
  $member_pic = $_FILES['mImage']['tmp_name']; // get the temporary lcation
  $mem_pic_name = $_FILES['mImage']['name']; // get the file name
  $new_pic_name = md5(time() . $mem_pic_name)."_".$mem_pic_name; // generate a unique name

  $img_dir = "uploads/".$new_pic_name; // pic upload directory
  move_uploaded_file($member_pic, $img_dir);
 }

 
    if($pdo->update_user_profile($userName, $email, $phone, $password, $pic, $old_email)){
      echo "<script> window.location = 'users.php?message=A new member has successfully been added'</script>";
        $_SESSION['email'] = $email;
  }



}

?>