<!-- Modal -->
<div class="modal fade" id="edit-vehicle-modal-{{ $vehicle->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('vehicles.update') }}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            @csrf
            <input type="hidden" name="id" value="{{ $vehicle->id }}"/>
            <input class="form-control mb-2" name="vehicle_type" placeholder="Vehicle Type" value="{{ $vehicle->vehicle_type }}" />
            <input class="form-control mb-2" name="vehicle_model" placeholder="Vehicle Model" value="{{ $vehicle->vehicle_model }}" />
            <input class="form-control mb-2" name="vehicle_plate" placeholder="Vehicle Plate Number" value="{{ $vehicle->vehicle_plate }}" />
            <input class="form-control mb-2" name="time_in" placeholder="Enter Time-In" value="{{ $vehicle->time_in }}" />
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
      </div>
      </form>
    </div>
  </div>
</div>