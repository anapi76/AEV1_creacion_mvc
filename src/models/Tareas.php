<?php

declare(strict_types=1);

namespace AEV1\models;


use AEV1\Core\DataBase;
use AEV1\Core\Request;

//-- Esta clase modela los datos obtenidos de la BB.DD. preparándolos para que los controladores puedan usarlos.

class Tareas
{

    public function __construct()
    {
    }

    //-- Ejecutaremos la sentencia SQL correspondiente en el método para que nos devuelva todos los datos de las diferentes tablas

    //-- Método que nos devuelve un array con todos los productos
    public function findAllProducts(): array
    {
        $sql = "SELECT * FROM producto";
        //En este caso llamamos al método getInstance de la Clase DataBase y obtendremos una instancia de la misma
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

     //-- Método que nos devuelve un array con todos los clientes
    public function findAllCustomers(): array
    {
        $sql = "SELECT * FROM cliente";
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

     //-- Método que nos devuelve un array con todos los departamentos
    public function findAllDepartments(): array
    {
        $sql = "SELECT * FROM dept";
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

     //-- Método que nos devuelve un array con todos los empleados
    public function findAllEmployes(): array
    {
        $sql = "SELECT * FROM emp";
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

    //-- Ejecutamos la sentencia SQL correspondiente para que nos devuelva los datos asociados a la "id" de las diferentes tablas
    
    //-- Método que nos devuelve un array con todos los datos de un cliente
    public function findCustomerById(string $id): array
    {
        $sql = "SELECT * FROM cliente WHERE CLIENTE_COD=$id";
        $db = DataBase::getInstance();
        $result = $db->executeSQL($sql);
        return array_shift($result);
    }

    //-- Método que nos devuelve un array con todos los empleados que pertenecen a un departamento
    public function findEmployesByDpt(string $id): array
    {
        $sql = "SELECT * FROM emp WHERE DEPT_NO=$id";
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

     //-- Método que nos devuelve un array con todos los pedidos de un cliente
    public function findOrdersByCustomer(string $id): array
    {
        $sql = "SELECT * FROM pedido WHERE CLIENTE_COD=$id";
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }

     //-- Método que nos devuelve un array con todos los pedidos de un cliente 
    public function findOrderById(string $id): array
    {
        $sql = "SELECT * FROM detalle WHERE PEDIDO_NUM=$id";
        $db = DataBase::getInstance();
        $result = $db->executeSQL($sql);
        //return array_shift($result);
        return $result;
    }

     //-- Método que nos devuelve un array con todos los departamentos
    public function findDepartmentById(string $id): array
    {
        $sql = "SELECT * FROM dept WHERE DEPT_NO=$id";
        $db = DataBase::getInstance();
        return $db->executeSQL($sql);
    }
}
