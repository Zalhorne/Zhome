<?php

namespace App\Models\Car;

use Model;
use SoftDeletes;

class Car extends Model {
    use SoftDeletes;

    protected $table = 'cars';
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function mileages() {
        return $this->hasMany('App\Models\Car\Mileage')->orderBy('date','desc');
    }

    public function getKilometrageAttribute () {
        return $this->kilometrage();
    }
    
    public function kilometrage() {
    	if ( !empty($this->mileages) )
        	return $this->mileages->first()->value;
       	else
       		return '';
    }

    public function getDateKilometrageAttribute () {
        return $this->dateKilometrage();
    }
    
    public function dateKilometrage() {
    	if ( !empty($this->mileages) )
        	return $this->mileages->first()->date;
       	else
       		return '';
    }


}
