<?php
$servername = "localhost:3309";
$username = "root";
$password = "";
$dbname = "quizz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<script>console.log('Connection OK');</script>";
}
