<?php
$Route = $app['router'];

$Route->get('/', function() {
    // Because 'Hello, World!' is too mainstream
    return 'Are you looking for me ?';
});

$Route->get('/pokemon/{id?}','PokemonController@index');