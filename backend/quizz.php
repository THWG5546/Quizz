<?php
$servername = "localhost:3309";
$username = "root";
$password = "";
$dbname = "quizz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<script>console.log('Connection OK');</script>";
}

$query = "SELECT * FROM quizz WHERE id = 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question = $row["question"];
    $reponse1 = $row["reponse1"];
    $reponse2 = $row["reponse2"];
    $reponse3 = $row["reponse3"];
    $reponse4 = $row["reponse4"];

    echo "<h2>$question</h2>";
    echo "<input type='radio' name='reponse' value='1'> $reponse1 <br>";
    echo "<input type='radio' name='reponse' value='2'> $reponse2 <br>";
    echo "<input type='radio' name='reponse' value='3'> $reponse3 <br>";
    echo "<input type='radio' name='reponse' value='4'> $reponse4 <br>";
    echo "<button onclick='validerReponse()'>Valider</button>";
} else {
    echo "Aucune question trouvée.";
}

$connexion->close();
