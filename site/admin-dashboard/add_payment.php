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
    <!-- <h2>Add Payment Entry</h2> -->
    <form method="post" action="add_payment.php">
        <label>Date:</label>
        <input type="date" name="date" required>
        <label>Select Tenant Aadhar:</label>
        <select class="select2-dropdown" name="tenant_aadhar" required>
            <option></option>
            <option value="111122223333">111122223333</option>
            <option value="444455556666">444455556666</option>
            <option value="777788889999">777788889999</option>
        </select>
        <label>Tenant Name:</label>
        <input type="text" name="tenant_name" required>
        <label>Ref. ID:</label>
        <input type="text" name="ref_id" required>
        <label>Status:</label>
        <select name="status" required>
            <option value="pending">Pending</option>
            <option value="verified">Verified</option>
        </select>
        <label>Amount:</label>
        <input type="number" step="0.01" name="amount" required>
        <input type="submit" value="Add Payment Entry">
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

</html>