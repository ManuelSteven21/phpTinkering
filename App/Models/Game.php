<?php

namespace App\Models;

use Core\App;

class Game
{
    protected static $table = 'games';

    // Funció per a obtenir totes les pel·lícules
    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    // Funció per a buscar una pel·lícula
    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetch(\PDO::FETCH_OBJ); // Comprova que inclogui la columna Description
    }

    // Funció create
    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('INSERT INTO ' . static::$table . " (name, developers, year, genre, description) VALUES (:name, :developers, :year, :genre, :description)");

        // Vinculem els valors
        $statement->bindValue(':name', $data['name']);
        $statement->bindValue(':developers', $data['developers']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':genre', $data['genre']);
        $statement->bindValue(':description', $data['description']);

        $statement->execute();
    }

    // Funció update
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE " . static::$table . " SET name = :name, developers = :developers, year = :year, genre = :genre, description = :description WHERE id = :id");

        // Vinculem els valors
        $statement->bindValue(':id', $id);
        $statement->bindValue(':name', $data['name']);
        $statement->bindValue(':developers', $data['developers']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':genre', $data['genre']);
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