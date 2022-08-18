<?php

namespace Amir\WebFramework;

class Controller
{
    public function render(string $view, array $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}