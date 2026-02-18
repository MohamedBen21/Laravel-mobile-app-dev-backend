<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    use HasFactory;

    protected $fillable = [
        'idMagasinier',
        'Category',
        'name',
        'magasinImage'
    ];

    protected $primaryKey = 'idMagasin';

    public function magasiniers(){
        return $this->belongsTo(Magasiniers::class,'idMagasinier','idMagasinier');
    }

    public function products(){
        return $this->hasMany(Product::class,'idMagasin','idMagasin');
    }

    public function variations(){
        return $this->hasMany(Variation::class,'idMagasin','idMagasin');
    }
}
