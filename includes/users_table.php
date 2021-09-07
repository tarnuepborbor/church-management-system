
<div class="text-right p-3">
	<h1 class="mt-2 text-info">All users table</h1>
	<hr>
	<button class="btn change  mt-2 btn-info  mb-2" style="width: 50%; border-radius: 20px">Add New User</button>
</div>

<div class="bg-white m-2 p-2 table-responsive" style="border-radius: 30px">
	<table id="example table-sm " class="table   table-sm" >
		<thead class="mt-1" >
			<tr>
				<th>User's Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>User Type</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include_once('model.php');
			$pdoObj = new Query();

			$users = $pdoObj->load_users_table();

			while ($rows = $users->fetch()) {
				?>
				<tr>
					<td><?php echo $rows['userName'] ?></td>
					<td><?php echo $rows['email'] ?></td>
					<td><?php echo $rows['phone'] ?></td>
					<td><?php echo $rows['userType'] ?></td>
					<?php if($_SESSION['userType'] === 'Admin'){
						?>
						<td>
							<a href="deletor.php?id=<?php echo $rows['id'] ?>&table=users"  class=" btn btn-block btn-sm btn-danger" style="border-radius: 10px" >Delete this user</a>
						</td>
						<?php 
					}else{
						?>
						<td>
							<button class="btn btn-secondary " onclick="alert('Your user account does not provide you the right to view profile of others users')">Delete</button>
						</td>
						<?php 
					} ?>
				</tr>
				<?php 
			}
			?>
			<tfoot>
			<tr>
				<th>User's Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>User Type</th>
				<th>Take Action</th>
			</tr>
			</tfoot>

		</tbody>
	</table>
</div>


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
	$(document).on('click', '.change', function(){
		$("#update_your_profile").modal('show');	
	});



</script>