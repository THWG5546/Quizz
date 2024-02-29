$(document).ready(function () {
    document.getElementById('valider-quizz-btn').addEventListener('click', function () {
        console.log("Le bouton de validation a été cliqué !");
        var idquizzValue = document.getElementById('quiz-id').value;
        var nomValue = document.getElementById('quiz-name').value;
        var prenomValue = document.getElementById('quiz-firstname').value;
        console.log("La valeur de quiz-id est : " + idquizzValue);
        localStorage.setItem('quizzindex', idquizzValue);
        console.log(localStorage.getItem('quizzindex'));
        localStorage.setItem('questionIndex', 1);
        fetch('http://localhost/backend/submit_fairequizz.php?idquizz=' + idquizzValue + '&id=1')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors de la requête fetch');
                }
                // Gérez la réponse ici
                return response.json();
            })
            .then(data => {
                // Traitez les données de réponse si nécessaire
                console.log(data);
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        //let url = 'https://thwg5546.github.io/Quizz/testquizz.html?idquizz=' + idquizz + "?id=" + 1;
        //window.location.href = url;
    });
});
