<?php

namespace Top\View;

class View
{
    public function render(string $view, array $data = [])
    {
        $viewContent = $this->getView($view, $data);

        $layoutContent = $this->getView('layouts.main', $data);

        $layoutContent = str_replace('TOP Framework', explode('.', $view)[0], $layoutContent);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function getView(string $view, array $data = [])
    {
        $view = str_replace('.', '/', $view);

        ob_start();
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        include_once  __DIR__ . "/../../views/$view.php";
        return ob_get_clean();
    }
}
