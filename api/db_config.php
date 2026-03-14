<?php
// Database Configuration for Vercel & DBeaver
// Supports both individual environment variables and DATABASE_URL format

// Check for DATABASE_URL first (common format: mysql://user:pass@host:port/dbname)
if (getenv('DATABASE_URL')) {
    $dbUrl = parse_url(getenv('DATABASE_URL'));
    
    $host = $dbUrl['host'] ?? 'localhost';
    $username = $dbUrl['user'] ?? 'root';
    $password = $dbUrl['pass'] ?? '';
    $dbname = ltrim($dbUrl['path'] ?? '/escr_dqms', '/');
    $port = $dbUrl['port'] ?? 3306;
} else {
    // Fall back to individual environment variables
    $host = getenv('DB_HOST') ?: "localhost";
    $dbname = getenv('DB_NAME') ?: "escr_dqms";
    $username = getenv('DB_USER') ?: "root";
    $password = getenv('DB_PASS') ?: "";
    $port = getenv('DB_PORT') ?: 3306;
}

// Vercel Serverless environment detection
$isVercel = getenv('VERCEL') === '1' || isset($_SERVER['VERCEL']);

// Create connection with port specification
$conn = new mysqli($host, $username, $password, $dbname, (int)$port);

// Check connection
if ($conn->connect_error) {
    // Log error internally but show generic message to users
    error_log("Database connection failed: " . $conn->connect_error);
    
    if ($isVercel) {
        // In Vercel, return JSON error for serverless functions
        header('Content-Type: application/json');
        http_response_code(503);
        die(json_encode(["error" => "Database unavailable", "message" => "Please check database configuration"]));
    } else {
        die("Unable to connect to the database. Please contact the administrator.");
    }
}

// Set charset to avoid issues with special characters
$conn->set_charset("utf8mb4");

// Export configuration for DBeaver reference (commented out for security)
// To connect via DBeaver, use these values:
// Host: $host
// Port: $port  
// Database: $dbname
// Username: $username
// Password: [your password]
?>
