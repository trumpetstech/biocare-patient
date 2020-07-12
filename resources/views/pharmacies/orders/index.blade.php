@extends('layouts.dashboard')

@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/orders">Pharmacy Orders</a> </p>
    <h3 class="mb-0 font-weight-bold text-white">Pharmacy Orders</h3>
@endsection


@section('content')

        <div class="container-fluid">
            <h3 class="border-bottom pb-2">Pharmacy Orders</h3>

            <div class="card">
                <div class="card-body">
    
    
                    <form method="GET" action="/orders">
    
                        <div class="row">
                            <div class="col-xl-4 col-sm-4">
                                <div class="form-group">
                                    <label for="from_date">Form Date</label>
                                    <div>
                                        <input class="form-control datepicker" placeholder="Choose from date" name="from_date" id="from_date" value="{{ request('from_date') ?? '' }}" type="text" autocomplete="off"  >
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xl-4 col-sm-4">
                                <div class="form-group ">
                                    <label for="to_date">To Date</label>
                                    <div>
                                        <input class="form-control datepicker2" placeholder="Choose to date" name="to_date" id="to_date" value="{{ request('to_date') ?? '' }}" type="text" autocomplete="off" >
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xl-4 col-sm-4">
                                <div class="form-group mt-5 mt-sm-0">
    
                                    <button type="submit"  class="btn btn-primary btn-block mt-4">Search</button>
    
                                </div>
                            </div>
    
    
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->


            <div class="card mt-3">
                <div class="card-body">
                    {{-- <h4 class="header-title mt-0 mb-4">In Person Appointments</h4> --}}
        
                    <ul class="nav tabs nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="true">
        
                                <span class=" d-sm-block order-tab">Ongoing Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-delivered-tab" data-toggle="pill" href="#pills-delivered" role="tab" aria-controls="pills-delivered" aria-selected="true">
        
                                <span class=" d-sm-block order-tab">Completed Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-cancelled-tab" data-toggle="pill" href="#pills-cancelled" role="tab" aria-controls="pills-cancelled" aria-selected="true">
        
                                <span class="d-sm-block order-tab">Cancelled Orders</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content my-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">  
                    @forelse ($pendingOrders as $order)
                        @include('pharmacies.partials.order_card')
                    @empty
                        <div class="text-center text-secondary">
                            No Records Found
                        </div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="pills-delivered" role="tabpanel" aria-labelledby="pills-delivered-tab">  
                    @forelse ($deliveredOrders as $order)
                        @include('pharmacies.partials.order_card')
                    @empty 
                        <div class="text-center text-secondary">
                            No Records Found
                        </div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="pills-cancelled" role="tabpanel" aria-labelledby="pills-cancelled-tab">  
                    @forelse ($cancelledOrders as $order)
                        @include('pharmacies.partials.order_card')
                    @empty 
                        <div class="text-center text-secondary">
                            No Records Found
                        </div>
                    @endforelse
                </div>
            </div>    
       

    </div>

@endsection

@push('js')
    <script>
           $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
        });
        $('.datepicker2').datepicker({
            format: 'dd-mm-yyyy',
        });
    </script>    
@endpush