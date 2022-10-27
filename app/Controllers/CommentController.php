<?php

namespace App\Controllers;

use Top\Request\Request;

class CommentController
{
    public function create()
    {
        return render('comments.create');
    }

    public function store(Request $request)
    {
        return "Store Comment in a file for now";
    }
}