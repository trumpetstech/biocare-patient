<div class="card mt-3">
    <div class="card-body">
    @if($appointment->status == 0)
        <span class="badge badge-soft-warning py-1 float-right">Pending</span>
    @elseif($appointment->status == 1)
        <span class="badge badge-soft-info py-1 float-right">Confirmed</span>
    @elseif($appointment->status == 2)
        <span class="badge badge-soft-success py-1 float-right">Attended</span>
        
        @if($appointment->paid)
            <span class="badge badge-soft-info py-1 float-right mr-2">Paid</span>
        @else
            <span class="badge badge-soft-warning py-1 float-right mr-2">Pending Payment</span>
        @endif
    @elseif($appointment->status == -1)
        <span class="badge badge-soft-danger py-1 float-right">Cancelled</span>      
    @endif 
        <h5><a href="#" class="text-dark">{{$appointment->lab->name }}</a></h5>

        <p class="text-muted mb-4 "><b>Address :</b> {{ $appointment->lab->full_address }}</p>
        

        @if($appointment->status == 2)
            <a href="/lab-appointments/{{ $appointment->id }}" class="btn btn-success btn-sm"> View Invoice</a>   
            @if(!$appointment->paid)
                <a href="/lab-appointments/{{ $appointment->id }}" class="btn btn-primary btn-sm"> Make Payment</a>   
            @endif
        @endif
        
    </div>
    <div class="card-body border-top">
        <div class="row align-items-center">
            <div class="col-sm-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item pr-2">
                        <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Order date">
                            <i class="fe-calendar mr-1"></i>{{$appointment->appointment_date}}                                                       </a>
                    </li>
                    <li class="list-inline-item pr-2">
                        <a href="#" class="text-muted d-inline-block">
                        <i class="fe-clock mr-1"></i>Time:  {{$appointment->appointment_time}}                                                     </a>
                    </li>

                 
                    @if($appointment->status == 2)
                        <li class="list-inline-item pr-2">
                            <a href="#" class="text-muted d-inline-block">
                                <i class="fe-dollar-sign mr-1"></i> Fees : ₹ {{ $appointment->fees }}       
                            </a>
                        </li>
                    @endif


                </ul>
            </div>

        </div>
    </div>
</div>

