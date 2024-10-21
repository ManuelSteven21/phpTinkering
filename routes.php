<?php
//definim les rutes
return [
    '/' => 'app/Controllers/FilmController@index',
    '/index.php' => 'app/Controllers/FilmController@index',
    '/index' => 'app/Controllers/FilmController@index',
    '/home' => 'app/Controllers/FilmController@index',
    '/create' => 'app/Controllers/FilmController@create',
    '/store' => 'app/Controllers/FilmController@store',
    '/edit' => 'app/Controllers/FilmController@edit',
    '/update' => 'app/Controllers/FilmController@update',
    '/delete' => 'app/Controllers/FilmController@delete',
    '/destroy' => 'app/Controllers/FilmController@destroy',
];