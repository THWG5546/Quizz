<?php
// Connexion à la base de données pour les questions
// Connexion à la base de données pour les réponses
$bdd_reponses = new PDO('mysql:host=localhost:3306;dbname=quizz_reponse', 'root', '');

// Récupération des données du formulaire
$reponses = array();
for ($i = 1; $i <= 4; $i++) {
    if (isset($_POST['reponse' . $i])) {
        $reponses[] = $_POST['reponse' . $i];
    }
}
$bonneReponse = $reponses[$_POST['bonneReponse'] - 1];

// Insertion de la question dans la base de données des questions


// Récupération de l'identifiant de la question insérée
$id_question = 1;
// Insertion des réponses dans la base de données des réponses
$insert_reponses = $bdd_reponses->prepare("INSERT INTO reponses (id_question, reponse1, reponse2, reponse3, reponse4, bonnereponse) VALUES (?, ?, ?, ?, ?, ?)");
$insert_reponses->execute([$id_question, $reponses[0], $reponses[1], $reponses[2], $reponses[3], $bonneReponse]);

// Réponse de succès
echo "Question et réponses insérées avec succès !";
?>
