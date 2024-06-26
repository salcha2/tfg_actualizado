<?php
    require_once 'assets/php/session.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Art-Risk tool for cultural heritage buildings evaluation">
    <meta name="author" content="lara">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title title="Herramienta de Art-Risk">Herramienta - Art-Risk</title>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151025138-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-151025138-1');
    </script>

    <!-- Language menu -->
    <div class="container">
        <div class="row col-lg-offset-11 col-md-offset-11 col-lg-1 col-md-1 col-sm-offset-11 col-xs-offset-9 col-sm-1 col-xs-1">
            <a class="language_label" href="tool_en.html"> English </a>
        </div>
    </div>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/v/bs4/dt-2.0.7/datatables.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/art-risk.css" type="text/css" rel="stylesheet">
    <link href="ol_v5.2.0/ol.css" type="text/css" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <!-- Google Fonts -->
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");
        * {
            font-family: 'Maven Pro', sans-serif;
        }
        .dropdown-item {
            padding: 10px 20px;
        }
    </style>
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.html">Inicio</a></li>
                <li><a href="guia.html">Guia</a></li>
                <li><a href="herramienta.html">Herramienta</a></li>
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
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><strong>Herramienta</strong>
                    </h2>
                    <hr>
                    <!-- <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt=""> -->
                    <hr class="visible-xs">
                    <p> Para cualquier duda sobre el uso de la herramienta, consulte primero la sección <a href="guia.html">Guía</a>. 
                    Para obtener una ayuda rápida sobre el significado y valores de cada una de las variables pulse el botón <img src="img/info-icon_30x30.png" alt="Imagen icono ayuda"> con el icono de información que hay al lado de cada variable de entrada. 
						  A continuación se detallan los pasos a seguir para obtener mediante la herramienta los índices de vulnerabilidad, riesgo y vida funcional de un edificio: 	<br> 						  
						  </p>
						  <p>
						  1) Introduzca manualmente las coordenadas del edificio en la sección "Coordenadas del edificio". 
						  Alternativamente puede pulsar el botón "Seleccionar coordenadas" para buscar y hacer "click" en la situación del edificio dentro de un mapa de España. 
						  Las coordenadas deben estar en formato WGS84 (EPSG:4326) que es el utilizado por defecto en "OpenStreetMaps" y "GoogleMaps".
						  Es decir, las coordenadas de latitud y longitud deben estar expresadas en grados decimales. 	<br>
						  2) Una vez introducidas las coordenadas por cualquiera  de los dos métodos, debe pulsar el botón "Validar coordenadas".
						  Si no ha habido errores en las coordenadas y se ha seleccionado una ubicación geográfica válida dentro de España, las variables 1 y 16 a 21, serán automáticamente asignadas a un valor.
						  Estas "variables automáticas" no pueden ser editadas o introducidas por el usuario manualmente. 	<br>
						  3) A continuación debe introducir manualmente los valores para las coordenadas 2 a 15 inclusive. 
						  Los valores para cada variable deberán estar comprendidos entre 1.0 y 5.0 inclusive. 	<br>
						  4) Finalmente y una vez completados todos los valores de entrada de las primeras 19 variables, deberá pulsar el botón "Enviar" que se encuentra en la sección "Resultados" <br>
						  </p>   
						  <p>             
                    Si una vez obtenido el resultado se ha equivocado o quiere cambiar el valor de alguna de las variables, puede hacerlo y volver a pulsar el botón de "Enviar". 
                    Verá que los resultados o índices obtenidos se actualizan automáticamente. El botón "Limpiar todo" reinicia todas las variables y borra los últimos resultados obtenidos. 
                    Púlselo sólo cuando haya terminado la evaluación de un edificio y quiera pasar a evaluar otro.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

	<!-- ---------------- FORMULARIO DE ENTRADA DE VARIABLES ---------------- -->


    	<!-- ------------------------------------------ -->
    	<!-- --------- Variables de Art-Risk3 --------- -->
    	<!-- ------------------------------------------ -->

		
		<div id="id_container" class="container">    

	
      <!--    <form method="post" action=".">   -->
      <input type='hidden' name='csrfmiddlewaretoken' value='XFe2r</fieldset>TYl9WOpV8U6X5CfbIuOZOELJ97S' >
      <!-- <form  class="form-horizontal" method="post" onsubmit="return Press(this)" action="cgi/info.php">  -->
      <!--  <form  class="form-horizontal" method="post" onsubmit="return Press(this)"> -->
      <form  id="main_form" class="form-horizontal" onsubmit="event.preventDefault();" method="post" actio>
	  <div id="signupbox" style="margin-top: 50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
									<!-- Selector de coordenadas del edificio -->
									<div class="panel panel-info">
										<div class="panel-heading">
											<div class="panel-title">Coordenadas del edificio</div>
										</div>
										<div class="panel-body">
											<!-- Latitud -->
											<div class="form-group row">
												<label for="latinput" class="form_label col-md-4 col-lg-4 manual_variable_label">Latitud</label>
												<div class="controls col-md-8 col-lg-8">
													<input id="latinput" class="form-control manual_variable_input" name="latinput" type="text" value="" title="Latitud">
												</div>
											</div>
											<!-- Longitud -->
											<div class="form-group row">
												<label for="loninput" class="form_label col-md-4 col-lg-4 manual_variable_label">Longitud</label>
												<div class="controls col-md-8 col-lg-8">
													<input id="loninput" class="form-control manual_variable_input" name="loninput" type="text" value="" title="Longitud">
												</div>
											</div>
										</div>
									</div>
								</div>
								
							 
											<!-- ------ Coordinates message display ------ --> 
											<div class="form-group">
												<div class="col-xs-9 col-md-offset-1 col-lg-offset-1 col-md-8 col-lg-9">
												<div id="error_coordinates_messages"> </div>
												</div>
											</div>
							
							
										   
											 <!-- Botón selector gráfico de coordenadas -->  
											 <div class="form-group row"> 
											<!-- <div class="aab controls col-md-4 "> </div> -->  
												  <div class="col-lg-6 col-md-6 "> 	<!-- -->  	
														 <button type="button" class="button_coordinates btn btn-primary col-md-11 col-ld-11" data-toggle="modal" data-target="#myModal">
													  Seleccionar coordenadas
													</button>
												</div>
												<div class="col-lg-6 col-md-6 "> 	<!-- -->  	
													<button type="button" class="button_coordinates btn btn-primary col-md-11 col-ld-11" id="validate_coordinates_button">
													  Validar coordenadas
													</button>
													 </div> <!-- -->
											 </div>
											 <br>
											 <br>
											 
											 
											 <!-- Barra de progreso -->  
											 <div class="form-group row"> 
											<div class="progress  col-xs-offset-2 col-xs-8   col-sm-offset-2 col-sm-8   col-md-offset-2 col-md-8   col-lg-offset-2 col-lg-8">
												<div id="progress-bar1" class="progress-bar progress_bar_art-risk" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"> </div> 
											</div> 	
											</div>			
							 
										
							 
										<!-- Ventana Modal asociada al botón de selección de coordenadas -->
										
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog modal-lg" role="document">
											   <div class="modal-content">
												  <div class="modal-header">
													 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h5 class="modal-title text-center" id="myModalLabel">Haga click en el mapa para obtener las coordenadas geográficas</h5>
												 </div>
												 <!--  Mapa -->
												 <div class="modal-body">
													 <div id="art-risk_map" class="map"></div>
												 </div>
												  <!--  Fin Mapa --> 
												 <div class="row">
															<div class="col-xs-offset-1 col-xs-5">
																<label for="id_lat_modal" class="automatic_variable_label col-xs-3 col-md-3 col-lg-3"> Latitud:  </label>
																<input name="latitud" id="id_lat_modal" class="automatic_variable_input" size = "20" maxlength = "20" type="text" value="" readonly > 
															</div>
															<div class="col-xs-offset-0 col-xs-6">
																<label for="id_lon_modal" class="automatic_variable_label col-xs-3 col-md-3 col-lg-3"> Longitud:  </label>
																<input name="longitud" id="id_lon_modal" class="automatic_variable_input" size = "20" maxlength = "20" type="text" value="" readonly > 
															</div>                     
												 </div>
												 <div class="modal-footer footer_center">
													 <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> -->
													<button id="button_accept_modal" type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
													 <button id="button_cancel_modal" type="button" class="btn btn-primary btn-info" data-dismiss="modal">Cancelar</button>
												 </div>
											  </div>
										   </div>
									   </div>
																	
															
											
										</div>     
        <fieldset>             
        <div class="panel panel-info">
            <div class="panel-heading">
                <div ><legend class="panel-title">Variables de entrada </legend></div>
            </div>  
            <div class="panel-body" >

                    
                                       
                    <!-- ---------------- VARIABLES DE ENTRADA Y AUTOMÁTICAS (1 a 19) ---------------- -->
                        
    							<!-- 1 -->
    							<div id="div_id_v1" class="form-group row">
                            <label for="id_v1" class="form_label col-md-8 col-lg-8 automatic_variable_label"> 1. Geotecnia </label>
                            <div class="controls col-md-4 col-lg-4">
                            	<!-- -- <label id="id_v1" class="automatic_variable_input" size = "5" > example </label> <!-- -->
                            	<!-- --> <input id="id_v1" name="id_v11" class="automatic_variable_input" size = "5" maxlength = "5" type="text" value="" readonly title="Geotecnia"> <!-- -->
										<button aria-label="Info" id="id_popover1" type="button" class="popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="1.Geotecnia" 
													data-content="Según criterios de condiciones para la edificación del IGME<br>
																	  <b>1.0:</b> Muy favorable <br> 
																	  <b>2.0:</b> Favorable <br>
																	  <b>3.0:</b> Aceptable <br>   										
																	  <b>4.0:</b> Desfavorable <br>
																	  <b>5.0:</b> Muy desfavorable <br>" >
												  
										</button> 
                          	</div>
                        </div> 
                      
                      
   							<!-- 2 -->                      
                        <div id="div_id_v2" class="form-group row">
                            <label for="id_v2" class="form_label col-md-8 col-lg-8 manual_variable_label"> 2. Entorno construido  </label>
                            <div class="controls col-md-4 col-lg-4">
                            	<input text="" id="id_v2" name="id_v21" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Entorno construido" >
 										<button aria-label="Info" id="id_popover2" type="button" class="popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="2.Entorno construido" 
 													data-content="<b>1.0:</b> Completamente exento <br> 
																	  <b>2.0:</b> Exento ajardinado <br>
																	  <b>3.0:</b> Entre medianeras simple <br>   										
																	  <b>4.0:</b> Entre medianeras complejo <br>
																	  <b>5.0:</b> Entre medianeras muy complejo <br>">
                           	</button>
                           </div>
                        </div>


   							<!-- 3 -->
                        <div id="div_id_v3" class="form-group row">
                            <label for="id_v3" class="form_label col-md-8 col-lg-8 manual_variable_label"> 3. Sistema constructivo  </label>
                            <div class="controls col-md-4 col-lg-4">    
                            	<input text=""  id="id_v3" name="id_v31" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Sistema constructivo">                       
 										<button aria-label="Info" id="id_popover3" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="3.Sistema constructivo" 
 													data-content="<b>1.0:</b> Sistema constructivo muy homogéneo <br> 
																	  <b>2.0:</b> Sistema constructivo homogéneo <br>
																	  <b>3.0:</b> Sistema constructivo heterogéneo <br>   										
																	  <b>4.0:</b> Sistema constructivo con entramados complejos <br>
																	  <b>5.0:</b> Sistema constructivo con gran cantidad de entramados complejos <br>">								
										</button>
                             </div>                          
                        </div>

   							
   							<!-- 4 -->
                        <div id="div_id_v4" class="form-group row ">
                            <label for="id_v4" class="form_label col-md-8 col-lg-8 manual_variable_label"> 4. Modificación de la población  </label>
                            <div class="controls col-md-4 col-lg-4">
                            	<input text="" id="id_v4" name="id_v41" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Modificación de la población" >    
  										<button aria-label="Info" id="id_popover4" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="4.Modificación de la población" 
  													data-content="<b>1.0:</b> Crecimientos mayores al 15% <br> 
																	  <b>2.0:</b> Variaciones entre el 0% y el 15%  <br>
																	  <b>3.0:</b> Variaciones entre el -5% y el 0% <br>   										
																	  <b>4.0:</b> Descensos entre -10% y -5%  <br>
																	  <b>5.0:</b> Descensos de población por debajo del -10% <br>">												
										</button>                         
                            </div>
                        </div>

								
								<!-- 5 -->
                        <div id="div_id_v5" class="form-group row ">
                            <label for="id_v5" class="form_label col-md-8 col-lg-8 manual_variable_label"> 5. Valor patrimonial  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v5" name="id_v51" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Valor patrimonial" >    
  										<button aria-label="Info" id="id_popover5" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="5.Valor patrimonial " 
  													data-content="<b>1.0:</b> Muy alto, bajo normativa de protección <br> 
																	  <b>2.0:</b> Alto, edificio con edad superior a 100 años <br>
																	  <b>3.0:</b> Media calidad constructiva <br>   										
																	  <b>4.0:</b> Bajo, escasa calidad constructiva <br>
																	  <b>5.0:</b> Muy bajo, sin ningún interés histórico artístico <br>">												                       					
										</button>                         
                           </div>
                        </div>							


								<!-- 6 -->
                        <div id="div_id_v6" class="form-group row ">
                            <label for="id_v6" class="form_label col-md-8 col-lg-8 manual_variable_label"> 6. Valor mueble  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v6" name="id_v61" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Valor mueble" >    
  										<button aria-label="Info" id="id_popover6" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="6.Valor mueble" 
  													data-content="<b>1.0:</b> Gran valor del mobiliario interior del edificio <br> 
																	  <b>2.0:</b> Bienes muebles de valor alto <br>
																	  <b>3.0:</b> Bienes muebles de valor medio <br>   										
																	  <b>4.0:</b> Bienes muebles de valor bajo <br>
																	  <b>5.0:</b> Muy bajo valor del mobiliario interior del edificio <br>">												
										</button>                         
                           </div>
                        </div>


								<!-- 7 -->
                        <div id="div_id_v7" class="form-group row ">
                            <label for="id_v7" class="form_label col-md-8 col-lg-8 manual_variable_label"> 7. Ocupación </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v7" name="id_v71" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Ocupación" >    
  										<button aria-label="Info" id="id_popover7" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="7.Ocupación" 
  													data-content="<b>1.0:</b> Muy alta (edificio habitado todos los días) <br> 
																	  <b>2.0:</b> Alto nivel de actividades en el edificio <br>
																	  <b>3.0:</b> Medio nivel de actividad en el edificio <br>   										
																	  <b>4.0:</b> Bajo nivel de actividad en el edificio <br>
																	  <b>5.0:</b> Edificio sin actividad <br>">													
										</button>                         
                           </div>
                        </div>


								<!-- 8 -->
                        <div id="div_id_v8" class="form-group row ">
                            <label for="id_v8" class="form_label col-md-8 col-lg-8 manual_variable_label"> 8. Mantenimiento </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v8" name="id_v81" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Mantenimiento" >   
  										<button aria-label="Info" id="id_popover8" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="8.Mantenimiento" 
  													data-content="<b>1.0:</b> Plan de Mantenimiento, actividades programadas a corto/medio plazo, y personal encargado <br> 
																	  <b>2.0:</b> Plan de Mantenimiento, actividades programadas a medio/corto plazo, y no hay personal encargado <br>
																	  <b>3.0:</b> Plan de Mantenimiento, no hay actuaciones a corto/medio plazo, y no hay personal encargado <br>   										
																	  <b>4.0:</b> No hay plan de Mantenimiento, no hay actuaciones a corto/medio plazo y no hay personal encargado <br>
																	  <b>5.0:</b> Edificio sin recursos para acciones de mantenimiento <br>">												
										</button>                         
                           </div>
                        </div>


								<!-- 9 -->
                        <div id="div_id_v9" class="form-group row ">
                            <label for="id_v9" class="form_label col-md-8 col-lg-8 manual_variable_label"> 9. Diseño de cubierta  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v9" name="id_v91" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Diseño de cubierta" >   
  										<button aria-label="Info" id="id_popover9" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="9.Diseño de cubierta " 
  													data-content="<b>1.0:</b> Evacuación de aguas muy rápida <br> 
																	  <b>2.0:</b> Evacuación de aguas rápida <br>
																	  <b>3.0:</b> Evacuación de aguas normal <br>   										
																	  <b>4.0:</b> Evacuación de aguas lenta <br>
																	  <b>5.0:</b> Evacuación de aguas compleja y lenta <br>">												
										</button>                         
                           </div>
                        </div>


								<!-- 10 -->
                        <div id="div_id_v10" class="form-group row ">
                            <label for="id_v10" class="form_label col-md-8 col-lg-8 manual_variable_label"> 10. Conservación  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v10" name="id_v101" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Conservación" >   
  										<button aria-label="Info" id="id_popover10" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="10.Conservación " 
  													data-content="<b>1.0:</b> Conservación óptima <br> 
																	  <b>2.0:</b> Conservación normal <br>
																	  <b>3.0:</b> Necesita conservación <br>   										
																	  <b>4.0:</b> Necesita una importante actuación de conservación <br>
																	  <b>5.0:</b> Edificio en estado de abandono <br>">												
										</button>                         
                           </div>
                        </div>


								<!-- 11 -->
                        <div id="div_id_v11" class="form-group row ">
                            <label for="id_v11" class="form_label col-md-8 col-lg-8 manual_variable_label"> 11. Ventilación  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v11" name="id_v111" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Ventilación" >   
  										<button aria-label="Info" id="id_popover11" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="11.Ventilación " 
  													data-content="<b>1.0:</b> Existen ventilación natural cruzada y permanente en todos los espacios <br> 
																	  <b>2.0:</b> Existe ventilación natural cruzada en algunos espacios <br>
																	  <b>3.0:</b> Existe ventilación natural cruzada en muy pocos espacios <br>   										
																	  <b>4.0:</b> A veces existe ventilación natural cruzada cuando el edificio está en uso <br>
																	  <b>5.0:</b> No existe ventilación cruzada en ningún caso <br>">												
										</button>                         
                           </div>
                        </div>


								<!-- 12 -->
                        <div id="div_id_v12" class="form-group row ">
                            <label for="id_v12" class="form_label col-md-8 col-lg-8 manual_variable_label"> 12. Instalaciones </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v12" name="id_v121" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Instalaciones" >   
  										<button aria-label="Info" id="id_popover12" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="12.Instalaciones" 
  													data-content="<b>1.0:</b> Todas las instalaciones están conforme a norma y en funcionamiento <br> 
																	  <b>2.0:</b> Algunas instalaciones están conforme a norma y en funcionamiento <br>
																	  <b>3.0:</b> Algunas instalaciones están conforme a norma y algunas están funcionando <br>   										
																	  <b>4.0:</b> Nada está conforme a norma  pero algunas están funcionando <br>
																	  <b>5.0:</b> Las instalaciones no están conforme a norma y nada está en funcionamiento <br>">												
										</button>                         
                           </div>
                        </div>


								<!-- 13 -->
                        <div id="div_id_v13" class="form-group row ">
                            <label for="id_v13" class="form_label col-md-8 col-lg-8 manual_variable_label"> 13. Riesgo de fuego  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v13" name="id_v131" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Riesgo de fuego" > 
  										<button aria-label="Info" id="id_popover13" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="13.Riesgo de fuego" 
  													data-content="<b>1.0:</b> Estructura incombustible y baja carga de fuego <br> 
																	  <b>2.0:</b> Estructura incombustible y media carga de fuego <br>
																	  <b>3.0:</b> Estructura combustible y baja carga de fuego <br>   										
																	  <b>4.0:</b> Estructura combustible y media carga de fuego <br>
																	  <b>5.0:</b> Estructura combustible y alta carga de fuego <br>">												
										</button>                         
                           </div>
                        </div>


								<!-- 14 -->
                        <div id="div_id_v14" class="form-group row ">
                            <label for="id_v14" class="form_label col-md-8 col-lg-8 manual_variable_label"> 14. Sobrecargas de uso  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v14" name="id_v141" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Sobrecargas de uso" > 
  										<button aria-label="Info" id="id_popover14" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="14.Sobrecargas de uso" 
  													data-content="<b>1.0:</b> Sobrecargas de uso son menores a las originales <br> 
																	  <b>2.0:</b> Sobrecargas de uso son igual a las originales <br>
																	  <b>3.0:</b> Existen nuevas sobrecargas de uso a las originales <br>   										
																	  <b>4.0:</b> Nuevas Sobrecargas que originan un gran peso adicional <br>
																	  <b>5.0:</b> Nuevas Sobrecargas de uso, por ejemplo espacios destinados a uso de almacén <br>">											
										</button>                         
                           </div>
                        </div>


								<!-- 15 -->
                        <div id="div_id_v15" class="form-group row ">
                            <label for="id_v15" class="form_label col-md-8 col-lg-8 manual_variable_label"> 15. Modificaciones estructurales  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v15" name="id_v151" class="manual_variable_input" size = "5" maxlength = "5" type="text" value="" title="Modificaciones estructurales" > 
  									<button aria-label="Info" id="id_popover15" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="15.Modificaciones estructurales " 
  													data-content="<b>1.0:</b> No se ha producido ninguna modificación <br> 
																	  <b>2.0:</b> Modificaciones simétricas y  equilibradas de pequeña entidad tendentes a reforzar la estructura original <br>
																	  <b>3.0:</b> Modificaciones simétricas y equilibradas de gran entidad <br>   										
																	  <b>4.0:</b> Modificaciones desordenadas de crecimiento orgánico <br>
																	  <b>5.0:</b> Grandes modificaciones sin ningún tipo de orden <br>">											
						
									</button>                         
                           </div>
                        </div>


								<!-- 16 -->
                        <div id="div_id_v16" class="form-group row ">
                            <label for="id_v16" class="form_label col-md-8 col-lg-8 automatic_variable_label"> 16. Precipitación media  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v16" name="id_v161" class="automatic_variable_input" size = "5" maxlength = "5" type="text" value="" readonly title="Precipitación media" > 
  										<button aria-label="Info" id="id_popover16" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="16.Precipitación media" 
  													data-content="<b>1.0:</b> Precipitación menor a 600 mm/m<sup>2</sup> <br> 
																	  <b>2.0:</b> Precipitación entre 600 y 750 mm/m<sup>2</sup> <br>
																	  <b>3.0:</b> Precipitación entre 750 y 1000 mm/m<sup>2</sup> <br>   										
																	  <b>4.0:</b> Precipitación entre 1000 y 1200 mm/m<sup>2</sup> <br>
																	  <b>5.0:</b> Precipitación mayor a 1200 mm/m<sup>2</sup> <br>">										
										</button>                         
                           </div>
                        </div>


								<!-- 17 -->
                        <div id="div_id_v17" class="form-group row ">
                            <label for="id_v17" class=" col-md-8 col-lg-8 automatic_variable_label"> 17. Erosión por lluvia  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v17" name="id_v171" class="automatic_variable_input" size = "5" maxlength = "5" type="text" value="" readonly title="Erosión por lluvia" > 
  										<button aria-label="Info" id="id_popover17" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="17.Erosión por lluvia" 
  													data-content="Obtenido de la instrucción de carreteras 5.2-IC. (MOPU 1990). 
  																	  Se ha tenido en cuenta el coeficiente deintensidad de lluvia, relacionando la precipitación caída en una hora respectoa la caída durante 24 horas <br>
  																	  <b>1.0:</b> Zonas de riesgo mínimo. ( < 7 ) <br> 
																	  <b>2.0:</b> Zonas de Riesgo bajo. ( 7 - 8 ) <br>
																	  <b>3.0:</b> Zonas de Riesgo medio. ( 8 - 9 ) <br>   										
																	  <b>4.0:</b> Zonas de Riesgo alto. ( 9 - 10 ) <br>
																	  <b>5.0:</b> Zonas de Riesgo máximo. ( > 10 ) <br>">													
										</button>                         
                           </div>
                        </div>


								<!-- 18 -->
                        <div id="div_id_v18" class="form-group row ">
                            <label for="id_v18" class=" col-md-8 col-lg-8 automatic_variable_label"> 18. Estrés térmico, variación de temperatura   </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v18" name="id_v181" class="automatic_variable_input" size = "5" maxlength = "5" type="text" value="" readonly title="Estrés térmico" > 
  										<button aria-label="Info" id="id_popover18" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="18.Estrés térmico, variación de temperatura " 
  													data-content="<b>1.0:</b> Diferencia menor a 6 grados centígrados <br> 
																	  <b>2.0:</b> Diferencia entre 6 y 7 grados centígrados <br>
																	  <b>3.0:</b> Diferencia entre 7 y 8 grados centígrados <br>   										
																	  <b>4.0:</b> Diferencia entre 8 y 10 grados centígrados <br>
																	  <b>5.0:</b> Diferencia entre 10 y 12 grados centígrados <br>">													
										</button>                         
                           </div>
                        </div>


								<!-- 19 -->
                        <div id="div_id_v19" class="form-group row ">
                            <label for="id_v19" class=" col-md-8 col-lg-8 automatic_variable_label"> 19. Heladas </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v19" name="id_v191" class="automatic_variable_input" size = "5" maxlength = "5" type="text" value="" readonly title="Heladas" > 
  										<button aria-label="Info" id="id_popover19" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="19.Heladas" 
  													data-content="<b>1.0:</b> Menos de 10 días con heladas al año <br> 
																	  <b>2.0:</b> Entre 10 y 20 días con heladas al año <br>
																	  <b>3.0:</b> Entre 20 y 80 días con heladas al año <br>   										
																	  <b>4.0:</b> Entre 80 y 125 días con heladas al año <br>
																	  <b>5.0:</b> Más de 125 días con heladas al año <br>">													
										</button>                         
                           </div>
                        </div>

						


							<!-- ---------------- VARIABLES INFORMATIVAS Y AUTOMÁTICAS (20 a 21) ---------------- -->	
		</fieldset>

		<fieldset>
       <div class="panel panel-info">
            <div class="panel-heading">
                <div ><legend class="panel-title">Variables informativas (no rellenar) </legend></div>    
    			</div>
    			<div class="panel-body" >

								<!-- 20 -->
                        <div id="div_id_v20" class="form-group row ">
                            <label for="id_v20" class=" col-md-8 col-lg-8 automatic_variable_label"> 20. Riesgo por sismo  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v20" name="id_v201" class="automatic_variable_input" size = "5" maxlength = "5" type="text" value="" readonly title="Riesgo por sismo" > 
  										<button aria-label="Info" id="id_popover20" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="20.Riesgo por sismo" 
  													data-content="Valores de aceleración. 
  																	  Obtenido del Mapa de peligrosidad sísmica de la Norma sismo resistente NCSE-02. <br>
  																	  <b>1.0:</b> Zonas de riesgo mínimo. ( < 0.04 g ) <br> 
																	  <b>2.0:</b> Zonas de Riesgo bajo. ( 0.04 g - 0.08 g ) <br>
																	  <b>3.0:</b> Zonas de Riesgo medio. ( 0.08 g - 0.12 g ) <br>   										
																	  <b>4.0:</b> Zonas de Riesgo alto. (0.12 g - 0.16 g) <br>
																	  <b>5.0:</b> Zonas de Riesgo máximo. ( > 0.16 g ) <br>">													
										</button>                         
                           </div>
                        </div>


								<!-- 21 -->
                        <div id="div_id_v21" class="form-group row ">
                            <label for="id_v21" class=" col-md-8 col-lg-8 automatic_variable_label"> 21. Riesgo de Inundación  </label>
                            <div class="controls col-md-4 col-lg-4">
										<input text="" id="id_v21" name="id_v211" class="automatic_variable_input" size = "5" maxlength = "5" type="text" value="" readonly title="Riesgo de Inundación" > 
  										<button aria-label="Info" id="id_popover21" type="button" class=" popoverButton btn btn-lg help-button" data-toggle="popover" data-placecement="right" title="21.Riesgo de Inundación" 
  													data-content="Los valores se han definido en función del periodo de retorno de las inundaciones tanto en cauces fluviales como en ambiente costero. <br>
  																	  <b>1.0:</b> Zonas de riesgo mínimo. (No inundables) <br> 
																	  <b>2.0:</b> Zonas de Riesgo bajo. (Periodo de retorno 500 años) <br>
																	  <b>3.0:</b> Zonas de Riesgo medio. (Periodo de retorno 100 años) <br>   										
																	  <b>4.0:</b> Zonas de Riesgo alto. (Periodo de retorno 50 años) <br>
																	  <b>5.0:</b> Zonas de Riesgo máximo. (Periodo de retorno 10 años) <br>">													
										</button>                         
                           </div>
                        </div>
            </div>
        </div>
      </fieldset>
    	<br>
    	<br>        
 
 
       
       <!-- ------ Resultados y botones de envío  ------ --> 
       <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Resultados </div>    
    			</div>
    			<div class="panel-body" >
    			
    						<!-- ------ Result Error display ------ --> 
    						<div class="form-group">
        						<div class="col-xs-9 col-md-offset-3 col-lg-offset-3 col-md-8 col-lg-9">
            				<div id="error_messages"> </div>
        						</div>
    						</div>


							<!-- ------ Result ------ --> 
                     	<div class="form-group row ">
                            <!--  <label for="id_result"  class="control-label col-md-6 col-lg-6"> RESULTADO: </label> -->
                            <label for="result_vulnerability" class="control-label col-md-6 col-lg-6 manual_variable_label"> Vulnerabilidad: </label>
                            <div class="controls form_select col-md-2 col-lg-2">
										<input text="" type="text" id="result_vulnerability" name="result_vulnerability" size ="10" value="" readonly title="Vulnerabilidad" >
									</div>
								</div>

                     	<div class="form-group row ">
                            <label for="result_risk" class="control-label col-md-6 col-lg-6 manual_variable_label">  Riesgo: </label>
                            <div class="controls form_select col-md-2 col-lg-2">
										<input text="" type="text" id="result_risk" name="result_risk" size ="10" value="" readonly title="Riesgo" >
									</div>
								</div>

                     	<div class="form-group row ">
                            <label for="result_functionality" class="control-label col-md-6 col-lg-6 manual_variable_label">  Indice de funcionalidad: </label>
                            <div class="controls form_select col-md-2 col-lg-2">
										<input text="" type="text" id="result_functionality" name="result_functionality" size ="10" value="" readonly title="Indice de funcionalidad">
									</div>
								</div>



								
									<br>
									<br>


								<div class="form-group row ">
									<label for="result_functionality" class="control-label col-md-6 col-lg-6 manual_variable_label">  I</label>
									<div class="controls form_select col-md-2 col-lg-2">
											<button class="btn btn-primary" type="submit">Registrar </button>
									</div>
										</div>

										<div class="mt-3" id="respuesta">
            

										</div>

							<!-- ------ Send and Clean Button ------ --> 
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
								
                                <!-- --> <input type="submit" name="Signup" value="Enviar" class="btn btn-primary" id="submit-id-send" title="Enviar" > <!--  --> 
													  <input type="submit" name="Clean" value="Limpiar todo" style="margin-left: 10%" class="btn btn-primary btn btn-info" id="submit-id-clean" title="Limpiar" > 
													
													
                            </div>
							
							
                        </div> 
                        <!-- ----------------- -->    
   			
    			</div> 
       </div> 
       
       
       
     </form>        
        
    </div> 
</div>


	<!-- -------------------------------------------------------------------- -->

    <footer>

                <div class="text-center">
    						<!-- CopyRight -->
    						<!-- Información Legal -->
    		         	 <p class=""> <?php echo date("Y"); ?> &copy; Universidad Pablo de Olavide y Universidad de Sevilla  <a class="" data-toggle="modal" href="#myModalLegal">Información Legal</a> 
								<a href="https://www.w3.org/WAI/WCAG2AA-Conformance" title="Explanation of WCAG 2.0 Level Double-A Conformance">
  								<img height="32" width="88" src="https://www.w3.org/WAI/wcag2AA-blue" alt="Level Double-A conformance, W3C WAI Web Content Accessibility Guidelines 2.0">
								</a>    		         	     		         	 
    		         	 </p> 
                </div>
            <!-- </div>      	
  	
         </div> <!-- --> 
         

         <!-- Ventana Modal asociada a la información legal -->
            
            <div class="modal fade" id="myModalLegal" tabindex="-1" role="dialog">
            	<!-- <div class="modal-dialog modal-lg" role="document"> -->
            	<div class="modal-dialog modal-lg" role="document">
               	<div class="modal-content">
							<div class="modal-body legal_footer_text">
								<h4> DERECHOS DE PROPIEDAD INDUSTRIAL E INTELECTUAL</h4>
								<h6><p>Tanto este sitio Web, como los contenidos y los signos distintivos aparecidos en el mismo, excepto indicación expresa en contrario, es propiedad del equipo de Art-Risk, de la Universidad Pablo de Olavide y de la Universidad de Sevilla, y se encuentran protegidos por los derechos de propiedad industrial e intelectual conforme a la legislación española e internacional. Por tanto, todos sus contenidos no podrán ser objeto de manipulación alguna (modificación, copia, alteración, reproducción, transmisión, adaptación, traducción, etc.) por parte del Usuario o de terceros, ya sea total o parcialmente sin la expresa autorización por parte del equipo de Art-Risk, la Universidad Pablo de Olavide y la Universidad de Sevilla, salvo que se indique lo contrario.</p></h6>
								<h4>ENLACES </h4>
								<h6><p> En esta Web se ofrece una selección de enlaces, directa o indirectamente, a recursos u otras Web de terceros, cuyo contenido puede variar, de forma muy rápida, por las características propias de Internet. La presencia de estos enlaces en el sitio Web tienen una finalidad informativa, no constituyendo en ningún caso una invitación a la contratación de productos o servicios que se ofrezcan en el sitio Web de destino. El equipo de Art-Risk no se hace en ningún caso responsable de las informaciones, servicios y contenido en general de dichas Web de terceros.</p></h6>
								<h4>EMPLEO DE COOKIES</h4>
								<h6><p>El equipo de Art-Risk podrá utilizar 'cookies' para personalizar y facilitar al máximo la navegación del usuario por su sitio web. Las 'cookies' se asocian únicamente a un usuario anónimo y su ordenador y no proporcionan referencias que permitan deducir datos personales del usuario. El usuario podrá configurar su navegador para que notifique y rechace la instalación de las 'cookies' enviadas por Art-Risk, sin que ello perjudique la posibilidad del usuario de acceder a los contenidos.</p></h6>
								<h4>CONDICIONES DE USO. EXENCIÓN DE RESPONSABILIDAD</h4>
								<h6><p>En esta Web se ofrece una selección de enlaces, directa o indirectamente, a recursos u otras Web de terceros, cuyo contenido puede variar, de forma muy rápida, por las características propias de Internet. La presencia de estos enlaces en el sitio Web tienen una finalidad informativa, no constituyendo en ningún caso una invitación a la contratación de productos o servicios que se ofrezcan en el sitio Web de destino. El equipo de Art-Risk no se hace en ningún caso responsable de las informaciones, servicios y contenido en general de dichas Web de terceros. Los autores se eximen de cualquier responsabilidad que pudiera derivarse del uso del software Art-Risk. </p></h6>
								<h4>TRATAMIENTO DE LOS DATOS DE CARÁCTER PERSONAL</h4>
								<h6><p>De conformidad a la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), y demás normativa vigente, los datos de carácter personal suministrados, en su caso, por el Usuario quedarán incorporados a un fichero automatizado de la titularidad del equipo de investigación de Art-Risk, el cual será procesado exclusivamente para la finalidad descrita en el correspondiente formulario de recogida de datos.
								Los datos de carácter personal serán tratados con el grado de protección adecuado, de acuerdo con el Real Decreto 1720/2007, de 21 de diciembre, y demás normativa de aplicación en cada momento, tomándose las medidas de seguridad necesarias para evitar su alteración, pérdida, tratamiento o acceso no autorizado por parte de terceros.
								El equipo de Art-Risk se compromete a no ceder, comunicar ni compartir los datos personales que en su caso sean facilitados por el usuario en beneficio de terceros, salvo consentimiento del afectado. Los datos, en su caso, facilitados no serán utilizados con finalidades distintas a las que motivó su recogida y serán cancelados cuando dejen de ser necesarios a tal fin. El usuario puede acceder a la información del sitio Web sin necesidad de proporcionar ningún dato de carácter personal.
								El Usuario podrá ejercitar sus derechos de oposición, acceso, rectificación y/o cancelación, en los términos establecidos en la normativa vigente, comunicándolo por escrito a la directora del proyecto Art-Risk, Dra. Maria Pilar Ortíz Calderón con dirección Edificio 22, planta 4, Despacho 6, Universidad Pablo de Olavide, Carretera de Utrera, 1, Sevilla-41013 , o vía correo electrónico a mportcal@upo.es indicando claramente el objeto de dicha comunicación.</p></h6>
								<h4>LEGISLACIÓN Y JURISDICCIÓN APLICABLE</h4>
								<h6><p>Las presentes Condiciones de Acceso quedan sujetas al ordenamiento jurídico español. Para la resolución de cualquier conflicto que pudiera derivarse del acceso a la página Web, el usuario y el equipo de Art-Risk, acuerdan someterse expresamente a los juzgados y tribunales de la ciudad de Sevilla (España), con renuncia a cualquier otro fuero general o especial. </p></h6>
							</div>
                  	<div class="modal-footer footer_center">
							 	<button id="button_cancel_legalmodal" type="button" class="btn btn-primary btn-info" data-dismiss="modal">Aceptar</button>
                  	</div>
                 	</div>

               </div>
           </div>
    </footer>



    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>  
    <script type="text/javascript" src="js/art-risk-tool.js"></script> 
	<script type="text/javascript" src="js/click.js"></script> 

	 <script type="text/javascript" src="ol_v5.2.0/ol.js"></script> 
	 <!-- --> <script type="text/javascript" src="js/art-risk-map.js"></script> <!-- - -->
	 <!--  <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.2.0/build/ol.js"></script> <!-- - -->


</body>

</html>
