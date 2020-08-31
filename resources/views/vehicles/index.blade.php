@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Vehicles</h1>

            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#add-vehicle-modal">Add Vehicle</button>
            @include('vehicles.modals._add-vehicle-modal')

            <a href="{{ route('vehicles.check_status') }}" type="button" class="btn btn-primary mb-5">Check Vehicle Status</a>
            
            <table class="table">
            	<thread>
            		<tr>
            			<th>#</th>
            			<th>Type</th>
            			<th>Model</th>
            			<th>Plate Number</th>
            			<th>Time-In</th>
            			<th>Action</th>
            		</tr> 
            	</thread>
            	<tbody>
            		@foreach($vehicles as $vehicle)
            		<tr>
            			<td>{{ $loop->iteration }}</td>
                			<td>{{ $vehicle->vehicle_type }}</td>
                            <td>{{ $vehicle->vehicle_model }}</td>
                            <td>{{ $vehicle->vehicle_plate }}</td>
                            <td>{{ $vehicle->time_in }}</td>
                            <td>
                            	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-vehicle-modal-{{$vehicle->id}}">Edit</button>
                            	@include('vehicles.modals._edit-vehicle-modal')
                            </td>
            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
