<?php

namespace Top\Authentication\Controllers;

use Top\Request\Request;

class RegisterController
{
    public function showRegister()
    {
        return render('auth.register');
    }

    public function register(Request $request)
    {
        var_dump($request->all());
    }
}
