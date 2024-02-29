<?php
$bdd_questions = new PDO('mysql:host=localhost:3306;dbname=quizz', 'root', '');

$bdd_reponses = new PDO('mysql:host=localhost:3306;dbname=quizz_reponse', 'root', '');

$question = $_POST['question'];
$reponses = array();
for ($i = 1; $i <= 4; $i++) {
    if (isset($_POST['reponse' . $i])) {
        $reponses[] = $_POST['reponse' . $i];
    }
}
$bonneReponse = $reponses[$_POST['bonneReponse'] - 1];

$insert_question = $bdd_questions->prepare("INSERT INTO questions (question) VALUES (?)");
$insert_question->execute([$question]);

$id_question = $bdd_questions->lastInsertId();
$insert_reponses = $bdd_reponses->prepare("INSERT INTO reponses (id_question, reponse1, reponse2, reponse3, reponse4, bonnereponse) VALUES (?, ?, ?, ?, ?, ?)");
$insert_reponses->execute([$id_question, $reponses[0], $reponses[1], $reponses[2], $reponses[3], $bonneReponse]);
?>