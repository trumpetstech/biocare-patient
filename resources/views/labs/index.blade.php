@extends('layouts.app')

@section('content')

    <div class="bg-light py-5">
        <div class="container">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h3 class="font-weight-bold mb-0">Browse Labs</h3>
                <a href="#findLabs" class="btn btn-warning" data-toggle="modal"><i class="fe-filter mr-2"></i> Change Filters</a>
            </div>
            <div class="row">
                @foreach($labs as $lab)
                    <div class="col-md-12 mb-3">
                        @include('labs.partials._list-card')
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection