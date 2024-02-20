<?php
include 'db_connect.php';

function question_actu($conn)
{
    $query = "SELECT * FROM quizz ORDER BY id DESC LIMIT 1";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row;
}

function bonnereponse($conn, $reponseselect)
{
    $row = question_actu($conn);
    $bonnereponse = $row['bonnereponse'];
    return $reponseselect == $bonnereponse;
}

$row = question_actu($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reponseselect = $_POST['reponse'];
    $valide_reponse = bonnereponse($conn, $reponseselect);
    echo json_encode(['correct' => $valide_reponse]);
    exit; 
}


echo "<h2>$question</h2>";
echo "<input type='radio' name='reponse' value='1'> $reponse1 <br>";
echo "<input type='radio' name='reponse' value='2'> $reponse2 <br>";
echo "<input type='radio' name='reponse' value='3'> $reponse3 <br>";
echo "<input type='radio' name='reponse' value='4'> $reponse4 <br>";
echo "<button onclick='validerReponse()'>Valider</button>";
echo "Aucune question trouvée.";

$connexion->close();
