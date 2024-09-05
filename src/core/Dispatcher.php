<?php

declare(strict_types=1);

namespace AEV1\Core;

use AEV1\Core\Interfaces\IRequest;
use AEV1\Core\Interfaces\IRoute;

//-- Clase que se encarga de gestionar qué ruta ha pedido el cliente y qué debemos mostrar por pantalla. 
//-- Para ello, analiza las rutas preconfiguradas y llama al Controlador para que realize su trabajo.

class Dispatcher
{
    private array $routeList;
    private IRequest $currentRequest;

    //-- Para poder crear un objeto Dispatcher debemos enviar las rutas de la aplicación y la URI del navegador
    //-- para que el dispatcher pueda redirigir al controller correcto con los parámetros adecuados.
    public function __construct(IRoute $routeCollection, IRequest $request)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->currentRequest = $request;
        $this->dispatch();
    }

    //-- Método que se encarga de lanzar el controlador adecuado para cada ruta solicitada
    private function dispatch(): void{
        //-- Verificamos que la ruta que hemos recibido está dentro de las rutas de la aplicación
        if(isset($this->routeList[$this->currentRequest->getRoute()])){
            //-- Aquí dentro tenemos un texto del tipo AEV1\Controller\Maincontroller
            $controllerClass = "AEV1\\Controllers\\".$this->routeList[$this->currentRequest->getRoute()]["controller"];
            //-- Es equivalente al texto que hay en 'action'
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];
            //-- Si el array que hemos obtenido con los parámetros no es null
            if(!is_null($this->currentRequest->getParams())){
                $params = $this->currentRequest->getParams();
            }else{
                //-- No hemos recibimos ningún paramétro.
                $params[]= null;
            }
        }else{
            //En caso de no estar predefinida cargaremos el controlador NoRuta para garantizar que nuestra aplicación
            //siempre tiene una vista que mostrar y creamos el namespace correspondiente para poder instanciarlo.
            $controllerClass = "AEV1\\Controllers\\NoRuta";
            $action = "noRuta";
            $params[]=null;
        }
        //Instanciamos el controlador que toca
        $controller = new $controllerClass();
        //Ahora ejecutamos el método asociado a la ruta y le pasamos los parámetros.
        $controller->$action(...$params);
    }

}