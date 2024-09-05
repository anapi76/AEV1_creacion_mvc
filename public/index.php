<?php

//-- Cargamos todas las clases y archivos necesarios del proyecto que hemos administrado con Composer. 
require_once "../vendor/autoload.php";

use AEV1\Core\Dispatcher;
use AEV1\Core\RouteCollection;
use AEV1\Core\Request;

//Creamos un objeto que contenga todas las rutas predefinidas en la aplicación
$routes = new RouteCollection();
//Creamos un objeto que contenga la ruta y parámetros que hemos recibido desde el navegador.
$request = new Request();
$dispatcher = new Dispatcher($routes,$request);
