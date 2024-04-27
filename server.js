// Importa el módulo Express y el middleware CORS
const express = require("express");
const cors = require("cors");

const app = express();

// Habilita CORS para todas las solicitudes
app.use(cors());

// Añade una respuesta para la petición HTTP de tipo GET a la url raíz (/).
app.get('/', function (req, res) {
  res.send('Hola GeoAPI!');
});

// Importa el archivo de rutas
const layerRouter = require('./routes/api');
// Añade las nuevas rutas usando el middleware
app.use('/api', layerRouter);

// Inicia la aplicación en el puerto 3000.
app.listen(3000, () => {
 console.log("API de datos geográficos. El servidor está inicializado en el puerto 3000");
});
