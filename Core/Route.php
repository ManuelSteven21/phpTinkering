<?php
//Fitxer per gestionar les rutes
namespace Core;

use http\Exception\RuntimeException;

class Route
{
    //creem array en les rutes
    protected $routes = [];

    //creem funcio per afegir rutes a l'array
    public function register($route)
    {
        $this->routes[] = $route;
    }

    //funcio per rebre un array de rutes i assignar a la propietat routes
    public function define($route)
    {
        $this->routes = $route;
        return $this;
    }

    //funcio per redirigir la url solicitada a un controlador
    public function redirect($uri)
    {
        //si ruta no existeix redirigim a vista d'error
        if(!array_key_exists($uri, $this->routes)) {
            require '../resources/views/errors/404.php';
            return $this;
        }

        //si no troba el controlador
        if (!file_exists($this->routes[$uri])) {
            throw new RuntimeException("No s'ha trobat el controlador:". $this->routes[$uri]);
        }

        require $this->routes[$uri];
        return $this;
    }

}