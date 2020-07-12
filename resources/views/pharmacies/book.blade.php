@extends('layouts.app')

@section('content')

    <div class="bg-light py-5">
        <div class="container">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h3 class="font-weight-bold mb-0">Order Medicines</h3>
                <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fe-arrow-left mr-2"></i> Change Lab</a>
            </div>
            
            @include('pharmacies.partials._list-card' , ['book' => false])

            <form method="POST" action="/pharmacies/{{$pharmacy->id}}/orders" enctype="multipart/form-data">
                @csrf
                
                @if($appointment)

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Medicine</th>
                                        <th style="width: 10%">Qty</th>
                                        <th>Instructions</th>
                                        <th>Timings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($appointment->prescription_items, true) as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }} </td>
                                            <td>
                                                <h5 class="font-size-16 mt-0 mb-2">{{ $item['medicine'] }} </h5>
                                            </td>
                                            <td>{{ $item['qty'] }}</td>
                                            <td>{{ $item['instructions'] }} food</td>
                                            <td>{{ $item['timings'] }}</td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div>
                </div>

                @else
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-xl-12 col-sm-12">
                                    <div class="form-group ">
                                        <label>Upload Prescription</label>
                                        <div>
                                            <input class="form-control" id="prescription" type="file" name="prescription" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="example-date">Address</label>
                                        <div>
                                        <input class="form-control" type="text" value="{{ patient()->full_address }}" name="address" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->

                    <div class="card mt-2">
                        <div class="card-body">
                            <input type="hidden" name="delivery_type" value="{{ request('delivery_type') }}">
                            <button class="btn btn-primary btn-block"><i class="fe-shopping-bag mr-2"></i> Place Order</button>
                        </div>
                    </div>
                @endif
            </form>
               
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
           $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
        });
    </script>    
@endpush