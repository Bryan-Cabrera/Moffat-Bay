<?php
//Backend security features
header("X-Frame-Options: DENY"); //Prevents clickjacking
header("X-XSS-Protection: 1; mode=block"); //Prevents XSS
header("Content-Security-Policy: default-src 'self';"); //Restricts external scripts

//To log the visit
include 'log_visits.php';
?>

<!--Bryan Cabrera, 2/6/2025, Module 7 About Us Page-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us - Moffat Bay Lodge</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Moffat Bay Lodge</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="login.html">Log In</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="reservations.html">Reservations</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <?php include 'about_content.php'; ?>
        </main>

        <footer>
            <p>&copy; 2025 Moffat Bay Lodge. All Rights Reserved.</p>
        </footer>
    </body>
</html>