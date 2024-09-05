<?php

declare(strict_types=1);

namespace AEV1\Controllers;

use AEV1\Core\AbstractController;

//-- Clase que devuelve los datos de error, cuando se introduce una ruta no válida
class NoRuta extends AbstractController
{
    //-- Llamamos al método que nos devuelve todos los datos
    public function noRuta()
    {
        // -- Creo un array con las imágenes que se van a alternar en la página
        $imagenes = ['templatemo_image_01', 'templatemo_image_02', 'templatemo_image_03'];
        //-- Usamos render,el método extendido del AbstractController, para lanzar la plantilla de index.html.twig con las imágenes aleatorias.
        $this->render(
            "index.html.twig",
            [
                'title' => 'Ruta no disponible',
                'strong' => 'Ruta',
                'span' => 'no disponible',
                'imagen_aleatoria1' => $imagenes[random_int(0, count($imagenes)-1)],
                'imagen_aleatoria2' => $imagenes[random_int(0, count($imagenes)-1)],
                'imagen_aleatoria3' => $imagenes[random_int(0, count($imagenes)-1)]
            ]
        );
    }
}
