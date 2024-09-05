<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;
use AEV1\models\Tareas;


//-- Clase que se encarga de devolvernos una lista con todas los pedidos

class OrdersController extends AbstractController
{
    //-- Llamamos al método que nos devuelve todos los clientes y los pedidos de cada cliente
    public function orderslist(): void
    {
        //-- Llamamos al modelo para poder gestionar los datos
        $tareas = new Tareas();
        //-- Si el valor de POST está definido y no es nulo
        if (isset($_POST["clientes"])) {
            //-- Obtenemos el código de cliente de la variable POST que hemos obtenido del desplegable
            $codCliente = $_POST["clientes"];
            //-- Obtenemos el cliente según su id
            $cliente = $tareas->findCustomerById($codCliente);
            //-- Obtenemos el nombre del cliente
            $nombreCliente = $cliente['NOMBRE'];
            //-- Obtenemos la lista de pedidos de ese cliente
            $pedidos = $tareas->findOrdersByCustomer($codCliente);
        } else {
            //-- Si el valor de POST no está definido 
            $pedidos = null;
            $nombreCliente = " ";
        }
        //-- Obtenemos el listado de todos los clientes para el desplegable
        $clientes = $tareas->findAllCustomers();
        //-- Para este controller vamos a utilizar la plantilla orderList.html.twig
        $this->render(
            "ordersList.html.twig",
            //-- Le pasamos al renderizado los parámetros, que son todos los datos que hemos obtenido del modelo.
            [
                'title' => 'Lista de Pedidos',
                'title1' => 'Lista de Clientes',
                'titleTable' => 'Pedidos del cliente ' . $nombreCliente,
                'strong' => 'Listado',
                'span' => 'de Pedidos por Cliente',
                'resultados' => $clientes,
                'pedidos' => $pedidos,

            ]
        );
    }
}
