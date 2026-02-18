<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable =[
        'Name',
        'Description',
        'discountRate',
        'startDate',
        'endDate'
    ];

    protected $primaryKey = 'idPromotion';

    public function productItem() {
        return $this->belongsTo(ProductItem::class, 'idProductItem', 'idProductItem');
    }
}
