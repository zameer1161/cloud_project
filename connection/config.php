<?php
$host = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASS");
$database = getenv("DB_NAME");

$conn = mysqli_init();

// Enable SSL (Azure requires it)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Try connecting
if (!mysqli_real_connect($conn, $host, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
