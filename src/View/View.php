<?php

namespace Top\View;

class View
{
    public function render(string $view)
    {
        $viewContent = $this->getView($view);

        $layoutContent = $this->getView('layouts.main');

        $layoutContent = str_replace('TOP Framework', explode('.', $view)[0], $layoutContent);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function getView(string $view)
    {
        $view = str_replace('.', '/', $view);

        ob_start();
        include_once  __DIR__ . "/../../views/$view.html";
        return ob_get_clean();
    }
}
