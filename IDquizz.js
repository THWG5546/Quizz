$(document).ready(function () {
    document.getElementById('valider-quizz-btn').addEventListener('click', function () {
        console.log("Le bouton de validation a été cliqué !");
        var idquizzValue = document.getElementById('quiz-id').value;
        var nomValue = document.getElementById('quiz-name').value;
        var prenomValue = document.getElementById('quiz-firstname').value;
        localStorage.setItem('quizzindex', idquizzValue);
        localStorage.setItem('questionIndex', 1);
        localStorage.setItem('note', 0);
        fetch('http://localhost/backend/submit_fairequizz.php?quiz-id=' + idquizzValue + '&quiz-name=' + nomValue + '&quiz-firstname=' + prenomValue)
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
                let url = 'https://thwg5546.github.io/Quizz/testquizz.html?idquizz=' + idquizzValue + "&id=1";
                window.location.href = url;
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    });
});
