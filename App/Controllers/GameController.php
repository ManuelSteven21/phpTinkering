<?php

namespace App\Controllers;

use App\Models\Game;

class GameController
{
    //funcio index
    public function index()
    {
        //obtenim tots els videojocs
        $games = Game::getAll();

        //pasem els videojocs a la vista
        return view('games/index', ['games' => $games]);
    }

    //funcio per anar a la vista create
    public function create()
    {
        return view('games/create');
    }

    //funcio per guardar les dades i tornar a la vista principal
    public function store($data)
    {
        //cridem funcio create del model
        Game::create($data);
        //retornar a la vista principal
        header('location: /games');
        exit;
    }

    //funcio per a la vista edit
    public function edit($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /games');
            exit;
        }

        //busquem el videojoc
        $game = Game::find($id);

        //si no ens passen cap peli mostrar 404
        if (!$game) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem la peli indicada
        return view('games/edit', ['game' => $game]);
    }

    //funcio update per a modificar la peli a la base de dades
    public function update($id, $data)
    {
        //modifiquem
        Game::update($id, $data);

        //retonem a la pàgina principal
        header('location: /games');
        exit;
    }

    //funcio per anar a la vista delete
    public function delete($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /games');
            exit;
        }

        //busquem la peli
        $game = Game::find($id);
        //retornem la vista en la peli
        return view('games/delete', ['game' => $game]);

    }

    //funcio per eliminar la peli de la base de dades
    public function destroy($id)
    {
        //utilizem la funcio delete del model
        Game::delete($id);

        //retornar a la vista
        header('location: /games');
    }

    public function show($id)
    {
        // Cerquem el videojoc pel seu ID
        $game = Game::find($id);

        // Si el videojoc no existeix, redirigim a una pàgina d'error o una vista 404
        if (!$game) {
            return require '../resources/views/errors/404.blade.php';
        }

        // Obtenim el títol del videojoc
        $title = htmlspecialchars($game->name);

        // Realitzem la petició a l'API de RAWG per buscar el videojoc
        $apiKey = 'e31c71a936b74ad6a4c9b317da972076';
        $apiUrl = 'https://api.rawg.io/api/games?key=' . $apiKey . '&page_size=1&search=' . urlencode($title);

        // Realitza la petició a l'API
        $response = file_get_contents($apiUrl);
        $data = json_decode($response);

        // Verifica si la resposta és correcta
        if ($data && isset($data->results) && count($data->results) > 0) {
            $poster = $data->results[0]->background_image; // Obtenim la imatge del fons
        } else {
            $poster = ''; // Si no es troba, no mostrar res
        }

        // Passem el videojoc i el pòster a la vista
        return view('games/show', ['game' => $game, 'poster' => $poster]);
    }

}