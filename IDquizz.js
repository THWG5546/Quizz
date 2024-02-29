$(document).ready(function () {
    const idquizz = document.getElementById('quiz-id');
    document.getElementById('valider-quizz-btn').addEventListener('click', function () {
        console.log("Le bouton de validation a été cliqué !");
        localStorage.setItem('quizzindex', idquizz);
        localStorage.setItem('questionIndex', 1);
        fetch('http://localhost/backend/submit_fairequizz.php?idquizz=' + idquizz + '?id=' + questionIndex)
        let url = 'https://thwg5546.github.io/Quizz/testquizz.html?idquizz=' + idquizz + "?id=" + 1;
        window.location.href = url;
    });
});
