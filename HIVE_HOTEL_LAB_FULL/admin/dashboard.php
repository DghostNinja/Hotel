<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  echo "Access Denied.";
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - HIVE HOTEL</title>
</head>
<body>
  <h2>Admin Dashboard</h2>
  <p>Welcome, <?php echo $_SESSION['user']['username']; ?> (Admin)</p>
  <p><a href="../download.php?file=../uploads/confidential_report.pdf">Download Confidential Report</a></p>
</body>
</html>
