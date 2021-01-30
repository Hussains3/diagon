<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pararesult extends Model
{
    use HasFactory;

    public function parameter(){
        return $this->belongsTo(Parameter::class) ;
    }
}
