<?php
// Fichier PHP pour récupérer le dernier idquizz
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=quizz_reponse', 'root', '');

// Préparer la requête SQL
$stmt = $pdo->prepare('SELECT idquizz AS last_idquizz FROM reponses ORDER BY id DESC');

// Exécuter la requête
$stmt->execute();

// Récupérer le résultat
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Retourner le dernier idquizz en tant que réponse JSON
echo json_encode($result['last_idquizz']);
