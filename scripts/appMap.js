function CargarMapa(){
    var map = new GeoMap();
    var layers = new GeoLayers();
   
    map.CrearMapa('map', [layers.ObtenerLayersBase(), layers.ObtenerLayersSobrepuestos(), layers.ObtenerLayersGeoJSON()], null, 6);
    map.CrearControlBarra();
    map.CrearControlBarraDibujo();
    map.CrearBarraBusquedaGeoJson(layers.vectorGeoJson);
    map.CrearEventoClicEnMapa(); // Llamada a la función CrearEventoClicEnMapa
}
