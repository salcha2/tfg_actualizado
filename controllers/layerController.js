// Mediante la función require llamamos a los módulos que vamos a usar y los almacenamos en variables
const Pool = require('pg').Pool
const GeoJSON = require('geojson');
//  Recuperamos los datos de config.js y los pasamos a variables
const config = require('../config');
const { db: { user, host, database, password, port } } = config;
// Usando el objeto Pool del módulo pg  instanciamos un nuevo objeto que usará las credenciales definidas.
const pool = new Pool({
    user: user,
    host: host,
    database: database,
    password: password,
    port: port,
})


// Almacenamos la consulta SQL
// Almacenamos la consulta SQL
// Almacenamos la consulta SQL
// Almacenamos en una constante la función que realiza la llamada y devuelve el archivo.
const getGeojson = (request, response, next) => {
    // Almacenamos la consulta SQL
    let queryLayer = `SELECT
    id,
    ST_X(coordenadas) AS lng,
    ST_Y(coordenadas) AS lat,
    nombre,
    result_vulnerability AS tipo,
    id_v1,
    id_v2,
    id_v3,
    id_v4,
    id_v5,
    id_v6,
    id_v7,
    id_v8,
    id_v9,
    id_v10,
    id_v11,
    id_v12,
    id_v13,
    id_v14,
    id_v15,
    id_v16,
    id_v17,
    id_v18,
    id_v19,
    id_v20,
    id_v21,
    usuario,
    descripcion,
    fecha_registro
FROM
    datos4;`;
        pool.query(queryLayer, (err, res) => {
        if (err) {
            return console.error('Error ejecutando la consulta. ', err.stack)
        }
        let geojson = GeoJSON.parse(res.rows, { Point: ['lat', 'lng'] });
        response.json(geojson);
    })
}
// Exportamos las funciones para ser usadas dentro de la aplicación
module.exports = { getGeojson }


