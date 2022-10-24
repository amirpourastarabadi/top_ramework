<?php

use Top\View\View;

if(!function_exists('render')){
    function render(string $view){
        return (new View)->render($view);
    }
}