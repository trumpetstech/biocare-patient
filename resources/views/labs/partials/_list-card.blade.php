<div class="card mb-2 doctor-list-card">
    <div class="card-body d-flex align-items-center px-3">
        {{-- <img src="{{ $doctor->avatar_url ?? '/images/avatar.png' }}" alt=""> --}}
        <div class="" style="flex: 1;">
            <p class="text-primary mb-0 mt-2">{{ $lab->category->name }}</p>
            <h5 class="mb-1">{{ $lab->name }} <i class="fe-check-circle text-success"></i></h5>
            <p class="text-secondary mb-1"><i class="fe-clock mr-2"></i> {{ $lab->from_time }} - {{ $lab->to_time }}</p>
            <div class="rating">
                <star-rating :read-only="true" :rating="{{ $lab->avg_rating }}" :star-size="15" :round-start-rating="false"></star-rating>
            </div>
            <p class="mt-2 mb-2"><i class="fe-map-pin"></i> {{ $lab->full_address }}</p>
        </div>

        @if(!isset($book))
            <a href="/labs/{{ $lab->id }}/book" class="btn btn-primary"><i class="fe-calendar mr-2"></i> Book Appointment</a>
        @endif


       
    </div>
</div>