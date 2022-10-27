<?php

namespace Top\Authentication\Controllers;

use Top\Request\Request;

class LoginController
{
    public function showLogin()
    {
        return render('auth.login');
    }

    public function login(Request $request)
    {
        var_dump($request->all());
    }
}