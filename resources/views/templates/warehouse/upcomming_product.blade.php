

@php
    
    $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        $count_upcomming_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->count();

        $upcomming_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason','orders.order_date','orders.order_time','orders.s_district','orders.s_phone','orders.shipping_address','users.phone','users.shop_phone','products.un_id','products.product_name','products.product_code','products.image_one')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->get();


        
        $count_received_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->count();
        

        $received_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason','orders.order_date','orders.order_time','orders.s_district','orders.s_phone','orders.shipping_address','users.phone','users.shop_phone','products.un_id','products.product_name','products.product_code','products.image_one')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->get();

       

        $count_customer_delivery_pending_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->count();

            $customer_delivery_pending_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason','orders.order_date','orders.order_time','orders.s_district','orders.shipping_address','orders.s_phone','users.phone','users.shop_phone','products.un_id','products.product_name','products.product_code','products.image_one')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->get();


        $count_customer_received_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','1')
                ->where('order_childs.status','1')
                ->count();

        $customer_received_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('products','products.id','order_childs.product_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason','orders.order_date','orders.order_time','orders.s_district','orders.s_phone','orders.shipping_address','users.phone','users.shop_phone','products.un_id','products.product_name','products.product_code','products.image_one')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','1')
                ->where('order_childs.status','1')
                ->get();


@endphp


@extends('layouts.app')
@section('content')

    <div class="site__body">
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--xl">


                <div class="row">
                    <div class="col">
                        <h6 class="font-weight-bold text-dark">My Pickup Point</h6>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-12 col-lg-12 mt-1 mt-lg-0">
                        <div class="dashboard">
                                                <!-- START : CSS TABS CONTENT-->
    
                              <div class="w3-bar mt-3" style="background: #F0F0F0">

                                <button style="width: 20%; background: #CCCCCC;" id="ln" class="w3-bar-item w3-button" onclick="openCity('London')">Comming Product ({{$count_upcomming_product}})</button>
                                <button style="width: 20%;" id="pr" class="w3-bar-item w3-button" onclick="openCity('Paris')">Received Product ({{$count_received_product}})</button>
                                <button style="width: 20%;" id="tk" class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Delivery Pending ({{$count_customer_delivery_pending_product}})</button>
                                <button style="width: 20%;" id="cm" class="w3-bar-item w3-button" onclick="openCity('Com')">Delivery Complete ({{$count_customer_received_product}})</button>

                                <a style="width: 20%;" href="{{route('warehouse.index')}}"  class="w3-bar-item w3-button">My Pickup Point</a>

                              </div>
                              
                              <div id="London" class="w3-container city" style="padding: 0 0; width: 100%;">
                               
                                @if ($count_upcomming_product>0)
                                <p class="mt-4 text-danger " style="text-align: center"> নিম্নোক্ত প্রোডাক্ট গুলো আপনার পিকআপ-পয়েন্টে অর্ডার হয়েছে। <br> প্রোডাক্ট আপনার পিকআপ-পয়েন্টে পৌঁছালে রিসিভ করবেন ।</p>
                                    
                                <div class="dashboard__orders card ">
                                    
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table id="upcomming_order_table_id"  style="width:100%;">
                                                <thead style="background: #ebf1f5; color: rgb(0, 0, 0);">
                                                    <tr>
                                                        <th style="width: 12.5%; font-size: 11px;">Order Date</th>
                                                        <th style="width: 12.5%; font-size: 11px;">Vendor Send</th>
                                                        <th style="width: 12.5%; font-size: 11px;">Vendor Phone</th>
                                                        <th style="width: 9%; font-size: 11px;">Product</th>
                                                        <th style="width: 13.5%; font-size: 11px;">C.Phone</th>
                                                        <th style="width: 20%; font-size: 11px;">Ship.Address</th>
                                                        <th style="width: 10%; font-size:  11px;">Inv <i class="fas fa-mouse text-danger"></i></th>
                                                        <th style="width: 10%; font-size: 11px;">Received?</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 13px;">
                                                    

                                                    @foreach ($upcomming_product as $item)
                                                <tr>
                                                    <td>{{$item->order_date}} <br> {{$item->order_time}}</td>
                                                    <td>{{$item->ssd}} <br> {{$item->sst}}</td>
                                                    <td>{{$item->shop_phone}}</td>
                                                    <td>
                                                        <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}">
                                                            <img src="{{asset($item->image_one)}}" alt="Product Image" style="width: 35px; height: 35px; border-radius: 50%;">
                                                        </a>
                                                    </td>
                                                    <td>{{$item->phone}}</td>
                                                    @php
                                                            $slice = substr($item->shipping_address, 0, 20); 
                                                        @endphp
                                                        <td>{{$item->s_district}},{{$slice}}...</td>

                                                    <td>
                                                        <a href="{{URL::to('order-invoice-'.$item->id)}}" style="text-align: left;display:block;" target="_blank" data-toggle="tooltip" data-placement="top" title="View Order Details">EBP-{{$item->id}}</a>
                                                    </td>

                                                    <td style="text-align: center;">
                                                        
                                                        {{-- <a href="" >
                                                            
                                                            <span class="d-inline-block" data-toggle="popover" data-content="Disabled popover">
                                                                <button class="btn btn-primary pointer-event-none" type="button" disabled >Disabled button</button>
                                                            </span>
                                                        </a> --}}

                                                        <a id="{{ $item->id }}" href="#" data-toggle="modal" data-target="#cmodal" onclick="viewJson(this.id)">
                                                            <i class="fas fa-mouse text-danger" style="font-size: 20px;"></i>  
                                                        </a>
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
                                    <div class="card-header"><h5 class="text-secondary font-weight-bold" style="text-align: center; font-size: 25px;">No Upcomming Product!</h5></div>
                                    <div class="card-divider"></div>
                                   
                                    <div class="card-divider"></div>
                                    <div class="card-img">
                                        <img src="{{asset('public/media/paper-bag.png')}}" style="width: 16%; margin-left: 41%;padding: 50px 0; opacity: .5;">
                                    </div>
                                </div>
        
                                @endif

                               
                               
                                
                                
                              </div>
                              
                              <div id="Paris" class="w3-container city" style="display:none;padding: 0 0; width: 100%;">
                                
                                @if ($count_received_product>0)
                                    <p class="mt-4 text-danger " style="text-align: center"> নিম্নোক্ত প্রোডাক্ট গুলো আপনি রিসিভ করেছেন। <br> প্রোডাক্ট গুলো দ্রুত কাস্টমারের শিপিং অ্যাড্রেসে পাঠিয়ে দিন।</p> 


                                    <div class="dashboard__orders card ">
                                        
                                        <div class="card-table">
                                            <div class="table-responsive-sm">


                                                <table id="received_order_table_id"  style="width:100%;">
                                                    <thead style="background: #ebf1f5; color: rgb(0, 0, 0);">
                                                        <tr>
                                                            <th style="width: 12.5%; font-size: 11px;">Order Date</th>
                                                            <th style="width: 12.5%; font-size: 11px;">Received Date</th>
                                                            <th style="width: 12.5%; font-size: 11px;">Vendor Phone</th>
                                                            <th style="width: 9%; font-size: 11px;">Product</th>
                                                            <th style="width: 13.5%; font-size: 11px;">Ship.Phone</th>
                                                            <th style="width: 20%; font-size: 11px;">Ship.Address</th>
                                                            <th style="width: 10%; font-size:  11px;">Inv</th>
                                                            <th style="width: 10%; font-size: 11px;">Send to Customer?</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px;">
                                                        
    
                                                        @foreach ($received_product as $item)
                                                    <tr>
                                                        <td>{{$item->order_date}} <br> {{$item->order_time}}</td>
                                                        <td>{{$item->prd}} <br> {{$item->prt}}</td>
                                                        <td>{{$item->shop_phone}}</td>
                                                        <td>
                                                            <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}">
                                                                <img src="{{asset($item->image_one)}}" alt="Product Image" style="width: 35px; height: 35px; border-radius: 50%;">
                                                            </a>
                                                        </td>
                                                        <td>{{$item->s_phone}}</td>
                                                        @php
                                                            $slice = substr($item->shipping_address, 0, 20); 
                                                        @endphp
                                                        <td>{{$item->s_district}},{{$slice}}...</td>
    
                                                        <td>
                                                            <a href="{{URL::to('order-invoice-'.$item->id)}}" style="text-align: left;display:block; text-decoration: none;" target="_blank" data-toggle="tooltip" data-placement="top" title="View Order Details">EBP-{{$item->id}}</a>
                                                        </td>
    
                                                        <td style="text-align: center;">
                                                            
                                                            {{-- <a href="" >
                                                                
                                                                <span class="d-inline-block" data-toggle="popover" data-content="Disabled popover">
                                                                    <button class="btn btn-primary pointer-event-none" type="button" disabled >Disabled button</button>
                                                                </span>
                                                            </a> --}}
    
                                                            <a id="{{ $item->id }}" href="#" data-toggle="modal" data-target="#cmodalsendtocustomer" onclick="viewJsonSecond(this.id)">
                                                                <i class="fas fa-mouse text-danger" style="font-size: 20px;"></i>  
                                                            </a>
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
                                        <div class="card-header"><h5 class="text-secondary font-weight-bold" style="text-align: center; font-size: 25px;"> No Received Product!</h5></div>
                                        <div class="card-divider"></div>
                                    
                                        <div class="card-divider"></div>
                                        <div class="card-img">
                                            <img src="{{asset('public/media/paper-bag.png')}}" style="width: 16%; margin-left: 41%;padding: 50px 0; opacity: .5;">
                                        </div>
                                    </div>
                                @endif

                                
                                
                              </div>
                              
                              <div id="Tokyo" class="w3-container city" style="display:none;padding: 0 0; width: 100%;">

                                @if ($count_customer_delivery_pending_product>0)
                                        
                                        <p class="mt-4 text-danger " style="text-align: center"> নিম্নোক্ত প্রোডাক্ট গুলো পিকআপ-পয়েন্ট থেকে ডেলিভারি করা হয়েছে। কাস্টমারের কাছে এখনো পৌঁছায়নি। <br> <span class="text-info">এডমিন থেকে কাস্টমার রিসিভ কনফার্মেশন করা হবে।</span> </p> 

                                        <div class="dashboard__orders card ">
                                            
                                            <div class="card-table">
                                                <div class="table-responsive-sm">

                                                    <table id="customer_delivery_pending_order_table_id"  style="width:100%;">
                                                        <thead style="background: #ebf1f5; color: rgb(0, 0, 0);">
                                                            <tr>
                                                                <th style="width: 12.5%; font-size: 11px;">Order Date</th>
                                                                <th style="width: 12.5%; font-size: 11px;">Received Date</th>
                                                                <th style="width: 12.5%; font-size: 11px;">Send to Customer</th>
                                                                <th style="width: 9%; font-size: 11px;">Product</th>
                                                                <th style="width: 13.5%; font-size: 11px;">Cus.Phone</th>
                                                                <th style="width: 20%; font-size: 11px;">Ship.Address</th>
                                                                <th style="width: 10%; font-size: 11px;">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px;">
                                                            
        
                                                            @foreach ($customer_delivery_pending_product as $item)
                                                        <tr>
                                                            <td>{{$item->order_date}} <br> {{$item->order_time}}</td>
                                                            <td>{{$item->prd}} <br> {{$item->prt}}</td>
                                                            <td>{{$item->psd}} <br> {{$item->pst}}</td>
                                                            <td>
                                                                <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}">
                                                                    <img src="{{asset($item->image_one)}}" alt="Product Image" style="width: 35px; height: 35px; border-radius: 50%;">
                                                                </a>
                                                            </td>
                                                            <td>{{$item->phone}}</td>
                                                            @php
                                                                $slice = substr($item->shipping_address, 0, 20); 
                                                            @endphp
                                                            <td>{{$item->s_district}},{{$slice}}...</td>
        
                                                            <td style="text-align: center;">
                                                                
                                                                <a href="{{URL::to('order-invoice-'.$item->id)}}" style="text-decoration: none;color: rgb(8, 8, 8);" target="_blank">
                                                                <span style="display: block;width: 80px; background: rgb(120, 221, 92);padding: 3px;font-size: 12px;">Waiting for Customer Receive</span>
                                                                </a>

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
                                            <div class="card-header"><h5 class="text-secondary font-weight-bold" style="text-align: center; font-size: 25px;"> No Delivery Pending!</h5></div>
                                            <div class="card-divider"></div>
                                        
                                            <div class="card-divider"></div>
                                            <div class="card-img">
                                                <img src="{{asset('public/media/paper-bag.png')}}" style="width: 16%; margin-left: 41%;padding: 50px 0; opacity: .5;">
                                            </div>
                                        </div>
                                @endif
                               
                              </div>

                              <div id="Com" class="w3-container city" style="display:none;padding: 0 0; width: 100%;">

                                @if ($count_customer_received_product>0)
                                        
                                        <p class="mt-4 text-danger " style="text-align: center"><span class="text-info">
                                            ডেলিভারি কমপ্লিট !      
                                        </span> </p> 

                                        <div class="dashboard__orders card ">
                                            
                                            <div class="card-table">
                                                <div class="table-responsive-sm">

                                                    <table id="customer_delivery_pending_order_table_id"  style="width:100%;">
                                                        <thead style="background: #ebf1f5; color: rgb(0, 0, 0);">
                                                            <tr>
                                                                <th style="width: 12.5%; font-size: 11px;">Order Date</th>
                                                                
                                                                <th style="width: 12.5%; font-size: 11px;">Send to Customer</th>
                                                                <th style="width: 12.5%; font-size: 11px;">Customer Received</th>
                                                                <th style="width: 9%; font-size: 11px;">Product</th>
                                                                <th style="width: 12.5%; font-size: 11px;">Cus.Phone</th>
                                                                <th style="width: 20%; font-size: 11px;">Ship.Address</th>
                                                                <th style="width: 11%; font-size: 11px;">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px;">
                                                            
        
                                                            @foreach ($customer_received_product as $item)
                                                        <tr>
                                                            <td>{{$item->order_date}} <br> {{$item->order_time}}</td>
                                                            <td>{{$item->prd}} <br> {{$item->prt}}</td>
                                                            <td>{{$item->psd}} <br> {{$item->pst}}</td>
                                                            <td>
                                                                <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}">
                                                                    <img src="{{asset($item->image_one)}}" alt="Product Image" style="width: 35px; height: 35px; border-radius: 50%;">
                                                                </a>
                                                            </td>
                                                            <td>{{$item->phone}}</td>
                                                            @php
                                                                $slice = substr($item->shipping_address, 0, 20); 
                                                            @endphp
                                                            <td>{{$item->s_district}},{{$slice}}...</td>
        
                                                            <td style="text-align: center;">
                                                                
                                                                <a href="{{URL::to('order-invoice-'.$item->id)}}" style="text-decoration: none;color: rgb(8, 8, 8);" target="_blank">
                                                                    <span style="display: block;width: 80px; background: rgb(34, 116, 12);padding: 3px;font-size: 12px;color: #fff;">Delivery Complete</span>
                                                                </a>

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
                                            <div class="card-header"><h5 class="text-secondary font-weight-bold" style="text-align: center; font-size: 25px;"> No Delivery Complete Order!</h5></div>
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
                                    document.getElementById('cm').style.backgroundColor = null;
                                }
    
                                else if(cityName=='Paris'){
                                    document.getElementById('pr').style.backgroundColor = "#CCCCCC";
                                    document.getElementById('ln').style.backgroundColor = null;
                                    document.getElementById('tk').style.backgroundColor = null;
                                    document.getElementById('cm').style.backgroundColor = null;

                                }
    
                                else if(cityName=='Tokyo'){
                                    document.getElementById('tk').style.backgroundColor = "#CCCCCC";
                                    document.getElementById('pr').style.backgroundColor = null;
                                    document.getElementById('ln').style.backgroundColor = null;
                                    document.getElementById('cm').style.backgroundColor = null;

                                }

                                else if(cityName=='Com'){
                                    document.getElementById('cm').style.backgroundColor = "#CCCCCC";
                                    document.getElementById('pr').style.backgroundColor = null;
                                    document.getElementById('ln').style.backgroundColor = null;
                                    document.getElementById('tk').style.backgroundColor = null;

                                }
    
    
                                var i;
                                var x = document.getElementsByClassName("city");
                                for (i = 0; i < x.length; i++) {
                                  x[i].style.display = "none";  
                                }
                                document.getElementById(cityName).style.display = "block";  
                              }
                              </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
    
<!--CUSTOM MODAL-->

<!-- START Modal -->
<div class="modal fade" id="cmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('warehouse.received')}}" method="POST">
            @csrf


            <div class="modal-content">
                <div class="modal-header">
                    
                    <img src="{{asset('public/media/logo.jpg')}}" alt="eBipone" style="width: 100px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span style="display: block; font-weight: bold;">Are you received Product from the vendor?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    
                    <input type="submit" class="btn btn-sm btn-primary" value="Yes, I Received.">
    
                    <input type="hidden" id="child_id" name="order_child_id" value="">
                </div>
            </div>

        </form>
    </div>
</div>


<!--SECOND MODAL-->

<div class="modal fade" id="cmodalsendtocustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true" style="width: 100%;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('warehouse.send.to.customer')}}" method="POST">
            @csrf


            <div class="modal-content">
                <div class="modal-header">
                    
                    <img src="{{asset('public/media/logo.jpg')}}" alt="eBipone" style="width: 100px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span style="display: block; font-weight: bold;">Are you sure to send this product to Customer?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    
                    <input type="submit" class="btn btn-sm btn-primary" value="Yes, Send.">
    
                    <input type="hidden" id="child_id_second" name="order_child_id" value="">
                </div>
            </div>

        </form>
    </div>
</div>

<!-- END Modal -->



<script type="text/javascript">
    function viewJson(id){
          $.ajax({
                     url: "{{  url('/warehouse/view/order/json') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       //$('#pname').text(data.product.product_name);
                       $('#child_id').val(data.oc.id);
             }
      })
    }
</script>

<script type="text/javascript">
    function viewJsonSecond(id){
          $.ajax({
                     url: "{{  url('/warehouse/view/order/json/second') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       //$('#pname').text(data.product.product_name);
                       $('#child_id_second').val(data.octwo.id);
             }
      })
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
    $('#upcomming_order_table_id').DataTable();
} );
</script>

<script>
    $(document).ready(function() {
    $('#received_order_table_id').DataTable();
} );
</script>


<script>
    $(document).ready(function() {
    $('#customer_delivery_pending_order_table_id').DataTable();
} );
</script>


@endsection

