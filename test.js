$(document).ready(function () {
    questionIndex = localStorage.getItem('questionIndex') || 1;
    idquizz = localStorage.getItem('quizzindex');
    note = localStorage.getItem('note') || 0;
    //let note = 0;
    const questionElement = document.getElementById('question');
    //const answersElement = document.getElementById('answers');
    const reponse1 = document.getElementById('reponse1');
    const reponse2 = document.getElementById('reponse2');
    const reponse3 = document.getElementById('reponse3');
    const reponse4 = document.getElementById('reponse4');
    //const noteElement = document.getElementById('note');
    getQuestion()
    function showQuestion(questionData) {
        questionElement.textContent = questionData.question;
        reponse1.textContent = questionData.reponse1;
        reponse2.textContent = questionData.reponse2;
        reponse3.textContent = questionData.reponse3;
        reponse4.textContent = questionData.reponse4;
        /*answersElement.innerHTML = '';
        for (let i = 1; i <= 4; i++) {
            const option = questionData['reponse' + i];
            const button = document.createElement('button');
            button.textContent = option;
            button.addEventListener('click', () => {
                validateAnswer(option === questionData.bonnereponse);
            });
            answersElement.appendChild(button);
        }*/
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
            localStorage.setItem('note', note);
            console.log(note);
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
    function fetchNextQuestion() {
        let questionId = questionIndex;
        //let url = 'https://thwg5546.github.io/Quizz/testquizz.html?idquizz=' + idquizz + '&id=' + questionId;
        //window.location.href = url;
    }
});



