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
        <script src="../backend/quizz.js"></script>
    </header>

    <main class="grid-item">
        <div id="question-container">
            <h1>Question n°<?php echo $row['id']; ?></h1>
            <h2><?php echo $row['question']; ?></h2>
            <form id="quizz" action="" method="POST">
                <div id="choix1">
                <label for="answer">Choix n°1 :</label>
                <input type="radio" value="<?php echo $row['reponse1']; ?>"><?php echo $row['reponse1']; ?><br>
                </div>
                <div id="choix2">
                <label for="answer">Choix n°2 :</label>
                <input type="radio" value="<?php echo $row['reponse2']; ?>"><?php echo $row['reponse2']; ?><br>
                </div>
                <div id="choix3">
                <label for="answer">Choix n°3 :</label>
                <input type="radio" value="<?php echo $row['reponse3']; ?>"><?php echo $row['reponse3']; ?><br>
                </div>
                <div id="choix4">
                <label for="answer">Choix n°4 :</label>
                <input type="radio" value="<?php echo $row['reponse4']; ?>"><?php echo $row['reponse4']; ?><br>
                </div>
                <button type="submit" id="valider_reponse"> Valider</button>
            </form>
    </main>

</body>

</html>