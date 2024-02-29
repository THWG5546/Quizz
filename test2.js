$(document).ready(function () {
    questionIndex = localStorage.getItem('questionIndex') || 1;
    idquizz = localStorage.getItem('quizzindex');
    note = localStorage.getItem('note') || 0;

    const questionElement = document.getElementById('question');
    const reponsesElements = document.querySelectorAll('input[name="button_reponse"]');
    const validerButton = document.getElementById('valider_reponse');

    validerButton.addEventListener('click', function () {
        const selectedReponse = document.querySelector('input[name="button_reponse"]:checked');
        if (selectedReponse) {
            const selectedValue = selectedReponse.value;
            fetchNextQuestion(selectedValue);
        } else {
            console.log("Aucune réponse sélectionnée.");
        }
    });

    getQuestion();

    function showQuestion(questionData) {
        questionElement.textContent = questionData.question;
        for (let i = 0; i < reponsesElements.length; i++) {
            reponsesElements[i].value = questionData['reponse' + (i + 1)];
            reponsesElements[i].nextSibling.textContent = questionData['reponse' + (i + 1)];
        }
    }

    function getQuestion() {
        fetch('http://localhost/backend/quizz_backend.php?idquizz=' + idquizz + '&id=' + questionIndex)
            .then(response => response.json())
            .then(questionData => {
                if (questionData) {
                    console.log("Question trouvée");
                    showQuestion(questionData);
                } else {
                    console.log("Question non trouvée");
                }
            })
            .catch(error => console.error('Erreur lors de la récupération de la question:', error));
    }

    function fetchNextQuestion(selectedValue) {
        const url = 'http://localhost/backend/quizz_backend.php?idquizz=' + idquizz + '&id=' + questionIndex;
        fetch(url)
            .then(response => response.json())
            .then(questionData => {
                if (questionData) {
                    console.log("Question trouvée");
                    if (selectedValue === questionData.bonnereponse) {
                        note++;
                        localStorage.setItem('note', note);
                        console.log("Bonne réponse! Note actuelle: " + note);
                    } else {
                        console.log("Mauvaise réponse.");
                    }
                    questionIndex++;
                    localStorage.setItem('questionIndex', questionIndex);
                    showQuestion(questionData);
                } else {
                    console.log("Question non trouvée");
                }
            })
            .catch(error => console.error('Erreur lors de la récupération de la question:', error));
    }
});
