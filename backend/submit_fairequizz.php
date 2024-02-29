<?php
header("Access-Control-Allow-Origin: https://thwg5546.github.io");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include 'db_connect.php';
$response = json_encode([]);
$nom = $_GET['quiz-name'];
$prenom = $_GET['quiz-firstname'];
$idquizz = $_GET['quiz-id'];
$idquest = 1;
if (empty($nom) || empty($prenom) || empty($idquizz)) {
    echo "Tous les éléments sont requis !";
} else {
    $sql_check = "SELECT COUNT(*) AS count FROM users WHERE nom = ? AND prenom = ? AND idquizz = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ssi", $nom, $prenom, $idquizz);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $row_check = $result_check->fetch_assoc();

    if ($row_check['count'] > 0) {
        echo "Les données existent déjà dans la base de données.";
    } else {
        $sql = "INSERT INTO users (nom, prenom, idquizz) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nom, $prenom, $idquizz);
        if ($stmt->execute()) {
            echo "Les données ont été insérées avec succès dans la base de données.";
        } else {
            echo "Une erreur s'est produite lors de l'insertion des données dans la base de données.";
        }
    }
    $stmt_check->close();
    $stmt->close();
    $conn->close();
}
