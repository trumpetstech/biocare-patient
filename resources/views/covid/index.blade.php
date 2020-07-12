@extends('layouts.dashboard')

@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/covid">COVID PACKAGE</a> </p>
    <h3 class="mb-0 font-weight-bold text-white">COVID PACKAGE</h3>
@endsection

@section('content')

    <div class="container-fluid">

            @if(!isset($covid) || $covid->is_positive == 0)
                @include('covid._start')
            @elseif($covid->has_consent == 0)
                @include('covid._form')
            @elseif(!$covid->group_id)
                @include('covid._groups')
            @elseif(!$covid->covid_package_id)
                @include('covid._packages')
            @else

            <div class="card mb-3">
                <div class="card-header">
                    <b>Group Details</b>
                </div>
                <div class="card-body d-flex align-items-center">
                    <img style="width: 60px;height: 60px;" src="{{ $covid->group->avatar_url }}" alt="">
                    <div style="flex: 1;">   
                        <h4 class="my-0">{{ $covid->group->name }}</h4>
                        <p class="mb-0 text-secondary"><i class="fe-map-pin mr-2"></i>{{ $covid->group->city }}</p>
                        <a href="/covid/chat" class="btn btn-success mt-1"><i class="fe-message-square"></i> Start Chat</a>
                    </div> 
                        <div class="text-right">
                            <div>
                            <span class="badge badge-primary py-1">{{ $covid->package->name }}</span> <br>
                            @if(!$covid->has_active_package) 
                            <span class="text-danger font-weight-bold">Package Expired</span> 
                            @else 
                                <span class="text-info font-weight-bold">Package Expires On : {{ $covid->package_end_date->format('d-m-Y') }}</span> 
                            @endif
                            </div>
                        </div>
                        
                       
                       
                </div>
            </div>
          
        @if($covid->status == 2)
            <div class="alert alert-danger">You need attention please contact authorities!</div>
        @endif 

                <ul class="nav tabs nav-pills navtab-bg nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-recordVitals-tab" data-toggle="pill" href="#recordVitals" role="tab" aria-controls="pills-recordVitals" aria-selected="true">

                            <span class=" d-sm-block order-tab">Record Vitals</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-vitals-tab" data-toggle="pill" href="#vitals" role="tab" aria-controls="pills-vitals" aria-selected="true">

                            <span class=" d-sm-block order-tab">Daily Vitals</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content mt-3">
                    <div class="tab-pane show active" id="recordVitals">
                        @include('covid._add-vitals')
                    </div>
                    <div class="tab-pane" id="vitals">
                        @include('covid._list-vitals')
                    </div>
                </div>
            @endif

    </div>

@endsection