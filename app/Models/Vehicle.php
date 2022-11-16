<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'brand',
        'vehicle_year',
        'kilometers',
        'city',
        'type',
        'price',
        'description',
        'image',
        'contact_name',
        'contact_phone',
        'contact_mail',
    ];
}
