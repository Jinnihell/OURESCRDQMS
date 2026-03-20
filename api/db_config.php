<?php
$host = getenv('DB_HOST') ?: "mysql-1490d578-iamthelonelyheart142-04e5.i.aivencloud.com";
$user = getenv('DB_USER') ?: "avnadmin";
$pass = getenv('DB_PASS') ?: "AVNS_-lV0wWkRlqustbDVtWTK"; 
$db   = getenv('DB_NAME') ?: "defaultdb";
$port = getenv('DB_PORT') ?: 19184;

// 1. Initialize mysqli
$conn = mysqli_init();

// 2. I-set ang SSL bago kumonekta (Required for Aiven)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL); 

// 3. Kumonekta gamit ang real_connect
$success = mysqli_real_connect($conn, $host, $user, $pass, $db, (int)$port);

if (!$success) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Database connection error. Please try again later.");
}

$conn->set_charset("utf8mb4");
?>
