<?php
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de la connexion à la base de données.
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Assurez-vous que le nom du champ est correct et correspond à celui du formulaire HTML.
    $quizzId = isset($_POST['quizz-id']) ? $_POST['quizz-id'] : '';

    $stmt = $conn->prepare("SELECT Note FROM NoteQuizz WHERE ID = ?");
    $stmt->bind_param("i", $quizzId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["Note"];
        } else {
            echo "ID de quizz non trouvé";
        }
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Méthode non autorisée";
}
?>
