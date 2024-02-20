<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM quizz WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode((object) array());
    }
    $stmt->close();
} else {
    echo "ID Inconnu";
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