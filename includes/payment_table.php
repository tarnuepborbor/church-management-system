	<table id="example" class="table table-sm" >
		<thead class="mt-1" >
			<tr>
				<th>Member Name</th>
				<th>Amount </th>
				<th>Payment for</th>
				<th>Date</th>
				<th>Mem. Profile</th>
				<th>Log Payment</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include_once('model.php');
			$pdoObj = new Query();

			$members = $pdoObj->load_payments_in_table();

			while ($rows = $members->fetch()) {
				?>
				<tr>
					<td><?php echo $rows['fname'].' '.$rows['mName'].' '.$rows['lName']; ?></td>
					<td><?php echo $rows['amount'].' '.$rows['currency'] ?></td>
					<td><?php echo $rows['payment_for'] ?></td>
					<td><?php echo $rows['paymentDate'] ?></td>
					<td><a href="deletor.php?id=<?php echo $rows['id'] ?>&table=payment_table"  class=" btn btn-block btn-sm btn-outline-danger" style="border-radius: 10px" >Delete this record</a></td>
					<td><button id="<?php echo $rows['member_id'] ?>" class="log_payment btn btn-block btn-sm btn-outline-info rounded-0">Log Payment</button></td>
				</tr>
				<?php 
			}
			?>
			<tfoot>
				<tr>
				<th>Member Name</th>
				<th>Amount </th>
				<th>Currency</th>
				<th>Payment for</th>
				<th>Date</th>
				<th>Details</th>
			</tr>
			</tfoot>

		</tbody>
	</table>


	<script type="text/javascript">
	// this script allows you to view product details 
	$(document).on('click', '.view', function(){
		var mem_id = $(this).attr('id');

		$.ajax({
			type: "POST",
			url: "includes/member_profile.php",
			data:{
				member_id: mem_id,
				another_data:1
			},
			success: function(datas){
				
				$(".profile_details").html(datas);
				$("#profile_modal").modal('show');
			}
		});
	});

/* this allows you view payment form */
	$(document).on('click', '.log_payment', function(){
		var mem_id = $(this).attr('id');

		$.ajax({
			type: "POST",
			url: "includes/log_payment.php",
			data:{
				member_id: mem_id,
				another_data:1
			},
			success: function(datas){
				
				$(".payment_form").html(datas);
				$("#payment_model").modal('show');
			}
		});
	});



</script>