<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{
    use HasFactory;

    protected $fillable=[
        'idVariation',
        'Value'
    ];

    protected $primaryKey = 'idVariationOption';

    public function variation(){
        return $this->belongsTo(Variation::class,'idVariation','idVariation');
    }


        public function productItems() {
            return $this->belongsToMany(ProductItem::class, 'product_configurations', 'idVariationOption', 'idProductItem');
        }
    }
    

