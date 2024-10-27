<?php
//Fitxer per gestionar les rutes
namespace Core;

use RuntimeException;

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

    // Funció per redirigir la url solicitada a un controlador
    public function redirect($uri)
    {
        // Partim la url
        $parts = explode('/', trim($uri,'/'));

        // Controlador per defecte
        $controller = 'App\Controllers\FilmController';

        // Ruta de la pàgina principal (Inici)
        if ($uri === '/') {
            require '../App/Controllers/HomeController.php'; // Aquí carreguem el controlador de la pàgina d'inici
            $controller = 'App\Controllers\HomeController';
            // Creem una nova instància del controlador d'inici
            $controllerInstance = new $controller();
            return $controllerInstance->index(); // Redirigim a la funció index
        }

        if ($uri === '/films') {
            require '../App/Controllers/FilmController.php';
            $controller = 'App\Controllers\FilmController';
            $controllerInstance = new $controller();
            return $controllerInstance->index(); // Mostra totes les pel·lícules
        }

        // Resta de rutes per FilmController (CRUD)
        if ($parts[0] === 'create') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            return $controllerInstance->create();
        }

        if ($parts[0] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            $data = $_POST;
            return $controllerInstance->store($data);
        }

        if ($parts[0] === 'delete' && $parts[1]) {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            return $controllerInstance->delete($parts[1]);
        }

        if ($parts[0] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            if (!isset($_POST['id'])) {
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->destroy($_POST['id']);
        }

        if ($parts[0] === 'edit' && $parts[1]) {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            return $controllerInstance->edit($parts[1]);
        }

        if ($parts[0] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            $data = $_POST;
            if (!isset($_POST['id'])) {
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->update($_POST['id'], $data);
        }

        // Show (detalls de la pel·lícula)
        if ($parts[0] === 'films' && $parts[1] === 'show' && isset($parts[2])) {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            return $controllerInstance->show($parts[2]); // Passa l'ID de la pel·lícula
        }

        // Si no es cap dels anteriors, retornem la vista 404
        return require '../resources/views/errors/404.blade.php';
    }

}