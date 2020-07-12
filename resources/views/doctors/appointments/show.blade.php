@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

        @if($appointment->status == 2)
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="font-weight-bold mb-0">Appointment Completed <i class="fe-check-circle text-success ml-2"></i></h4>
                        <p class="mb-0 text-secondary">Consulting Fees : ₹ {{$appointment->fees}}</p>
                    </div>   
                    
                    <div class="d-flex align-items-center">
                    @if($appointment->paid)
                    <span style="font-size: 17px;" class="badge badge-success p-2"><i class="fe-check mr-2"></i> Paid</span>
                    @else
                        <a href="/appointments/{{$appointment->id}}/pay" class="btn btn-success">Pay Online</a>
                    @endif
                    @if(!$appointment->feedback)    
                        <a href="#doctorFeedback" data-toggle="modal" class="btn btn-primary ml-2">Give Feedback</a>
                    @endif    
                    </div>
                        
                </div>
            </div>
        @endif
        
        @if(!$appointment->feedback)  
            @include('modals.doctor-feedback', ['doctor' => $appointment->doctor])
        @endif
        @include('doctors.partials._list-card', ['doctor' => $appointment->doctor])
    
        @if($appointment->status == 2)

        @if($appointment->feedback)

        <div class="card mb-3">
            <div class="card-body">
                <div class="media">
                    <!-- <div class="mr-3">
                    <img src="assets/images/users/avatar-2.jpg" alt=""
                        class="avatar-md rounded-circle">
                </div> -->
                    <div class="media-body overflow-hidden">
                        <h6 class="mt-2 mb-1">Your Feedback</a></h6>
                        <star-rating :read-only="true" :rating="{{ $appointment->feedback->rating }}" :star-size="15" :round-start-rating="false"></star-rating>
                        <p class="text-muted font-size-13 text-truncate mb-0">
                            {{$appointment->feedback->body}}</p>
                    </div>
                </div>
            </div>
        </div>

        @endif


        <div class="card mt-3 mb-5">
            <div class="card-body">
                <div class="prescription mt-3">
                    <div class="clearfix">
                        <div class="float-right">
                            <img src="/images/nav-logo.png" alt="" />
                
                        </div>
                        <div class="float-left">
                            <h4 class="m-0 font-weight-bold">Dr. {{ $appointment->doctor->name }}</h4>
                            <dl class="row mb-2 mt-3">
                
                                <dt class="col-sm-3 font-weight-bold">Patient :</dt>
                                <dd class="col-sm-9 font-weight-normal">{{ $appointment->patient->name}}</dd>
                
                                <dt class="col-sm-3 font-weight-bold">Ph. </dt>
                                <dd class="col-sm-9 font-weight-normal">{{ $appointment->patient->phone}}</dd>
                
                
                            </dl>
                        </div>
                
                    </div>
                
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Medicine</th>
                                            <th style="width: 10%">Qty</th>
                                            <th>Instructions</th>
                                            <th>Timings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (json_decode($appointment->prescription_items, true) as $index => $item) 
                                            <tr>
                                                <td>{{ $index + 1 }} </td>
                                                <td>
                                                    <h5 class="font-size-16 mt-0 mb-2">{{ $item['medicine'] }} </h5>
                                                </td>
                                                <td>{{ $item['qty'] }}</td>
                                                <td>{{ $item['instructions'] }} food</td>
                                                <td>{{ $item['timings'] }}</td>
                                            </tr>
                                        @endforeach
                
                
                
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>

                    
                    <!-- end row -->
                    @if ($appointment->suggested_tests != NULL)
                        <h5 class="mt-3">Suggested Tests</h5>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-4 table-centered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Test</th>
                                                <th>Suggested Lab</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (json_decode($appointment->suggested_tests, true) as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }} </td>
                                                    <td>
                                                        <h5 class="font-size-16 mt-0 mb-2">{{ $item['test'] }} </h5>
                                                    </td>
                                                    <td>{{ $item['lab'] ?? '--' }}</td>
                                                </tr>
                                            @endforeach
                
                
                
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                    @endif
                
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Special Instructions:</h6>
                
                                <p class="text-muted">
                                    {{ $appointment->patient_special_instruction }}
                                </p>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-right mt-4">
                
                                <h3>&#8377; {{ $appointment->fees }} </h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="ml-3 mt-5">
                        <div class="ml-4">
                            <p class="m-0 font-weight-bold">Signature</p>
                
                        </div>
                        <div class="ml-2">
                            <img style="width: 200px;height:100px;" src="{{ $appointment->doctor->signature_url }}" alt="Signature">
                        </div>
                        <!-- <br><br> -->
                        <div class="ml-2">
                            <p class="m-0 font-weight-bold">Dr. {{ $appointment->doctor->name }}</p>
                
                        </div>
                
                    </div>
                    <div class="mt-5 mb-1">
                        <div class="text-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="uil uil-print mr-1"></i> Print</a>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        
        @endif
        
    </div>

@endsection