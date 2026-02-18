<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'idClient'
    ];


    protected $primaryKey = 'idCart';

    public function client(){
        return $this->belongsTo(Client::class,'idClient','idClient');
    }

    public function shoppingCartItems(){
        return $this->hasMany(ShoppingCartItem::class,'idCart');
    }

    
}
