<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function sale_items(){
        return $this->hasMany(SaleItem::class) ;
    }

    public function test(){
        return $this->hasManyThrough(Test::class,SaleItem::class);
    }


    public function patient(){
        return $this->belongsTo(Patient::class) ;
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class) ;
    }
    public function broker(){
        return $this->belongsTo(Broker::class) ;
    }
}
