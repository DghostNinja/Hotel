<?php
session_start();
include('../includes/db.php');

if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $room_id = $_POST['room_id'];
  $days = $_POST['days'];
  $user = $_SESSION['user']['username'];

  // Business logic flaw: no check if room is still available
  $query = "INSERT INTO bookings (username, room_id, days) VALUES ('$user', '$room_id', '$days')";
  mysqli_query($conn, $query);

  // Reduce availability without validation
  mysqli_query($conn, "UPDATE rooms SET available = available - 1 WHERE id = '$room_id'");

  echo "<p>Booking successful for $days day(s)!</p>";
}

$result = mysqli_query($conn, "SELECT * FROM rooms");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book a Room - HIVE HOTEL</title>
</head>
<body>
  <h2>Welcome, <?php echo $_SESSION['user']['username']; ?> - Book a Room</h2>
  <form method="POST">
    <label>Select Room:</label>
    <select name="room_id">
      <?php while($room = mysqli_fetch_assoc($result)): ?>
        <option value="<?php echo $room['id']; ?>">
          <?php echo $room['type'] . " - $" . $room['price'] . " (Available: " . $room['available'] . ")"; ?>
        </option>
      <?php endwhile; ?>
    </select><br>
    <label>Number of Days:</label>
    <input type="number" name="days" min="1" value="1"><br>
    <button type="submit">Book</button>
  </form>
</body>
</html>
