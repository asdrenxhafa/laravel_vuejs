<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Answer extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public static function boot(){

        parent::boot();

        static::created(function($answer){
            $answer->question->increment('answers_count');
        });
    }
}
