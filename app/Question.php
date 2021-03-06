<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Question extends Model
{

    use SoftDeletes,VotableTrait;

    protected $dates = ['deleted_at'];

    protected $appends = ['created_date', 'body_html', 'is_favorited', 'favorites_count'];

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute(){
        return route('questions.show',$this->slug);
    }

    public function getStatusAttribute(){
        if($this->answers_count >0){
            if($this->best_answer_id){
                return 'answered-accepted';
            }
            return 'answered';
        }
        return 'unanswered';
    }

    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); //, 'question_id', 'user_id');
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];
}
