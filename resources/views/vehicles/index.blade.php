@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Vehicles List Here</h1>
            <a class="btn btn-primary" href="{{ route('vehicles.add') }}">Add Vehicle</a>
            <table class="table">
            	<thread>
            		<tr>
            			<th>#</th>
            			<th>Name</th>
            		</tr>
            	</thread>
            	<tbody>
            		@foreach($vehicles as $vehicle)
            		<tr>
            			<td>{{ $loop->iteration }}</td>
            			<td>{{ $vehicle->vehicle_type }} {{ $vehicle->vehicle_model }} {{ $vehicle->vehicle_plate }}</td>
            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
