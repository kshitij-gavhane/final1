<?php include('db_connect.php'); ?>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">

			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-16">
				<div class="card">
					<div class="card-header">
						<b>List of Tenant</b>
						<!-- <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_tenant">
								<i class="fa fa-plus"></i> New Tenant
							</a></span> -->
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="./add_tenant.php" > 
						<i class="fa fa-plus"></i> New Tenant
						</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Owner Name</th>
									<th class="">Owner ID</th>
									<th class="">Market Name</th>
									<th class="">Shop Type</th>
									<th class="">Shop Monthly Rent</th>
									<th class="">total(yearly)</th>
									<th class="">Shop Zone</th>
									<th class="">Outstanding Balance</th>
									<!-- <th class="">Last Payment</th> -->
									<th class="">Status</th>
									<th class="">Agreement Duration</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$tenant = $conn->query("select * from demand_1");
								while ($row = $tenant->fetch_assoc()) :

								?>
									<tr>
										<td class="text-center"><?php echo $i++ ?></td>

										<td>
											<?php echo ucwords($row['owner_name']) ?>
										</td>
										<td>
											<?php echo ucwords($row['id']) ?>
										</td>
										<td class="">
											<p> <b><?php echo $row['market_name'] ?></b></p>
										</td>
										<td>
											<?php echo ucwords($row['shop_type']) ?>
										</td>
										<td class="">
											<p> <b><?php echo number_format($row['monthly_rent'], 2) ?></b></p>
										</td>
										<td class="">
											<p> <b><?php echo number_format($row['total'], 2) ?></b></p>
										</td>

										<td>
											<?php echo ucwords($row['zone_name']) ?>
										</td>
										<td>
											<?php echo ucwords($row['bakaya_rent']) ?>
										</td>

										<td>
											<?php echo ucwords($row['remark']) ?>
										</td>
										<td>
											<?php echo $row['duration'] ?>
										</td>
										<td class="text-center">
											<!-- <button class="btn btn-sm btn-outline-primary view_payment" type="button" data-id="<?php echo $row['id'] ?>">View</button> -->
											<button class="btn btn-sm btn-outline-primary edit_tenant" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
											<button class="btn btn-sm btn-outline-danger delete_tenant" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
			<br>
			<!-- table panel 2 -->

			<!-- table 3 -->
			<br>

			<div class="col-md-16">
				<div class="card">
					<div class="card-header">
						<b>Bakaya Dharak</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_tenant2">
								<i class="fa fa-plus"></i> New Tenant
							</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Owner Name</th>
									<th class="">Owner ID</th>
									<th class="">Market Name</th>
									<th class="">Shop Name</th>
									<th class="">Shop Type</th>
									<th class="">Shop area (sqft)</th>
									<th class="">Bakaya rent</th>
									<th class="">Bakaya Tax</th>
									<th class="">Shop Monthly Rent</th>
									<th class="">GST</th>
									<th class="">total(yearly)</th>
									<th class="">Shop Zone</th>
									<!-- <th class="">Last Payment</th> -->
									<!-- <th class="">Remark</th> -->
									<!-- <th class="">Agreement Duration</th> -->
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$tenant = $conn->query("select * from demand");
								while ($row = $tenant->fetch_assoc()) :

								?>
									<tr>
										<td class="text-center"><?php echo $i++ ?></td>
										<td>
											<?php echo ucwords($row['owner_name']) ?>
										</td>
										<td>
											<?php echo ucwords($row['aadhar']) ?>
										</td>
										<td class="">
											<p> <b><?php echo $row['market_name'] ?></b></p>
										</td>
										<td>
											<?php echo ucwords($row['shop_id']) ?>
										</td>
										<td>
											<?php echo ucwords($row['shop_type']) ?>
										</td>
										<td>
											<?php echo ucwords($row['area_sqft']) ?>
										</td>
										<td>
											<?php echo ucwords($row['bakaya_rent']) ?>
										</td>
										<td>
											<?php echo ucwords($row['bakaya_tax']) ?>
										</td>
										<td class="">
											<p> <b><?php echo number_format($row['monthly_rent'], 2) ?></b></p>
										</td>
										<td>
											<?php echo ucwords($row['GST']) ?>
										</td>
										<td class="">
											<p> <b><?php echo number_format($row['total'], 2) ?></b></p>
										</td>

										<td>
											<?php echo ucwords($row['zone_name']) ?>
										</td>
										<!-- <td>
											<?php echo ucwords($row['remark']) ?>
										</td> -->
										<!-- <td>
											<?php echo $row['duration'] ?>
										</td> -->
										<td class="text-center">
											<button class="btn btn-sm btn-outline-primary view_payment" type="button" data-id="<?php echo $row['id'] ?>">View</button>
											<button class="btn btn-sm btn-outline-primary edit_tenant" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
											<button class="btn btn-sm btn-outline-danger delete_tenant" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


			<!-- table 3 -->
		</div>
	</div>

</div>
<style>
	td {
		vertical-align: middle !important;
	}

	td p {
		margin: unset
	}

	img {
		max-width: 100px;
		max-height: 150px;
	}
</style>
<script>
	$(document).ready(function() {
		$('table').dataTable()
	})

	$('#new_tenant').click(function() {
		uni_modal("New Tenant", "add_tenant.php", "mid-large")

	})

	$('#new_tenant2').click(function() {
		uni_modal("New Tenant", "add_tenant.php", "mid-large")

	})

	$('.view_payment').click(function() {
		uni_modal("Tenants Payments", "view_payment.php?id=" + $(this).attr('data-id'), "large")

	})
	$('.edit_tenant').click(function() {
		uni_modal("Manage Tenant Details", "manage_tenant.php?id=" + $(this).attr('data-id'), "mid-large")

	})
	$('.delete_tenant').click(function() {
		_conf("Are you sure to delete this Tenant?", "delete_tenant", [$(this).attr('data-id')])
	})

	function delete_tenant($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_tenant',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>
<?php
// $insert = "INSERT INTO demand (bakaya_rent) VALUES ('$outstanding')";
// if (mysqli_query($conn, $insert)) {
// 	echo "Record inserted successfully";
// } else {
// 	echo "Error inserting record: " . mysqli_error($conn);
// }
?>