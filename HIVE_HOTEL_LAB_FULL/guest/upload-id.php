<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["id_card"]["name"]);
  move_uploaded_file($_FILES["id_card"]["tmp_name"], $target_file);
  echo "<p>File uploaded successfully: $target_file</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload ID - HIVE HOTEL</title>
</head>
<body>
  <h2>Upload Your ID</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="id_card"><br>
    <button type="submit">Upload</button>
  </form>
</body>
</html>
