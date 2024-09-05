<?php

declare(strict_types=1);

namespace AEV1\Core;

use AEV1\Core\Interfaces\IDataBase;

//-- Clase que gestiona la conexión a la BB.DD. en este caso MySQL e implementa la interfaz IDataBase. Usamos el patrón Singleton para acceder a los datos.
 
class DataBase implements IDataBase
{
    private static array $dbConfig;
    private static \mysqli $conn;
    private static $instance;

    //-- Cargamos los datos de configuración de la BB.DD. y nos conectamos a ella.
    protected function __construct()
    {
        //-- Leemos el json cargándolo en una variable privada de la clase que es un array asociativo
        self::$dbConfig = json_decode(file_get_contents(__DIR__."/../../config/dbConfig.json"),true);
        $this->connect();
    }

    //-- Creamos una instancia únicamente si no existe una previamente.
    public static function getInstance(): DataBase{
        if(self::$instance == null){
            self::$instance = new DataBase();
        }
        return self::$instance;
    }

    //-- Genera la conexión a la BB.DD, devuelve \mysqli
    
    private function connect(): void
    {
        //-- Cargamos los datos de configuración del JSON de parámetros que hemos cargado previamente.
        $servername = self::$dbConfig["server"];
        $username = self::$dbConfig["user"];
        $password = self::$dbConfig["password"];
        $dbname = self::$dbConfig["dbname"];

        //-- Creamos la conexión, pero usamos self en vez de this porque las variables son estáticas.
        self::$conn = new \mysqli($servername,$username,$password,$dbname);
    }

    //--  Ejecutamos la sentencia SQL en modo: MYSQL:ASSOC
    public function executeSQL(string $sql): array
    {
        //-- TODO: Implement executeSQL() method.
        return self::$conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    //-- Método que garantiza que no dejamos la conexión abierta consumiendo recursos.
     
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        if(self::$conn != null){
            self::$conn->close();
        }
    }
}