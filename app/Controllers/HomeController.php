<?php

namespace App\Controllers;

use Top\View\View;

class HomeController
{
    public function welcome()
    {
        return render('home.welcome', ['name' => 'amir']);
    }
}