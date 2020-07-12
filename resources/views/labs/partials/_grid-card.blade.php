<div class="card doctor-grid-card">
    <div class="card-body px-3">
        {{-- <img src="{{ $lab->avatar_url ?? '/images/avatar.png' }}" alt=""> --}}
        <p class="text-primary mb-0 mt-2">{{ $lab->category->name }}</p>
        <h5 class="mb-1">{{ $lab->name }} <i class="fe-check-circle text-success"></i></h5>
        <p class="text-secondary mb-1">{{ $lab->timings }}</p>
        <div class="rating">
            <star-rating :read-only="true" :rating="{{ $lab->avg_rating }}" :star-size="15" :round-start-rating="false"></star-rating>
        </div>
        <div class="mt-2">
            <p class="mb-2"><i class="fe-map-pin"></i> {{ $lab->city }}</p>
            <a href="/labs/{{ $lab->id }}" class="btn btn-primary btn-block">View Profile</a>
        </div>
    </div>
</div>