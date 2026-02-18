<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    protected $fillable=[
        'postalCode',
        'Region',
        'streetLine',
        'houseNumber',
        'City',
        'Country'

    ];


    protected $primaryKey = 'idAdress';

    public function clients(){
        return $this->hasMany(Client::class,'idAdress','idAdress');
    }

    public function magasiniers(){
        return $this->hasMany(Magasiniers::class,'idAdress','idAdress');
    }


    public function orders(){
        return $this->hasMany(Orders::class,'idAdress','idAdress');
    }

    
}
