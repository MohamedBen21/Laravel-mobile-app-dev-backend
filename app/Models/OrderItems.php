<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable =[
        'idProductItem',
        'idOrder',
        'qteItem',
        'Price'

    ];


    protected $primaryKey = 'idOrederItem';

    public function orders(){
        return $this->belongsTo(Order::class,'idOrderItem','idOrderItem');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'idOrderItem','idOrderItem');
    }

}
