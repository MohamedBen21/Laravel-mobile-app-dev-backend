<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;


    protected $fillable =[
        'idAdmin',
        'Name',
        'Description',
        'discountRate',
        'startDate',
        'endDate'
    ];

    protected $primaryKey = 'idPromoCode';


    public function admin(){
       
            return $this->belongsTo(Admin::class, 'idAdmin', 'idAdmin');
        
    }
}
