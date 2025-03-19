<?php
$host = "localhost";
$user = "root"; // Default user for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "fashionhub"; // Make sure this matches your database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
