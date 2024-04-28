require('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const { Pool } = require('pg');
const bcrypt = require('bcrypt');

const app = express();
const port = process.env.PORT || 3000;

app.use(bodyParser.urlencoded({ extended: true }));

const pool = new Pool({
    host: process.env.DB_HOST,
    port: process.env.DB_PORT,
    database: process.env.DB_NAME,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
});

pool.connect()
    .then(() => console.log('Conexión exitosa a la base de datos'))
    .catch(err => console.error('Error en la conexión a la base de datos:', err));

app.post('/register', (req, res) => {
    const { nombre, apellido, email, telefono, institucion, username, password } = req.body;

    if (nombre && apellido && email && username && password) {
        const hashed_password = bcrypt.hashSync(password, 10);

        const query = 'INSERT INTO usuario (nombre, apellido, email, telefono, institucion, username, password_hash) VALUES ($1, $2, $3, $4, $5, $6, $7)';
        const values = [nombre, apellido, email, telefono, institucion, username, hashed_password];

        pool.query(query, values)
            .then(() => res.send('Registro exitoso.'))
            .catch(err => {
                console.error('Error en el registro:', err);
                res.status(500).send('Error en el registro.');
            });
    } else {
        res.status(400).send('Por favor, complete todos los campos del formulario.');
    }
});

app.listen(port, () => console.log(`Servidor escuchando en el puerto ${port}`));
