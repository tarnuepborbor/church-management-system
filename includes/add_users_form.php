<!-- add users form model -->

<!-- The Modal -->
<div class="modal" id="update_your_profile">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary text-center">
        <h4 class="modal-title text-white">Add users</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="m-2 p-4 shadow-lg" style="border-radius: 30px">
          <input type="text" name="name" class="form-control" placeholder="user's full name" required>
          <input type="email" name="email" class="form-control mt-2" placeholder="user's email" required>
          <input type="text" name="password" class="form-control mt-2" placeholder="user's password" required>
          <input type="number" name="phone" class="form-control mt-2" placeholder="User Phone #" required >
          <select name="userType" class="mt-2 form-control" required >
            <option value="">choose user type</option>
            <option value="ordinary">Ordinary User</option>
            <option value="admin">Admin User</option>
          </select>
          <input type="file" name="mImage" class="form-control form-control-lg mt-2">
          <button class="btn btn-primary  mt-4 btn-block" name="add_user" style="border-radius: 20px">Create Account</button>
        </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<?php 


if(isset($_POST['add_user'])){
  
  $userType = $_POST['userType'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $name = $_POST['name'];

/// member image processor 
  $member_pic = $_FILES['mImage']['tmp_name']; // get the temporary lcation
  $mem_pic_name = $_FILES['mImage']['name']; // get the file name
  $new_pic_name = md5(time() . $mem_pic_name)."_".$mem_pic_name; // generate a unique name

  $img_dir = "uploads/".$new_pic_name; // pic upload directory

  include_once('model.php');
  $insertData = new Query();

  if(move_uploaded_file($member_pic, $img_dir)){

    // if the member's photo is uploaded successfully, save the data in the database
    if($insertData->add_user($name, $email, $userType, $phone, $password, $new_pic_name)){
      echo "<script> window.location = 'users.php?message=A new member has successfully been added'</script>";
    }else{
      echo "<script> window.location = 'users.php?message=Error occured while trying to save the user information'</script>"; 
    }

  }else{
    echo "<script> window.location = 'membership.php?message=Profile picture could not be uploaded for an unknown reason'</script>";
  };



}