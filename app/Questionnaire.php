<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    public function question() {
        return $this->belongsTo('App\Question', 'question_one'/*, 'question_two, 'question_three', 'question_four', 'question_five' */);
    }

}


