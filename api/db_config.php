<?php
// Gamitin ang Environment Variables mula sa Vercel Settings
// Kung wala ito, gagamitin ang default values para sa Aiven
$host = getenv('DB_HOST') ?: "mysql-3ccfa235-jennyheartteope0214-bde3.f.aivencloud.com";
$user = getenv('DB_USER') ?: "avnadmin";
$pass = getenv('DB_PASS') ?: "AVNS_uE6_95G6f2MoNQAn5WK"; 
$db   = getenv('DB_NAME') ?: "defaultdb";
$port = getenv('DB_PORT') ?: 11469;

// Create connection
$conn = new mysqli($host, $user, $pass, $db, (int)$port);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Database connection error. Please try again later.");
}

// Set charset para sa mga special characters
$conn->set_charset("utf8mb4");
?>
