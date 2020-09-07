<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
    ];
}
