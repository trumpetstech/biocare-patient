@extends('layouts.dashboard')

@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/consultations">Consulted Doctors</a> </p>
    <h3 class="mb-0 font-weight-bold text-white">Consulted Doctors</h3>
@endsection


@section('content')

        <div class="container-fluid">
            <h3 class="border-bottom pb-2">Consulted Doctors</h3>

        <div class="card">
            <div class="card-body">


                <form method="GET" action="/consultations">

                    <div class="row">
                        <div class="col-xl-4 col-sm-4">
                            <div class="form-group">
                                <label for="from_date">Form Date</label>
                                <div>
                                    <input class="form-control datepicker" placeholder="Choose from date" name="from_date" id="from_date" value="{{ request('from_date') ?? '' }}" type="text" autocomplete="off"  >
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-4">
                            <div class="form-group ">
                                <label for="to_date">To Date</label>
                                <div>
                                    <input class="form-control datepicker2" placeholder="Choose to date" name="to_date" id="to_date" value="{{ request('to_date') ?? '' }}" type="text" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-4">
                            <div class="form-group mt-5 mt-sm-0">

                                <button type="submit"  class="btn btn-primary btn-block mt-4">Search</button>

                            </div>
                        </div>


                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card-->

        @foreach ($appointments as $appointment)
            @include('doctors.partials.appointment_card')
        @endforeach
    </div>

@endsection

@push('js')
    <script>
           $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
        });
        $('.datepicker2').datepicker({
            format: 'dd-mm-yyyy',
        });
    </script>    
@endpush