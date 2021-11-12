<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[
            'resName',
            'resPostcode' ,
            'resFoodType' ,
            'resDescription' ,
            'resOwnerName' ,
    ];
    
}
