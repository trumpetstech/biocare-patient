@extends('layouts.app')

@section('content')

    <div class="bg-light py-5">
        <div class="container">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h3 class="font-weight-bold mb-0">Book Appointment</h3>
                <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fe-arrow-left mr-2"></i> Change Lab</a>
            </div>
            
            @include('labs.partials._list-card' , ['book' => false])

            <form method="POST" action="/labs/{{$lab->id}}/appointments/book">
                @csrf
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="example-date">Contact No.</label>
                            <div>
                                <input class="form-control" id="contact_no" type="text"value="{{ patient()->phone }}" name="contact_no" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group">
                                    <label for="example-date">Date</label>
                                    <div>
                                        <input autocomplete="off" class="form-control datepicker" id="example-date" type="text" name="date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group ">
                                    <label>Time</label>
                                    <div>
                                        <input class="form-control" id="example-date" type="time" name="time" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5 mt-sm-0">

                            <button type="submit" name="book_appointment" class="btn btn-primary btn-block mt-4">Book Appointment</button>

                        </div>

                    </div>
                </div>

            </form>
               
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
           $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
        });
    </script>    
@endpush