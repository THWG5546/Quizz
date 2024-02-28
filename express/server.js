const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3011;


const db = mysql.createConnection({
    host: 'localhost',
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