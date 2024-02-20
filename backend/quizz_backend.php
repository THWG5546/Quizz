<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM quizz WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode((object) array());
}

$conn->close();
?>

/*function question_actu($conn)
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
}*/

$connexion->close();