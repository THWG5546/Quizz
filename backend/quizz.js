$(document).ready(function () {
    $("#valider_reponse").click(function () {
        $("#monBloc").load("maData.txt", function (repTxt, repStatus, xhr) {
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
});