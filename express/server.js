const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3011;


const db = mysql.createConnection({
    host: 'localhost',
    port: '3306',
    user: 'root',
    password: '',
    database: 'quizz_reponse'
});

app.get('/reponses', (req, res) => {
    const sql = 'SELECT * FROM reponses';
    db.query(sql, (err, result) => {
        if (err) throw err;
        res.json(result);
    });
});


db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('Connecté à la base de données MySQL');
});


app.listen(port, () => {
    console.log(`Le serveur écoute sur le port ${port}`);
});


/* REQUETE AJAX

<script>
        // Fonction pour récupérer les données via une requête HTTP GET
        function fetchReponses() {
            fetch('/reponses') // Effectue une requête GET vers l'URL '/reponses'
            .then(response => response.json()) // Convertit la réponse en JSON
            .then(reponses => {
                const form = document.getElementById('reponses-form');
                reponses.forEach(reponse => {
                    // Crée un input de type radio pour chaque réponse et l'ajoute au formulaire
                    const input = document.createElement('input');
                    input.type = 'radio';
                    input.name = 'reponse';
                    input.value = reponse.texte;
                    const label = document.createElement('label');
                    label.textContent = reponse.texte;
                    form.appendChild(input);
                    form.appendChild(label);
                    form.appendChild(document.createElement('br')); // Ajoute un saut de ligne
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des réponses :', error));
        }

        // Appel de la fonction pour récupérer les réponses au chargement de la page
        fetchReponses();
    </script>
*/