@extends('layouts.app')

@section('content')

    <div class="bg-light py-5">
        <div class="container">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h3 class="font-weight-bold mb-0">Browse Doctors</h3>
                <a href="#findDoctors" class="btn btn-warning" data-toggle="modal"><i class="fe-filter mr-2"></i> Change Filters</a>
            </div>
            <div class="row">
                @foreach($doctors as $doctor)
                    <div class="col-md-3 mb-3">
                        @include('doctors.partials._grid-card', ['atype' => request('appointment_type')])
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection