@extends('layouts.app')

@section('content')

<div class="jumbotron main-hero pb-0">
    <div class="container text-center main-heading">
        <h1 class="font-weight-bold">Helping Hand Foundation</h1>
        <p class="text-white">Home Isolation Support Program For COVID-19 Positive Patients for 14 Days</p>
        @auth
            <a href="/home" class="btn btn-success btn-lg text-uppercase px-4 mt-4">Visit Dashboard <i class="fe-arrow-right ml-2"></i></a>
        @else
            <a href="/login" class="btn btn-success btn-lg text-uppercase px-4 mt-4">Login / Signup <i class="fe-arrow-right ml-2"></i></a>
        @endauth
    </div>
</div>

<div class="bg-white section">
    <div class="container">
        <h3 class="section-title text-center">Our <span class="text-warning">COVID Care</span> Packages</span></h3>
        <div class="row">
            @foreach ($packages as $package)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                               <div style="flex: 1;">   
                                    <h4 class="my-0">{{ $package->name }}</h4>
                                    <p class="mb-0 text-secondary"><i class="fe-calendar mr-2"></i>{{ $package->no_of_days }} Days</p>
                                </div> 
                            </div>
                            <p class="text-primary font-weight-bold mt-2">₹ {{ $package->amount }}</p>
                            
                            <a href="/login" class="btn btn-warning btn-block">Buy Package</a>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="jumbotron section bg-light-blue">
    <div class="container">
        <h3 class="section-title text-center mb-1">How it <span class="text-warning">works</span>?</h3>
        <p class="text-center mb-5 lead">Easy and feasible process to simplify your home quarantine routine</p>
        <div class="row mt-2">
            <div class="col-md-4 text-center main-feature">
                <div class="card step step-1 p-3">
                    <img style="width: 80px;" src="/images/step1.png" alt="">
                </div>
                <p class="mb-0">Fill up our</p>
                <h3 class="font-weight-bold">Online Form</h3>
            </div>
            <div class="col-md-4 text-center main-feature">
                <div class="card step step-2 p-3">
                    <img style="width: 80px;" src="/images/step2.png" alt="">
                </div>
                <p class="mb-0">Update your</p>
                <h3 class="font-weight-bold">Daily Vitals</h3>
            </div>
            <div class="col-md-4 text-center">
                <div class="card step step-3 p-3">
                    <img style="width: 80px;" src="/images/step3.png" alt="">
                </div>
                <p class="mb-0">Be Connected to</p>
                <h3 class="font-weight-bold">Our Experts</h3>
            </div>
        </div>
    </div>
</div>


<div class="jumbotron section bg-white mt-0 pt-0">
    <div class="container">
        <h3 class="section-title text-center">Our Top Rated <span class="text-warning">Specialists</span></h3>
        
        <div class="row">
            @foreach($doctors as $doctor)
                <div class="col-md-3">
                    @include('doctors.partials._grid-card')
                </div>
            @endforeach
        </div>

        {{-- <div class="mt-5 text-center">
            <a href="#findDoctors" data-toggle="modal" class="btn btn-success btn-lg px-3">Book an Appointment<i class="fe-arrow-right ml-2"></i></a>
        </div>
     --}}
    </div>
</div>
@endsection
