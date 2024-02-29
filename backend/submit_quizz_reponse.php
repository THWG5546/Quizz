<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect_reponse.php';
    // Collecte des data du form
    $id_question = intval($_REQUEST['id_question']);
    $idquizz = htmlspecialchars($_REQUEST['idquizz']);
    $reponse1 = htmlspecialchars($_REQUEST['reponse1']);
    $reponse2 = htmlspecialchars($_REQUEST['reponse2']);
    $reponse3 = htmlspecialchars($_REQUEST['reponse3']);
    $reponse4 = htmlspecialchars($_REQUEST['reponse4']);
    $bonnereponse = intval($_REQUEST['bonnereponse']);
    

    if (empty($reponse1) || empty($reponse2) || empty($reponse3) || empty($reponse4) || empty($bonnereponse)) {
        echo "Tous les éléments sont requis !";
    } else {

        $sql = "INSERT INTO reponses (idquizz, id_question, reponse1, reponse2, reponse3,reponse4,bonnereponse) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisssss", $idquizz, $id_question, $reponse1, $reponse2, $reponse3, $reponse4, $bonnereponse);

        if ($stmt->execute()) {
            if ($_POST["action"] == "valider") {
                header('Location: https://localhost/PageId.html');
            } else if ($_POST["action"] == "autre_question") {
                header('Location: https://localhost/projetFilm.html');
                exit;
            }
            
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
