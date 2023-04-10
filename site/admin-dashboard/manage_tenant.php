<?php
include 'db_connect.php';
if (isset($_GET['tenant_id'])) {
	$qry = $conn->query("SELECT * FROM tenants where id= ". $_GET['tenant_id']);
	foreach ($qry->fetch_array() as $k => $val) {
		$$k = $val;
	}
}
// Define variables and initialize with empty values
$tenant_name = $aadhar = $zone_no = $shop_type = $kabza_date = $m_shop_rent = $shop_zone = $shop_area =$market_name="";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tenant_name = $_POST["name"];
		$aadhar = $_POST["aadhar"];
		$zone_no = $_POST["zone_no"];
		$shop_type = $_POST["shop_type"];
		$kabza_date = $_POST["kabza_date"];
		$m_shop_rent = $_POST["m_shop_rent"];
		$shop_zone = $_POST["shop_zone"];
		$shop_area = $_POST["shop_area"];
		$market_name = $_POST["market_name"];

		// Prepare an insert statement
		$sql = "INSERT INTO demand (owner_name,aadhar,zone_no,shop_type,kabza_date,monthly_rent,zone_name,area_sqft,market_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		if ($stmt = mysqli_prepare($conn, $sql)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, $tenant_name, $aadhar,$zone_no,$shop_type,$kabza_date,$m_shop_rent, $shop_zone, $shop_area, $market_name);

			// Attempt to execute the prepared statement
			if (mysqli_stmt_execute($stmt)) {
				
				header("location: http://localhost/final1/site/admin-dashboard/index.php?page=tenants");
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}

	// Close connection
	mysqli_close($conn);
?>
<div class="container-fluid">
	<form action="" id="manage-tenant" method="POST">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Name</label>
				<input type="text" class="form-control" name="name" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Aadhar #</label>
				<input type="text" class="form-control" name="aadhar" value="<?php echo isset($aadhar) ? $aadhar : '' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Zone no.</label>
				<input type="int" class="form-control" name="zone_no" value="<?php echo isset($zone_no) ? $zone_no : '' ?>" required>
			</div>
			<!-- <div class="col-md-4">
				<label for="" class="control-label">First Name</label>
				<input type="text" class="form-control" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Middle Name</label>
				<input type="text" class="form-control" name="middlename" value="<?php echo isset($middlename) ? $middlename : '' ?>">
			</div> -->
		</div>
		<div class="form-group row">
			<!-- <div class="col-md-4">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email : '' ?>" required>
			</div> -->
			<!-- <div class="col-md-4">
				<label for="" class="control-label">Contact #</label>
				<input type="text" class="form-control" name="contact" value="<?php echo isset($contact) ? $contact : '' ?>" required>
			</div> -->
			<div class="col-md-4">
				<label for="" class="control-label">Shop Type</label>
				<select name="shop_type" id="" class="custom-select select2">
					<option value=""></option>
					<option value="otta">otta</option>
					<option value="shop">shop</option>
					<option value="space">space</option>
					<!-- <?php
							// $house = $conn->query("SELECT * FROM houses where id not in (SELECT house_id from tenants where status = 1) " . (isset($house_id) ? " or id = $house_id" : "") . " ");
							// while ($row = $house->fetch_assoc()) :
							?> 
						<option value="<?php //echo $row['id'] ?>" <?php //echo isset($house_id) && $house_id == $row['id'] ? 'selected' : '' ?>><?php //echo $row['house_no'] ?></option>
					<?php //endwhile; ?>-->
				</select>
			</div>
			<div class="col-md-4 ">
				<label for="" class="control-label">Kabza Date</label>
				<input type="date" class="form-control" name="kabza_date" value="<?php echo isset($kabza_date) ? date("Y-m-d", strtotime($kabza_date)) : '' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Shop Rent (Monthly)</label>
				<input type="text" class="form-control" name="m_shop_rent" value="<?php echo isset($m_shop_rent) ? $m_shop_rent : '' ?>" required>
			</div>


		</div>
		<div class="form-group row">
			
			
			<div class="col-md-4">
				<label for="" class="control-label">Shop Zone</label>
				<input type="text" class="form-control" name="shop_zone" value="<?php echo isset($shop_zone) ? $shop_zone : '' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Shop Area (Sq. ft)</label>
				<input type="text" class="form-control" name="shop_area" value="<?php echo isset($shop_area) ? $shop_area : '' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Market name</label>
				<input type="text" class="form-control" name="market_name" value="<?php echo isset($market_name) ? $market_name : '' ?>" required>
			</div>
		</div>
	</form>
</div>
<script>
 $('#manage-tenant').submit(function(e) {
		e.preventDefault()
 	start_load()
		$('#msg').html('')
 $.ajax({
 	url: 'ajax.php?action=save_tenant',
 	data: new FormData($(this)[0]),
 	cache: false,
 	contentType: false,
 	processData: false,
 	method: 'POST',
 	type: 'POST',
 	success: function(resp) {
 		if (resp == 1) {
 			alert_toast("Data successfully saved.", 'success')
 			setTimeout(function() {
 				location.reload()
 			}, 1000)
 		}
 	}
 })
	 })
</script>