<div class="card">
    <div class="card-body p-0">


        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Reported at</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Oxygen Saturation</th>
                        <th scope="col">Pulse Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($covid->vitals()->latest()->get() as $index => $vital) 
                        <tr>
                            <td> {{ $index + 1 }}</td>
                            <td> {{ $vital->created_at }}</td>
                            <td  class="{{ $vital->temperature >= 100 ? 'text-danger' : 'text-success' }} font-weight-bold"> {{ $vital->temperature }} &deg; C</td>
                            <td class="{{ $vital->oxygen <= 94 ? 'text-danger' : 'text-success' }} font-weight-bold"> {{ $vital->oxygen }}</td>
                            <td class="{{ $vital->pulse_rate >= 100 ||  $vital->pulse_rate <= 60 ? 'text-danger' : 'text-success' }} font-weight-bold"> {{ $vital->pulse_rate }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Records Found</td>
                        </tr>    
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>