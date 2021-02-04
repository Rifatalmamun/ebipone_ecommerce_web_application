
@php


$search_data = DB::table('orders')->where('status','complete')->where('reason','order_product')->get();  



$pickupPoint = DB::table('warehouses')->where('w_status','active')->get();

$parent_order = DB::table('orders')->where('finalStatus','pending')->get();

$shop_new_order = DB::table('order_childs')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.phone','users.shop_name','products.un_id','products.product_name','products.image_one','orders.finalStatus','orders.admin_status','orders.order_date','orders.order_time','orders.s_district','orders.s_area','orders.transaction_id')
                ->where('order_childs.shop_id',Auth::user()->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','0')
                ->where('order_childs.isWarehouseReceived','0') 
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.status','0')->get();

$shop_new_order_count = DB::table('order_childs')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->where('order_childs.shop_id',Auth::user()->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','0')
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.status','0')->count();

$shop_to_pickup_point_pending_order = DB::table('order_childs')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('warehouses','warehouses.id','order_childs.warehouse_id')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.phone','products.un_id','products.product_name','products.image_one','orders.finalStatus','orders.admin_status','orders.transaction_id','orders.order_date','orders.order_time','orders.s_district','orders.s_area','warehouses.w_district','warehouses.w_name')
                ->where('order_childs.shop_id',Auth::user()->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.status','0')->get(); 


               
$shop_to_pickup_point_pending_order_count = DB::table('order_childs')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('warehouses','warehouses.id','order_childs.warehouse_id')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->where('order_childs.shop_id',Auth::user()->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.status','0')->count();  

$pickup_point_received_order = DB::table('order_childs')
                ->join('warehouses','warehouses.id','order_childs.warehouse_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.phone','products.un_id','products.product_name','products.buying_price','products.image_one','orders.finalStatus','orders.admin_status','orders.transaction_id','orders.order_date','orders.order_time','orders.s_district','orders.s_area','warehouses.w_name','warehouses.w_district')
                ->where('order_childs.shop_id',Auth::user()->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')->get();

$pickup_point_received_order_count = DB::table('order_childs')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','products.un_id','products.product_name','products.buying_price','products.image_one','orders.finalStatus','orders.admin_status','orders.order_date','orders.s_district','orders.s_area')
                ->where('order_childs.shop_id',Auth::user()->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')->count();


@endphp

@extends('layouts.app')
@section('content')

<div class="site__body">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">


            <div class="row ">
                <div class="col-12 col-lg-12 mt-1 mt-lg-0">
                    <div class="dashboard">
                                            <!-- START : CSS TABS CONTENT-->

                          <div class="w3-bar mt-3" style="background: #F0F0F0">

                            <button style="width: 25%; " id="ln" class="w3-bar-item w3-button" onclick="openCity('London')">New Order ({{$shop_new_order_count}})</button>

                            <button style="width: 25%; " id="pr" class="w3-bar-item w3-button" onclick="openCity('Paris')">Pickup Point Pending ({{$shop_to_pickup_point_pending_order_count}})</button>

                            <button style="width: 25%; background: #CCCCCC;" id="tk" class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Received By Pickup Point ({{$pickup_point_received_order_count}})</button>

                            <a style="width: 25%;" href="{{route('shop')}}"  class="w3-bar-item w3-button">Back to My Shop</a>

                          </div>
                          
                          <div id="London" class="w3-container city" style="display:none; padding: 0 0; width: 100%;">
                           
                            @if ($shop_new_order_count>0)
                            <p class="mt-4 text-danger " style="text-align: center"> নিম্নোক্ত প্রোডাক্ট গুলো আপনার শপ এ অর্ডার হয়েছে। আপনি দ্রুত  প্রোডাক্ট গুলো প্যাকেজিং করে পিকআপ-পয়েন্টে পাঠিয়ে দিন।</p>
                                
                            <div class="dashboard__orders card ">
                                
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table id="new_order_table_id" class="table-responsive" style="width:100%;">
                                            <thead style="background: #ebf1f5; color: rgb(0, 0, 0);">
                                                <tr>
                                                    
                                                    <th style="width: 15%; font-size: 12px;">Order Date</th>
                            
                                                    <th style="width: 15%; font-size: 12px;">Product</th>
                                                    <th style="width: 15%; font-size: 12px;">C.Phone</th>
                                                    <th style="width: 15%; font-size: 12px;">Tnx.ID</th>

                                                    <th style="width: 5%; font-size:  12px;">Qty</th>
                                                    
                                                    <th style="width: 5%; font-size:  12px;">Invoice</th>
                                                    <th style="width: 30%; font-size: 12px; text-align:center;">Select Pickup Point</th>
                                                    <th style="width: 30%; font-size: 12px;">Send</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:rgb(41, 39, 39);">
                                                
                                                @foreach ($shop_new_order as $item)
                                                <tr>
                                                    
                                                    <td >{{$item->order_date}} <br> {{$item->order_time}}</td>
                                                    <td><a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}"  target="_blank" style="text-decoration: none;">{{$item->product_name}}</a></td>

                                                    <td>{{$item->phone}}</td>
                                                    <td>{{$item->transaction_id}}</td> 

                                                    
                                                    <td>
                                                        @if ($item->qty<10)
                                                            <span class="font-weight-bold text-danger" style="display: block;text-align: center;">0{{$item->qty}}</span>
                                                        @else
                                                            <span class="font-weight-bold text-danger" style="display: block;text-align: center;"> {{$item->qty}} </span>
                                                        @endif
                                                    </td>
                                                    
                                                        <td><a href="{{URL::to('order-invoice-'.$item->id)}}" style="text-align: center;display:block;" target="_blank"> <i class="fas fa-scroll text-danger" data-toggle="tooltip" data-placement="top" title="View Order Details"></i> </a></td>

                                                    <form action="{{route('send-to-warehouse')}}" method="POST">
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{$item->id}}">

                                                        <td>
                                                         <select class="form-control" name="warehouse_id" id="warehouse" required style="color: rgb(0, 0, 0); background: #fff; width: 85%; height: 25px;">
                                                            <option value="">-- select pickup point --</option> 
                                                            @foreach ($pickupPoint as $item)

                                                                <option class="m-3 text-dark" value="{{$item->id}}"     style="color: rgb(7, 0, 0); padding: 10px">
                                                                    {{$item->w_name}} ~ {{$item->w_district}}
                                                                </option> 

                                                            @endforeach
                                                         </select>

                                                         
                                                        </td>

                                                        <td>
                                                            <input class="btn btn-sm btn-danger" type="submit" value="Send">
                                                        </td>

                                                    </form>
                                                    
                                                    
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                            
                                        </table>


                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card" style="width: 100%;">
                                <div class="card-header"><h5 class="text-secondary font-weight-bold" style="text-align: center; font-size: 25px;">No New Order!</h5></div>
                                <div class="card-divider"></div>
                               
                                <div class="card-divider"></div>
                                <div class="card-img">
                                    <img src="{{asset('public/media/paper-bag.png')}}" style="width: 16%; margin-left: 41%;padding: 50px 0; opacity: .5;">
                                </div>
                            </div>
    
                            @endif

                           
                           
                            
                            
                          </div>
                          
                          <div id="Paris" class="w3-container city" style="display:none;padding: 0 0; width: 100%;">
                            
                            @if ($shop_to_pickup_point_pending_order_count>0)
                                <p class="mt-4 text-danger " style="text-align: center"> নিম্নোক্ত প্রোডাক্ট গুলো পিকআপ-পয়েন্ট এখনো রিসিভ করেনি। পেন্ডিং রয়েছে ।</p> 


                                <div class="dashboard__orders card ">
                                    {{-- <div class="card-header"><h5>Recent Orders</h5></div>
                                    <div class="card-divider"></div> --}}
                                    <div class="card-table">
                                        <div class="table-responsive-sm">


                                            <table id="pending_order_table_id"  style="width:100%;">
                                                <thead style="background: #ebf1f5; color: rgb(0, 0, 0);text-align:center">
                                                    <tr>
                                                        <th style="width: 12.5%">Order Date</th>
                                                        <th style="width: 12.5%">Send Date</th>
                                                        <th style="width: 12.5%">C.Phone</th>
                                                        <th style="width: 12.5%">Tnx.ID</th>
                                                        
                                                        <th style="width: 12.5%">Pickup Point</th>
                                                        <th style="width: 12.5%">Call</th>
                                                        <th style="width: 12.5%">Invoice</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color:rgb(41, 39, 39); width: 100%; text-align: center;">
                                                    
                                                    @foreach ($shop_to_pickup_point_pending_order as $item)
                                                    <tr>
                                                        <td >{{$item->order_date}} <br> {{$item->order_time}}</td>
                                                        <td >{{$item->ssd}} <br> {{$item->sst}}</td>
                                                       
                                                        
                                                        <td>{{$item->phone}}</td>
                                                        <td>{{$item->transaction_id}}</td>
                                                        
                                                            

                                                        <td>
                                                            <span data-toggle="tooltip" data-placement="top" title="{{$item->w_name}}">
                                                                {{$item->w_district}}
                                                            </span>
                                                            
                                                        </td>
                                                            @php
                                                            $pickup_point = DB::table('warehouses')->where('id',$item->warehouse_id)->first();
                                                            @endphp
                                                        
                                                        <td>{{$pickup_point->phone}}</td>
                                                        <td style="text-align: center;"> 
                                                        
                                                            <a href="{{URL::to('order-invoice-'.$item->id)}}" style="text-align: center;display:block;" target="_blank"> <i class="fas fa-scroll text-danger" data-toggle="tooltip" data-placement="top" title="View Order Details"></i> </a>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                                
                                            </table>



                                            
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="card" style="width: 100%;">
                                    <div class="card-header"><h5 class="text-secondary font-weight-bold" style="text-align: center; font-size: 25px;"> No Pending Order!</h5></div>
                                    <div class="card-divider"></div>
                                
                                    <div class="card-divider"></div>
                                    <div class="card-img">
                                        <img src="{{asset('public/media/paper-bag.png')}}" style="width: 16%; margin-left: 41%;padding: 50px 0; opacity: .5;">
                                    </div>
                                </div>
                            @endif

                            
                            
                          </div>
                          
                          <div id="Tokyo" class="w3-container city" style="padding: 0 0; width: 100%;">

                            @if ($pickup_point_received_order_count>0)
                                    
                                    <p class="mt-4 text-danger " style="text-align: center"> নিম্নোক্ত প্রোডাক্ট গুলো পিকআপ-পয়েন্ট রিসিভ করেছে ।</p> 

                                    <div class="dashboard__orders card ">
                                        
                                        <div class="card-table">
                                            <div class="table-responsive-sm">

                                                <table id="received_order_table_id"  style="width:100%;">
                                                    <thead style="background: #ebf1f5; color: rgb(0, 0, 0);text-align:center">
                                                        <tr>
                                                            <th style="width:  10.25%;">Order</th>
                                                            <th style="width:  10.25%;">Send</th>
                                                            <th style="width:  10.25%;">Receive</th>
                                                            <th style="width:  10.25%;">C.Phone</th>
                                                            <th style="width:  6.25%;">Tnx.ID</th>
                                                            <th style="width:  10.25%;">Pickup Point</th>
                                                            <th style="width:  6.25%;">Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        @foreach ($pickup_point_received_order as $item)
                                                        <tr>
                                                            <td >{{$item->order_date}} <br> {{$item->order_time}}</td>
                                                            <td >{{$item->ssd}} <br> {{$item->sst}}</td>
                                                            <td >{{$item->prd}} <br> {{$item->prt}}</td>
                                                            <td>
                                                                {{$item->phone}}
                                                            </td>
                                                            
                                                            <td>{{$item->transaction_id}}</td>
                                                            <td>

                                                                @php
                                                                    $pickup_point = DB::table('warehouses')->where('id',$item->warehouse_id)->first();
                                                                @endphp

                                                                <span data-toggle="tooltip" data-placement="top" title="{{$item->w_name}}">
                                                                    {{$pickup_point->phone}}
                                                                </span>
                                                            </td>
                                                            <td>
                                                            
                                                                
                                                                
                                                                <a href="{{URL::to('order-invoice-'.$item->id)}}" style="text-align: center;display:block;" target="_blank">
                                                                    
                                                                    <span>
                                                                        <i class="fas fa-check-double text-success" data-toggle="tooltip" data-placement="top" title="Product received by {{$item->w_name}} pickup-point & ৳ {{$item->buying_price * $item->qty}} added to your shop balance" ></i>
                                                                    </span>

                                                                     <span>
                                                                        <i class="mx-3 fas fa-scroll text-danger" data-toggle="tooltip" data-placement="top" title="View Order Details"></i> </a>
                                                                     </span>

                                                            </td>
                                                            
                                                        </tr>
                                                        @endforeach
                                                        
                                                    </tbody>
                                                    
                                                </table>

                                                










                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <div class="card" style="width: 100%;">
                                        <div class="card-header"><h5 class="text-secondary font-weight-bold" style="text-align: center; font-size: 25px;"> No Received Order!</h5></div>
                                        <div class="card-divider"></div>
                                    
                                        <div class="card-divider"></div>
                                        <div class="card-img">
                                            <img src="{{asset('public/media/paper-bag.png')}}" style="width: 16%; margin-left: 41%;padding: 50px 0; opacity: .5;">
                                        </div>
                                    </div>
                            @endif
                           
                          </div>
                          
                          <script>
                          function openCity(cityName) {

                            if(cityName=='London'){
                                document.getElementById('ln').style.backgroundColor = "#CCCCCC";
                                document.getElementById('pr').style.backgroundColor = null;
                                document.getElementById('tk').style.backgroundColor = null;
                            }

                            else if(cityName=='Paris'){
                                document.getElementById('pr').style.backgroundColor = "#CCCCCC";
                                document.getElementById('ln').style.backgroundColor = null;
                                document.getElementById('tk').style.backgroundColor = null;
                            }

                            else if(cityName=='Tokyo'){
                                document.getElementById('tk').style.backgroundColor = "#CCCCCC";
                                document.getElementById('pr').style.backgroundColor = null;
                                document.getElementById('ln').style.backgroundColor = null;
                            }


                            var i;
                            var x = document.getElementsByClassName("city");
                            for (i = 0; i < x.length; i++) {
                              x[i].style.display = "none";  
                            }
                            document.getElementById(cityName).style.display = "block";  
                          }
                          </script>

                            <!-- START : CSS TABS CONTENT-->

                    </div>
                </div>






            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
$('#new_order_table_id').DataTable();
} );
</script>

<script>
$(document).ready(function() {
$('#pending_order_table_id').DataTable();
} );
</script>

<script>
$(document).ready(function() {
$('#received_order_table_id').DataTable();
} );
</script>

@endsection

