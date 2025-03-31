<?php
session_start();
include('../includes/db.php');

$invoice_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM bookings WHERE id = '$invoice_id'");
$invoice = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Invoice - HIVE HOTEL</title>
</head>
<body>
  <h2>Invoice</h2>
  <p>Booking ID: <?php echo $invoice['id']; ?></p>
  <p>User: <?php echo $invoice['username']; ?></p>
  <p>Room ID: <?php echo $invoice['room_id']; ?></p>
  <p>Days: <?php echo $invoice['days']; ?></p>
</body>
</html>
