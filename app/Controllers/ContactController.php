<?php

namespace App\Controllers;

use Top\View\View;

class ContactController
{
    public function show()
    {
        return render('contacts.show');
    }
}