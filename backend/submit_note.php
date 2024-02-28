<?php
include 'backend/db_connect.php';

// Utilisation de la méthode GET pour récupérer l'ID du quizz
if (isset($_GET['quizz-id'])) {
    // Vérification de la connexion à la base de données
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $quizzId = htmlspecialchars($_GET['quizz-id']);

    $stmt = $conn->prepare("SELECT Note FROM NoteQuizz WHERE ID = ?");
    $stmt->bind_param("i", $quizzId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $note = $row["Note"];
            echo $note;
        } else {
            echo "ID de quizz non trouvé";
        }
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Aucun ID de quizz fourni";
}
