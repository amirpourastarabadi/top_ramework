<?php

namespace Top\Authentication;

use Top\Authentication\Controllers\LoginController;
use Top\Authentication\Controllers\RegisterController;
use Top\Main\Application;

class Auth
{
    public static function routes(Application $app)
    {
        $app->router->get('/login', [LoginController::class, 'showLogin']);
        $app->router->post('/login', [LoginController::class, 'login']);
        $app->router->get('/register', [RegisterController::class, 'showRegister']);
        $app->router->post('/register', [RegisterController::class, 'register']);
    }
}
