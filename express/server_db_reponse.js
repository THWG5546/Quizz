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

db.connect((err) => {
    if(err){
        console.log("Erreur de connexion:  " +err.stack)
        return;
    }
    console.log('Connexion réussie')
});

db.query("SELECT * FROM reponses"), (err, rows, fields) => {
    if(err) throw err;
    console.log("Les données sont:", rows)
}

app.get('/reponses', (req, res) => {
    const sql = 'SELECT * FROM reponses';
    db.query(sql, (err, result) => {
        if (err) throw err;
        res.json(result);
    });
});


app.listen(port, () => {
    console.log(`Le serveur écoute sur le port ${port}`);
});

