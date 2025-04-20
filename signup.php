<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "shop");

    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    
    if ($stmt->execute()) {
        echo "Signup successful. <a href='login.html'>Login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
}
?>
<!-- HTML Form -->
<form method="POST">
  <input type="text" name="name" placeholder="Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Sign Up</button>
</form>
