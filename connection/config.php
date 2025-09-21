<?php
$host = getenv("DB_HOST");
$username = getenv("DB_USERNAME");
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_NAME");
$port = getenv("DB_PORT");

// Path to Azure CA certificate
$cert = "/var/www/html/DigiCertGlobalRootCA.crt.pem";

// Create connection
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $cert, NULL, NULL);

// Turn off server cert validation if needed
mysqli_real_connect($conn, $host, $username, $password, $dbname, $port, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
