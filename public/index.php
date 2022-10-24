<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ContactController;
use App\Controllers\HomeController;
use Top\Main\Application;

$app = new Application();

$app->router->get('/', [HomeController::class, 'welcome']);
$app->router->get('/contact', [ContactController::class, 'show']);
$app->router->get('/about', function () {
    return 'I am a callback func';
});

$app->run();
