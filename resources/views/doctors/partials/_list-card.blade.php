<div class="card mb-3 doctor-list-card">
    <div class="card-body d-flex align-items-center px-3">
        <img src="{{ $doctor->avatar_url ?? '/images/avatar.png' }}" alt="">
        <div class="ml-3" style="flex: 1;">
            <p class="text-primary mb-0 mt-2">{{ $doctor->category->name }}</p>
            <h5 class="mb-1">Dr. {{ $doctor->name }} <i class="fe-check-circle text-success"></i></h5>
            <p class="text-secondary mb-1">{{ $doctor->degree }}</p>
            <div class="rating">
                <star-rating :read-only="true" :rating="{{ $doctor->avg_rating }}" :star-size="15" :round-start-rating="false"></star-rating>
            </div>
            <p class="mt-2 mb-2"><i class="fe-map-pin"></i> {{ $doctor->city }}</p>
        </div>
      
       
    </div>
</div>