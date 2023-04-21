<!DOCTYPE html>
<html>

<head>
    <title>Customer Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
            overflow-x: hidden;
        }

        h1 {
            font-size: 36px;
            margin-top: 50px;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        form {
            display: inline-block;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: left;
            animation: slideIn 1s ease-in-out;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            display: block;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #666;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #333;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #666;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-100px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    /* Attempt to connect to MySQL database */
    $link = new mysqli('localhost', 'root', '', 'final');
    // Check connection
    if ($link === false) {
        die("ERROR: Could not connect." . mysqli_connect_error());
    } else {
        if ($_SESSION["loggedin"] == true) {
            if (!isset($_SESSION['refreshed'])) {
                // Perform any necessary processing here

                // Set the session flag to indicate that the page has been refreshed
                $_SESSION['refreshed'] = true;

                // Send the header to refresh the page
                header("Refresh: 0");
            }
            // header("Refresh");
        } else {
            header('Location:./site/account/login/index.php');
        }
    }
    // Retrieve customer profile information from database
    $customer_id = $_SESSION["aadhar"]; // replace with customer's ID from session variable or other source
    $sql = "SELECT * FROM log_users WHERE aadhar=$customer_id";
    $result = mysqli_query($link, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['aadhar'];
            $email = $row['email'];
            $password = $row['password'];
        } else {
            echo "No customer found with ID " . $customer_id;
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    // Handle form submission to update customer profile in database
    if (isset($_POST['save_changes'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "UPDATE log_users SET name='$name', email='$email', password='$password' WHERE aadhar=$customer_id";

        if (mysqli_query($link, $sql)) {
            echo "Profile updated successfully";
        } else {
            echo "Error updating profile: " . mysqli_error($link);
        }
    }

    mysqli_close($link);
    ?>
    <h1>Edit Profile Information</h1>

    <form method="post">
        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
        <input type="submit" name="save_changes" value="Save Changes">
    </form>

    <script>
        // Add any additional JavaScript here
    </script>
</body>

</html>