<?php
$search = isset($_GET['q']) ? $_GET['q'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Rooms - HIVE HOTEL</title>
</head>
<body>
  <h2>Search for Rooms</h2>
  <form method="GET">
    <input type="text" name="q" placeholder="Search" value="<?php echo $search; ?>">
    <button type="submit">Go</button>
  </form>
  <?php if ($search): ?>
    <p>Results for: <?php echo $search; ?></p>
  <?php endif; ?>
</body>
</html>
