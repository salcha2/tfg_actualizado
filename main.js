import './style.css';
import { Feature, Map, View } from 'ol';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import Point from 'ol/geom/Point.js';
import VectorSource from 'ol/source/Vector';
import VectorLayer from 'ol/layer/Vector';


const map = new Map({
  target: 'map', // Make sure you have a div with id="map" in your HTML
  layers: [
    new TileLayer({
      source: new OSM()
    })
  ],
  view: new View({
    center: [-3.7066733426820746, 40.43287227735196],
    projection: "EPSG:4326", // Corrected projection name
    zoom: 6
  })
});


var marcador = new Feature({
  geometry: new Point([-3.7066733426820746, 40.43287227735196])
})


var fuenteVectorial = new VectorSource({
  features: [marcador]
})


var capaVectorial = new VectorLayer({
  source: fuenteVectorial
})


map.addLayer(capaVectorial)


function clickSobreMapa(evento){
  alert("Has dado click en el punto con coordenadas latitud: " + evento.coordinate[1] +  "y longitud"  + evento.coordinate[0])
}

map.on("click", clickSobreMapa)




