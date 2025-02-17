<?php
include 'logic.php'; // logic.php forms the database connection

if (isset($_GET['customer_id'])) {
    $customer_id = $conn->real_escape_string($_GET['customer_id']); // Sanitize input

    $reservationQuery = "SELECT * FROM Reservation WHERE customer_id = '$customer_id'";
    $reservationResult = $conn->query($reservationQuery);

    if ($reservationResult === false) {
        echo "Error: " . $conn->error; // show error message for any query issues
    } elseif ($reservationResult->num_rows > 0) {
        echo "<h2>Reservation Details</h2>";
        while ($row = $reservationResult->fetch_assoc()) {
            echo "Reservation ID: " . htmlspecialchars($row["reservation_id"]) . "<br>";
            echo "Check-in Date: " . htmlspecialchars($row["check_in_date"]) . "<br>";
            echo "Check-out Date: " . htmlspecialchars($row["check_out_date"]) . "<br>";
            echo "Room Size: " . htmlspecialchars($row["room_size"]) . "<br>";
            echo "Number of Guests: " . htmlspecialchars($row["number_of_guests"]) . "<br>";
        }
    } else {
        echo "<p style='color: red;'>No reservation found for this customer.</p>";
    }
} else {
    echo "<p style='color: red;'>Error: Customer ID not provided.</p>";
}
?>