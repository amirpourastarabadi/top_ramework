<?php

namespace Amir\WebFramework;

class Debuger
{
    public static function dd($param)
    {
        if(is_array($param))
        {
            foreach($param as $key => $value){
                echo $key . '=>' .$value . '<br>';
            }
        }

        if(is_string($param))
        {
            echo $param;
        }

        die();
    }
}