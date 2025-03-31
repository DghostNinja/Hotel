<?php
session_start();
include('includes/db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      header("Location: guest/book.php");
      exit();
    } else {
      $error = "Invalid login.";
    }
  } else {
    $error = "Invalid login.";
  }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
  <style>
    body {
      background-color: white;
      font-family: Arial, sans-serif;
      color: #333;
      text-align: center;
    }
    h2 {
      color: #28a745; /* Green */
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
  <h2>Login</h2>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
  <div class="image-container">
    <img src="images/image2.jpg" alt="Hotel Image 2">
  </div>
</body>
</html>
