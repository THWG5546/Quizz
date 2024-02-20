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
        note++;
    }
    questionIndex++;
    fetchNextQuestion();
}
$("#valider_reponse").click(function validateAnswer(isCorrect) {
});

function fetchNextQuestion() {
    let questionId = questionIndex;
    let url = 'http://localhost/partieAskQuestions/testquizz.php?id=' + questionId;
    window.location.href = url;
}

function showResult() {
    questionElement.style.display = 'none';
    answersElement.style.display = 'none';
    document.getElementById('validate-btn').style.display = 'none';
    document.getElementById('result-container').style.display = 'block';
    noteElement.textContent = note;
}

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