<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class) ;
    }
    public function test(){
        return $this->belongsTo(Test::class) ;
    }
    public function sale(){
        return $this->belongsTo(Sale::class) ;
    }
}
