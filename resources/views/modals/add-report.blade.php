<!-- Modal -->
<div class="modal fade" id="addReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form method="POST" action="/reports" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Upload Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label for="test">Choose Report File</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe-file-text"></i></span>
                        </div>
                        <input type="file" name="file" id="file"  class="form-control" placeholder="Choose File" aria-label="Choose File" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="test">Select Test</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fe-user"></i></span>
                        </div>
                        <select class="form-control" name="test" id="test">
                            @foreach($tests as $test)
                              <option value="{{ $test->name }}">{{ $test->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload Report</button>
            </div>
        </form>
      </div>
    </div>
  </div>