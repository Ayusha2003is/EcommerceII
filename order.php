<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "shop");
$product = $_POST['product'];
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO OrdersI (user_id, product) VALUES (?, ?)");
$stmt->bind_param("is", $user_id, $product);

if ($stmt->execute()) {
    echo "Order placed successfully for $product.";
} else {
    echo "Error: " . $stmt->error;
}
?>
<!--CREATE DATABASE shop;
USE shop;

-- Users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255)
);

-- Orders table
CREATE TABLE OrdersI (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  product VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
-->