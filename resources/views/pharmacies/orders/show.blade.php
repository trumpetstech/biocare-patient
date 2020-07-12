@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">

       
            <div class="card mb-3 d-print-none">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="font-weight-bold mb-0">Order #{{ $order->id }}</h4>
                        <p class="text-primary mb-0 mt-2">{{ $order->delivery_type ? 'Home Delivery' : 'Collect From Store' }}</p>
                        @if ($order->status == 0)
                        <span class="badge badge-soft-warning">Waiting for Confirmation</span>
                    @elseif ($order->status == 1)
                        <span class="badge badge-soft-info">Order Confirmed</span>
                    @elseif ($order->status == 2)
                        @if(!$order->delivered)
                            @if($order->delivery_type == 0)
                                <span class="badge badge-soft-info">Ready for Pickup</span>
                            @else
                                <span class="badge badge-soft-info">Out for Delivery</span>
                            @endif
                        @else
                            <span class="badge badge-soft-info">Order Delivered</span>
                        @endif
                    @elseif ($order->status == 2 && $order->delivery_type == 0)
                        <span class="badge badge-soft-success ">Delivered</span>
                    @elseif ($order->status == 2 && $order->delivery_type == 1)   
                        <span class="badge badge-soft-success">Pickedup</span> 
                    @elseif ($order->status == -1)
                        <span class="badge badge-soft-danger">Cancelled</span>
                    @endif
                    </div>   
                    
                    <div class="d-flex align-items-center">
                    @if($order->paid)
                    <span style="font-size: 17px;" class="badge badge-success p-2"><i class="fe-check mr-2"></i> Paid</span>
                    @elseif($order->status == 1)
                        <a href="/orders/{{$order->id}}/pay" class="btn btn-success"><i class="fe-credit-card mr-2"></i>  Pay Online</a>
                    @endif
                    @if(!$order->feedback && $order->status == 2 && $order->delivered)    
                        <a href="#pharmacyFeedback" data-toggle="modal" class="btn btn-primary ml-2"><i class="fe-star mr-2"></i>  Give Feedback</a>
                    @endif    
                    @if ($order->status != -1 && $order->status != 2 && !$order->paid)
                        <div class="d-print-none ml-2">
                            <a href="/orders/{{ $order->id }}/cancel"><button type="button" class="btn btn-danger"><i class="fe-x mr-2"></i> Cancel Order</button></a>
                        </div>
                    @endif
                    </div>
                        
                </div>
            </div>
   
        
        @if(!$order->feedback)  
            @include('modals.pharmacy-feedback', ['pharmacy' => $order->pharmacy])
        @endif
        @include('pharmacies.partials._list-card', ['pharmacy' => $order->pharmacy, 'book' => false])
    
        @if($order->status == 2)

        @if($order->feedback)

        <div class="card mb-3">
            <div class="card-body">
                <div class="media">
                    <!-- <div class="mr-3">
                    <img src="assets/images/users/avatar-2.jpg" alt=""
                        class="avatar-md rounded-circle">
                </div> -->
                    <div class="media-body overflow-hidden">
                        <h6 class="mt-2 mb-1">Your Feedback</a></h6>
                        <star-rating :read-only="true" :rating="{{ $order->feedback->rating }}" :star-size="15" :round-start-rating="false"></star-rating>
                        <p class="text-muted font-size-13 text-truncate mb-0">
                            {{$order->feedback->body}}</p>
                    </div>
                </div>
            </div>
        </div>

        @endif
        @endif

        @include('pharmacies.partials._invoice')
    </div>
 
@endsection    