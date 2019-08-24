<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    // define relationships between questionnaire, questions and users

    // public function user() {
    //     return $this->belongsTo('App\User');
    // }

    public function question() {
        return $this->belongsTo('App\Question');
    }

}
