<h4 class="font-weight-bold mb-3">Choose group of doctors</h4>
<div class="row">
    @foreach ($groups as $group)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <img style="width: 60px;height: 60px;" src="{{ $group->avatar_url }}" alt="">
                        <div style="flex: 1;">   
                            <h4 class="my-0">{{ $group->name }}</h4>
                            <p class="mb-0 text-muted"><i class="fe-map-pin mr-2"></i>{{ $group->city }}</p>
                        </div> 
                    </div>
                    <p class="text-secondary mb-2">{{ $group->bio }}</p>
                    <form method="POST" action="/covid">
                        @csrf
                        <input type="hidden" name="group_id" value="{{ $group->id}}">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fe-check mr-2"></i> Choose Group</a>
                    </form>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>