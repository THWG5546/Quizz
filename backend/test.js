/*$(document).ready(function () {
    document.getElementById('quizz').addEventListener('submit', function (event) {
        event.preventDefault(); // Empêcher le formulaire de se soumettre normalement
        var formData = new FormData(this);
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.correct) {
                    alert('Bonne réponse!');
                } else {
                    alert('Mauvaise réponse!');
                }
                location.reload(); // Recharger la page pour passer à la prochaine question
            });
    });
});*/

let questionIndex = 1;
let note = 0;

const questionElement = document.getElementById('question');
const answersElement = document.getElementById('answers');
const noteElement = document.getElementById('note');

function showQuestion(questionData) {
    questionElement.textContent = questionData.question;
    answersElement.innerHTML = '';
    for (let i = 1; i <= 4; i++) {
        const option = questionData['option' + i];
        const button = document.createElement('button');
        button.textContent = option;
        button.addEventListener('click', () => {
            validateAnswer(option === questionData.correctAnswer);
        });
        answersElement.appendChild(button);
    }
}

function validateAnswer(isCorrect) {
    if (isCorrect) {
        score++;
    }
    currentQuestionIndex++;
    fetchNextQuestion();
}

function fetchNextQuestion() {
    fetch('fetch_question.php?id=' + currentQuestionIndex)
        .then(response => response.json())
        .then(questionData => {
            if (questionData) {
                showQuestion(questionData);
            } else {
                showResult();
            }
        });
}

function showResult() {
    questionElement.style.display = 'none';
    answersElement.style.display = 'none';
    document.getElementById('validate-btn').style.display = 'none';
    document.getElementById('result-container').style.display = 'block';
    scoreElement.textContent = score;
}

fetchNextQuestion();

/*$("#valider_reponse").click(function () {
    $("#question").load("maData.txt", function (repTxt, repStatus, xhr) {
        if (repStatus == "success")
            alert("External content loaded successfully!");
        if (repStatus == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
        $('#monBouton').hide();
        $('#monBouton2').show();
        $("#monBloc p").text(data.body);
    });
});
$("#monBouton2").click(function () {
    $("#monBloc").load("maData2.txt", function (repTxt, repStatus, xhr) {
        if (repStatus == "success")
            alert("External content loaded successfully!");
        if (repStatus == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText)
        $('#monBouton').show();
        $("#monBloc p").text(data2.body);
    });
});
});*/