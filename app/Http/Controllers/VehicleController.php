<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{

    public function index(){
    	$vehicles = Vehicle::all();
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
}
