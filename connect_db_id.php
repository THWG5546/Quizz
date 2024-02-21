<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "informations";

// Create connection
$conn = new mysqli($name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<script>console.log('Connection OK');</script>";
}
?>