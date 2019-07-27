<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'category_id',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'correct'
    ];

    public function category () {
        return $this->belongsTo('App\Category');
    }
}
