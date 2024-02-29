<?php
header("Access-Control-Allow-Origin: https://thwg5546.github.io");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include 'db_connect.php';
if (((isset($_GET['id'])) && !empty($_GET['id'])) && ((isset($_GET['idquizz'])) && !empty($_GET['idquizz']))) {
    $id = $_GET['id'];
    $idquizz = $_GET['idquizz'];
    $sql = "SELECT COUNT(*) AS count FROM questions WHERE idquizz = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idquizz);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode((object) array());
        echo "Pas de ligne";
    }
    $stmt->close();
} else {
    echo "ID non spécifié";
}
$conn->close();