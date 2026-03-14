<?php
// Database Configuration para sa Aiven & Vercel
$host     = getenv('DB_HOST');
$port     = getenv('DB_PORT') ?: "12691"; // Default port ng Aiven
$dbname   = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');

// Create connection gamit ang mysqli (kasama ang Port)
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Unable to connect to the database. Please contact the administrator.");
}

// Set charset para sa special characters
$conn->set_charset("utf8mb4");
?>
