<?php

namespace AEV1\Core\Interfaces;

/* Interfaz que nos garantiza que siempre que la implementemos deberemos sí o sí implementar el método asociado,
garantizando el correcto funcionamiento de la aplicación para una ejecución de una función en SQL.*/

interface IDataBase
{

    //-- Obligamos a la implementación del método executeSQL que ejecutará la sentencia SQL recibida en tipo String
    
    public function executeSQL(string $sql): array;
}