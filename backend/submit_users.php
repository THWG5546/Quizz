<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    // Collecte des data du form
    $nom = htmlspecialchars($_REQUEST['nom']);
    $prenom = htmlspecialchars($_REQUEST['prenom']);
    $note = htmlspecialchars($_REQUEST['note']);

    if (empty($nom) || empty($prenom) || empty($note)) {
        echo "Tous les éléments sont requis !";
    } else {
        $sql = "INSERT INTO users (nom, prenom, note) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nom, $prenom, $note);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
