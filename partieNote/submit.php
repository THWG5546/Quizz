<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "quizz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$quizzId = $_POST['quizz-id'];
$note = rand(0, 20);

$stmt = $conn->prepare("Select Note from Quizz where // ");
$stmt->bind_param("ii", $quizzId, $note);

if ($stmt->execute()) {
    echo "Nouvel enregistrement créé avec succès";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
