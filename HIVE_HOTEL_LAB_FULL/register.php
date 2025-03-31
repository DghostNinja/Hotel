<?php
include('includes/db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
  <h2>Register</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Register</button>
  </form>
</body>
</html>
