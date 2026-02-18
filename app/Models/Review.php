<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=[
        'idClient',
        'idOrderItem',
        'Rating',
        'Comment'
    ];

    protected $primaryKey = 'idReview';


    public function orderItems(){
        return $this->belongsTo(OrderItem::class,'idOrderItem','idOrderItem');
    }
}
