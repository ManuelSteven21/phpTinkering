<?php

namespace App\Models;

use Core\App;

class Film
{
    protected static $table = 'films';

    // Funció per a obtenir totes les pel·lícules
    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll(); // Retorna un array d'objectes
    }

    // Funció per a buscar una pel·lícula
    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(['id' => $id]);
        return $statement->fetch(\PDO::FETCH_OBJ); // Retorna l'objecte de la pel·lícula
    }

    // Funció create
    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('INSERT INTO ' . static::$table . " (name, director, year, genre, duration, cast, description) VALUES (:name, :director, :year, :genre, :duration, :cast, :description)");

        // Vinculem els valors
        $statement->bindValue(':name', $data['name']);
        $statement->bindValue(':director', $data['director']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':genre', $data['genre']);
        $statement->bindValue(':duration', $data['duration']);
        $statement->bindValue(':cast', $data['cast']);
        $statement->bindValue(':description', $data['description']);

        $statement->execute();
    }

    // Funció update
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE " . static::$table . " SET name = :name, director = :director, year = :year, genre = :genre, duration = :duration, cast = :cast, description = :description WHERE id = :id");

        // Vinculem els valors
        $statement->bindValue(':id', $id);
        $statement->bindValue(':name', $data['name']);
        $statement->bindValue(':director', $data['director']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':genre', $data['genre']);
        $statement->bindValue(':duration', $data['duration']);
        $statement->bindValue(':cast', $data['cast']);
        $statement->bindValue(':description', $data['description']);

        $statement->execute();
    }

    // Funció delete
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}