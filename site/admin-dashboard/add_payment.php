<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// defining variables
$date = " ";
$aadhar = " ";
$ref_id = " ";
$status = " ";
$amount = " ";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user data from form submission
    $date = $_POST['date'];
    $aadhar = $_POST['dropdown'];
    $ref_id = $_POST['ref_id'];
    $status = $_POST['status'];
    $amount = $_POST['amount'];

    // Insert user data into database

    $sql =  "INSERT INTO payments (aadhar,invoice,amount,status,date_created) VALUES ('$aadhar','$ref_id','$amount','$status','$date')";

    if (mysqli_query($conn, $sql)) {
        echo "User data submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
// // close the database connection
// mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Payment Entry</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        form {
            /* background-color: #fff; */
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input,
        select {
            border: none;
            background-color: #f4f4f4;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }

        .select2-dropdown {
            width: auto;
        }
    </style>
</head>

<body>
    <h2>Add Payment Entry</h2>
    <form method="POST">

        <label>Date:</label>
        <input type="date" name="date" required>
        <label>Select Tenant Aadhar:</label>
        <!-- DROPDOWN DISPLAYING ALL THE AADHAR NUMBERS IN DEMAND TABLE -->
        <select class="select2-dropdown" name="dropdown" id="dropdown" style="width:100%;" required>
            <!-- options will be added dynamically -->
            <option value="">select</option>
            <?php
            // write the SQL query to retrieve the options from the database
            $sql = "SELECT aadhar, owner_name FROM demand";
            // execute the SQL query
            $result = mysqli_query($conn, $sql);

            // check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    // add each option to the dropdown
                    echo "<option value='" . $row["aadhar"] . "'>" . $row["aadhar"] . "</option>";
                }
            } else {
                echo "No options found.";
            }
            ?>
        </select>
        <label>Ref. ID:</label>
        <input type="text" name="ref_id" required>

        <label>Status:</label>
        <select name="status" required>
            <option value="Pending">Pending</option>
            <option value="Verified">Verified</option>
        </select>

        <label>Amount:</label>
        <input type="number" step="0.01" name="amount" required>

        <!-- SUBMIT BUTTON -->
        <input type="submit" value="Add Payment Entry" name="submit">

    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-dropdown').select2({
                placeholder: 'Select Aadhar Number'
            });
        });
    </script>

</body>