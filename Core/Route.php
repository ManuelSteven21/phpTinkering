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
            require '../App/Controllers/HomeController.php';
            $controller = 'App\Controllers\HomeController';
            $controllerInstance = new $controller();
            return $controllerInstance->index();
        }

        if ($uri === '/films') {
            require '../App/Controllers/FilmController.php';
            $controller = 'App\Controllers\FilmController';
            $controllerInstance = new $controller();
            return $controllerInstance->index();
        }

        if ($uri === '/games') {
            require '../App/Controllers/GameController.php';
            $Gamecontroller = 'App\Controllers\GameController';
            $controllerInstance2 = new $Gamecontroller();
            return $controllerInstance2->index();
        }

        // Rutes per FilmController (CRUD)
        if ($parts[0] === 'films') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();

            switch ($parts[1]) {
                case 'create':
                    return $controllerInstance->create();
                case 'store':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $data = $_POST;
                        return $controllerInstance->store($data);
                    }
                    break;
                case 'delete':
                    if (isset($parts[2])) {
                        return $controllerInstance->delete($parts[2]);
                    }
                    break;
                case 'destroy':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (!isset($_POST['id'])) {
                            throw new RuntimeException('No id provided');
                        }
                        return $controllerInstance->destroy($_POST['id']);
                    }
                    break;
                case 'edit':
                    if (isset($parts[2])) {
                        return $controllerInstance->edit($parts[2]);
                    }
                    break;
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $data = $_POST;
                        if (!isset($_POST['id'])) {
                            throw new RuntimeException('No id provided');
                        }
                        return $controllerInstance->update($_POST['id'], $data);
                    }
                    break;
                case 'show':
                    if (isset($parts[2])) {
                        return $controllerInstance->show($parts[2]);
                    }
                    break;
            }
        }

        // Rutes per GameController (CRUD)
        if ($parts[0] === 'games') {
            require '../App/Controllers/GameController.php';
            $Gamecontroller = 'App\Controllers\GameController';
            $controllerInstance2 = new $Gamecontroller();

            switch ($parts[1]) {
                case 'create':
                    return $controllerInstance2->create();
                case 'store':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $data = $_POST;
                        return $controllerInstance2->store($data);
                    }
                    break;
                case 'delete':
                    if (isset($parts[2])) { // Aquí s'ha d'agafar l'ID del videojoc
                        return $controllerInstance2->delete($parts[2]);
                    }
                    break;
                case 'destroy':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (!isset($_POST['id'])) {
                            throw new RuntimeException('No id provided');
                        }
                        return $controllerInstance2->destroy($_POST['id']);
                    }
                    break;
                case 'edit':
                    if (isset($parts[2])) { // Aquí s'ha d'agafar l'ID del videojoc
                        return $controllerInstance2->edit($parts[2]);
                    }
                    break;
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $data = $_POST;
                        if (!isset($_POST['id'])) {
                            throw new RuntimeException('No id provided');
                        }
                        return $controllerInstance2->update($_POST['id'], $data);
                    }
                    break;
                case 'show':
                    if (isset($parts[2])) { // Aquí s'ha d'agafar l'ID del videojoc
                        return $controllerInstance2->show($parts[2]);
                    }
                    break;
            }
        }

        // Si no es cap dels anteriors, retornem la vista 404
        return require '../resources/views/errors/404.blade.php';
    }
}