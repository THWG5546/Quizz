<?php
include 'db_connect.php';

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if (isset($_POST['quizz-id'])) {
    $quizzId = $_POST['quizz-id'];

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
} else {
    echo "Aucun ID de quizz fourni";
}

$conn->close();
