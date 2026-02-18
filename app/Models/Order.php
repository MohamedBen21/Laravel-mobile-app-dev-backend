<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'idClient',
        'idAdress',
        'idMethod',
        'idStatus',
        'orderDate',
        'totalPrice'
    ];

    protected $primaryKey = 'idOroder';

    public function client(){
        return $this->belongsTo(Client::class,'idClient','idClient');
    }

    public function adress(){
        return $this->belongsTo(Adress::class,'idAdress','idAdress');
    }


    public function method(){
        return $this->belongsTo(Method::class,'idMethod','idMethod');
    }

    public function status(){
        return $this->belongsTo(Status::class,'idStatus','idStatus');
    }

    public function orderItems(){
        return $this->hasMany(OrderItems::class,'idOrderItem','idOrderItem');
    }
    
}
