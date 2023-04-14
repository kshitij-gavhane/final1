<?php
// connect to the database
$conn = new mysqli("localhost", "root", "", "final");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// get the row and column index sent via AJAX request
$rowIndex = $_POST[4];
$columnIndex = $_POST[1];
if (isset($_POST['invoice'])) {
  // retrieve the invoice number from the POST request
  $invoice = $_POST['invoice'];

  // update the payment status in the database
  // $sql = "UPDATE payments SET status = 'Verified' WHERE invoice = '$invoice'";
   $sql = "UPDATE `payments` SET `status`='Verified' Where invoice = '$invoice'";
$stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $invoice);
// $invoice = $rowIndex + 1; // add 1 to row index to match the id in the database
$stmt->execute();
$stmt->close();
}

// close the database connection
$conn->close();
