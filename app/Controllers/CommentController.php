<?php

namespace App\Controllers;

use App\Models\Comment;
use Top\Request\Request;

class CommentController
{
    public function create()
    {
        return render('comments.create');
    }

    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        
        return "Store Comment in a file for now";
    }
}