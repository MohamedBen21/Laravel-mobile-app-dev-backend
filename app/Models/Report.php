<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable=[
        'reporterType',
        'idReporter',
        'reportedType',
        'idReported',
        'reportDate',
        'reason',
        'status'
    ];

    protected $primaryKey = 'idReport';

    public function client(){
        return $this->belongsTo(Client::class,'idClient','idClient');
    }
    public function magasinier(){
        return $this->belongsTo(Magasinier::class,'idMagasinier','idMagasinier');
    }
}
