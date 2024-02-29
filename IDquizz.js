$(document).ready(function () {
    const idquizz = document.getElementById('quiz-id');
    var idquizzValue = idquizz.value;
    console.log(idquizzValue);
    document.getElementById('valider-quizz-btn').addEventListener('click', function () {
        console.log("Le bouton de validation a été cliqué !");
        localStorage.setItem('quizzindex', idquizzValue);
        console.log(localStorage.getItem('quizzindex'));
        localStorage.setItem('questionIndex', 1);
        fetch('http://localhost/backend/submit_fairequizz.php?idquizz=' + idquizzValue + '?id=' + 1)
        //let url = 'https://thwg5546.github.io/Quizz/testquizz.html?idquizz=' + idquizz + "?id=" + 1;
        //window.location.href = url;
    });
});
