<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question n°X</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="grid-container">
    <header class='grid-item'>
        <?php include "../backend/quizz_backend.php" ?>
        <div id="logo_easy">
            <img src="img/logo.png" alt="logo du site web">
        </div>
        <nav>
            <div>
                <a href="https://google.com">Accueil</a>
            </div>
        </nav>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <?php
        // Obtenez l'ID à partir de l'URL si elle est fournie
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        ?>
        <script src="../backend/test.js"></script>
        <script>
        </script>
    </header>

    <main class="grid-item">
        <div id="question-container">
            <h1>Question :</h1>
            <h2 id="question"></h2>
            <div id="answers"></div>
            <button type="submit" id="valider_reponse"> Valider la réponse</button>
    </main>
    <div id="result-container" style="display: none;">
        <h2>Votre note est : <span id="note">0</span></h2>
    </div>
</body>

</html>