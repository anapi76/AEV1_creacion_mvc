<?php

declare(strict_types=1);

//-- Declaramos el espacio de nombres de cada clase
namespace AEV1\Controllers;

use AEV1\Core\AbstractController;
use AEV1\models\Tareas;

//-- Clase que se encarga de devolvernos una lista con todos los clientes
class CustomerController extends AbstractController
{
    //-- Llamamos al método que nos devuelve todos los datos

    public function customersList(): void
    {
        //-- Llamamos al modelo para poder gestionar los datos
        $tareas = new Tareas();
        //-- Para este controller vamos a utilizar la plantilla customerList.html.twig
        $this->render(
            "customersList.html.twig",
            //-- Le pasamos al renderizado los parámetros, que son todos los datos que hemos obtenido del modelo.
            [
                'title' => 'Lista de clientes',
                'strong' => 'Listado',
                'span' => 'de todos los Clientes',
                "resultados" => $tareas->findAllCustomers()

            ]
        );
    }
}
