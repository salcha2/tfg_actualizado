//server.js
// Llamamos al módulo Express y lo asignamos a app
const express = require("express");
const app = express();
// Añadimos una respuesta para la peticición HTTP de tipo GET a la url raiz (/).
app.get('/', function (req, res) {
  res.send('Hola GeoAPI!');
});

// Importamos el archivo de rutas
const layerRouter = require('./routes/api');
//Mediante la función use añadimos, las nuevas rutas
app.use('/api', layerRouter);



// Se inicia la aplicación en el puerto 3000. 
app.listen(3000, () => {
 console.log("API de datos geográficos. El servidor está inicializado en el puerto 3000");
});