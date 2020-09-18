<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\VotableTrait;


class Answer extends Model
{
    use SoftDeletes, VotableTrait;

    protected $dates = ['deleted_at'];

    protected $appends = ['created_date','body_html'];

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute()
    {
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute()
    {
        return $this->isBest();
    }

    public function isBest()
    {
        return $this->id === $this->question->best_answer_id;
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
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

        static::deleted(function ($answer) {
            $answer->question->decrement('answers_count');
        });

    }
}
