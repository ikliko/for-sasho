<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>

<div>
    <a href="tasks.php">TASKS TO DO</a>
</div>

<div>
    <a href="form.html">register</a>
</div>

<div>
    <a href="login-form.php">login</a>
</div>


