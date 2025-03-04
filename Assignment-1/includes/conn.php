<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurants";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch movies
$sql = "SELECT * FROM restaurants";
$result = $conn->query($sql);

?>
