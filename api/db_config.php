<?php
// 1. Initialize mysqli
$conn = mysqli_init();

// 2. I-set ang SSL bago kumonekta (Kailangan ito ng Aiven)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL); 

// 3. Kunin ang credentials mula sa Environment Variables
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');
$port = getenv('DB_PORT');

// 4. Gamitin ang mysqli_real_connect para sa SSL connection
$success = mysqli_real_connect($conn, $host, $user, $pass, $db, (int)$port);

if (!$success) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
