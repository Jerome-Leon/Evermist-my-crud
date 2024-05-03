<?php

require_once __DIR__.'/vendor/autoload.php';

// Initialiser Dotenv
use Symfony\Component\Dotenv\Dotenv;
use App\Router;
use App\Controller\HomeController;
use App\Controller\CharactersController;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

session_start();

$router = new Router();

$router->register('GET', '/', function() {
    $controller = new HomeController();
    $controller->index();
});

$router->register('GET', '/characters', function() {
    $controller = new CharactersController();
    $controller->index();
});

$router->register('GET', '/characters/create', function() {
    $controller = new CharactersController();
    $controller->create();
});

$router->register('POST', '/characters/save', function() {
    $controller = new CharactersController();
    $controller->store();
});

$router->register('GET', '/', function() {
    $controller = new HomeController();
    $controller->index();
});

$router->register('GET', '/characters/edit/{id}', function($id) {
    $controller = new CharactersController();
    $controller->edit($id);
});

$router->register('POST', '/characters/update', function() {
    $controller = new CharactersController();
    $controller->update();
});

$router->register('GET', '/characters/delete/{id}', function($id) {
    $controller = new CharactersController();
    $controller->delete($id);
});

$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));