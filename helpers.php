<?php

use Top\View\View;

if(!function_exists('render')){
    function render(string $view, array $data = []){
        return (new View)->render($view, $data);
    }
}