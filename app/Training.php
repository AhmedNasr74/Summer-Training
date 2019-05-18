<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public function requirments(){
        return $this->hasMany(TrainingRequirments::class);
    }
}
