<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable =[
        'idProduct',
        'qteStock',
        'Price',
        'productItemImage'
    ];

    protected $primaryKey = 'idProductItem';

    public function product(){
        return $this->belongsTo(Product::class,'idProduct','idProduct');

    }


        public function variationOptions() {
            return $this->belongsToMany(VariationOption::class, 'product_configurations', 'idProductItem', 'idVariationOption');
        }

        public function shoppingCartItems(){
            return $this->hasMany(ShoppingCartItem::class,'idProductItem');
        }

        public function promotions() {
            return $this->hasMany(Promotion::class, 'idProductItem', 'idProductItem');
        }
    }
    

