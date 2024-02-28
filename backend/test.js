$(document).ready(function () {
    questionIndex = localStorage.getItem('questionIndex') || 1;
    let note = 0;
    const idquestionElement = document.getElementById('idQuestion');
    const questionElement = document.getElementById('question');
    const answersElement = document.getElementById('answers');
    const noteElement = document.getElementById('note');
    getQuestion()
    function showQuestion(questionData) {
        idquestionElement.innerHTML = questionData.id;
        questionElement.textContent = questionData.question;
        answersElement.innerHTML = '';
        for (let i = 1; i <= 4; i++) {
            const option = questionData['reponse' + i];
            const button = document.createElement('button');
            button.textContent = option;
            button.addEventListener('click', () => {
                validateAnswer(option === questionData.bonnereponse);
            });
            answersElement.appendChild(button);
        }
    }
    document.getElementById('valider_reponse').addEventListener('click', function () {
        console.log("Le bouton de validation a été cliqué !");
        nextQuestion();
    });

    function nextQuestion() {
        questionIndex++;
        localStorage.setItem('questionIndex', questionIndex);
        fetchNextQuestion();
    }
    function validateAnswer(isCorrect) {
        if (isCorrect) {
            note++;
        }
    }

    function getQuestion() {
        fetch('http://localhost/backend/quizz_backend.php?id=' + questionIndex)
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
    function fetchNextQuestion() {
        let questionId = questionIndex;
        let url = 'http://127.0.0.1:3000/partieAskQuestions/testquizz.html?id=' + questionId;
        window.location.href = url;
    }
});



