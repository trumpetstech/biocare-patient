<!-- Modal -->
<div class="modal fade" id="findDoctors" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form method="GET" action="/doctors">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Find Doctors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label for="city">City</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe-map-pin"></i></span>
                        </div>
                        <input type="text" name="city" id="city" value="{{  auth()->check() && patient() ? patient()->city : '' }}" class="form-control" placeholder="Choose City" aria-label="Choose City" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe-user"></i></span>
                        </div>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($doctorCategories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Appointment Type</label>
                    <div class="row ml-2">
                        <div class="col-md-6 custom-control custom-radio">
                            <input type="radio" id="physical" name="appointment_type" value="0" class="custom-control-input" checked>
                            <label class="custom-control-label" for="physical">Physical</label>
                        </div>
                        <div class="col-md-6 custom-control custom-radio">
                            <input type="radio" id="virtual" value="1" name="appointment_type" class="custom-control-input">
                            <label class="custom-control-label" for="virtual">Virtual</label>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Find Doctors</button>
            </div>
        </form>
      </div>
    </div>
  </div>