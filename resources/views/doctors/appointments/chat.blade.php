@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        <div class="d-flex page-title justify-content-between align-items-center border-bottom mb-2 pb-2">
            <h4 class="font-weight-bold"> Appointment #{{ $appointment->id }}</b></h4>
            <div>
                <a href="/appointments/{{$appointment->id}}/call" class="btn btn-success"><i class="fe-video mr-2"></i> Video Call</a>
                <a href="/appointments/{{$appointment->id}}" class="btn btn-dark"><i class="fe-x mr-2"></i> Close Chat</a>
            </div>
        </div>

        
        <div class="mb-5">
            <chat :appointment="{{ $appointment }}"  />
        </div>
    </div>

@endsection    