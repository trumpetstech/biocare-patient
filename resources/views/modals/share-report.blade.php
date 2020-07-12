<!-- Modal -->
<div class="modal fade" id="shareReport-{{$report->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form method="POST" action="/reports/{{$report->id}}/share">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Share Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label for="doctor_id">Select Doctor</label>
                    <select class="form-control" name="doctor_id" id="select{{$report->id}}">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Share Report</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  @push('js')
    <script>
            $(document).ready(function() {
                $('#select{{$report->id}}').select2();
            });
     </script>   
  @endpush