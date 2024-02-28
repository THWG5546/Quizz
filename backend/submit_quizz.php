<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    // Collecte des data du form
    $id = htmlspecialchars($_REQUEST['id']);
    $question = htmlspecialchars($_REQUEST['question']);

    if (empty($question)) {
        echo "Tous les éléments sont requis !";
    } else {
        $sql = "INSERT INTO quizz (question) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $question);
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
