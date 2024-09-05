<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;

//-- Clase que se encarga de devolver los datos de la página main
class MainController extends AbstractController
{

    //-- Llamamos al método que nos devuelve todos los datos
    public function main(): void
    {
        // -- Creo un array con las imágenes que se van a alternar en la página
        $imagenes = ['templatemo_image_01', 'templatemo_image_02', 'templatemo_image_03'];

        //-- Usamos render,el método extendido del AbstractController, para lanzar la plantilla de index.html.twig con las imágenes aleatorias.
        $this->render(
            "index.html.twig",
            [
                'title' => 'AEV1-Creación MVC',
                'strong' => 'AEV1',
                'span' => 'Modelo Vista Controlador',
                //-- Elijo tres imágenes aleatorias de un array de imágenes
                'imagen_aleatoria1' => $imagenes[random_int(0, count($imagenes) - 1)],
                'imagen_aleatoria2' => $imagenes[random_int(0, count($imagenes) - 1)],
                'imagen_aleatoria3' => $imagenes[random_int(0, count($imagenes) - 1)]
            ]
        );
    }
}
