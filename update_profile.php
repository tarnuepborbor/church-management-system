<?php

session_start();

include 'includes/header.php';
include 'includes/nav_bar.php';

include('includes/model.php');
$pdo = new Query();

$handle = $pdo->users_info($_SESSION['email']);

$user_data = array();

while ($row = $handle->fetch()) {

  array_push($user_data, $row['email']);
  array_push($user_data, $row['userName']);
  array_push($user_data, $row['phone']);
  array_push($user_data, $row['password']);
  array_push($user_data, $row['pic']);
}

?>

<div class="container " style="height: 100vh;">
  <div class="row h-100 align-items-center">
    <div class="col-md-12">
      <div class="card  p-4 ">
        <div class="modal-content">
          <div class="modal-header  text-center">
            <h4 class="modal-title ">Update Your Profile</h4>
            <a href="users.php" class="my-btn-outline px-3"  >Exit here</a>
          </div>
          <div class="modal-body">
           <div class="row">
              <div class="col-md-4">
                 <center>
                  <img src="uploads/<?php echo $user_data[4] ?>" class="img w-100 img-responsive img-fluid img-thumbnail mt-2 mb-2 shadow-lg">
               </center>
               </div>
                <div class="col-md-8">
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                  <div class="m-2 p-4 shadow-lg">
                    <input type="text" name="userName" value="<?php echo $user_data[1]; ?>" class="form-control" placeholder="user's full name" required>
                    <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control mt-2" placeholder="user's email" required>
                    <input type="text" value="<?php echo $_SESSION['password'] ?>" name="password" class="form-control mt-2" placeholder="user's password" required>
                    <input type="number" value="<?php echo $_SESSION['phone'] ?>" name="phone" class="form-control mt-2" placeholder="User Phone #" required >
                    <select disabled name="userType" class="mt-2 form-control" >
                      <option value="<?php echo $_SESSION['userType'] ?>" ><?php echo $_SESSION['userType'] ?></option>
                    </select>
                    <input type="file" name="mImage" required class="form-control form-control-lg mt-2" accept="image/*">
                    <button class="btn my-btn  mt-4 btn-block" name="update_profile">Update Profile</button>
                  </div>
                </form>
           </div>
          </div>
        </div>
     </div>
   </div>
 </div>
</div>



<div style="margin-top: 150px">

  <?php 


  if(isset($_POST['update_profile'])){

    $userType = $_POST['userType'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $old_email = $user_data[0];



/// member image processor 
  $member_pic = $_FILES['mImage']['tmp_name']; // get the temporary lcation
  $mem_pic_name = $_FILES['mImage']['name']; // get the file name
  $new_pic_name = md5(time() . $mem_pic_name)."_".$mem_pic_name; // generate a unique name

  $img_dir = "uploads/".$new_pic_name; // pic upload directory
  move_uploaded_file($member_pic, $img_dir);



  if($pdo->update_user_profile($userName, $email, $userType, $phone, $password, $new_pic_name, $old_email)){
    echo "<script> window.location = 'logout.php'</script>";
    $_SESSION['email'] = $email;
  }else{
    echo "<script> window.location = 'membership.php?message=Profile picture could not be uploaded for an unknown reason'</script>";
  }



}

?>

</div>