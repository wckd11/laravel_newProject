@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Vehicles Status {{ date('m-d-Y', strtotime($todaysDate)) }}</h1>
            
            <table class="table">
            	<thread>
            		<tr>
            			<th>#</th>
            			<th>Type</th>
            			<th>Model</th>
            			<th>Plate Number</th>
            			<th>Time-In</th>
            			<th>Status</th>
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
                        <td>@if($vehicle->is_park($todaysDate)) Checked-Out @else Parked  @endif</td>
                        <td>
                        	@if(!$vehicle->is_park($todaysDate))
                                <form action="{{ route('vehicles.status-park', array('id'=>$vehicle->id)) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $todaysDate }}" name="todays_date"/>
                                    <button type="submit" class="btn btn-danger"> CHECK-OUT</button>
                                </form>
                            @else
                                <form action="{{ route('vehicles.status-out', array('id'=>$vehicle->id)) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $todaysDate }}" name="todays_date"/>
                                    <button type="submit" class="btn btn-warning">PARK</button>
                                </form>
                            @endif
                        </td>
            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
