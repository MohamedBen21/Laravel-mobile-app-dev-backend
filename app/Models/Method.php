<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $fillable =[
        'Name',
        'Price'
    ];

    protected $primaryKey = 'idMethod';

    public function orders(){
        return $this->hasMany(Order::class,'idMethod','idMethod');
    }
}
