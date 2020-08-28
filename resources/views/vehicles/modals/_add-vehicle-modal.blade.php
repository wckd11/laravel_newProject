<!-- Modal -->
<div class="modal fade" id="add-vehicle-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('vehicles.store') }}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            @csrf
            <input class="form-control mb-2" name="vehicle_type" placeholder="Vehicle Type"/>
            <input class="form-control mb-2" name="vehicle_model" placeholder="Vehicle Model"/>
            <input class="form-control mb-2" name="vehicle_plate" placeholder="Vehicle Plate Number"/>
            <input class="form-control mb-2" name="time_in" placeholder="Enter Time-In"/>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Vehicle</button>
      </div>
      </form>
    </div>
  </div>
</div>