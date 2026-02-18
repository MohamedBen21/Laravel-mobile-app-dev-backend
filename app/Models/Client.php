<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'idUtilisateur',
        'idAdress',
        'Username',
        'clientImage',
        'buysCount'
    ];

    protected $primaryKey = 'idClient';

    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class,'idUtilisateur','idUtilisateur');
    }

    public function adress(){
        return $this->belongsTo(Adress::class,'idAdress','idAdress');
    }
    
    public function carts(){
        return $this->hasMany(Cart::class,'idClient','idClient');
    }
    
    public function orders(){
        return $this->hasMany(Order::class,'idClient','idClient');
    }

    public function reports(){
        return $this->hasMany(Report::class,'idClient','idClient');
    }
    
}
