<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionProductItem extends Model
{
    use HasFactory;

    protected $fillable =[
        'idPromotion',
        'idProductItem'
    ];
    protected $primaryKey = ['idPromotion','idProductItem'];
}
