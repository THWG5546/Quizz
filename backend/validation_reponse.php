<?php
// Récupérer la réponse de l'utilisateur depuis la requête POST
$userAnswer = $_POST['answer'];


// Supposons que vous obteniez l'ID de la prochaine question à partir de votre base de données
$nextQuestionId = // récupérer l'ID de la prochaine question à partir de votre base de données

// Construire l'URL de la prochaine question
$nextQuestionUrl = 'http://localhost/partieAskQuestions/testquizz.php?id=' . $nextQuestionId;

// Envoyer l'URL de la prochaine question au client
echo json_encode(array('nextQuestionUrl' => $nextQuestionUrl));
?>
