<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasinier extends Model
{
    use HasFactory;

    protected $fillable =[
        'idUtilisateur',
        'idAdress',
        'Username',
        'salesCount'
    ];

    protected $primaryKey = 'idMagasinier';

    public function adress(){
        return $this->belongsTo(Adress::class,'idAdress','idAdress');
    }

    public function magasins(){
        return $this->hasMany(Magasin::class,'idMagasinier','idMagasinier');
    }

    public function reports(){
        return $this->hasMany(Report::class,'idMagasinier','idMagasinier');
    }
}
