<?php
header("Access-Control-Allow-Origin: https://thwg5546.github.io");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include 'db_connect.php';
if (((isset($_GET['id'])) && !empty($_GET['id'])) && ((isset($_GET['idquizz'])) && !empty($_GET['idquizz']))) {
    $id = $_GET['id'];
    $idquizz = $_GET['idquizz'];
    $sql = "SELECT * FROM questions WHERE idquestions = ? and idquizz = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $idquizz);
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
    echo "ID non spécifié/n";
    echo ((isset($_GET['id'])) && !empty($_GET['id']));
    echo ((isset($_GET['idquizz'])) && !empty($_GET['idquizz']));
}

$conn->close();
