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
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_tenant">
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
									<th class="">Shop Name</th>
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
								// $tenant = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.price FROM tenants t inner join houses h on h.id = t.house_id where t.status = 1 order by h.house_no desc ");
								// while ($row = $tenant->fetch_assoc()) :
								// 	$months = abs(strtotime(date('Y-m-d') . " 23:59:59") - strtotime($row['date_in'] . " 23:59:59"));
								// 	$months = floor(($months) / (30 * 60 * 60 * 24));
								// 	$payable = $row['price'] * $months;
								// 	$paid = $conn->query("SELECT SUM(amount) as paid FROM payments where tenant_id =" . $row['id']);
								// 	$last_payment = $conn->query("SELECT * FROM payments where tenant_id =" . $row['id'] . " order by unix_timestamp(date_created) desc limit 1");
								// 	$paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
								// 	$last_payment = $last_payment->num_rows > 0 ? date("M d, Y", strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
								// 	$outstanding = $payable - $paid;

								$tenant = $conn->query("SELECT * FROM demand,payments WHERE demand.aadhar=payments.aadhar AND date_created = (SELECT date_created FROM payments WHERE demand.aadhar=payments.aadhar ORDER BY unix_timestamp(date_created) DESC LIMIT 1) ");
								while ($row = $tenant->fetch_assoc()) :
									$months = abs(strtotime(date('Y-m-d') . " 23:59:59") - strtotime($row['date_created'] . " 23:59:59"));
									$months = floor(($months) / (30 * 60 * 60 * 24));
									$payable = $row['monthly_rent'] * $months;
									$paid = $conn->query("SELECT SUM(amount) as paid FROM payments where tenant_id =" . $row['id']);
									$last_payment = $conn->query("SELECT * FROM payments where tenant_id =" . $row['id'] . " order by unix_timestamp(date_created) desc limit 1");
									$paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
									$last_payment = $last_payment->num_rows > 0 ? date("M d, Y", strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
									$outstanding = $payable - $paid;

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
										<td class="text-right">
											<p> <b><?php
													//if initially bakaya_rent = 0 --> subtract the payment amount from total else from bakaya_rent
													if ($row['bakaya_rent'] == 0) {
														$outstanding = $row['total'] - $row['amount'];
													} else {
														$outstanding = $row['bakaya_rent'] - $row['amount'];
													}
													echo $outstanding;

													?></b></p>
										</td>
										<!-- <td class="">
											<p><b><? php // echo  $row['$date_created'] 
													?></b></p>
										</td> -->
										<td>
											<?php echo ucwords($row['status']) ?>
										</td>
										<td>
											<?php echo $row['duration'] ?>
										</td>
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
			<!-- Table Panel -->
			<br>
			<!-- table panel 2 -->

			<!-- table 3 -->
			<br>

			<div class="col-md-16">
				<div class="card">
					<div class="card-header">
						<b>List of Tenant</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_tenant">
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
									<th class="">Shop Name</th>
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
								// $tenant = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.price FROM tenants t inner join houses h on h.id = t.house_id where t.status = 1 order by h.house_no desc ");
								// while ($row = $tenant->fetch_assoc()) :
								// 	$months = abs(strtotime(date('Y-m-d') . " 23:59:59") - strtotime($row['date_in'] . " 23:59:59"));
								// 	$months = floor(($months) / (30 * 60 * 60 * 24));
								// 	$payable = $row['price'] * $months;
								// 	$paid = $conn->query("SELECT SUM(amount) as paid FROM payments where tenant_id =" . $row['id']);
								// 	$last_payment = $conn->query("SELECT * FROM payments where tenant_id =" . $row['id'] . " order by unix_timestamp(date_created) desc limit 1");
								// 	$paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
								// 	$last_payment = $last_payment->num_rows > 0 ? date("M d, Y", strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
								// 	$outstanding = $payable - $paid;

								$tenant = $conn->query("SELECT * FROM demand,payments WHERE demand.aadhar=payments.aadhar AND date_created = (SELECT date_created FROM payments WHERE demand.aadhar=payments.aadhar ORDER BY unix_timestamp(date_created) DESC LIMIT 1) ");
								while ($row = $tenant->fetch_assoc()) :
									$months = abs(strtotime(date('Y-m-d') . " 23:59:59") - strtotime($row['date_created'] . " 23:59:59"));
									$months = floor(($months) / (30 * 60 * 60 * 24));
									$payable = $row['monthly_rent'] * $months;
									$paid = $conn->query("SELECT SUM(amount) as paid FROM payments where tenant_id =" . $row['id']);
									$last_payment = $conn->query("SELECT * FROM payments where tenant_id =" . $row['id'] . " order by unix_timestamp(date_created) desc limit 1");
									$paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
									$last_payment = $last_payment->num_rows > 0 ? date("M d, Y", strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
									$outstanding = $payable - $paid;

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
										<td class="text-right">
											<p> <b><?php
													//if initially bakaya_rent = 0 --> subtract the payment amount from total else from bakaya_rent
													if ($row['bakaya_rent'] == 0) {
														$outstanding = $row['total'] - $row['amount'];
													} else {
														$outstanding = $row['bakaya_rent'] - $row['amount'];
													}
													echo $outstanding;

													?></b></p>
										</td>
										<!-- <td class="">
											<p><b><? php // echo  $row['$date_created'] 
													?></b></p>
										</td> -->
										<td>
											<?php echo ucwords($row['status']) ?>
										</td>
										<td>
											<?php echo $row['duration'] ?>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-outline-primary view_payment" type="button" data-id="<?php echo $row['id'] ?>">View</button>
											<button class="btn btn-sm btn-outline-primary edit_tenant" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
											<button class="btn btn-sm btn-outline-danger delete_tenant" type="button" data-id="<?php echo $row['aadhar'] ?>">Delete</button>
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
		uni_modal("New Tenant", "manage_tenant.php", "mid-large")

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

	function delete_tenant($tenant_id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_tenant',
			method: 'POST',
			data: {
				id: $tenant_id
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