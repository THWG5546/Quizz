<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question n°X</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="grid-container">
    <h3>Test</h3>
    <header>
        <img src="img/logo.png" alt="logo du site web" id="logo_easy">
        <nav>
            <a href="https://google.com">Accueil</a>
            <a href="https://yahoo.com">Question precedente</a>
            <a href="https://www.youtube.com/">autre</a>
        </nav>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../backend/quizz.js"></script>
    </header>

    <main class="grid-item">
        <div id="question-container">
            <h1>Question n°<?php echo $row['question']; ?></h1>
            <h2><?php echo $row['question']; ?></h2>
            <form id="quizz" action="" method="POST">
                <label for="answer">Choix n°1 :</label>
                <input type="radio" value="<?php echo $question['reponse1']; ?>"><?php echo $question['reponse1']; ?><br>
                <label for="answer">Choix n°2 :</label>
                <input type="radio" value="<?php echo $question['reponse2']; ?>"><?php echo $question['reponse2']; ?><br>
                <label for="answer">Choix n°3 :</label>
                <input type="radio" value="<?php echo $question['reponse3']; ?>"><?php echo $question['reponse3']; ?><br>
                <label for="answer">Choix n°4 :</label>
                <input type="radio" value="<?php echo $question['reponse4']; ?>"><?php echo $question['reponse4']; ?><br>
            </form>
    </main>

    <footer class="grid-item">
        <a href="">Question précédente</a>
        <button type="submit" id="valider_reponse"> Valider</button>
    </footer>

</body>

</html>