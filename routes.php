<?php
//definim les rutes
return [
    '/' => 'app/Controllers/HomeController@index',
    '/index.php' => 'app/Controllers/HomeController@index',
    '/index' => 'app/Controllers/HomeController@index',
    '/films' => 'app/Controllers/FilmController@index',
    '/games' => 'app/Controllers/GameController@index',
    '/films/create' => 'app/Controllers/FilmController@create',
    '/films/store' => 'app/Controllers/FilmController@store',
    '/films/edit' => 'app/Controllers/FilmController@edit',
    '/films/update' => 'app/Controllers/FilmController@update',
    '/films/delete' => 'app/Controllers/FilmController@delete',
    '/films/destroy' => 'app/Controllers/FilmController@destroy',
    '/films/show' => 'app/Controllers/GameController@show',
    '/games/create' => 'app/Controllers/GameController@create',
    '/games/store' => 'app/Controllers/GameController@store',
    '/games/edit' => 'app/Controllers/GameController@edit',
    '/games/update' => 'app/Controllers/GameController@update',
    '/games/delete' => 'app/Controllers/GameController@delete',
    '/games/destroy' => 'app/Controllers/GameController@destroy',
    '/games/show' => 'app/Controllers/GameController@show',
];