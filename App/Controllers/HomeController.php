<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        // Carrega la vista de la pàgina principal
        require_once '../resources/views/home.blade.php';
    }
}