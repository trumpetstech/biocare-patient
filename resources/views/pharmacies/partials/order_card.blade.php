<div class="card mb-2">
    <div class="card-body">
        @if ($order->status == 0)
            <span class="badge badge-soft-warning  float-right">Waiting for Confirmation</span>
        @elseif ($order->status == 1)
            <span class="badge badge-soft-info  float-right">Order Confirmed</span>
        @elseif ($order->status == 2)
            @if(!$order->delivered)
                @if($order->delivery_type == 0)
                    <span class="badge badge-soft-info  float-right">Ready for Pickup</span>
                @else
                    <span class="badge badge-soft-info  float-right">Out for Delivery</span>
                @endif
            @else
                <span class="badge badge-soft-info  float-right">Order Delivered</span>
            @endif
        @elseif ($order->status == 2 && $order->delivery_type == 0)
            <span class="badge badge-soft-success  float-right">Delivered</span>
        @elseif ($order->status == 2 && $order->delivery_type == 1)   
            <span class="badge badge-soft-success  float-right">Pickedup</span> 
        @elseif ($order->status == -1)
            <span class="badge badge-soft-danger  float-right">Cancelled</span>
        @endif

        @if($order->status != -1)
            @if($order->paid)
                <span class="badge badge-success float-right mr-2">Paid</span>
            @else
                <span class="badge badge-warning float-right mr-2">Pending Payment</span>
            @endif
        @endif

        <p class="text-primary mb-0 mt-2">{{ $order->delivery_type ? 'Home Delivery' : 'Collect From Store' }}</p>
        <h5><a href="#" class="text-dark">{{ $order->pharmacy->name }}</a></h5>

        <p class="text-muted mb-4">{{ $order->pharmacy->full_address }}</p>
        <p class="text-muted mb-4"><strong>Your Address: </strong>{{ $order->address }}</p>

        <a href="/orders/{{ $order->id }}" class="btn btn-primary btn-sm">Order Details</a>

        @if($order->status == 1 && !$order->paid)
            <a href="/orders/{{ $order->id }}/pay" class="btn btn-success btn-sm ml-2">Make Payment</a>
        @endif

    </div>
    <div class="card-body border-top">
        <div class="row align-items-center">
            <div class="col-sm-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item pr-2">
                        <a href="#" class="text-muted d-inline-block">
                            <i class="fe-hash mr-1"></i> Order Id : {{ $order->id }}</a>
                    </li>

                    <li class="list-inline-item pr-2">
                        <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Order date">
                            <i class="fe-calendar mr-1"></i>{{ $order->created_at->format('d-m-Y') }}</a>
                    </li>
                    <!-- <li cZ -->
                   

                    <li class="list-inline-item pr-2">
                        <a href="tel:{{ $order->pharmacy->phone }}" class="text-muted d-inline-block">
                            <i class="fe-phone mr-1"></i> Pharmacy Contact : {{ $order->pharmacy->phone }} </a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</div>