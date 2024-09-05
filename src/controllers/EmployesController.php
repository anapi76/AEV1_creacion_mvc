<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;
use AEV1\models\Tareas;
use AEV1\Core\Request;


//-- Clase que se encarga de devolvernos una lista de los empleados 

class EmployesController extends AbstractController
{
    //-- Llamamos al método que nos devuelve todos los datos de los empleados o todos los empleados según el id de su departamento
    public function employeslist(): void
    {
        //-- Llamamos al modelo para poder gestionar los datos
        $tareas = new Tareas();
        //-- LLamamos a la clase que se encarga de devolvernos los parámetros
        $request = new Request();
        //-- Obtenemos los parámetros
        $params = $request->getParams();
       
        //-- Si el array de los parámetros está vacío, llamamos al metodo que nos devuelve todos los empleados 
        if (empty($params[0])) {
            $strong = 'Listado';
            $span = 'de todos los Empleados';
            $title1 = '';
            $resultados = $tareas->findAllEmployes();
            //-- Si el array de los parámetros no está vacío, llamamos al método que nos devuelve todos los empleados según el id su departamento 
        } else {
            //-- Obtenemos el id del departamento;
            $id = $params[0];
            //-- Obtenemos el nombre los datos del departamento según su id;
            $department = $tareas->findDepartmentById($id)[0];
            $strong = 'Listado';
            $span = 'de emplados por Departamento';
            $title1 = 'Empleados del Departamento de ' . $department["DNOMBRE"];
            $resultados = $tareas->findEmployesByDpt($id);
        }
        //-- Para este controller vamos a utilizar la plantilla employesList.html.twig
        $this->render(
            "employesList.html.twig",
            //-- Le pasamos al renderizado los parámetros, que son todos los datos que hemos obtenido del modelo.
            [
                'title' => "Lista de empleados",
                'strong' => $strong,
                'span' => $span,
                'title1' => $title1,
                "resultados" => $resultados
            ]
        );
    }
}
