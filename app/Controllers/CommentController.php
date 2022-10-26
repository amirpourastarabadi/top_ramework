<?php

namespace App\Controllers;

class CommentController
{
    public function create()
    {
        return render('comments.create');
    }

    public function store()
    {
        return "Store Comment in a file for now";
    }
}