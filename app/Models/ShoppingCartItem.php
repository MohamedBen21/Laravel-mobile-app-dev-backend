<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'idCart',
        'idProductItem',
        'qteProd'
    ];

    protected $primaryKey = ['idCart','idProductItem'];

    public function cart(){
        return $this->belongsTo(Cart::class,'idCart');
    }

    public function productItem(){
        return $this->belongsTo(ProductItem::class,'idProductItem');
    }
}
