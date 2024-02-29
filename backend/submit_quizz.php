<?php
// Connexion à la base de données pour les questions
$bdd_questions = new PDO('mysql:host=localhost;dbname=quizz_reponse', 'root', '');

// Connexion à la base de données pour les réponses
$bdd_reponses = new PDO('mysql:host=localhost;dbname=quizz', 'root', '');

// Récupération des données du formulaire
$question = $_POST['question'];
$reponses = array();
for ($i = 1; $i <= 4; $i++) {
    if (isset($_POST['reponse' . $i])) {
        $reponses[] = $_POST['reponse' . $i];
    }
}
$bonneReponse = $_POST['bonneReponse'];

// Insertion de la question dans la base de données des questions
$insert_question = $bdd_questions->prepare("INSERT INTO questions (question) VALUES (?)");
$insert_question->execute([$question]);

// Récupération de l'identifiant de la question insérée
$id_question = $bdd_questions->lastInsertId();

// Insertion des réponses dans la base de données des réponses
foreach ($reponses as $index => $reponse) {
    $is_correct = ($index + 1 == $bonneReponse) ? 1 : 0;
    $insert_reponse = $bdd_reponses->prepare("INSERT INTO reponses (id_question, reponse, is_correct) VALUES (?, ?, ?)");
    $insert_reponse->execute([$id_question, $reponse, $is_correct]);
}

// Réponse de succès
echo "Question et réponses insérées avec succès !";
?>
