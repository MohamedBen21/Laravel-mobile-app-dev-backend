<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Utilisateur extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable=[
        'Nom',
        'Prenom',
        'Email',
        'Password',
        'Genre',
        'dateDeNaissance',
        'numTel',
        'userType'
    ];

    protected $primaryKey = 'idUtilisateur';

    public function admin(){
        return $this->hasOne(Admin::class,'idUtilisateur','idUtilisateur');
    }

    public function client(){
        return $this->hasOne(Client::class,'idUtilisateur','idUtilisateur');
    }

    public function magasinier(){
        return $this->hasOne(Magasinier::class,'idUtilisateur','idUtilisateur');
    }
    public function OtpCode(){
        return $this->hasOne(OtpCode::class,'idUtilisateur','idUtilisateur');
    }
}
