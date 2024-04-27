import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import TileWMS from 'ol/source/TileWMS';
import { fromLonLat } from 'ol/proj';

// URL del servicio WMS proporcionado por GeoServer
const geoserverWMSUrl = 'http://localhost:8080/geoserver/wms';

// Nombre de la capa que quieres cargar desde GeoServer
//const geoserverLayerName = 'datos4';

// Crear una instancia del TileLayer con el servicio WMS de GeoServer
const geoserverLayer = new TileLayer({
  source: new TileWMS({
    url: geoserverWMSUrl,
    params: {
      'LAYERS': 'datos4:datos4',
    },
    serverType: 'geoserver',
  }),
});

// Crear una instancia del mapa y agregar las capas
const map = new Map({
  layers: [
    new TileLayer({
      source: new OSM(),
    }),
    geoserverLayer,
  ],
  view: new View({
    center: fromLonLat([-74.12, 4.65]), // Coordenadas de centro de la vista
    zoom: 11, // Nivel de zoom inicial
  }),
});

// Asociar el mapa con el elemento HTML
map.setTarget('map');
