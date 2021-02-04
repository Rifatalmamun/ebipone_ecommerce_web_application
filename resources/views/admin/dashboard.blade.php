
@php

# recent valid order transaction 

$order_transaction = DB::table('orders')
                    ->join('users','users.id','orders.who_orders')
                    ->select('orders.*','users.name','users.email','users.phone')
                    ->where('orders.status','complete')->where('orders.reason','order_product')
                    ->orderBy('id','DESC')->limit(10)
                    ->get();

$upload_transaction = DB::table('orders')
                    ->join('users','users.id','orders.who_orders')
                    ->select('orders.*','users.name','users.email','users.phone')
                    ->where('orders.status','complete')->where('orders.reason','money_upload')
                    ->orderBy('id','DESC')->limit(7)
                    ->get(); 


$count_customer = DB::table('users')->where('email_verified_at','!=',null)->count();
$count_shop = DB::table('users')->where('isVendor',1)->count();
$count_active_product = DB::table('products')->where('status','active')->count();
$count_pending_product = DB::table('products')->where('status','pending')->count(); 

//$sales = DB::table('orders')->where('status','complete')->sum('pay_price'); 
//$sales = DB::table('orders')->where('status','complete')->where('reason','order_product')->sum('pay_price'); 


// Count Order by Segment

$count_new_order = DB::table('order_childs')->where('isShopSend','0')->where('isWarehouseReceived','0')->where('isWarehouseSend','0')->where('isCustomerReceived','0')->where('status','0')->count();

$count_shop_send = DB::table('order_childs')->where('isShopSend','1')->where('isWarehouseReceived','0')->where('isWarehouseSend','0')->where('isCustomerReceived','0')->where('status','0')->count();

$count_shop_delivery_pending = DB::table('order_childs')->where('isShopSend','1')->where('isWarehouseReceived','0')->where('isWarehouseSend','0')->where('isCustomerReceived','0')->where('status','0')->count();

$count_pickup_point_received = DB::table('order_childs')->where('isShopSend','1')->where('isWarehouseReceived','1')->where('isWarehouseSend','0')->where('isCustomerReceived','0')->where('status','0')->count();

$count_pickup_point_send = DB::table('order_childs')->where('isShopSend','1')->where('isWarehouseReceived','1')->where('isWarehouseSend','1')->where('isCustomerReceived','0')->where('status','0')->count();

$count_pickup_point_delivery_pending = DB::table('order_childs')->where('isShopSend','1')->where('isWarehouseReceived','1')->where('isWarehouseSend','1')->where('isCustomerReceived','0')->where('status','0')->count();

$count_customer_received = DB::table('order_childs')->where('isShopSend','1')->where('isWarehouseReceived','1')->where('isWarehouseSend','1')->where('isCustomerReceived','1')->where('status','1')->count();

$count_full_complete_order = DB::table('orders')->where('finalStatus','completed')->count();
$partialy_complete_order = DB::table('orders')->where('finalStatus','partially_completed')->count();


/*Calculation part*/
$day = date("d");
$month = date("M");
$year = date("Y");

$order_date = $day.'-'.$month.'-'.$year; 

#Today report

$today_upload_money = DB::table('orders')->where('reason','money_upload')->where('status','complete')->where('order_date',$order_date)->sum('pay_price');
$today_order_count = DB::table('orders')->where('reason','order_product')->where('status','complete')->where('order_date',$order_date)->count();
$today_ssl_pay = DB::table('orders')->where('reason','order_product')->where('status','complete')->where('order_date',$order_date)->where('pay_method','ssl')->sum('pay_price');
$today_signup_customer = 0;

$cus = DB::table('users')->get();
$today = $year.'-'.date("m").'-'.$day; 

foreach($cus as $c){
    
    $created_at = explode(' ',$c->created_at);
    $created_at = $created_at[0];

    if($created_at==$today){
        $today_signup_customer+=1;
    }
}

#Monthly report

$monthly_upload_money = DB::table('orders')->where('reason','money_upload')->where('status','complete')->where('month',$month)->sum('pay_price');
$monthly_order_count = DB::table('orders')->where('reason','order_product')->where('status','complete')->where('month',$month)->count();
$monthly_ssl_pay = DB::table('orders')->where('reason','order_product')->where('status','complete')->where('month',$month)->where('pay_method','ssl')->sum('pay_price');
$monthly_signup_customer = 0;

foreach($cus as $c){
    
    $created_at = explode(' ',$c->created_at);
    $created_at = $created_at[0];

    $creat = explode('-',$created_at);
    $created_at = $creat[1];

    if($created_at==date('m')){
        $monthly_signup_customer+=1;
    }
}

# overall report

$upload_money = DB::table('orders')->where('reason','money_upload')->where('status','complete')->sum('pay_price');
$order_count = DB::table('orders')->where('reason','order_product')->where('status','complete')->count();
$ssl_pay = DB::table('orders')->where('reason','order_product')->where('status','complete')->where('pay_method','ssl')->sum('pay_price');





@endphp

@extends('admin.master')
@section('content')

<main>
<div class="container-fluid site-width">
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">eBipone Admin</h4> </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
       




      <div class="col-12 col-sm-6 col-xl-3 mt-0">
        <div class="card">
            <div class="card-body">
                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                    <i class="fas fa-users icons card-liner-icon mt-2" style="color: #39578b;"></i>
                    <div class='card-liner-content'>
                        <h2 class="card-liner-title">{{$count_customer}}</h2>
                        <h6 class="card-liner-subtitle"><a href="{{route('admin.index.customer')}}">Customer</a></h6>                                       
                    </div>                                
                </div>
                <div id="apex_today_order"></div>                               
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3 mt-0">
        <div class="card">
            <div class="card-body">
                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>

                    <i class="fas fa-store-alt icons card-liner-icon mt-2" style="color: #39578b;"></i>
                    <div class='card-liner-content'>
                        <h2 class="card-liner-title">{{$count_shop}}</h2>
                        <h6 class="card-liner-subtitle"><a href="{{route('admin.index.shop')}}">Shop</a></h6> 
                    </div>                                
                </div>
                {{-- <span class="bg-primary card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span> --}}
                <div id="apex_today_visitors"></div> 
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3 mt-0">
        <div class="card">
            <div class="card-body">
                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                    <i class="fas fa-box icons card-liner-icon mt-2" style="color: #39578b;"></i>
                  
                    <div class='card-liner-content'>
                        <h2 class="card-liner-title">{{$count_active_product}}</h2>
                        <h6 class="card-liner-subtitle"><a href="{{route('admin.all.products')}}" >Products</a></h6> 
                    </div>                                
                </div>
                <div id="apex_today_sale"></div> 
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3 mt-0">
        <div class="card">
            <div class="card-body">
                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
               
                  <i class="fas fa-hourglass-start icons card-liner-icon mt-2" style="color: #39578b;"></i>
                    <div class='card-liner-content'>
                        <h2 class="card-liner-title">{{$count_pending_product}}</h2>
                        <h6 class="card-liner-subtitle"><a href="{{route('admin.pending.products')}}">Pending Products</a></h6> 
                    </div>                                
                </div>
                <div id="apex_today_profit"></div>
            </div>
        </div>
    </div>

</div>

    <div class="row mt-3">
        <div class="col">
            <h6 class="font-weight-bold" style="font-size: 15px;">Order Processing Step</h6>
        </div>
    </div>

    <div class="row">

    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">1. List of New Order Product Items</p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_new_order}}</p> 

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.new.order')}}"><span class="badge outline-badge-danger">Details</span> </a>
                                                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-cart-plus" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">2. Vendor Send to Pickup Point </p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_shop_send}}</p> 

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.shop.send.to.pickup.point.order')}}"><span class="badge outline-badge-warning">Details</span> </a> 
                                                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-shipping-fast" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">3. Vendor Delivery Pending Product List</p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_shop_delivery_pending}}</p> 

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.shop.send.to.pickup.point.order')}}"><span class="badge outline-badge-info">Details</span> </a> 
                                                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-hourglass-half" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">4. Pickup Point Received Product List</p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_pickup_point_received}}</p> 

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.pickup.point.received.order')}}"><span class="badge outline-badge-primary">Details</span> </a> 
                                                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-truck-loading" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">5. Picktup Point Send to Customer</p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_pickup_point_send}}</p> 

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.pickup.point.send.to.customer.order')}}"><span class="badge outline-badge-info">Details</span> </a> 
                                                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-share" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">6. Customer Delivery Pending || Shipping Time</p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_pickup_point_delivery_pending}}</p> 

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.customer.delivery.pending.order')}}"><span class="badge outline-badge-warning">Details</span> </a> 
                                                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-hourglass-half" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">7. Customer Received Product List </p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_customer_received}}</p>  

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.customer.received.order')}}"><span class="badge outline-badge-success">Details</span> </a> 
                                                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-handshake" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12  col-md-6 col-lg-3 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body p-4">
                    <p class="mb-3 font-w-600">8. List of Fully Complete Order Package.</p>
                    <p class="font-w-500 tx-s-12 font-weight-bold">{{$count_full_complete_order}} </p>   

                    <div class="d-flex">
                        <div class="my-auto line-h-1">
                            <a href="{{route('admin.view.full.complete.order.package')}}"><span class="badge outline-badge-success">Details</span> </a> 
                              
                        </div>
                        <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-handshake" style="font-size: 23px;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--4 graph box section--> 

    <div class="col-12 col-md-6 col-lg-4 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body"> 
                    <div class="d-flex"> 
                        <div class="media-body align-self-center ">
                            <span class="mb-0 h5 font-w-600">Today's Report</span><br>
                            <p class="mb-0 font-w-500 tx-s-12">{{date('d-M-Y')}}</p>                                                    
                        </div>
                        <div class="ml-auto border-0 outline-badge-info circle-50"><span class="h6 mb-0">৳</span></div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="border-0 outline-badge-info w-50 p-3 rounded text-center"><span class="h6 mb-0">Upload</span><br/>                                        
                            ৳ {{$today_upload_money}}
                        </div>
                        <div class="border-0 outline-badge-info w-50 p-3 rounded ml-2 text-center"><span class="h6 mb-0"> 
                             Order
                        </span><br/>                                        
                            {{$today_order_count}}
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="border-0 outline-badge-dark w-50 p-3 rounded text-center"><span class="h6 mb-0">SSL pay</span><br/>                                        
                            ৳ {{$today_ssl_pay}}
                        </div>
                        <div class="border-0 outline-badge-danger w-50 p-3 rounded ml-2 text-center"><span class="h6 mb-0">Customer</span><br/>                                        
                        {{$today_signup_customer}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 mt-3">
        <div class="card">                            
            <div class="card-content">
                <div class="card-body"> 
                    <div class="d-flex"> 
                        <div class="media-body align-self-center ">
                            <span class="mb-0 h5 font-w-600">Monthly Report</span><br>
                            <p class="mb-0 font-w-500 tx-s-12">{{date('M-Y')}}</p>                                                    
                        </div>
                        <div class="ml-auto border-0 outline-badge-info circle-50"><span class="h5 mb-0">৳</span></div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="border-0 outline-badge-info w-50 p-3 rounded text-center"><span class="h6 mb-0">Upload</span><br/>                                        
                            ৳ {{$monthly_upload_money}}
                        </div>
                        <div class="border-0 outline-badge-info w-50 p-3 rounded ml-2 text-center"><span class="h6 mb-0"> 
                             Order
                        </span><br/>                                        
                            {{$monthly_order_count}} 
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="border-0 outline-badge-dark w-50 p-3 rounded text-center"><span class="h6 mb-0">SSL pay</span><br/>                                        
                            ৳ {{$monthly_ssl_pay}} 
                        </div>
                        <div class="border-0 outline-badge-danger w-50 p-3 rounded ml-2 text-center"><span class="h6 mb-0">Customer</span><br/>                                        
                            {{$monthly_signup_customer}} 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

        <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body"> 
                        <div class="d-flex"> 
                            <div class="media-body align-self-center ">
                                <span class="mb-0 h5 font-w-600">eBipone Reports</span><br>
                                <p class="mb-0 font-w-500 tx-s-12">Magura, Bangladesh</p>                                                    
                            </div>
                            <div class="ml-auto border-0 outline-badge-success circle-50"><span class="h6 mb-0">৳</span></div>
                        </div>
                        <div class="d-flex mt-4">
                            <div class="border-0 outline-badge-info w-50 p-3 rounded text-center"><span class="h6 mb-0">Upload</span><br/>                                        
                                ৳ {{$upload_money}}
                            </div>
                            <div class="border-0 outline-badge-success w-50 p-3 rounded ml-2 text-center"><span class="h6 mb-0"> 
                                Order
                              </span><br/>                                        
                                {{$order_count}} 
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="border-0 outline-badge-dark w-50 p-3 rounded text-center"><span class="h6 mb-0">SSL pay</span><br/>                                        
                                ৳ {{$ssl_pay}}
                            </div>
                            <div class="border-0 outline-badge-danger w-50 p-3 rounded ml-2 text-center"><span class="h6 mb-0">Customer</span><br/>                                        
                                {{$count_customer}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body">  
                        <div class="height-235">
                            <canvas id="chartjs-other-pie"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}


        <div class="col-md-6 col-lg-4 mt-3">
            <div class="card overflow-hidden">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Recent Money Upload</h6>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <ul class="list-group list-unstyled">



                            @foreach ($upload_transaction as $item)

                                <li class="p-2 border-bottom zoom">
                                    <a href="{{URL::to('admin/view-money-upload-details-'.$item->id)}}">

                                        <div class="media d-flex w-100">
                                            <div class="transaction-date text-center rounded bg-primary text-white p-2">
                                                <small class="d-block"></small><span class="h6"><i class="fas fa-upload"></i></span>
                                            </div>
    
                                            <div class="media-body align-self-center pl-4">
                                                <span class="mb-0 font-w-600">{{$item->name!=null? $item->name: 'Customer'}}</span><br>
                                                <p class="mb-0 font-w-500 tx-s-12">{{$item->phone}}</p>
                                            </div>
                                            <div class="ml-auto my-auto font-weight-bold text-right text-success">
                                                +{{$item->pay_price}}<br/>
                                                <small class="d-block text-dark"> {{$item->order_date}} </small>
                                            </div>
                                        </div>

                                    </a>
                                </li>

                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 mt-3">
            <div class="card">
                
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Recent Order Payment</h6>
                </div>

                <div class="card-content">
                    <div class="card-body p-0 table-responsive">
                        <table class="table">

                            <tbody id="transactionHistoryTrns">
                                
                                <tr>
                                    <td><strong>Date</strong></td>
                                    <td><strong>Transaction ID</strong></td>
                                    <td><strong>Amount</strong></td>
                                    <td><strong>Method</strong></td>
                                    <td><strong>Customer</strong></td>
                                    <td><strong>Phone</strong></td>
                                    <td><strong>Details</strong></td>
                                </tr>
                                @foreach ($order_transaction as $item)

                                
                                    <tr class="zoom">
                                                                                                         
                                        

                                            <td>{{$item->order_date}}</td>
                                            <td>{{$item->transaction_id}}</td>
                                            <td>৳ {{$item->pay_price}}</td>
                                            <td>{{$item->pay_method=='sss'? 'SSL':'ebp_balance'}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone}}</td> 
                                            <td>
                                                <a href="{{URL::to('admin/order-details-'.$item->id)}}" class="font-weight-bold">Details</a>      
                                            </td> 
    
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



{{-- <div class="col-12 col-md-6 col-lg-4 mt-3 ">
<div class="card">                      
    <div class="card-content">
        <div class="card-body">
            <div id="world-map-gdp" class="w-100 " style="height:180px;"></div>
            <div class="table-responsive">
                <table class="table table-borderless pick-table mb-0">
                    <thead>
                        <tr>
                            <th>States</th>
                            <th  class="text-right">Orders</th>
                            <th  class="text-right">Earnings</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>California</td>
                            <td class="text-right">5,201</td>
                            <td class="text-right">$80,200.70</td>
                        </tr>
                        <tr>
                            <td>Texas</td>
                            <td class="text-right">9,950</td>
                            <td class="text-right">$78,410.30</td>
                        </tr>
                        <tr>
                            <td>Wyoming</td>
                            <td class="text-right">6,158</td>
                            <td class="text-right">$162,050.20</td>
                        </tr>
                        <tr>
                            <td>Florida</td>
                            <td class="text-right">7,875</td>
                            <td class="text-right">$187,792.10</td>
                        </tr>
                        <tr>
                            <td>New York</td>
                            <td class="text-right">12,560</td>
                            <td class="text-right">$13,087.90</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> --}}

{{-- <div class="col-12 col-md-6 col-lg-8 mt-3">
<div class="card">
    <div class="card-header  justify-content-between align-items-center">                               
        <h6 class="card-title">Recent Order</h6> 
    </div>
    <div class="card-body table-responsive p-0">                         

        <table class="table  mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Purchased</th>
                    <th>Client Name</th>
                    <th>Amount</th>
                    <th>Shipment</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

              @php
                  
                  $orders = DB::table('orders')->where('orders.status','complete')
                          ->join('users','users.id','orders.who_orders')
                          ->select('orders.*','users.name')->limit(15)
                          ->get(); 

              @endphp

              @foreach ($orders as $item)
              <tr>
                  <td>000{{$item->id}}</td>
                  <td>{{$item->order_date}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->pay_price}}</td>
                  <td>{{$item->delivery_date}}</td>
                   
                  <td><span class="badge outline-badge-dark">{{$item->admin_status}}</span></td> 

              </tr>
              @endforeach

                 
                

                
            </tbody>
        </table>
    </div>
</div>


</div>  --}}


        
    </div>
    <!-- END: Card DATA-->                 
</div>
</main>



@endsection
