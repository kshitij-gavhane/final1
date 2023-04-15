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
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Payments</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_invoice">
								<i class="fa fa-plus"></i> New Entry
							</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover" id="myTable">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Date</th>
									<th class="">Tenant</th>
									<th class="">Ref. Id</th>
									<th class="">Status</th>
									<th class="">Amount</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$invoices = $conn->query("SELECT p.*,owner_name FROM payments p inner join demand t on t.aadhar = p.aadhar  order by date(p.date_created) desc ");
								while ($row = $invoices->fetch_assoc()) :
								?>
									<tr>
										<td class="text-center"><?php echo $i++ ?></td>
										<td><?php echo date('M d, Y', strtotime($row['date_created'])) ?></td>
										<td class="">
											<p><b><?php echo ucwords($row['owner_name']) ?></b></p>
										</td>
										<td class="">
											<p><b><?php echo ucwords($row['invoice']) ?></b></p>
										</td>
										<td class="" id="status_<?php echo $row['invoice'] ?>">
											<p><b><?php echo ucwords($row['status']) ?></b></p>
										</td>
										<td class="text-right">
											<p><b><?php echo number_format($row['amount'], 2) ?></b></p>
										</td>
										<td class="text-center">
											<button id="Vbtn" class="btn btn-sm btn-outline-primary edit_invoice" type="button" onclick="changeStatus(<?php echo $row['invoice'] ?>)">Verify</button>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>

						<script>
							function changeStatus(invoice) {
								// get the row and column index of the button clicked
								var rowIndex = document.getElementById('status_' + invoice).parentNode.rowIndex;
								var columnIndex = document.getElementById('status_' + invoice).cellIndex;

								// show an alert box to confirm the change of status
								var confirmation = confirm("Are you sure you want to verify this payment?");
								if (confirmation == true) {

									// change the status of the column from "Pending" to "Verified"
									document.getElementById("myTable").rows[rowIndex].cells[columnIndex].innerHTML = "Verified";
									// send an AJAX request to update the status in the database
									var xhr = new XMLHttpRequest();
									xhr.open("POST", "update_status.php", true);
									xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									xhr.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											// handle the response from the server
										}
									};
									xhr.send("invoice=" + invoice);
								}
							}
						</script>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
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

	$('#new_invoice').click(function() {
		uni_modal("New invoice", "add_payment.php", "mid")

	})
	// $('.edit_invoice').click(function() {
	// 	uni_modal("Manage invoice Details", "add_payment.php?id=" + $(this).attr('data-id'), "mid-large")

	// })
	$('.delete_invoice').click(function() {
		_conf("Are you sure to delete this invoice?", "delete_invoice", [$(this).attr('data-id')])
	})

	function delete_invoice($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_payment',
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