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
$id_question = $_POST['nombreQuestions'];
$reload = $_POST['reload'];
$nb_quizz;

$insert_quizz = $bdd_questions->prepare("INSERT INTO quizz () VALUES ()");
$insert_quizz->execute();

$id_quizz = $bdd_questions->lastInsertId();
$nb_quizz = $id_quizz;

$insert_question = $bdd_questions->prepare("INSERT INTO questions (id, idquestions, question, idquizz) VALUES (NULL, ?, ?, ?)");
$insert_question->execute([$id_question, $question, $id_quizz]);


$insert_reponses = $bdd_reponses->prepare("INSERT INTO reponses (id_question, reponse1, reponse2, reponse3, reponse4, bonnereponse) VALUES (?, ?, ?, ?, ?, ?)");
$insert_reponses->execute([$id_question, $reponses[0], $reponses[1], $reponses[2], $reponses[3], $bonneReponse]);

echo "Question et réponses insérées avec succès !";
?>