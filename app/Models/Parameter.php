<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    public function test(){
        return $this->belongsTo(Test::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
