<?php
include('includes/db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt->bind_param("ss", $username, $hashedPassword);
  $stmt->execute();
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title>
  <style>
    body {
      background-color: white;
      font-family: Arial, sans-serif;
      color: #333;
      text-align: center;
    }
    h2 {
      color: #28a745;
    }
    input, button {
      padding: 10px;
      margin: 10px;
      border-radius: 5px;
      border: 1px solid #ddd;
    }
    button {
      background-color: #28a745;
      color: white;
      border: none;
    }
    button:hover {
      background-color: #218838;
    }
    .image-container {
      margin-top: 20px;
    }
    img {
      max-width: 80%;
      height: auto;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <h2>Register</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
  </form>
  <div class="image-container">
    <img src="images/image3.jpg" alt="Hotel Image 3">
  </div>
</body>
</html>
