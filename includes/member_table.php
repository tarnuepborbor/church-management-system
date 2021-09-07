	<table id="example" class="table  table-sm" >
		<thead class="mt-1" >
			<tr>
				<th>Member Name</th>
				<th>Department </th>
				<th>Member ID</th>
				<th>View</th>
				<th>Log Payment</th>
				<th>History</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include_once('model.php');
			$pdoObj = new Query();
			$tableName = "membership_table";
			$members = $pdoObj->select_data('membership_table');

			while ($rows = $members->fetch()) {
				?>
				<tr>
					<td><?php echo $rows['fName'].' '.$rows['mName'].' '.$rows['lName']; ?></td>
					<td><?php echo $rows['department'] ?></td>
					<td><?php echo $rows['member_id'] ?></td>
					<td><button id="<?php echo $rows['member_id'] ?>" class="view btn btn-block btn-sm btn-outline-primary rounded-0">View Profile</button></td>
					<td><button id="<?php echo $rows['member_id'] ?>" class="log_payment btn btn-block btn-sm btn-outline-danger rounded-0">Log a payment</button></td>
					<td class=""><button id="<?php echo $rows['member_id'] ?>" class="history btn btn-block btn-sm btn-outline-secondary rounded-0">$ History</button></td>
				</tr>
				<?php 
			}
			?>
			<tfoot>
				<tr>
					<th>Member Name</th>
					<th>Department </th>
					<th>Member ID</th>
					<th>View</th>
					<th>Log Payment</th>
					<th>History</th>
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


		/* this allows you view member payment history */
	$(document).on('click', '.history', function(){
		var mem_id = $(this).attr('id');

		$.ajax({
			type: "POST",
			url: "includes/payment_history_processor.php",
			data:{
				member_id: mem_id,
				another_data:1
			},
			success: function(datas){
				
				$(".history_table").html(datas);
				$("#history_modal").modal('show');
			}
		});
	});
</script>