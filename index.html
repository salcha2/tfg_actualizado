<?php
    require_once 'assets/php/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="lara">
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')) ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/v/bs4/dt-2.0.7/datatables.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link href="css/art-risk.css?v=1" type="text/css" rel="stylesheet">

    <!-- Google Fonts -->
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");
        * {
            font-family: 'Maven Pro', sans-serif;
        }
        .dropdown-item {
            padding: 10px 20px;
        }
        #map-container {
            display: flex;
            flex-direction: row;
            align-items: stretch;
        }
        #map {
            flex: 1;
            width: 800px;
            height: 700px;
        }
        #info {
            flex: 0 0 auto;
            width: 300px;
            background-color: white;
            padding: 10px;
            border: 1px solid black;
            overflow-y: auto;
            margin-left: 10px;
        }
        h1 {
            margin-bottom: 0;
        }
    </style>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151025138-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-151025138-1');
    </script>

    <!-- OpenLayers CSS and JS -->
    <link rel="stylesheet" href="scripts/lib/ol-v6.13.0/ol.css">
    <script src="scripts/lib/ol-v6.13.0/ol.js"></script>

    <!-- LayerSwitcher CSS and JS -->
    <link rel="stylesheet" href="https://rawcdn.githack.com/walkermatt/ol-layerswitcher/9c92b2e3bf40f58f007db92427d1b5133447a939/dist/ol-layerswitcher.css" type="text/css">
    <script src="https://rawcdn.githack.com/walkermatt/ol-layerswitcher/9c92b2e3bf40f58f007db92427d1b5133447a939/dist/ol-layerswitcher.js"></script>

    <!-- OL-Ext CSS and JS -->
    <link rel="stylesheet" href="scripts/lib/ol-ext-v3.2.23/ol-ext.css">
    <script src="scripts/lib/ol-ext-v3.2.23/ol-ext.js"></script>

    <link rel="stylesheet" href="scripts/lib/ol-ext-v3.2.23/font-awesome.min.css">

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Custom JS -->
    <script src="scripts/lib/GeoTools/geoMap.js"></script>
    <script src="scripts/lib/GeoTools/geoLayers.js"></script>
    <script src="scripts/appMap.js"></script>
</head>
<body>
    <div class="brand">Art-Risk</div>
    <div class="address-bar">Inteligencia artificial aplicada a la conservación preventiva de edificios patrimoniales</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Art-Risk</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="guia.html">Guia</a></li>
                    <li><a href="herramienta.php">Herramienta</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user-cog"></i> &nbsp;Hi! <?= $users; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;Setting</a>
                            <a href="profile.php" class="dropdown-item"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
                            <a href="assets/php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="map-container">
        <div id="map"></div>
        <div id="info">&nbsp;</div>
    </div>

    <!-- Add the "editar" button -->
    <button id="editar" onclick="redireccionar()">Editar</button>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="algo.js"></script>

    <script>
        CargarMapa();

        function mostrarPropiedades(propiedades) {
            var infoDiv = document.getElementById('info');
            var contenido = '<h2>Propiedades seleccionadas:</h2>';
            for (var propiedad in propiedades) {
                contenido += '<p><strong>' + propiedad + '</strong>: ' + propiedades[propiedad] + '</p>';
            }
            infoDiv.innerHTML = contenido;
        }

        function redireccionar() {
            window.location.href = 'mapa.html'; // Cambia 'mapa.html' por el nombre de tu archivo HTML
        }
    </script>
</body>
</html>
