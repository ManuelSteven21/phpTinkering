<?php

namespace App\Controllers;

use App\Models\Film;

class FilmController
{
    //funcio index
    public function index()
    {
        //obtenim totes les pelis
        $films = Film::getAll();

        //pasem les pelis a la vista
        return view('films/index', ['films' => $films]);
    }

    //funcio per anar a la vista create
    public function create()
    {
        return view('films/create');
    }

    //funcio per guardar les dades i tornar a la vista principal
    public function store($data)
    {
        //cridem funcio create del model
        Film::create($data);
        //retornar a la vista principal
        header('location: /films');
        exit;
    }

   //funcio per a la vista edit
    public function edit($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /films');
            exit;
        }

        //busquem la peli
        $film = Film::find($id);

        //si no ens passen cap peli mostrar 404
        if (!$film) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem la peli indicada
        return view('films/edit', ['film' => $film]);
    }

    //funcio update per a modificar la peli a la base de dades
    public function update($id, $data)
    {
        //modifiquem
        Film::update($id, $data);

        //retonem a la pàgina principal
        header('location: /films');
        exit;
    }

    //funcio per anar a la vista delete
    public function delete($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /films');
            exit;
        }

        //busquem la peli
        $film = Film::find($id);
        //retornem la vista en la peli
        return view('films/delete', ['film' => $film]);

    }

    //funcio per eliminar la peli de la base de dades
    public function destroy($id)
    {
        //utilizem la funcio delete del model
        Film::delete($id);

        //retornar a la vista
        header('location: /films');
    }

    public function show($id)
    {
        // Cerquem la pel·lícula pel seu ID
        $film = Film::find($id);

        // Si la pel·lícula no existeix, redirigim a una pàgina d'error o una vista 404
        if (!$film) {
            return require '../resources/views/errors/404.blade.php';
        }

        // Obtenim el títol de la pel·lícula (per exemple, "The Dark Knight")
        $title = htmlspecialchars($film->name); // Assegura't que el nom estigui escapant

        // Obtenc el pòster de la pel·lícula a través de l'API de OMDb
        $apiKey = 'b3324b4f'; // Substitueix amb el teu API key
        $apiUrl = 'http://www.omdbapi.com/?t=' . urlencode($title) . '&apikey=' . $apiKey;

        // Realitza la petició a l'API
        $response = file_get_contents($apiUrl);
        $data = json_decode($response);

        // Verifica si la resposta és correcta
        if ($data->Response == 'True') {
            $poster = $data->Poster; // Pòster de la pel·lícula
        } else {
            $poster = ''; // Si no es troba, no mostrar res
        }

        // Passem la pel·lícula i el pòster a la vista
        return view('films/show', ['film' => $film, 'poster' => $poster]);
    }



}