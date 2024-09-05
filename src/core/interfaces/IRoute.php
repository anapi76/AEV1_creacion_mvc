<?php

namespace AEV1\Core\Interfaces;

/* Interfaz que nos garantiza que siempre que la implementemos deberemos sí o sí implementar el método asociado,
 garantizando el correcto funcionamiento de la aplicación obteniendo las rutas predefinidas de la aplicación.*/
 
interface IRoute
{
    //-- Nos devuelve toda la colección de rutas que estan predefinidas en la aplicación
    public function getRoutes(): array;
}