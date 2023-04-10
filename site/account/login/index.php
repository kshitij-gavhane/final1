<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to customer dashboard
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: /site/customer-dashboard/public/index.php");
  exit;
}
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$aadhar = $password = "";
$aadhar_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["aadhar"]))) {
    $aadhar_err = "Please enter aadhar number.";
  } else {
    $aadhar = trim($_POST["aadhar"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($aadhar_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT id, aadhar, password FROM log_users WHERE aadhar = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_aadhar);

      // Set parameters
      $param_aadhar = $aadhar;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) 
        {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $aadhar, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["aadhar"] = $aadhar;
              $_SESSION["password"] = $hashed_password;

              // Redirect user to customer dashboard
              header("location: /site/customer-dashboard/public/index.php");
            } else 
            {
              // Password is not valid, display a generic error message
              $login_err = "Invalid aadhar or password.";
          
              
            }
          }
        } else {
          // Username doesn't exist, display a generic error message
          $login_err = "Invalid aadhar or password.";
          
        }
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
<html>

<head>
  <meta charset="ISO-8859-1">
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login or Register</title>
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/images-favicon.png">
  <!-- <link rel="icon" type="image/png" href="favicons/7780-images-loginPic.png">	 -->
  <script>


  </script>


  <style>
    :root {
      --bg-color: #f5f5f5;
      --bg-round-a: #4481eb;
      --bg-round-b: #04befe;
      --panel-color: #fff;
      --title: #444;
      --bg-input: #e0e0e0;
      --input-icon: #8a8a8a;
      --input: #333;
      --input-hover: #222;
      --btn-color: #5995fd;
      --btn-text: #fff;
      --btn-hover: #4d84e2;
      --social-text: #444;
      --social-icon: #4481eb;
      --icon-color: #333;
      --check-text: #333;
      --check-hover: #333;
      --check-link: #4d84e2;
      --pass-color: #444;
      --key-color: #777;
      --pass-hover-color: #4d84e2;
      --keyboard-color: #e0e0e0;
      --key-letter: #333;
    }

    :root[data-theme="dark"] {
      --bg-color: #222;
      --bg-round-a: #4a4a4a;
      --bg-round-b: #2e2e2e;
      --panel-color: #fff;
      --title: #f2f2f2;
      --bg-input: #444;
      --input-icon: #ccc;
      --input: #ccc;
      --input-hover: #aaa;
      --btn-color: #333;
      --btn-text: #f2f2f2;
      --btn-hover: #444;
      --social-text: #ccc;
      --social-icon: #fff;
      --icon-color: #aaa;
      --check-text: #fff;
      --check-hover: #fff;
      --check-link: #5995fd;
      --pass-color: #fff;
      --pass-hover-color: #5995fd;
      --key-color: #f0f0f0;
      --keyboard-color: #444;
      --key-letter: #fff;
    }

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    .container {
      position: relative;
      width: 100%;
      min-height: 100vh;
      background-color: var(--bg-color);
      overflow: hidden;
    }

    .container:before {
      content: "";
      position: absolute;
      width: 2000px;
      height: 2000px;
      border-radius: 50%;
      background: linear-gradient(-45deg, var(--bg-round-a), var(--bg-round-b));
      top: -10%;
      right: 48%;
      transform: translateY(-50%);
      z-index: 6;
      transition: 1.8s ease-in-out;
    }

    .forms-container {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
    }

    .signin-signup {
      position: absolute;
      top: 50%;
      left: 75%;
      transform: translate(-50%, -50%);
      width: 50%;
      display: grid;
      grid-template-columns: 1fr;
      z-index: 5;
      transition: 1s 0.7s ease-in-out;
    }

    form {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 5rem;
      overflow: hidden;
      grid-column: 1 / 2;
      grid-row: 1 / 2;
      transition: 0.2s 0.7s ease-in-out;
    }

    form.sign-in-form {
      z-index: 2;
    }

    form.sign-up-form {
      z-index: 1;
      opacity: 0;
    }

    /* MODAL */

    .btn-modal {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: pink;
      font-size: 20px;
      color: white;
      padding: 10px 30px;
      cursor: pointer;
    }

    #popUpBox {
      width: 500px;
      overflow: hidden;
      background: pink;
      box-shadow: 0 0 10px black;
      border-radius: 10px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      padding: 10px;
      text-align: center;
      display: none;
    }

    .title {
      font-size: 2.2rem;
      color: var(--title);
      margin-bottom: 10px;
    }

    .input-field {
      width: 85%;
      height: 55px;
      background-color: var(--bg-input);
      margin: 10px 0;
      border-radius: 55px;
      display: grid;
      grid-template-columns: 15% 70% 15%;
      padding: 0 0.4rem;
    }

    .input-field i {
      text-align: center;
      line-height: 55px;
      color: var(--input-icon);
      font-size: 1.1rem;
    }

    .key {
      color: var(--key-color);
      text-decoration: none;
    }

    .key:hover {
      color: var(--pass-hover-color);
    }

    .pass {
      margin: 12px 0;
      color: var(--pass-color);
    }

    .pass:hover {
      color: var(--pass-hover-color);
    }

    #togglePassword {
      text-align: center;
      color: var(--input-icon);
    }

    #toggleReg {
      text-align: center;
      color: var(--input-icon);
    }

    .input-field input {
      background: none;
      outline: none;
      border: none;
      line-height: 1;
      font-weight: 600;
      font-size: 1.1rem;
      color: var(--input);
    }

    .input-field input::placeholder {
      color: var(--input-hover);
      font-weight: 500;
    }

    .btn {
      width: 150px;
      height: 49px;
      border: none;
      outline: none;
      border-radius: 49px;
      cursor: pointer;
      background-color: var(--btn-color);
      color: var(--btn-text);
      text-transform: uppercase;
      font-weight: 600;
      margin: 10px 0;
      transition: 0.5s;
    }

    .btn:hover {
      background-color: var(--btn-hover);
    }

    .check {
      display: block;
      position: relative;
      margin: 12px 0;
      cursor: pointer;
      font-size: 16px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .checkmark {
      color: var(--check-text);
    }

    .checkmark a {
      color: var(--check-link);
      text-decoration: underline;
    }

    .checkmark a:hover {
      color: var(--check-hover);
    }

    .social-text {
      padding: 0.7rem 0;
      font-size: 1rem;
      color: var(--social-text);
    }

    .social-media {
      display: flex;
      justify-content: center;
    }

    .social-icon {
      height: 46px;
      width: 46px;
      border: 1px solid var(--icon-color);
      margin: 0 0.45rem;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      color: var(--icon-color);
      font-size: 1.1rem;
      border-radius: 50%;
      transition: 0.3s;
    }

    .social-icon:hover {
      color: var(--social-icon);
      border-color: var(--social-icon);
    }

    .icon-mode {
      height: 32px;
      width: 32px;
      border: 1px solid var(--icon-color);
      margin: 40px 5px 0 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      color: var(--icon-color);
      font-size: 1rem;
      border-radius: 50%;
      transition: 0.3s;
    }

    .icon-mode:hover {
      color: var(--social-icon);
      border-color: var(--social-icon);
    }

    .text-mode {
      padding: 0.5rem 0;
      font-size: 0.8rem;
      font-style: italic;
      color: var(--social-text);
    }

    .panels-container {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
    }

    .panel {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      justify-content: space-around;
      text-align: center;
      z-index: 7;
    }

    .left-panel {
      pointer-events: all;
      padding: 3rem 17% 2rem 12%;
    }

    .right-panel {
      pointer-events: none;
      padding: 3rem 12% 2rem 17%;
    }

    .panel .content {
      color: var(--panel-color);
      transition: 0.9s 0.6s ease-in-out;
    }

    .panel h3 {
      font-weight: 600;
      line-height: 1;
      font-size: 1.5rem;
    }

    .panel p {
      font-size: 0.95rem;
      padding: 0.7rem 0;
    }

    .btn.transparent {
      margin: 0;
      background: none;
      border: 2px solid #fff;
      width: 130px;
      height: 41px;
      font-weight: 600;
      font-size: 0.8rem;
    }

    .image {
      width: 70%;
      margin-top: -20px;
      margin-right: 30px;
      transition: 1.1s 0.4s ease-in-out;
    }

    .right-panel .content,
    .right-panel .image {
      transform: translateX(800px);
    }

    /* ANIMATION */

    .container.sign-up-mode:before {
      transform: translate(100%, -50%);
      right: 52%;
    }

    .container.sign-up-mode .left-panel .image,
    .container.sign-up-mode .left-panel .content {
      transform: translateX(-800px);
    }

    .container.sign-up-mode .right-panel .content,
    .container.sign-up-mode .right-panel .image {
      transform: translateX(0px);
    }

    .container.sign-up-mode .left-panel {
      pointer-events: none;
    }

    .container.sign-up-mode .right-panel {
      pointer-events: all;
    }

    .container.sign-up-mode .signin-signup {
      left: 25%;
    }

    .container.sign-up-mode form.sign-in-form {
      z-index: 1;
      opacity: 0;
    }

    .container.sign-up-mode form.sign-up-form {
      z-index: 2;
      opacity: 1;
    }

    /* KEYBOARD */

    .keyboard {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      padding: 5px 0;
      background: var(--keyboard-color);
      box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
      user-select: none;
      transition: bottom 0.4s;
      z-index: 999;
    }

    .keyboard--hidden {
      bottom: -100%;
    }

    .keyboard__keys {
      text-align: center;
    }

    .keyboard__key {
      height: 45px;
      width: 6%;
      max-width: 90px;
      margin: 3px;
      border-radius: 4px;
      border: none;
      background: rgba(255, 255, 255, 0.2);
      color: var(--key-letter);
      font-size: 1.05rem;
      outline: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      vertical-align: top;
      padding: 0;
      -webkit-tap-highlight-color: transparent;
      position: relative;
    }

    .keyboard__key:active {
      background: rgba(255, 255, 255, 0.12);
    }

    .keyboard__key--wide {
      width: 12%;
    }

    .keyboard__key--extra-wide {
      width: 36%;
      max-width: 500px;
    }

    .keyboard__key--activatable::after {
      content: "";
      top: 10px;
      right: 10px;
      position: absolute;
      width: 8px;
      height: 8px;
      background: rgba(0, 0, 0, 0.4);
      border-radius: 50%;
    }

    .keyboard__key--active::after {
      background: #08ff00;
    }

    .keyboard__key--dark {
      background: rgba(0, 0, 0, 0.25);
    }

    /* MEDIA SCREEN */

    @media (max-width: 870px) {
      .container {
        min-height: 800px;
        height: 100vh;
      }

      .container::before {
        width: 1500px;
        height: 1500px;
        left: 30%;
        bottom: 68%;
        transform: translateX(-50%);
        right: initial;
        top: initial;
        transition: 2s ease-in-out;
      }

      .signin-signup {
        width: 100%;
        left: 50%;
        top: 95%;
        transform: translate(-50%, -100%);
        transition: 1s 0.8s ease-in-out;
      }

      .panels-container {
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 2fr 1fr;
      }

      .panel {
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        padding: 2.5rem 8%;
      }

      .panel .content {
        padding-right: 15%;
        transition: 0.9s 0.8s ease-in-out;
      }

      .panel h3 {
        font-size: 1.2rem;
      }

      .panel p {
        font-size: 0.7rem;
        padding: 0.5rem 0;
      }

      .btn.transparent {
        width: 110px;
        height: 35px;
        font-size: 0.7rem;
      }

      .image {
        display: none;
      }

      /*.image {
        width: 200px;
        transition: 0.9s 0.6s ease-in-out;
    }*/

      .left-panel {
        grid-row: 1 / 2;
      }

      .right-panel {
        grid-row: 3 / 4;
      }

      .right-panel .content,
      .right-panel .image {
        transform: translateY(300px);
      }

      .container.sign-up-mode:before {
        transform: translate(-50%, 100%);
        bottom: 32%;
        right: initial;
      }

      .container.sign-up-mode .left-panel .image,
      .container.sign-up-mode .left-panel .content {
        transform: translateY(-300px);
      }

      .container.sign-up-mode .signin-signup {
        top: 5%;
        transform: translate(-50%, 0);
        left: 50%;
      }

      .keyboard,
      .key {
        opacity: 0;
        visibility: hidden;
        font-size: 0.1px;
      }
    }

    @media (max-width: 570px) {
      form {
        padding: 0 1.5rem;
      }

      .image {
        display: none;
      }

      .panel .content {
        padding: 0.5rem 1rem;
      }

      .panel p {
        opacity: 0;
      }

      .container:before {
        bottom: 75%;
        left: 50%;
      }

      .container.sign-up-mode:before {
        bottom: 24%;
        left: 50%;
      }

      .field-icon {
        float: right;
        margin-left: 300px;
        margin-top: -55px;
        position: relative;
        z-index: 1;
      }
    }

    @media (max-width: 385px) {
      .field-icon {
        float: right;
        margin-left: 260px;
        margin-top: -55px;
        position: relative;
        z-index: 1;
      }
    }

    @media (max-width: 350px) {
      .field-icon {
        float: right;
        margin-left: 200px;
        margin-top: -55px;
        position: relative;
        z-index: 1;
      }
    }
  </style>

</head>
<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <?php
        if (!empty($login_err)) {
          echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form method="post" name="login_form" class="sign-in-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <h2 class="title">Member Login</h2>
          <h5 class="title" style="font-size: 18px;">Exclusive Platform for customers</h5>
          <br>
          <div class="form-group">
            <span class="error text-danger"></span>
          </div>
          <div class="form-group">
            <span class="text-success"></span>
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="aadhar"  value="<?php echo $aadhar; ?>" autocomplete="off" placeholder="Registered aadhar number" required="required" autofocus="autofocus">
            <span class="invalid-feedback"><?php echo $aadhar_err; ?></span>

          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" autocomplete="off" required="required">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>

            <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
          </div>

          <!-- <div class="">
			<br>
        	<img alt="captcha code" src="images/Developer-captcha-service" id="captchaimg" style="height: 40px; width: 150px;margin-bottom: -15px;">
        	<button type="button" onclick="refreshCaptcha()">
				<span class="fa fa-refresh text-dark"></span>
			</button>
			
			<input type="text" name="captcha" autocomplete="off" placeholder="Enter Captcha" required="required" id="EnterCaptcha">
  			 
        </div> -->
          <br>

          <input type="submit" value="Login" name="login" class="btn solid" >
          <center>
            <div class="">
              <button onclick="history.back()">Go Back</button>
            </div>
          </center>
          <br>

          <div class="" style="text-align: left; ">
            <div class="">
              <a href="/site/account/forget.php" target="_blank" style="color: red; text-align: left">Forgot password?</a>

            </div>
            <div class="p-3">
              <a href="/site/account/registration/register.php" class="" style="color: #370a9a; text-align: left">Create New Account. Signup Now</a>
            </div>
          </div>
        </form>

      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h1>NMC - NAGPUR</h1>
          <!-- <p style="size: 35px;font-family: comic sans ms">Ensure the Secure Apps From India's Own AppStore</p> -->
          <br>
          <!-- 
          <h4>You don't have an account?</h4>
          <p style="size: 25px;font-family: comic sans ms">Click on the button to Create your account right now</p>
          <br> 
          <a href="deptreg_form" class="btn transparent" style="padding:10px; text-decoration: none">Register Now</a>
          -->
        </div>
        <img src="images/images-loginPic.png" class="image" alt="">
      </div>
    </div>
  </div>

  <script src="js/6709-main_js-login.js"></script>


</body>
</html>

<?php
// $aadhar = $password = "";
// $aadhar_err = $password_err = $login_err = "";
// if(isset($_POST['login'])) //is the button clicked? Then POST method ke use se we need to get the data from form
// {
//   // Check if aadhar number is empty
//   if (empty(trim($_POST["aadhar"]))) 
//   {
//     $aadhar_err = "Please enter aadhar number.";
//   } else 
//   {
//     $aadhar = trim($_POST["aadhar"]);
//   }

//   // Check if password is empty
//   if (empty(trim($_POST["password"]))) 
//   {
//     $password_err = "Please enter your password.";
//   } else 
//   {
//     $password = trim($_POST["password"]);
//   }

//   // Validate credentials
//   if (empty($username_err) && empty($password_err)) 
//   {
//     //storing the form data in these to variables
//       $aadhar=$_POST['aadhar'];
//       $password=$_POST['password'];
//       $query ="SELECT * FROM log_users WHERE aadhar='$aadhar' && password='$password'"; //aadhar is table column name
//       $data=mysqli_query($link,$query);
  
//     //how many records for same aadhar and password
//     //isse milte julte kitte rows hamare pass available hai will get stored in total variable

//       $total=mysqli_num_rows($data);
//     //echo $total; //0 means no record available 
//     //total ko ye malum hai hamare pass kitne records hai

//       if($total == 1)
//      { //before redirecting to afterlogin.html make a session and afterlogin.php ke page ke upar ussi session ko leke jao
//        //means what the user has filled in the form has matched with the content in database
//        // echo 'login sucessfull';
//           $_SESSION['aadhar']=$aadhar;
//        //ab jab bhi login karega user, if user name and password is correct the user can login
//        //session create hoga and uska aadhar number session me jake store hoga
//        //person will go to afterlogin.php page
//           header('location:/site/customer-dashboard/public/index.php'); //if login successfull direct user to afterlogin.html
//        //or search on google meta tag to redirect
//        //if error in header location is not working
//     }
//   else
//     {
//     echo 'login failed';
//     }
//  }
// }
?>