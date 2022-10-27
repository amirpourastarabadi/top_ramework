<?php

namespace Top\View;

class View
{
    public function render(string $view, array $data = [])
    {
        $viewContent = $this->getView($view, $data);

        $layout = $this->getLayoutOfView($viewContent);

        if(count($layout) === 0){
            return $viewContent;
        }

        $layoutContent = $this->getView($layout[1], $data);
        
        $layoutContent = str_replace('TOP Framework', explode('.', $view)[0], $layoutContent);
        
        $viewContent = str_replace($layout[0], '', $viewContent);


        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function getView(string $view, array $data = [])
    {
        $view = str_replace('.', '/', $view);

        ob_start();
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        include_once  __DIR__ . "/../../views/" . $view . ".php";
        return ob_get_clean();
    }

    private function getLayoutOfView(string $viewContent)
    {
        preg_match('/.*\@extends\([\'|"](.*)[\'|"]\).*/', $viewContent, $matches);
        
        return count($matches) ?  $matches : [];
    }
}
