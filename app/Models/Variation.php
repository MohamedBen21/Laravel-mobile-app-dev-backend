<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable=[
        'idMagasin',
        'Name'
    ];

    protected $primaryKey = 'idVariation';

    public function magasin(){
        return $this->belongsTo(Magasin::class,'idMagasin','idMagasin');
    }

    public function variationOptions(){
        return $this->hasMany(VariationOption::class,'idVariation','idVariation');
    }
}
