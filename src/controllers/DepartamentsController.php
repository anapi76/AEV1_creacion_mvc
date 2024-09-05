<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;
use AEV1\models\Tareas;

//-- Clase que se encarga de devolvernos una lista con de todos los departamentos

class DepartamentsController extends AbstractController
{
    //-- Llamamos al método que nos devuelve todos los datos

    public function departamentsList(): void
    {
        //-- Llamamos al modelo para poder gestionar los datos
        $tareas = new Tareas();
        //-- Para este controller vamos a utilizar la plantilla departmentsList.html.twig
        $this->render(
            "departamentsList.html.twig",
            //-- Le pasamos al renderizado los parámetros, que son todos los datos que hemos obtenido del modelo.
            [
                'title' => 'Lista de departamentos',
                'strong' => 'Listado',
                'span' => 'de todos los Departamentos',
                "resultados" => $tareas->findAllDepartments()
            ]
        );
    }
}
