<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUtilisateur',
        'Role',
        'Username'
    ];
    
    protected $primaryKey = 'idAdmin';

    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class,'idUtilisateur','idUtilisateur');
    }

    public function promoCodes(){
        return $this->hasMany(PromoCode::class,'idAdmin','idAdmin');
    }
}
