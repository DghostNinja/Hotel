<?php
$search = isset($_GET['q']) ? $_GET['q'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Rooms - HIVE HOTEL</title>
  <style>
    body {
      background-color: white;
      font-family: Arial, sans-serif;
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
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <h2>Search for Rooms</h2>
  <form method="GET">
    <input type="text" name="q" placeholder="Search" value="<?php echo $search; ?>" required><br>
    <button type="submit">Go</button>
  </form>
  <?php if ($search): ?>
    <p>Results for: <?php echo $search; ?></p>
  <?php endif; ?>
  <div class="image-container">
    <img src="images/image1.jpg" alt="Hotel Image 1">
  </div>
</body>
</html>
