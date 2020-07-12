<!-- Modal -->
<div class="modal fade" id="labFeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <form method="POST" action="/labs/{{$lab->id}}/feedback">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Feedback for Dr. {{ $doctor->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <star-rating :read-only="false" @rating-selected="setRating('rating', $event)" :rating="0" :star-size="15" :round-start-rating="false"></star-rating>
                    <input type="hidden" name="rating" id="rating" value="0">
                </div>
            
                <div class="form-group">
                    <label for="city">Feedback (optional)</label>
                    <textarea rows="3" name="body" id="body"  class="form-control" placeholder="Describe your experience" ></textarea>
                </div>

                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  @push('js')

 

  @endpush