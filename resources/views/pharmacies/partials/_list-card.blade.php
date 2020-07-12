<div class="card mb-2 doctor-list-card d-print-none">
    <div class="card-body d-flex align-items-center px-3">
        {{-- <img src="{{ $doctor->avatar_url ?? '/images/avatar.png' }}" alt=""> --}}
        <div class="" style="flex: 1;">
            <p class="text-primary mb-0 mt-2">{{ $pharmacy->category->name }}</p>
            <h5 class="mb-1">{{ $pharmacy->name }} <i class="fe-check-circle text-success"></i></h5>
            <p class="text-secondary mb-1"><i class="fe-clock mr-2"></i> {{ $pharmacy->timings }}</p>
            <div class="rating">
                <star-rating :read-only="true" :rating="{{ $pharmacy->avg_rating }}" :star-size="15" :round-start-rating="false"></star-rating>
            </div>
            <p class="mt-2 mb-2"><i class="fe-map-pin"></i> {{ $pharmacy->full_address }}</p>
        </div>

        @if(!isset($book))
            <a href="/pharmacies/{{ $pharmacy->id }}/order{{ isset($atype) ? '?delivery_type=' . $atype : ''}}{{ isset($appointment) ? '&appointment_id=' . $appointment->id : ''}}" class="btn btn-primary"><i class="fe-shopping-cart mr-2"></i> Order Now</a>
        @endif

        
       
    </div>
</div>