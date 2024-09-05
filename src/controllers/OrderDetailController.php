<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;
use AEV1\models\Tareas;

//-- Clase que se encarga de devolver los detalles de un pedido
class OrderDetailController extends AbstractController
{
    //-- Llamamos al método que nos devuelve todos los datos de un pedido según el id de pedido
    public function orderDetail(string $id = null)
    {
        if (is_null($id) || empty($id)) {
            //-- Si el id es nulo o está vacío pasaremos los parámetros a TWIG como nulos
            $strong = 'Listado';
            $span = 'de Pedidos por Cliente';
            $resultados = null;
        } else {
            //-- Llamamos al modelo para poder gestionar los datos
            $tareas = new Tareas();
            $pedido = $tareas->findOrderById($id);
            $strong = 'Detalles';
            $span = 'del Pedido ' . $id;
            $resultados = $pedido;
        }
        //Para este controller vamos a utilizar la plantilla orderDetail.html.twig para poder mostrar adecuadamente los datos.
        $this->render(
            "orderDetail.html.twig",
            //Le pasamos al renderizado los parámetros,que son los datos del pedido
            [
                'title' => 'Detalle de Pedido',
                'strong' => $strong,
                'span' => $span,
                "resultados" => $resultados
            ]
        );
    }
}
