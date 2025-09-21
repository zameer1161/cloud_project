<?php
$host = getenv("DB_HOST");
$user = getenv("DB_USER");   // FIXED: Azure variable is DB_USER, not DB_USERNAME
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_NAME");
$port = getenv("DB_PORT");

// Path to CA certificate inside Azure
$cert = "/home/site/wwwroot/DigiCertGlobalRootCA.crt.pem";

// Init MySQLi
$conn = mysqli_init();

// Configure SSL with CA cert
mysqli_ssl_set($conn, NULL, NULL, $cert, NULL, NULL);

// Connect with SSL
if (!mysqli_real_connect($conn, $host, $user, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
