<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	public function getFullAttribute(){
		return "$this->vehicle_type $this->vehicle_model $this->vehicle_plate";
	}

    public function is_park($date){
    	$status = Status::whereDate('status_date', $date)
    					->where('user_id', $this->id)
    					->first();
    	if($status){
    		return $status->is_park;
    	}else{
    		return false;
    	}
    }
}
