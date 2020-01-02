<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['year_reg', 'registration', 'mileage', 'engine_size', 'colour', 'keepers', 
    'body_style', 'transmission', 'fuel_type', 'insurance_group', 'road_tax'];
}
