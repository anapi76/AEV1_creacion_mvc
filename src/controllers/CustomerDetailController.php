<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;
use AEV1\models\Tareas;

class CustomerDetailController extends AbstractController
{
    //-- Mostramos el detalle de un cliente que hemos buscado por su código de cliente

    public function customerDetail(string $id = null)
    {
        if (is_null($id) || empty($id)) {
            //-- Si no recibimos el código de cliente o está vacío pasaremos los parámetros a TWIG como nulos
            $strong = 'Código';
            $span = 'de clienteno válido';
            $resultados = null;
        } else {
            //-- Llamamos al modelo para poder gestionar los datos
            $tareas = new Tareas();
            $cliente = $tareas->findCustomerById($id);
    
            $strong = 'Detalle';
            $span = 'del Cliente ' . $cliente['NOMBRE'];
            $resultados = $cliente;
        }
         //-- Para este controller vamos a utilizar la plantilla customerDetail.html.twig
        $this->render(
            "customerDetail.html.twig",
            //-- Le pasamos al renderizado los parámetros, que son los datos que hemos obtenido del modelo
            [
                'title' => 'Detalle de cliente',
                'strong' => $strong,
                'span' => $span,
                "resultados" => $resultados
            ]
        );
    }
}
