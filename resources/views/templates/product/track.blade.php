

@extends('layouts.app')
@section('content')



    <!-- site__body -->
    <div class="site__body">
        <div class="block-space block-space--layout--spaceship-ledge-height"></div>
        <div class="block order-success">
            <div class="container">
                @if ($count==1)
                <div class="order-success__body">
                    <div class="order-success__header">
                        <div class="order-success__icon">
                            <svg width="100" height="100"><path d="M50,100C22.4,100,0,77.6,0,50S22.4,0,50,0s50,22.4,50,50S77.6,100,50,100z M50,2C23.5,2,2,23.5,2,50
                                    s21.5,48,48,48s48-21.5,48-48S76.5,2,50,2z M44.2,71L22.3,49.1l1.4-1.4l21.2,21.2l34.4-34.4l1.4,1.4L45.6,71
                                    C45.2,71.4,44.6,71.4,44.2,71z"/>
                            </svg>
                        </div>
                        
                        <h1 class="order-success__title"> 
                            @if ($order->admin_status=='pending')
                                We receive your order and packing your product!
                            @elseif($order->admin_status=='on the way')
                                Product on the way...
                            @elseif($order->admin_status=='delivery complete')
                                Delivery Complete!  
                            @endif
                        </h1>
                       
                        <div class="order-success__actions"><a href="{{route('welcome')}}" class="btn btn-sm btn-secondary">Go To Homepage</a></div>
                    </div>
                    <div class="card order-success__meta">
                        <ul class="order-success__meta-list">
                            <li class="order-success__meta-item"><span class="order-success__meta-title">Transaction:</span> <span class="order-success__meta-value">{{$order->transaction_id}}</span></li>
                            <li class="order-success__meta-item"><span class="order-success__meta-title">Order Date:</span> <span class="order-success__meta-value">{{$order->order_date}}</span></li>
                            <li class="order-success__meta-item"><span class="order-success__meta-title">Order Time:</span> <span class="order-success__meta-value">{{$order->order_time}}</span></li>
                            <li class="order-success__meta-item"><span class="order-success__meta-title">Total:</span> <span class="order-success__meta-value">{{$order->pay_price}} tk</span></li>

                        </ul>
                    </div>

                </div>
                @else
                <div class="order-success__body">
                    <div class="order-success__header">

                        <h1 class="order-success__title"> 
                            Transaction id wrong!
                        </h1>
                       
                        <div class="order-success__actions"><a href="{{route('welcome')}}" class="btn btn-sm btn-secondary">Go To Homepage</a></div>
                    </div>
                   

                </div>
                @endif
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
    <!-- site__body / end -->



@endsection
