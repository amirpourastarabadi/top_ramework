<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CommentController;
use App\Controllers\ContactController;
use App\Controllers\HomeController;
use Top\Authentication\Auth;
use Top\Main\Application;

$app = new Application();

Auth::routes($app);

$app->router->get('/', [HomeController::class, 'welcome']);
$app->router->get('/contact', [ContactController::class, 'show']);
$app->router->get('/comments/create', [CommentController::class, 'create']);
$app->router->post('/comments', [CommentController::class, 'store']);

$app->run();
