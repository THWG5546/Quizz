$(document).ready(function () {
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
});
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