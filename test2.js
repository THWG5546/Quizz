$(document).ready(function () {
    let questionIndex = localStorage.getItem('questionIndex') || 1;
    let idquizz = localStorage.getItem('quizzindex');
    let note = localStorage.getItem('note') || 0;
    const questionElement = document.getElementById('question');
    const reponsesElements = document.getElementsByName('button_reponse');

    function showQuestion(questionData) {
        questionElement.textContent = questionData.question;
        for (let i = 0; i < reponsesElements.length; i++) {
            reponsesElements[i].value = questionData['reponse' + (i + 1)];
            reponsesElements[i].nextSibling.textContent = questionData['reponse' + (i + 1)];
        }
    }

    document.getElementById('valider_reponse').addEventListener('click', function () {
        let reponseChoisie;
        for (let i = 0; i < reponsesElements.length; i++) {
            if (reponsesElements[i].checked) {
                reponseChoisie = reponsesElements[i].value;
                break;
            }
        }

        if (reponseChoisie === undefined) {
            alert("Veuillez choisir une réponse.");
            return;
        }

        fetch('http://localhost/backend/quizz_backend.php?idquizz=' + idquizz + '&id=' + questionIndex)
            .then(response => response.json())
            .then(questionData => {
                if (questionData) {
                    if (reponseChoisie === questionData.bonnereponse) {
                        note++;
                        localStorage.setItem('note', note);
                        console.log("Bonne réponse! Note actuelle : " + note);
                    } else {
                        console.log("Mauvaise réponse! Note actuelle : " + note);
                    }
                } else {
                    console.log("Question non trouvée");
                }
            })
            .catch(error => console.error('Erreur lors de la récupération de la question:', error));
    });

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

    getQuestion();
});
