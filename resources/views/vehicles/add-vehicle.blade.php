@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
            <h1>Add Vehicle</h1>
            <form action="{{ route('vehicles.store') }}" method="post">
                  @csrf
                  <input class="form-control mb-2" name="vehicle_type" placeholder="Vehicle Type"/>
                  <input class="form-control mb-2" name="vehicle_model" placeholder="Vehicle Model"/>
                  <input class="form-control mb-2" name="vehicle_plate" placeholder="Vehicle Plate Number"/>
                  <button type="submit" class="btn btn-primary">Add Vehicle</button>
            </form>
      </div>
    </div>
</div>
@endsection