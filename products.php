<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>

<h2>Welcome! Select your product</h2>
<form method="POST" action="order.php">
  <button name="product" value="Book">Add Book to Cart</button>
  <button name="product" value="Headphones">Add Headphones to Cart</button>
</form>
