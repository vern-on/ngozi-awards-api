<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(\App\QuestionCategory::class, 'category_questions');
    }
}
