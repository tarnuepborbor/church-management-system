<?php


if(isset($_POST['member_id'])){

  include('model.php');

  $member_id =  $_POST['member_id'];

  $mem = new Query();
  $data = $mem->payment_history($member_id);
   $data_array = $mem->show_member_profile($member_id);



}else{

}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card-body shadow " style="border: 3px blue; border-radius: 20px">
        <div class="alert alert-primary">
          <?php 
            if(count($data_array)>0){
              ?>
                <h3 class="text-primary">Payment history of <?php echo $data_array[1].''.$data_array[2].' '.$data_array[3]; ?></h3>
              <?php  
            }else{
              echo "<h2>This member information was deleted from the database</h2>";
            }
          ?>
        </div>
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered table-sm" >
          <thead class="mt-1" >
            <tr>
              <th>Date</th>
              <th>Amount</th>
              <th>Currency</th>
              <th>For</th>
              <th>Recorded by:</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while ($rows = $data->fetch()) {
              ?>
              <tr>
                <td><?php echo $rows['paymentDate'] ?></td>
                <td><?php echo $rows['amount'] ?></td>
                <td><?php echo $rows['currency'] ?></td>
                <td><?php echo $rows['payment_for'] ?></td>
                <td><?php echo $rows['recorded_by'] ?></td>
              </tr>
              <?php 
            }
            ?>
            <tfoot>
              <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Payment for:</th>
                <th>Recorded by:</th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        </div>
        
      </div>
    </div>
  </div>
</div>

