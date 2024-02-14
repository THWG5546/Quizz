<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    // Collecte des data du form
    $question = htmlspecialchars($_REQUEST['question']);
    $reponse1 = htmlspecialchars($_REQUEST['reponse1']);
    $reponse2 = htmlspecialchars($_REQUEST['reponse2']);
    $reponse3 = htmlspecialchars($_REQUEST['reponse3']);
    $reponse4 = htmlspecialchars($_REQUEST['reponse4']);
    $bonnereponse = htmlspecialchars($_REQUEST['bonnereponse']);

    if (empty($question) || empty($reponse1) || empty($reponse2) || empty($reponse3) || empty($reponse4) || empty($bonnereponse)) {
        echo "Tous les éléments sont requis !";
    } else {
        $sql = "INSERT INTO quizz (question, reponse1, reponse2, reponse3,reponse4,bonnereponse) VALUES (?, ?, ?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $question, $reponse1, $reponse2, $reponse3, $reponse4, $bonnereponse);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
