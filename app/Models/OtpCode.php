<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'idUtilisateur',
        'Email',
        'Otp'
    ];

    protected $primaryKey = 'idOtpCode';

    public function Utilisateur(){
        return $this->belongsTo(Utilisateur::class,'idUtilisateur','idUtilisateur');
    }
}
