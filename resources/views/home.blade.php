@extends('layouts.dashboard')

@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/home">Dashboard</a></p>
    <h3 class="mb-0 font-weight-bold text-white">Dashboard</h3>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="card card-body features1">
                    <img style="width: 80px;" class="mx-auto" src="/images/feature1.svg" alt="">
                    <h4 class="mt-3">Find Doctors</h4>
                    <div>
                        <button data-toggle="modal" data-target="#findDoctors" class="btn btn-outline-success">Find Nearest Doctors</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card card-body features2">
                    <img style="width: 80px;" class="mx-auto" src="/images/feature2.svg" alt="">
                    <h4 class="mt-3">Find Labs</h4>
                    <div>
                        <button data-toggle="modal" data-target="#findLabs" class="btn btn-outline-danger">Book Lab Appointment</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card card-body features3">
                    <img style="width: 80px;" class="mx-auto" src="/images/feature3.svg" alt="">
                    <h4 class="mt-3">Order Medicines</h4>
                    <div>
                        <button data-toggle="modal" data-target="#findPharmacy" class="btn btn-outline-primary">Show All Nearest Pharmacy</button>
                    </div>
                </div>
            </div> 
             
        </div>

        <div class="card border mt-5">
            <div class="card-header bg-white d-flex align-items-center justify-content-between font-weight-bold">
                <h5 class="mb-0">Recent Appointments</h5>
                <a href="/appointments" class="btn btn-sm btn-primary"><i class="fe-calendar mr-2"></i> View All Appointments</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td>
                                        <div  class="d-flex align-items-center"  >
                                            <img style="width: 40px;height:40px;border-radius:100%;" src="{{ $appointment->doctor->avatar_url }}" alt="">
                                            <div class="ml-2">
                                                <span class="d-block mb-0"><a class="text-dark" href="/appointments/{{$appointment->id}}">{{ $appointment->doctor->name }}</a></span>
                                                <span class="text-muted">{{ substr($appointment->doctor->category->name, 0, 20) }}</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->time }}</td>
                                    @if ($appointment->status == 0)
                                         <td> <span class="badge badge-soft-warning py-1">Pending</span> </td>
                                    @elseif ($appointment->status == 1)
                                        <td> <span class="badge badge-soft-info py-1">Confirmed</span></td>
                                    @elseif ($appointment->status == 2)
                                        <td> <span class="badge badge-soft-success py-1">Attended</span></td>
                                    @elseif ($appointment->status == -1)
                                        <td> <span class="badge badge-soft-danger py-1">Cancelled</span></td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="5">You have no recent appointments</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
   
@endsection
