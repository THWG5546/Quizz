<?php
include 'db_connect.php';

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if (isset($_POST['nom'], $_POST['prenom'], $_POST['quizz-id'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $quizzId = $_POST['quizz-id'];

    $stmt = $conn->prepare("SELECT note FROM users WHERE nom = ? AND prenom = ? AND idquizz = ?");
    $stmt->bind_param("ssi", $nom, $prenom, $quizzId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["note"];
        } else {
            echo "Aucune note trouvée pour ce nom, prénom et ID de quizz";
        }
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Veuillez fournir le nom, le prénom et l'ID de quizz";
}

$conn->close();
?>
