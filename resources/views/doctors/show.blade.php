@extends('layouts.app')

@section('content')

    <div class="bg-light py-5">
        <div class="container">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h3 class="font-weight-bold mb-0">Doctor Profile</h3>
                <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fe-arrow-left mr-2"></i> Change Doctor</a>
            </div>

            <div class="row mb-5">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-3">
                            <img src="{{ $doctor->avatar_url }}" style="width: 80px;height:80px;" alt="" class="avatar-lg rounded-circle">
                                <h5 class="font-weight-bold mt-2 mb-0">{{ $doctor->name }}</h5>
                                <h6 class="text-muted font-weight-normal mt-2 mb-0">{{ $doctor->degree}}
                                </h6>
                                <h6 class="text-muted font-weight-normal mt-1 mb-3">{{intval($doctor->exp)}} Years Experience</h6>
    
                                @if ($doctor->verified == 0) 
                                    <span class="badge badge-soft-warning pb-1 mb-3">Verification Pending</span>
                                @elseif($doctor->verified == 1) 
                                    <span class="badge badge-soft-success pb-1 mb-3">Verified Profile</span>
                                @elseif($doctor->verified == -1) 
                                    <span class="badge badge-soft-danger pb-1 mb-3">Rejected Profile</span>
                                @endif
    
    
                               
    
                            </div>
    
                            <!-- profile  -->
                            <div class="mt-3 pt-2 border-top">
                                <h4 class="mb-3 font-size-15">About</h4>
                                <p class="text-muted mb-4">{{ $doctor->bio }}</p>
                            </div>
                            <div class="mt-3 pt-2 border-top">
                                <h4 class="mb-3 font-size-15">Contact Information</h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0 text-muted">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>{{ $doctor->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone</th>
                                                <td>{{ $doctor->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address</th>
                                                <td>{{ $doctor->city }}, {{ $doctor->state }}, {{ $doctor->country}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top">
                                <h4 class="mb-3 font-size-15">Financials</h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0 text-muted">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Fees</th>
                                                <td>&#8377; {{ $doctor->fees}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">E-Consult Fees</th>
                                                <td>&#8377; {{ $doctor->efees}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- end card -->
    
                </div>
    
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body ">
                            <ul class="nav tabs nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-clinics-tab" data-toggle="pill" href="#pills-clinics" role="tab" aria-controls="pills-clinics" aria-selected="true">
                                        Clinics
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-hospitals-tab" data-toggle="pill" href="#pills-hospitals" role="tab" aria-controls="pills-hospitals" aria-selected="false">
                                        Hospitals
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-ratings-tab" data-toggle="pill" href="#pills-ratings" role="tab" aria-controls="pills-projects" aria-selected="false">
                                        Ratings
                                    </a>
                                </li>
    
                            </ul>
    
                            <div class="tab-content mt-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-clinics" role="tabpanel" aria-labelledby="pills-clinics-tab">
    
                                    <h5 class="font-weight-bold" class="mt-3">Clinics</h5>
    
                          
                                    @forelse ($doctor->clinics as $clinic) 
                                       @include('doctors.partials.clinic_card')
                                    @empty 
                                        <li>No Clinics Found</li>    
                                    @endforelse
    
                                </div>
    
                                <!-- messages -->
                                <div class="tab-pane" id="pills-hospitals" role="tabpanel" aria-labelledby="pills-hospitals-tab">
                                    <h5 class="font-weight-bold" class="mt-3">Hospitals</h5>
    
                                    
                                   
                                    @forelse ($doctor->hospitals as $hospital) 
                                        @include('doctors.partials.hospital_card')
                                    @empty 
                                        <li>No Hospital Found</li>    
                                    @endforelse
                                    
    
                                </div>
    
                                <div class="tab-pane fade" id="pills-ratings" role="tabpanel" aria-labelledby="pills-ratings-tab">
    
                                    <h5 class="mt-3">Ratings</h5>
    
                                    <ul class="list-unstyled">
                                       @forelse ($doctor->ratings as $rating) 
                                                <li class="py-3 border-bottom">
                                                    <div class="media">
                                                     <!-- <div class="mr-3">
                                                            <img src="assets/images/users/avatar-2.jpg" alt=""
                                                            class="avatar-md rounded-circle">
                                                        </div> -->
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="font-size-15 mt-2 mb-1"><a href="#" class="text-dark">{{$rating->patient_name }}</a></h5>
                                                            <div class="rating" data-rate-value="{{$rating->rating}}"></div>
                                                            <p class="text-muted font-size-13 text-truncate mb-0">
                                                                {{$rating->body}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                        @empty 
                                            <li>No Ratings Found</li>
                                        @endforelse
                                    </ul>
                                </div>
    
    
    
                            </div>
    
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    
@endsection    