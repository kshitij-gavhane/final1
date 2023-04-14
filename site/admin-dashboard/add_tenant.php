<!DOCTYPE html>
<html>

<head>
    <title>Create New Entry</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // calculate yearly shop rent automatically
            $('#monthly_rent, #shop_zone').on('keyup', function() {
                var monthly_rent = parseInt($('#monthly_rent').val());
                var shop_zone = parseInt($('#shop_zone').val());
                if (!isNaN(monthly_rent) && !isNaN(shop_zone)) {
                    var yearly_rent = monthly_rent * shop_zone * 12;
                    $('#yearly_rent').val(yearly_rent);
                }
            });

            // clear form
            $('#clear').click(function() {
                $('#owner_name, #owner_id, #shop_name, #shop_type, #monthly_rent, #shop_zone, #yearly_rent').val('');
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

            <form>
                <label for="owner-name">Owner Name:</label>
                <input type="text" id="owner-name" name="owner-name" required>

                <label for="owner-id">Owner ID:</label>
                <input type="text" id="owner-id" name="owner-id" required>

                <label for="shop-name">Shop Name:</label>
                <input type="text" id="shop-name" name="shop-name" required>

                <label for="shop-type">Shop Type:</label>
                <input type="text" id="shop-type" name="shop-type" required>

                <label for="shop-monthly-rent">Monthly Shop Rent:</label>
                <input type="number" id="shop-monthly-rent" name="shop-monthly-rent" min="0" required>

                <label for="shop-zone">Shop Zone:</label>
                <select id="shop-zone" name="shop-zone" required>
                    <option value="">Select a zone</option>
                    <option value="1">Zone 1</option>
                    <option value="2">Zone 2</option>
                    <option value="3">Zone 3</option>
                </select>

                <label for="shop-yearly-rent">Yearly Shop Rent:</label>
                <input type="number" id="shop-yearly-rent" name="shop-yearly-rent" readonly>

                <div class="buttons">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Clear">
                    <input type="button" value="Cancel" onclick="window.location.href='existing-page.php'">
                </div>
            </form>
        </div>
    </div>
</body>

</html>