<?php
// Aiven Database Configuration
$host = 'mysql-3ccfa235-jennyheartteope0214-bde3.f.aivencloud.com';
$port = '11469';
$user = 'avnadmin';
$password = 'AVNS_uE6_95G6f2MoNQAn5WK'; // Kunin ito sa Aiven Console
$dbname = 'defaultdb';

// Initialize MySQLi
$conn = mysqli_init();

// Required SSL settings para sa Aiven
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Connection process
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
}
// Kapag walang error, connected na ang ESCR DQMS mo!
?>
