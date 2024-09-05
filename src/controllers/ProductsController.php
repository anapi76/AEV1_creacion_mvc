<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;
use AEV1\models\Tareas;

//-- Clase que se encarga de devolvernos una lista con todas los productos

class ProductsController extends AbstractController
{
  //-- Llamamos al método que nos devuelve todos los datos de los productos
  public function productsList(): void
  {
    //-- Llamamos al modelo para poder gestionar los datos
    $tareas = new Tareas();
    //-- Para este controller vamos a utilizar la plantilla productsList.html.twig para poder mostrar adecuadamente los datos.
    $this->render(
      "productsList.html.twig",
      //-- Le pasamos al renderizado los parámetros, que son todos los datos que hemos obtenido del modelo.
      [
        'title' => 'Lista de productos',
        'strong' => 'Listado',
        'span' => 'de todos los Productos',
        "resultados" => $tareas->findAllProducts()
      ]
    );
  }
}
