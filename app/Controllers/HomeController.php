<?php

namespace App\Controllers;

class HomeController
{
    public function welcome()
    {
        return render('home.welcome', ['name' => 'amir']);
    }
}