<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function questionnaires() {
        return $this->hasMany('App\Questionnaire');
    }
    public function questions(){
        return $this->hasMany('App\Question');
    }
}
