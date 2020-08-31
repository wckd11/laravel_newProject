<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use Carbon\Carbon;
use App\Status;

class VehicleController extends Controller
{

    public function index(Request $request){
    	$filter_check_vehicles = $request->check_vehicles;

    	if($filter_check_vehicles){
			$vehicles = Vehicle::where('check_vehicles', '=', $filter_check_vehicles);
    	}else{
    		$vehicles = Vehicle::all();		
    	}
	
    	return view('vehicles.index', array('vehicles' => $vehicles));
    }


    public function addVehicle(){
    	return view('vehicles.add-vehicle');
    }


    public function store(Request $request){
    	$request->validate([
    		'vehicle_type' => 'required',
    		'vehicle_model' => 'required',
    		'vehicle_plate' => 'required',
    		'time_in' => 'required',
    	]);

    	$vehicle = new Vehicle;
    	$vehicle->vehicle_type = $request->vehicle_type;
    	$vehicle->vehicle_model = $request->vehicle_model;
    	$vehicle->vehicle_plate = $request->vehicle_plate;
    	$vehicle->time_in = $request->time_in;
    	$vehicle->save();

    	return redirect()->route('vehicles.index')->withStatus('Vehicle Added.');
    }

    public function update(Request $request){
    	$request->validate([
    		'vehicle_type' => 'required',
    		'vehicle_model' => 'required',
    		'vehicle_plate' => 'required',
    		'time_in' => 'required',
    	]);
    	$vehicle = Vehicle::find($request->id);
    	if($vehicle){
    		$vehicle->vehicle_type = $request->vehicle_type;
    		$vehicle->vehicle_model = $request->vehicle_model;
    		$vehicle->vehicle_plate = $request->vehicle_plate;
    		$vehicle->time_in = $request->time_in;
    		$vehicle->save();
    	}

    	return redirect()->back()->withStatus('Vehicle Updated.');
    }

    public function checkStatus(){
    	$vehicles = Vehicle::all();
    	$todaysDate = Carbon::today();

    	return view('vehicles.check-status', compact('vehicles', 'todaysDate'));
    }

    public function statusPark(Request $request){
    	$vehicle = Vehicle::find($request->id);
    	$status = Status::where('user_id', $request->id)
    					->whereDate('status_date', Carbon::parse($request->todaysDate))
    					->first();
    	if(!$status){
    		$status = new Status;
    	}

    	$status->user_id = $request->id;
    	$status->status_date = Carbon::parse($request->todays_date);
    	$status->is_park = true;
    	$status->save();

    	return redirect()->back()->withStatus('Vehicle Successfully Checked-Out.');
    }

    public function statusOut(Request $request){
    	$vehicle = Vehicle::find($request->id);
    	$status = Status::where('user_id', $request->id)
    					->whereDate('status_date', Carbon::parse($request->todaysDate))
    					->first();
    	if(!$status){
    		$status = new Status;
    	}

    	$status->user_id = $request->id;
    	$status->status_date = Carbon::parse($request->todays_date);
    	$status->is_park = false;
    	$status->save();

    	return redirect()->back()->withStatus('Vehicle Successfully Parked.');
    }
}
