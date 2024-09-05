<?php

namespace AEV1\Core\Interfaces;

/* Interfaz que nos garantiza que siempre que la implementemos deberemos sí o sí implementar el método asociado,
garantizando el correcto funcionamiento de la aplicación para la recepción y procesado de la ruta por URI
 */

interface IRequest
{
    //-- Función que obtiene la ruta de la URI
    public function getRoute(): string;

    //-- Función que obtiene los parámetros de la URI y nos los devuelve en un array
    public function getParams(): array;
}