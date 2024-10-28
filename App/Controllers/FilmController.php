<?php

namespace App\Controllers;

use App\Models\Film;

class FilmController
{
    // Funció index
    public function index()
    {
        // Obtenim totes les pel·lícules
        $films = Film::getAll();

        // Pasem les pel·lícules a la vista
        return view('films/index', ['films' => $films]);
    }

    // Funció per anar a la vista create
    public function create()
    {
        return view('films/create');
    }

    // Funció per guardar les dades i tornar a la vista principal
    public function store($data)
    {
        // Cridem funció create del model
        Film::create($data);
        // Retornar a la vista principal
        header('Location: /films');
        error_log(print_r($data, true));
        exit;
    }

    // Funció per a la vista edit
    public function edit($id)
    {
        // Si no ens passen la id fem redirect
        if ($id === null) {
            header('Location: /films');
            exit;
        }

        // Busquem la pel·lícula
        $film = Film::find($id);

        // Si no ens passen cap pel·lícula, mostrar 404
        if (!$film) {
            return require '../resources/views/errors/404.blade.php';
        }

        // Retornem la vista i li passem la pel·lícula indicada
        return view('films/edit', ['film' => $film]);
    }

    // Funció update per a modificar la pel·lícula a la base de dades
    public function update($id, $data)
    {
        // Modifiquem
        Film::update($id, $data);

        // Retornem a la pàgina principal
        header('Location: /films');
        exit;
    }

    // Funció per anar a la vista delete
    public function delete($id)
    {
        // Si no ens passen la id fem redirect
        if ($id === null) {
            header('Location: /films');
            exit;
        }

        // Busquem la pel·lícula
        $film = Film::find($id);
        // Retornem la vista en la pel·lícula
        return view('films/delete', ['film' => $film]);
    }

    // Funció per eliminar la pel·lícula de la base de dades
    public function destroy($id)
    {
        // Utilitzem la funció delete del model
        Film::delete($id);

        // Retornar a la vista
        header('Location: /films');
        exit;
    }

    // Funció per mostrar els detalls de la pel·lícula
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