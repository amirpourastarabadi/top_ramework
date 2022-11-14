<?php

namespace App\Models;

use Top\ORM\BaseModel;

class Comment extends BaseModel
{
    public string $body;

    protected function rules(): array
    {
        return [
            'body' => ['min:3', 'required']
        ];
    }
}
