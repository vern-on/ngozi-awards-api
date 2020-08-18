<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->belongsToMany(\App\Question::class, 'category_questions');
    }
}
