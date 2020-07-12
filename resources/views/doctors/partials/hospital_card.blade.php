<div class="card mb-1">
    <div class="card-body">
        @if(!isset($book))
            <div class="float-right">
                <a class="btn btn-info btn-sm text-white mr-2" href="/doctors/{{$doctor->id}}/appointments/hospitals/{{ $hospital->id }}?appointment_type={{ request('appointment_type') }}"><i class="fe-calendar mr-2"></i> Book Appointment</a>
            </div>
        @endif

        <h5><a href="#" class="text-dark">{{ $hospital->name }}</a></h5>

        <p class="text-muted mb-2"><i class="fe-map-pin mr-1"></i> {{ $hospital->address}}, {{ $hospital->city}}, {{ $hospital->state}}</p>

        <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="hospital Timings">
                            <i class="fe-clock mr-1"></i>{{ $hospital->timings}}                                                       </a>
    </div>
    
</div>