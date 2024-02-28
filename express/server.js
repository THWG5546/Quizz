const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3011;

// Configuration de la connexion à la base de données
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'quizz_reponse'
});

// recup toutes les infos de la table responses
app.get('/reponses', (req, res) => {
    const sql = 'SELECT * FROM reponses';
    db.query(sql, (err, result) => {
        if (err) throw err;
        res.json(result);
    });
});

// Connexion à la base de données
db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('Connecté à la base de données MySQL');
});

// Démarrage du serveur
app.listen(port, () => {
    console.log(`Le serveur écoute sur le port ${port}`);
});