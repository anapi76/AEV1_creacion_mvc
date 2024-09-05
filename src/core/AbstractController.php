<?php

declare(strict_types=1);

namespace AEV1\Core;

use Twig\Environment;
use Twig\Extra\Intl\IntlExtension;

//-- Clase abstracta que nos permite extender de ella para crear cualquier controller en nuestra aplicación.Es nuestro controlador padre.

abstract class AbstractController
{

    private Environment $twig;

    public function __construct()
    {
        //-- En estas dos líneas nos indica la documentación de Twig que debemos añadir para poder usarlo en cada controller
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../templates");
        $this->twig = new \Twig\Environment($loader);
        //-- Esta línea nos sirve para poder declarar una variable global, en este caso el nombre del servidor, desde PHP a TWIG
        $this->twig->addGlobal('server_name', $_SERVER['SERVER_NAME']);
        // -- Instala una extensión de twig que nos hace falta para formatear algunos datos
        $this->twig->addExtension(new IntlExtension());
    }

    //-- Método que simplifica el renderizado de twig, podemos usarlo en cualquier controller que extienda esta clase abstracta. Gracias a este método reutilizamos el código en cada uno de los controladores.
    public function render(string $template, array $params): void
    {
        $template = $this->twig->load($template);
        echo $template->render($params);
    }
}
