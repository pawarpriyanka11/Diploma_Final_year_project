<?php
$db_server = "localhost";
$db_name = "root";
$db_password = "";
$db_database = "cnc_db";

// Establish connection
$conn = mysqli_connect($db_server, $db_name, $db_password, $db_database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Set character set to utf8 (optional, adjust based on your needs)
mysqli_set_charset($conn, "utf8");
?>