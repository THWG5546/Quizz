<?php
header("Access-Control-Allow-Origin: https://thwg5546.github.io");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    // Collecte des data du form
    $nom = htmlspecialchars($_REQUEST['quiz-name']);
    $prenom = htmlspecialchars($_REQUEST['quiz-firstname']);
    $idquizz = htmlspecialchars($_REQUEST['quiz-id']);
    $idquest = 1;
    if (empty($nom) || empty($prenom) || empty($idquizz)) {
        echo "Tous les éléments sont requis !";
    } else {
        $sql = "INSERT INTO users (nom, prenom) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nom, $prenom);

        if ($stmt->execute()) {
            //header("Location:https://thwg5546.github.io/Quizz/testquizz.html?idquizz=" . $idquizz . "?id=" . $idquest);
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
