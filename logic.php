<?php
session_start();

// Connect to moffat_bay_lodge database
$host = 'localhost';
$user = 'root';
$password = ''; // Default password in XAMPP
$db = 'moffat_bay_lodge'; 

$conn = new mysqli($host, $user, $password, $db);

// Connection check
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// login checked for email and password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Verify email and password
    $query = "SELECT * FROM Customer WHERE email_address = '$email' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        echo "Login successful! Welcome, " . htmlspecialchars($email);
    } else {
        echo "Invalid email or password. Please try again.";
    }
}

// Do not close the connection here so other scripts can use it.
?>