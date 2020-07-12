<!-- Modal -->
<div class="modal fade" id="findLabs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form method="POST" action="/labs/find">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Find Labs</h5>
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
                        <input type="text" name="city" id="city" value="{{ auth()->check() &&  patient() ? patient()->city : '' }}" class="form-control" placeholder="Choose City" aria-label="Choose City" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="tests">Select Tests</label>
                    
                    <select class="tags-input" name="tests[]" multiple="multiple">
                        @foreach(getTests() as $test)
                            <option value="{{ $test->id }}">{{ $test->name }}</option>
                        @endforeach    
                    </select>
                    
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Find Labs</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  @push('js')
    <script>
        $(document).ready(function() {
            $('.tags-input').select2();
        });
    </script>
  @endpush