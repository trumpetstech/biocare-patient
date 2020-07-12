@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    
       <h4 class="mb-1 mt-0">Consulting Payments</h4>
       
        <div class="card mt-3">
            <div class="card-body">
    
                <ul class="nav tabs nav-pills navtab-bg nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" href="/payments/consulting">
    
                            <span class="d-none d-sm-block">Consulting Payments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/payments/pharmacy">
    
                            <span class="d-none d-sm-block">Pharmacy Payments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/payments/lab">
    
                            <span class="d-none d-sm-block">Lab Payments</span>
                        </a>
                    </li>
    
                </ul>
            </div>
        </div>

    </div>


            <div class="card mt-3">
                <div class="card-body">

                    <form method="GET">
                        <div class="row">
                            <div class="col-xl-5 col-sm-4">
                                <div class="form-group">
                                    <label for="example-date">Form Date</label>
                                    <div>
                                        <input class="form-control" id="example-date" type="date" name="from_date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-4">
                                <div class="form-group ">
                                    <label>To Date</label>
                                    <div>
                                        <input class="form-control" id="example-date" type="date" name="to_date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-4">
                                <div class="form-group mt-5 mt-sm-0">

                                    <button type="submit" class="btn btn-primary btn-block mt-4">Apply Filters</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
       
            <div class="card mt-3">
                <div class="card-body">

                    @if (!empty($payments))

                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Txn Date</th>
                                        <th>Order Id</th>
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @foreach ($payments as $index => $payment)
                                        <tr>
                                            <td>{{  $index + 1 }}</td>
                                            <td>{{ $payment->created_at->format('d-m-Y') }}</td>
                                            <td><a href="/appointments/{{  $payment->doctor_appointment_id }}">{{  $payment->doctor_appointment_id }}</a></td>
                                            <td>₹ {{  $payment->amount }}</td>
                                            @if ($payment->status == 0)
                                                <td><span class="badge badge-soft-warning py-1">Pending</span></td>
                                            @elseif ($payment->status == 1)
                                                <td><span class="badge badge-soft-info py-1">Ready</span></td>
                                            @elseif ($payment->status == 2)
                                                <td><span class="badge badge-soft-success py-1">Completed</span></td>
                                            @elseif ($payment->status == -1)
                                                <td><span class="badge badge-soft-danger py-1">Cancelled</span></td>
                                            @endif
                                        </tr> 
                                        @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="row" style="place-content: center;">
                            <p class="mt-3 text-center">No Records found</p>
                        </div>

                    @endif
                </div>
          

  


    <!-- end row -->


    <!-- end row -->

</div>

@endsection