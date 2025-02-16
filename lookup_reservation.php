<?php
include 'logic.php'; // logic.php connects to the database

if (!isset($conn)) {
    die("Database connection failed. Please check logic.php.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);

    // Check if the entered email exists in the Customer table
    $customerQuery = "SELECT Customer_id FROM Customer WHERE email_address = '$email'";
    $customerResult = $conn->query($customerQuery);

    if (!$customerResult) {
        die("Error in query: " . $conn->error); // Show any database error
    }

    if ($customerResult->num_rows > 0) {
        $customerRow = $customerResult->fetch_assoc();
        $customer_id = $customerRow["Customer_id"];

        // Display customer ID for debugging before redirecting (for testing purposes)
        echo "Customer ID Found: " . $customer_id . "<br>";

        // Start output buffering to prevent header errors
        ob_start();
        // Redirect to the reservation details page with customer ID
        header("Location: show_reservation.php?customer_id=$customer_id");
        ob_end_flush();
        exit();
    } else {
        echo "<p style='color: red;'>No customer found with this email.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Up Reservation</title>
</head>
<body>
    <h2>Look Up Your Reservation</h2>
    <form action="lookup_reservation.php" method="POST">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Find Reservation</button>
    </form>
</body>
</html>