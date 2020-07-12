<div class="card doctor-grid-card">
    <div class="card-body px-3">
        <img src="{{ $doctor->avatar_url ?? '/images/avatar.png' }}" alt="">
        <p class="text-primary mb-0 mt-2">{{ $doctor->category->name }}</p>
        <h5 class="mb-1">Dr. {{ $doctor->name }} <i class="fe-check-circle text-success"></i></h5>
        <p class="text-secondary mb-1">{{ $doctor->degree }}</p>
        <div class="rating">
            <star-rating :read-only="true" :rating="{{ $doctor->avg_rating }}" :star-size="15" :round-start-rating="false"></star-rating>
        </div>
        <div class="mt-2">
            <p class="mb-2"><i class="fe-map-pin"></i> {{ $doctor->city }}</p>
            <a href="/doctors/{{ $doctor->id }}{{ isset($atype) ? '?appointment_type=' . $atype : ''}}" class="btn btn-primary btn-block">View Profile</a>
        </div>
    </div>
</div>