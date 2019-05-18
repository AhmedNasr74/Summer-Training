<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingRequirments extends Model
{
    public function training(){
        return $this->belongsTo(Training::class);
    }
}
