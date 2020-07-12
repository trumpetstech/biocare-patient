<h4 class="font-weight-bold mb-3">Choose your package</h4>
<div class="row">
    @foreach ($covid->group->packages as $package)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                       <div style="flex: 1;">   
                            <h4 class="my-0">{{ $package->name }}</h4>
                            <p class="mb-0 text-secondary"><i class="fe-calendar mr-2"></i>{{ $package->no_of_days }} Days</p>
                        </div> 
                    </div>
                    <p class="badge badge-danger my-2 p-2">₹ {{ $package->amount }}</p>
                    <form method="POST" action="/covid">
                        @csrf
                        <input type="hidden" name="covid_package_id" value="{{ $package->id}}">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fe-check mr-2"></i> Choose Package</a>
                    </form>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>