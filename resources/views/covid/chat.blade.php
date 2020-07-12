@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        <div class="card mb-3">
            <div class="card-header">
                <b>Group Details</b>
            </div>
            <div class="card-body d-flex align-items-center">
                <img style="width: 60px;height: 60px;" src="{{ $covid->group->avatar_url }}" alt="">
                <div style="flex: 1;">   
                    <h4 class="my-0">{{ $covid->group->name }}</h4>
                    <p class="mb-0 text-secondary"><i class="fe-map-pin mr-2"></i>{{ $covid->group->city }}</p>
                </div> 
                    <div class="text-right">
                        <a href="/covid" class="btn btn-dark mr-2"><i class="fe-x mr-2"></i> Close Chat</a>
                       
                    </div>
                    
                   
                   
            </div>
        </div>

       

        
        <div class="mb-5">
            <covid-chat :order="{{ $covid }}"  />
        </div>
    </div>

@endsection    