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
$owner_name = " ";
$aadhar = " ";
$zone_no = " ";
$zone_name = " ";
$market_name = " ";
$shop_type = " ";
$shop_id = " ";
$shop_area = " ";
// $shop_area_m = " ";
$monthly_rent = " ";
$gst = " ";
$total  = " ";
$yeary_rent  = " ";
$remark  = " ";

$shop_area_m = is_float(is_float($shop_area) * is_float(0.092903));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user data from form submission
    $owner_name = $_POST['owner_name'];
    $aadhar = $_POST['aadhar'];
    $zone_no = $_POST['zone_no'];
    $zone_name = $_POST['zone_name'];
    $market_name = $_POST['market_name'];
    $shop_type = $_POST['shop_type'];
    $shop_id = $_POST['shop_id'];
    $shop_area = $_POST['shop_area'];
    // $shop_area_m = $_POST['shop_area'] * (0.092903);
    $monthly_rent = $_POST['monthly_rent'];
    $gst = $_POST['gst'];
    $total  = $_POST['total'];
    $yearly_rent = $_POST['yearly_rent'];
    $remark  = $_POST['remark'];
    // Insert user data into database

    $sql =  "INSERT INTO demand (owner_name,aadhar,zone_no,zone_name,market_name,shop_type,shop_id,area_sqft,monthly_rent,yearly_rent,GST,total,remark) 
    VALUES ('$owner_name','$aadhar',  '$zone_no', '$zone_name', '$market_name', '$shop_type', '$shop_id', '$shop_area', '$monthly_rent','$yearly_rent' , '$gst', '$total','$remark')";

    if (mysqli_query($conn, $sql)) {
        echo "User data submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create New Entry</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://linangdata.com/calculatorEmbed/linangcalc.js"></script>
    <div style="width:50px;height:50px;background-image:url('https://linangdata.com/calculatorEmbed/icons/48x48.png')">
        <iframe id="linangcalc" src="https://linangdata.com/calculatorEmbed/embeddable.html?placement=right" width="50" height="50" scrolling="auto" frameBorder="0" allowTransparency="true" style="border:0;position:absolute;opacity:1.0;">
        </iframe>
    </div>
    <script>
        $(document).ready(function() {
            // calculate yearly shop rent automatically
            // $('#monthly_rent, #shop_zone').on('keyup', function() {
            //     var monthly_rent = parseInt($('#monthly_rent').val());
            //     var shop_zone = parseInt($('#shop_zone').val());
            //     if (!isNaN(monthly_rent) && !isNaN(shop_zone)) {
            //         var yearly_rent = monthly_rent * shop_zone * 12;
            //         $('#yearly_rent').val(yearly_rent);
            //     }
            // });

            // clear form
            $('#clear').click(function() {
                $('#owner_name, #aadhar, #zone_no, #zone_name, #market_name, #shop_type, #shop_id, #monthly_rent, #yearly_rent').val('');
            });

            // cancel form
            $('#cancel').click(function() {
                window.location.href = 'index.php';
            });
        });
    </script>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        /* background-color: #f5f5f5; */
    }

    h1 {
        text-align: center;
        margin: 20px 0;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 5px;
    }

    label {
        display: block;
        margin: 10px 0;
    }

    input[type="text"],
    input[type="number"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        width: 100%;
        box-sizing: border-box;
    }

    input[type="submit"],
    input[type="button"] {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px 5px;
        cursor: pointer;
        border-radius: 3px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
        background-color: #3e8e41;
    }

    input[type="submit"]:active,
    input[type="button"]:active {
        background-color: #295c2e;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .buttons {
        text-align: center;
        margin-top: 20px;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-container {
        max-width: 500px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 5px;
    }

    .form-container label {
        display: block;
        margin: 10px 0;
    }

    .form-container input[type="text"],
    .form-container input[type="number"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        width: 100%;
        box-sizing: border-box;
    }

    .form-container input[type="submit"],
    .form-container input[type="button"] {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
</style>

<body>
    <div class="form-overlay">
        <div class="form-box">

            <form method="POST">
                <label for="owner_name">Owner Name:</label>
                <input type="text" id="owner_name" name="owner_name" required>

                <label for="aadhar">Aadhar:</label>
                <input type="text" id="aadhar" name="aadhar" required>


                <label for="zone_no">Zone no:</label>
                <select id="zone_no" name="zone_no" class="select2-dropdown" style="width:50%; height: 35px; font-size:15px;" required>
                    <option value="">Select a zone</option>
                    <option value="1">Zone 1</option>
                    <option value="2">Zone 2</option>
                    <option value="3">Zone 3</option>
                    <option value="4">Zone 4</option>
                    <option value="5">Zone 5</option>
                    <option value="6">Zone 6</option>
                    <option value="7">Zone 7</option>
                    <option value="8">Zone 8</option>
                    <option value="9">Zone 9</option>
                </select>


                <label for="zone_name">Zone Name:</label>
                <input type="text" id="zone_name" name="zone_name" required>

                <label for="market_name">Market Name:</label>
                <input type="text" id="market_name" name="market_name" required>


                <label for="shop_type">Shop Type:</label>
                <select id="shop_type" name="shop_type" class="select2-dropdown" style="width:50%; height: 35px; font-size:15px;" required>
                    <option value="not selected">Select</option>
                    <option value="otta">अस्थाई जागा</option>
                    <option value="shop">हॉल</option>
                    <option value="space">POC जागा</option>
                    <option value="space">IOC जागा</option>
                    <option value="space">POC जागा</option>
                    <option value="space">केना मटन शॉप</option>
                    <option value="space">खुली मटन जागा</option>
                    <option value="space">दुकाने</option>
                    <option value="space">खुली जागा</option>
                    <option value="space">शाॅप</option>
                    <option value="space">जागा</option>
                    <option value="space">मटन दुकाने गाडगा वसाहत</option>
                    <option value="space">पि.ओ.सि. जागा</option>
                    <option value="space">सब्जी ओटे</option>
                    <option value="space">वरील हाॅल (शाॅप)</option>
                </select>


                <label for="shop_id">Shop ID:</label>
                <input type="text" id="shop_id" name="shop_id" required>

                <label for="shop_id">Shop area (sqft):</label>
                <input type="text" id="shop_area" name="shop_area" required>

                <!-- <label for="shop_id">Shop area(m)</label>4\ -->
                <!-- <input type="text" id="shop_id" name="shop_id" required> -->

                <label for="monthly_rent">Monthly Shop Rent:</label>
                <input type="number" id="monthly_rent" name="monthly_rent" min="0" required>

                <label for="gst">GST</label>
                <input type="text" id="gst" name="gst" required>

                <label for="total"></label>Total</label>
                <input type="number" id="total" name="total" required>

                <label for="yearly_rent">yearly rent</label>
                <input type="number" id="yearly_rent" name="yearly_rent" required>

                <label for="remark">Remark</label>
                <input type="text" id="remark" name="remark" required>

                <!--  BUTTONS -->
                <div class="buttons">
                    <input type="submit" value="Submit" name="submit">
                    <input type="reset" value="Clear">
                    <input type="button" value="Cancel" onclick="window.location.href='tenant.php'">
                </div>
            </form>
        </div>
    </div>
</body>

</html>