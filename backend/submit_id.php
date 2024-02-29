<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'backend/db_connect.php'; 

    // Vérifie si l'identifiant de la question est présent dans l'URL
    if (isset($_GET['qid'])) {
        // Récupère l'identifiant unique de la question depuis l'URL
        $questionId = $_GET['qid'];

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
            $sql = "INSERT INTO quizz (question, reponse1, reponse2, reponse3, reponse4, bonnereponse, question_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssii", $question, $reponses[0], $reponses[1], $reponses[2], $reponses[3], $bonneReponseIndex, $questionId);

            if ($stmt->execute()) {
                header('Location: https://thwg5546.github.io/Quizz/projetFilm.html');
                exit;
            } else {
                echo "Erreur lors de l'ajout de la question de quizz : " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        // Redirection ou gestion d'erreur si l'identifiant de la question n'est pas présent dans l'URL
        // Par exemple :
        header('Location: error_page.html');
        exit;
    }

    $conn->close();
}
?>
