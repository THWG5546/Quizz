<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect_db.php'; 

    // Traitement pour les entrées de quizz
    if (isset($_POST['question'])) {
        $question = htmlspecialchars($_POST['question']);
        $reponses = [];

        // Collecter les réponses du formulaire
        for ($i = 1; $i <= 4; $i++) {
            if (isset($_POST['reponse'.$i])) {
                $reponses[] = htmlspecialchars($_POST['reponse'.$i]);
            }
        }

        $bonneReponseIndex = $_POST['bonneReponse'] - 1; 

        // Insérer les données dans la table quizz
        $sql = "INSERT INTO quizz (question, reponse1, reponse2, reponse3, reponse4, bonnereponse) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $question, $reponses[0], $reponses[1], $reponses[2], $reponses[3], $bonneReponseIndex);

        if ($stmt->execute()) {
            echo "Nouvelle question de quizz ajoutée avec succès";
        } else {
            echo "Erreur lors de l'ajout de la question de quizz : " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>
