<?php
session_start();


if(isset($_POST['member_id'])){

  include('model.php');

  $member_id =  $_POST['member_id'];

  $mem = new Query();
  $data_array = $mem->show_member_profile($member_id);



}else{
  header("location:membership.php?message=The member you tried to view is deleted from the database or does not exist");
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card mt-4" style="border: none;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 mb-4 pt-4 pb-4" style="background:linear-gradient(135deg, #f02fc2 0%,#6094ea 100%); border-radius: 30px">
              <center>
                <img src="uploads/<?php echo $data_array[0] ?>" class="img rounded-circle img-fluid img-thumbnail" style="max-width: 300px; ">
                <h5 class="lead text-white"><?php echo $data_array[1].' '.$data_array[2].' '.$data_array[3] ?> Profile </h5>
              </center>
            </div>
            <div class="col-md-12 table-responsive pl-2 pr-2 pt-3 pb-0 shadow-lg" style="border-radius: 20px; padding-bottom: 0px">
              <table class="table table-striped table-sm table-hover">
                <tr>
                  <td>First Name:</td>
                  <td><?php echo $data_array[1] ?></td>
                </tr>
                <tr>
                  <td>Middle Name</td>
                  <td><?php echo $data_array[2] ?></td>
                </tr>
                <tr>
                  <td>Last Name</td>
                  <td><?php echo $data_array[3] ?></td>
                </tr>
                <tr>
                  <td>Sex</td>
                  <td><?php echo $data_array[4] ?></td>
                </tr>
              </table>

              <div class="col-12 table-responsive " id="more" style="display: none;">
                <table class="table table-striped table-sm table-hover">
                  <tr>
                    <td>Date of Birth</td>
                    <td><?php echo $data_array[5] ?></td>
                  </tr>
                  <tr>
                    <td>Occupation</td>
                    <td><?php echo $data_array[6] ?></td>
                  </tr>
                  <tr>
                    <td>Entity</td>
                    <td><?php echo $data_array[7] ?></td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td><?php echo $data_array[8] ?></td>
                  </tr>
                  <tr>
                    <td>County</td>
                    <td><?php echo $data_array[9] ?></td>
                  </tr>
                  <tr>
                    <td>Province</td>
                    <td><?php echo $data_array[10] ?></td>
                  </tr>
                  <tr>
                    <td>Home Town/City</td>
                    <td><?php echo $data_array[11] ?></td>
                  </tr>
                  <tr>
                    <td>Nationality</td>
                    <td><?php echo $data_array[12] ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $data_array[13] ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?php echo $data_array[22] ?></td>
                  </tr>
                  <tr>
                    <td>Marital Status</td>
                    <td><?php echo $data_array[14] ?></td>
                  </tr>
                  <tr>
                    <td>Baptismal Status</td>
                    <td><?php echo $data_array[15] ?></td>
                  </tr>
                  <tr>
                    <td>Former Religion</td>
                    <td><?php echo $data_array[16] ?></td>
                  </tr>
                  <tr>
                    <td>Previous Church</td>
                    <td><?php echo $data_array[17] ?></td>
                  </tr>
                  <tr>
                    <td>Contact</td>
                    <td><?php echo $data_array[18] ?></td>
                  </tr>
                  <tr>
                    <td>Department</td>
                    <td><?php echo $data_array[19] ?></td>
                  </tr>
                  <tr>
                    <td>Physical Status</td>
                    <td><?php echo $data_array[20] ?></td>
                  </tr>
                  <tr>
                    <td>Membership ID</td>
                    <td><?php echo $data_array[21] ?></td>
                  </tr>
                </table>
              </div>
              <div class="row bg-light pb-4" style="margin-top: -10px">
                <div class="col-12">

                 <button id="more_btn" class="btn btn-outline-primary  btn-block shadow-sm" style="border-radius: 20px;">More Details</button>
                 <?php if($_SESSION['userType'] == 'Admin'){
                  ?>
                  <td>
                    <a href="deletor.php?id=<?php echo $data_array[23] ?>&table=membership_table"  class=" btn btn-block btn-sm btn-danger" style="border-radius: 10px" >Delete this user</a>
                  </td>
                  <?php 
                }else{
                  ?>
                  <td>
                    <button class="btn mt-4 btn-block btn-secondary " onclick="alert('Your user account does not provide you the right to view profile of others users')" style="border-radius: 10px">Delete</button>
                  </td>
                  <?php 
                } ?>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $('#more_btn').click(function(){
    $('#more').slideToggle();
  })
</script>