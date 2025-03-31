-- Users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  password VARCHAR(255),
  role ENUM('guest', 'admin') DEFAULT 'guest'
);

INSERT INTO users (username, password, role) VALUES
('admin', 'admin123', 'admin'),
('guest1', 'guest123', 'guest');

-- Rooms table
CREATE TABLE rooms (
  id INT AUTO_INCREMENT PRIMARY KEY,
  type VARCHAR(100),
  price INT,
  available INT
);

INSERT INTO rooms (type, price, available) VALUES
('Single Deluxe', 120, 5),
('Executive Suite', 250, 2);

-- Bookings table
CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  room_id INT,
  days INT
);
