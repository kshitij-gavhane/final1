<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $resident = $email = $mobile = $state = $city =$aadhar="";
$username_err = $password_err = $confirm_password_err = $resident_err = $email_err = $mobile_err = $state_err = $city_err = $aadhar_err ="";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// VALIDATE USERNAME
	if (empty(trim($_POST["username"]))) {
		$username_err = "Please enter a username.";
	} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
		$username_err = "Username can only contain letters, numbers, and underscores.";
	} else {
		// Prepare a select statement
		$sql = "SELECT id FROM log_users WHERE username = ?";

		if ($stmt = mysqli_prepare($link, $sql)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "s", $param_username);

			// Set parameters
			$param_username = trim($_POST["username"]);

			// Attempt to execute the prepared statement
			if (mysqli_stmt_execute($stmt)) {
				/* store result */
				mysqli_stmt_store_result($stmt);

				if (mysqli_stmt_num_rows($stmt) == 1) {
					$username_err = "This username is already taken.";
				} else {
					$username = trim($_POST["username"]);
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}

	// VALIDATE PASSWORD
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter a password.";
	} elseif (strlen(trim($_POST["password"])) < 6) {
		$password_err = "Password must have atleast 6 characters.";
	} else {
		$password = trim($_POST["password"]);
	}



	// VALIDATE CONFIRM PASSWORD
	if (empty(trim($_POST["confirm_password"]))) {
		$confirm_password_err = "Please confirm password.";
	} else {
		$confirm_password = trim($_POST["confirm_password"]);
		if (empty($password_err) && ($password != $confirm_password)) {
			$confirm_password_err = "Password did not match.";
		}
	}
   //VALIDATE RESIDENT
   
   if(empty($_POST["nationality"])) {
	$resident_err = "Please select the value.";
    }
	else
	{
	 $resident = $_POST["nationality"];
	}

  //VALIDATE CITY
  
  if(empty($_POST["dept_city"])) {
	$city_err = "Please enter the city name.";
    }
	else
	{ $city = $_POST["dept_city"];
	}

  //VALIDATE EMAIL
 
  if(empty($_POST["email"])) 
  {
	$email_err ="Please enter the email address.";
  }
  else
  {
	$email = $_POST["email"];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	 {
		$email_err = "Invalid email format.";
	}   
} 
   
 //VALIDATE STATE
  if(empty($_POST['dept_state'])) 
   {
	$state_err = "Please enter the state name.";
   }
  else
   { 
	$state = $_POST['dept_state'];
   }

  //VALIDATE MOBILE NUMBER
  if(empty($_POST['phonenumber'])) 
    {
	$mobile_err = "Please enter the phone number.";
    }
  else
    { $mobile = $_POST['phonenumber'];
	  if(!preg_match('/^[0-9]{10}+$/', $mobile))
	  {
        $mobile_err = "Invalid phone number! Phone number must be only 10-digits long.";
	  }
    }
  
	//VALIDATE AADHAR
	if(empty($_POST['aadhar']))
	{
		$aadhar_err = "Please enter your aadhar number.";
	}
	else
	{   $aadhar = $_POST['aadhar'];
		if(!preg_match('/^[0-9]{12}+$/',$aadhar))
		{
			$aadhar_err="Invalid Aadhar number! Addhar number must be 12-digits long.";
		}
	}
	// Check input errors before inserting in database
	if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($mobile_err) && empty($city_err) && empty($state_err) && empty($email_err) && empty($resident_err) && empty($aadhar_err))
	{

		// Prepare an insert statement
		$sql = "INSERT INTO log_users (username,password,email,mobile,state,city,resident,aadhar) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		if ($stmt = mysqli_prepare($link, $sql)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "sssisssi", $param_username, $param_password,$email,$mobile,$state,$city, $resident, $aadhar);

			// Set parameters
			$param_username = $username;
			$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

			// Attempt to execute the prepared statement
			if (mysqli_stmt_execute($stmt)) {
				// Redirect to login page
				header("location: /site/customer-dashboard/public/index");
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}

	// Close connection
	mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="ISO-8859-1">
	<title>Registration</title>
	<script src="js/3669-main_js-jquery.min.js"></script>
	<script src="js/821-main_js-dept_reg.js"></script>
	<link rel="stylesheet" href="css/mdl_CSS-material.css">
	<link rel="stylesheet" href="css/mdl_CSS-dept_reg.css">
	<link rel="stylesheet" href="css/mdl_CSS-material.min.css">

	<link rel="icon" type="image/png" href="favicons/favicon.ico">
	<link rel="icon" type="image/png" href="favicons/favicon.ico">
	<link rel="file" type="multipart/byteranges" href="pdfFiles/Authorizationletter.pdf">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">


	<style>
		.body {
			background: whitesmoke;
		}

		/* -------------------------------------------------------------------------------
                                Registration Form
   -------------------------------------------------------------------------------*/
		.form-header {
			background-color: #370a9a;
			padding: 30px;
			border-radius: 8px 8px 0px 0px;
		}

		.form-control {
			font-size: 15px;
		}

		.form-control,
		.form-control:focus,
		.input-group-text {
			border-color: #e1e1e1;
		}

		.form-control,
		.btn {
			border-radius: 3px;
		}

		.signup-form {
			width: 600px;
			margin: 0 auto;
			padding: 30px 0;
		}

		.signup-form-container {
			width: 450px;
			margin: 0 auto;
			padding: 20px 0;
		}

		.signup-form form {
			border-radius: 3px;
			margin-bottom: 15px;
			background: rgb(238, 236, 236);
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.form-header h2 {
			color: rgb(255, 255, 255);
		}

		.signup-form .form-group {
			margin-bottom: 20px;
		}

		.signup-form label {
			font-weight: normal;
			font-size: 15px;
		}

		.signup-form .form-control {
			min-height: 38px;
			box-shadow: none !important;
		}

		.signup-form .input-group-addon {
			max-width: 42px;
			text-align: center;
		}

		.signup-form .btn,
		.signup-form .btn:active {
			font-size: 16px;
			font-weight: bold;
			border: none;
			min-width: 140px;
		}

		.signup-form a {
			color: #fff;
			text-decoration: underline;
		}

		.signup-form a:hover {
			text-decoration: none;
		}

		.signup-form form a {
			color: #19aa8d;
			text-decoration: none;
		}

		.signup-form form a:hover {
			text-decoration: underline;
		}

		.signup-form .fa {
			font-size: 21px;
		}

		.indicator {
			height: 5px;
			margin: 5px 0;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		/*-----------------------------End Registration Form---------------------------------*/
	</style>
</head>

<body style="padding-top: 100px;">
	<div class="col-md-12">
		<link rel="stylesheet" href="css/main_bootstrap-bootstrap.min.css">
		<link rel="stylesheet" href="css/main_bootstrap-font-awesome.css">
		<link rel="stylesheet" href="css/main_bootstrap-font-awesome.min.css">
		<link rel="file" type="multipart/byteranges" href="pdfFiles/Authorizationletter.pdf">
		<link rel="file" type="multipart/byteranges" href="pdfFiles/UndertakingforAppStore.pdf">
		<link rel="file" type="multipart/byteranges" href="pdfFiles/Appstore%20Upload%20App%20Process.pptx">
		<link rel="file" type="multipart/byteranges" href="pdfFiles/Appstore%20Update%20App%20Process.pptx">
		<style>
			/*=============================Top Bar======================*/

			#topbar {
				background-color: #290674;
				height: 40px;
				color: white;
				margin-bottom: 0;
			}

			#topbar .fa-phone {
				border-left: 1px solid white;
				display: inline-block;
				padding: 8px 8px;
				line-height: 1px;
			}

			#topbar .fa {
				margin-left: 10px;
				margin-right: 10px;
			}

			#topbar .login-register {
				color: white;
				padding: 2px 5px;
				display: inline;
				border-radius: 6px;
				background-color: #370a9a;
				margin-left: 5px;
				margin-right: 5px;
			}

			#topbar .login-register:hover {
				color: #290674;
				border-radius: 6px;
				background-color: white;
				transition: 0.6s;
			}

			.media-handler:hover {
				transition: 0.6s;
				color: white;
				border-radius: 6px;
				background-color: #370a9a;
			}

			.media-handler {
				color: white;
				padding: 4px 4px;
				display: inline-block;
				line-height: 1px;
				border-left: 1px solid #e9e9e9;
			}


			/*=============================End Top Bar==============================*/
			/*===============================Nav Bar=========================*/

			#navaigation-bar {
				background-color: #370a9a;
				top: 40px;
				white-space: nowrap;
			}

			.nav-item .nav-link {
				white-space: nowrap;
				color: white;
			}

			.nav-item .nav-link:hover {
				transition: 0.6s;
				color: #290674;
				border-radius: 6px;
				background-color: white;
			}

			.navbar-toggler {
				background: #290674;
			}

			#toggler-icon {
				color: white;
			}

			.navbar-logo {
				padding: 5px;
				border-radius: 3px;
				flex-wrap: nowrap;
				margin-right: 10px;
				background-color: white;
				height: 40px;
			}

			.dropdown-item:hover {
				background-color: #370a9a;
				color: white;
				transition: 0.6s;
			}

			.dropdown-menu {
				max-height: 400px;
				overflow: hidden;
				overflow-y: auto;
			}

			.navbar {
				margin: auto;
				display: inline-flex;
			}

			.navbar-brand {
				font-weight: bold;
				font-size: large;
				margin-bottom: auto;
				color: white;
			}

			.brand-subtitle {
				margin-top: auto;
				color: white;
			}

			/*===============================End Nav Bar=========================*/

			/*======================Card=======================*/

			.card:hover {
				box-shadow: 0px 4px 3px 0px rgba(0, 0, 0, 0.2), 0px 4px 3px 0px rgba(0, 0, 0, 0.14), 0px 4px 3px 4px rgba(0, 0, 0, 0.12);
				transition: box-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1);
			}

			.card {
				white-space: nowrap;
				overflow: hidden;
				padding: 5px;
				width: 10rem;
				margin: 5px;
			}

			.card-img-top {
				min-width: 100px;
				height: 100px;
				width: 100px;
				border-radius: 8px;
				margin-top: 10px;
			}

			.card-text {
				text-align: left;
			}

			.card-title {
				margin-bottom: 0px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
				font-weight: bold;
				text-align: left;
			}

			/*======================End Card=======================*/
			/* ========================Skip Link============================ */
			.skip-link:focus {
				scroll-behavior: smooth;
			}

			/* ========================End Skip Link============================ */
		</style>
		<!-- ======================Nav bar========================== -->
		<nav class="navbar fixed-top text-center" id="topbar">
			<div class="contact-info mr-auto" style="display: inline;">
				<!-- <img class="mr-2" src="images/images-indiaflag.png"> -->
				<a href="https://www.nmcnagpur.gov.in/" target="_blank" class="text-white">Nagpur Munciple Corporation </a>
				<i class="fa fa-phone"></i>
				<span style="color: white;">+91- xxxxxxxxxx</span>
			</div>

			<div class="d-flex float-right">
				<!--  <a href="#main" class="text-white mr-2 skip-link"><span>Skip to main content</span></a>-->
				<a href="https://twitter.com/ngpnmc" class="media-handler" target="_blank"><i class="fa fa-twitter fa-sm"></i></a>
				<a href="http://www.facebook.com/nmcngp" class="media-handler" target="_blank"><i class="fa fa-facebook fa-sm"></i></a>
				<a href="https://www.youtube.com/" class="media-handler" target="_blank"><i class="fa fa-youtube-square fa-sm"></i></a>

			</div>
		</nav>
		<nav class="navbar navbar-expand-sm fixed-top " id="navaigation-bar">
			<a href="https://www.nmcnagpur.gov.in/" target="_blank">
				<img src="images/images-favicon.png" class="navbar-logo" alt="Mobile Seva">
			</a>
			<!-- <p class="navbar-brand">Mobile Seva AppStore</p> -->
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu" aria-expanded="false" aria-controls="navbar">
				<i class="fa fa-bars" aria-hidden="true" id="toggler-icon"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarMenu">
				<ul class="navbar-nav ml-auto">

					<li class="nav-item">
						<a href="/site/index.html" class="nav-link">About Us</a>
					</li>
					<li class="nav-item">
						<a href="/site/feedback/index.html" class="nav-link">Contact Us</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- ======================End Nav bar========================== -->
	</div>
	<div class="container-fluid">
		<nav aria-label="breadcrumb">
			<p>Already have an account? <a href="/site/account/login/index.php">Login here</a>.</p>
		</nav>
		<div class="row justify-content-center mt-4 mb-4">
			<div class="col-md-8">
				<div class="mdl-shadow--2dp  text-center">
					<div class="text-center p-4" style="background-color: #370a9a;">
						<span class="h2 text-center text-white">Shop Tenant
							Registration</span>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
						<div class="d-block bg-light p-3">
							<div class="form-group">
								<span class="error text-danger"></span>
							</div>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Important Note!</strong> Please note this registration form is for Member who wish to make rent application or pay rent for existing space. To know more please click <a href="https://www.nmcnagpur.gov.in/" target="_blank">Here</a>.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"></span>
								</button>
							</div>
							<p class="text-danger">All Fields are mandatory!</p>
							<p class="text-danger mt-1 ml-1" id="Registering_For"></p>
							<!--CONTACT PERSION DETAILS -->
							<div id="contact_person_details">
								<div class="form-group">
									<div class="m-3" id="ct_pr_heading"><span class="col-sm-4 text-right font-weight-bold text-primary m-3">Contact Person Details :</span></div>
									<div class="input-group">
										<span class="col-sm-4 font-weight-bold text-right">
											UserName :</span>
										<!-- <input id="name" type="text" class="form-control" name="nodal_person" autocomplete="off" min="100" maxlength="100" placeholder="Contact Person Name" required="required"> -->
										<input id="name" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" autocomplete="off" min="100" maxlength="100" placeholder="Contact Person Name" required="required">
										<span class="invalid-feedback"><?php echo $username_err; ?></span>

									</div>
									<p class="text-danger mt-1 ml-1" id="nodal_person"></p>

								</div>

								<div class="form-group">
									<span class="font-italic text-secondary">Note: This Email ID will be used for Login</span>
									<div class="input-group">
										<span class="col-sm-4 font-weight-bold text-right">Email Address :</span>
										<input id="mail" type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" autocomplete="off" min="100" maxlength="100" placeholder="Email Address" required="required">
										<span class="invalid-feedback"><?php echo $email_err; ?></span>
									</div>
									<p class="text-danger mt-1 ml-1" id="dept_email"></p>
								</div>

                           <!-- MOBILE NUMBER -->
								<div class="form-group">
									<span class="font-italic text-secondary">Note: OTP will
										be sent on this Number while Registration and Login</span>
									<div class="input-group">
										<span class="col-sm-4 font-weight-bold text-right">Mobile Number :</span>
										<input id="phonenumber" type="text" name="phonenumber" class="form-control <?php echo (!empty($mobile_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile; ?>" autocomplete="off" min="10" maxlength="10" placeholder="Mobilenumber" required="required">
									    <span class="invalid-feedback"><?php echo $mobile_err; ?></span>
									</div>
									<p class="text-danger mt-1 ml-1" id="dept_mobile"></p>
								</div>
							</div>
							<!-- AADHAR NUMBER -->
							<div class="form-group">
                            <div class="input-group">
										<span class="col-sm-4 font-weight-bold text-right">Aadhar Number :</span>
										<input id="varchar" type="text" name="aadhar" class="form-control <?php echo (!empty($aadhar_err)) ? 'is-invalid' : ''; ?>"  autocomplete="off" min="12" maxlength="12" placeholder="Aadhar Number" required="required"> 
									    <span class="invalid-feedback"><?php echo $aadhar_err; ?></span>
									</div>

							</div>
							<!-- END CONTACT PERSION DETAILS -->
                            <!-- STATE NAME -->
							<div class="form-group">
								<div class="input-group">

									<span class="col-sm-4 font-weight-bold text-right">
										State Name :</span> <select class="form-control  <?php echo (!empty($state_err)) ? 'is-invalid' : ''; ?>" name="dept_state">
										<span class="invalid-feedback"><?php echo $state_err; ?></span>
										<option value="Select State" selected>Select State</option>
										<option value="maharashtra" >maharashtra</option>
	                                    <option value="Andaman &amp; Nicobar">Andaman &amp; Nicobar</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
										<option value="Arunachal Pradesh">Arunachal Pradesh</option>
										<option value="Bihar">Bihar</option>
										<option value="Chandigarh">Chandigarh</option>
										<option value="Chhattisgarh">Chhattisgarh</option>
										<option value="Delhi">Delhi</option>
										<option value="Goa">Goa</option>
										<option value="Gujarat">Gujarat</option>
										<option value="Haryana">Haryana</option>
										<option value="Himachal Pradesh">Himachal Pradesh</option>
										<option value="Jharkhand">Jharkhand</option>
										<option value="Karnataka">Karnataka</option>
										<option value="Kerala">Kerala</option>
										<option value="Madhya Pradesh">Madhya Pradesh</option>
										<option value="Maharashtra">Maharashtra</option>
										<option value="Manipur">Manipur</option>
										<option value="Meghalaya">Meghalaya</option>
										<option value="Mizoram">Mizoram</option>
										<option value="Nagaland">Nagaland</option>
										<option value="Odisha">Odisha</option>
										<option value="Pondicherry">Pondicherry</option>
										<option value="Punjab">Punjab</option>
										<option value="Rajasthan">Rajasthan</option>
										<option value="Seven States Eastern States">Seven States Eastern States</option>
										<option value="Sikkim">Sikkim</option>
										<option value="Tamil Nadu">Tamil Nadu</option>
										<option value="Telangana">Telangana</option>
										<option value="Uttar Pradesh">Uttar Pradesh</option>
										<option value="Uttaranchal">Uttaranchal</option>
										<option value="West Bengal">West Bengal</option>
									</select>
								</div>
								<p class="text-danger mt-1 ml-1" id="dept_state"></p>
							</div>
                          <!-- CITY NAME -->
							<div class="form-group">
								<div class="input-group">
									<span class="col-sm-4 font-weight-bold text-right">
										City Name :</span> <input type="text" class="form-control  <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" name="dept_city" autocomplete="off" placeholder="City" maxlength="20" required="required">
								    <span class="invalid-feedback"><?php echo $city_err; ?></span>
								</div>
								<p class="text-danger mt-1 ml-1" id="dept_city"></p>
							</div>
                      <!-- RESIDENT RADIO BUTTONS -->
							<div class="form-group d-flex flex-row p-2">
								<label id="changelevel" class="col-sm-4 font-weight-bold text-right" for="nationality">
									Are You Resident Of Maharashtra? </label>
								<div class="form-check m-1">
									<input class="form-check-input" type="radio" name="nationality" id="nationality" value="Y"> <label class="col-sm-4 font-weight-bold text-right" for="flexRadioDefault1"> Yes </label>
								    <span class="invalid-feedback"><?php echo $resident_err; ?></span>
								</div>
								<div class="form-check m-1">
									<input class="form-check-input" type="radio" name="nationality" id="nationality1" value="N"> <label class="col-sm-4 font-weight-bold text-right" for="flexRadioDefault2"> No </label>
									<span class="invalid-feedback"><?php echo $resident_err; ?></span>
								</div>
							</div>
                      <!-- PASSWORD -->
							<div class="form-group">
								<span class="text-secondary font-italic">Password Format
									: Min. length 6, must contain at least 1 Special Symbol, 1
									number and 1 Upper case</span>

								<div class="input-group">
									<span class="col-sm-4 font-weight-bold text-right">Password :</span>
									<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" autocomplete="off" id="dept_password" placeholder="Password" required="required" maxlength="20">
									<span class="invalid-feedback"><?php echo $password_err; ?></span>

								</div>
								<span class="text-danger" id="password_format_error"></span>
								<div class="justify-content-center d-flex">
									<div class="indicator" style="display: flex;" id="dept_meter"></div>
									<span class="float-right ml-2" id="password_type"></span>
								</div>

							</div>
                        <!-- CONFIRM PASSWORD -->
							<div class="form-group">
								<div class="input-group">
									<span class="col-sm-4 font-weight-bold text-right">Confirm	Password :</span>
									
									<!-- <input type="password" class="form-control" name="dept_cnf_password" autocomplete="off" placeholder="Confirm Password" required="required" maxlength="20"> -->
									<input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" autocomplete="off" placeholder="Confirm Password" required="required" maxlength="20">
									<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>

								</div>
								<span class="text-danger" id="cnf_password_error"></span>
							</div>
							<div class="form-group" id="deptauth">
								<p class="text-danger mt-1 ml-1" id="dept_undertacking_error"></p>
								<p class="text-danger mt-1 ml-1" id="dept_undertacking_error2"></p>
							</div>

							<div class="text-center">
								<span class="text-center">By clicking Register you are
									agree to our <a href="website_policy.html" target="_blank">Privacy
										Policy</a> and <a href="terms_and_conditions.html" target="_blank">Terms
										of Use</a>
								</span>

							</div>
							<div class="text-center ml-4 p-3">
								<p class="text-danger mt-1 ml-1" id="Registering_For1"></p>
								<button class="mdl-button mdl-js-button mdl-button--raised bg-success text-white  mdl-js-ripple-effect ml-2" onclick="validateRegistrationForm()">Register</button>
								<button class="mdl-button mdl-js-button mdl-button--raised  bg-danger text-white  mdl-js-ripple-effect mr-2" onclick="resetForm()">Clear</button>


							</div>
						</div>
					</form>

					<!-- Modal -->
					<div class="modal fade" id="error_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-danger">
									<h5 class="modal-title text-white" id="exampleModalLabel">Error</h5>
								</div>
								<div class="modal-body">
									<span id="error_text"></span>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-success text-center" data-dismiss="modal">Close</button>
								</div>

							</div>
						</div>
					</div>
					<!-- Modal end-->

					<!-- Modal -->
					<div class="modal fade" id="Membercn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Member
										Confirmation</h5>
									<!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>-->
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Confirm</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="uncheck1()">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div>

		<meta charset="utf-8">
		<script src="js/2771-main_js-jquery-3.5.1.slim.min.js"></script>
		<script src="js/3020-main_js-jquery.min.js"></script>
		<script src="js/72-main_js-popper.min.js"></script>
		<!-- <script src="js/captcha.js"></script> -->
		<script src="js/4494-main_js-bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/main_bootstrap-bootstrap.min.css">
		<link rel="stylesheet" href="css/main_bootstrap-font-awesome.css">
		<link rel="stylesheet" href="css/main_bootstrap-font-awesome.min.css">
		<style>
			/*=========================Footer=========================*/

			.footer-copyright {
				background: #290674;
				color: #9361ff;
			}

			.footer-link {
				color: white;
			}

			.footer-link:hover {
				background-color: white;
				color: #290674;
				border-radius: 6px;
				transition: 0.6s;
				padding: 2px 2px;
			}

			#footer-header {
				color: #c1a5fd;
			}

			.footer-logo {
				border-radius: 6px;
				width: 400px;
			}

			.footer-url {
				margin: 10px;
			}

			.footer-url-wrapper {
				background-color: #303030;
			}

			.footer-link-container {
				background: #370a9a;
			}

			.footer-bottom-container {
				background: #290674;
				height: 50px;
			}

			.my-2 {
				color: white;
			}

			/*=========================End Footer======================*/
		</style>


		<footer class="page-footer">
			<!-- <div class="footer-url-wrapper">
            <div class="container">
                <div class="row py-4 d-flex align-items-center">
                    <div class="col-md-12 text-center">
                        <a class="footer-url" title="MyGov Innovate" alt="MyGov Innovate" href="https://innovate.mygov.in" target="_blank"><img title="MyGov Innovate" alt="MyGov Innovate" src="images/images-innovation-logo.png"></a>
                        <a class="footer-url" title="Swachhbharat" alt="Swachhbharat" href="https://swachhbharat.mygov.in/" target="_blank"><img title="Swachhbharat" alt="Swachhbharat" src="images/images-swachh-bharat.png"></a>
                        <a class="footer-url" title="MyGov Quiz" alt="MyGov Quiz" href="https://quiz.mygov.in" target="_blank"><img title="MyGov Quiz" alt="MyGov Quiz" src="images/images-mygov_quiz.png"></a>
                        <a class="footer-url" title="MyGov Blog" alt="MyGov Blog" href="https://blog.mygov.in" target="_blank"><img alt="" src="images/images-blog-logo.png"></a>
                        <a class="footer-url" title="Self4Society" alt="Self4Society" href="https://self4society.mygov.in" target="_blank"><img alt="Self4Society Logo" src="images/images-itowe-logo.png"></a>
                        <a class="footer-url" title="E-Greetings" alt="E-Greetings" href="https://egreetings.gov.in" target="_blank"><img title="E-Greetings" alt="E-Greetings" src="images/images-e-greating.png"></a>
                    </div>
                </div>
            </div>
        </div> -->

			<div class="footer-link-container conatiner-fluid text-center text-md-left">
				<!-- Grid row -->
				<div class="row">

					<!-- Grid column -->
					<div class="col-md-6 mt-md-0">

						<!-- Content -->

						<img src="images/Member-images%5Cfooter-logo.png" class="footer-logo img-fluid mt-3">

					</div>
					<!-- Grid column -->

					<hr class="clearfix w-100 d-md-none pb-3">

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mt-4">

						<!-- Links -->
						<h5 class="text-uppercase" style="color: white;">Important Links</h5>

						<ul class="list-unstyled">
							<li>
								<a href="website_disclaimer.html" class="footer-link">Disclaimer</a>
							</li>
							<li>
								<a href="website_policy.html" class="footer-link">Website Policies</a>
							</li>
							<li>
								<a href="terms_and_conditions.html" class="footer-link">Terms and Conditions</a>
							</li>
						</ul>

					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mt-4">

						<!-- Links -->
						<h5 class="text-uppercase" style="color: white;">Important Links</h5>

						<ul class="list-unstyled">
							<li>
								<a href="contact.html" class="footer-link">Contact Us</a>
							</li>
							<li>
								<a href="website_accessibility.html" class="footer-link">Accessibility</a>
							</li>
							<li>
								<a href="about.html" class="footer-link">About Us</a>
							</li>

						</ul>

					</div>
					<!-- Grid column -->

				</div>
				<!-- Grid row -->
			</div>
			<div class="footer-bottom-container conatiner-fluid text-center">
				<!-- Copyright -->
				<div class="footer-copyright text-center py-3"> 2020 Copyright: C-DAC Mumbai. All Rights Reserved
				</div>
				<!-- Copyright -->
			</div>
		</footer>

	</div>
</body>

</html>