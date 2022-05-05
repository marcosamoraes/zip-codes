<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\Controller;

$router->get('/', function () use ($router) {
    $response = [
        'name' => "Mexico Zip Codes API",
        'description' => "API created for code test application to BackBone Systems",
        'version' => $router->app->version()
    ];

    return json_encode($response);
});

$router->get('{zip_code}', 'Controller@index');
