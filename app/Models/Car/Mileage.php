<?php

namespace App\Models\Car;

use Model;

class Mileage extends Model {

    protected $table = 'car_mileages';
    protected $dates = ['date','created_at','updated_at'];

    protected $fillable  = ['car_id','value','date'];

    public function car() {
        return $this->belongsTo('App\Models\Car\Car');
    }

}
