<?php
// Database Configuration galing sa Aiven
$host = 'mysql-3ccfa235-jennyheartteope0214-bde3.f.aivencloud.com'; //
$port = '11469'; //
$user = 'avnadmin'; // Default user ng Aiven
$password = 'ILAGAY_DITO_ANG_SERVICE_PASSWORD'; // Kunin sa Aiven Console
$dbname = 'defaultdb'; // Ang iyong schema

// Gumamit ng MySQLi object para sa SSL connection
$conn = mysqli_init();

// I-set ang SSL options (Kailangan ito para sa Aiven)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Subukang kumonekta
$db_connect = mysqli_real_connect(
    $conn, 
    $host, 
    $user, 
    $password, 
    $dbname, 
    $port, 
    NULL, 
    MYSQLI_CLIENT_SSL
);

if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Connection success! Handa na para sa ESCR DQMS
}
?>
