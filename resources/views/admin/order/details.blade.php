
@php
    
# Order_child theke order id ta niye order parent details find korlam

$order_parent = DB::table('orders')->where('id',$order_child->order_id)->first();

$count_total_single_item_under_parent_order = DB::table('order_childs')->where('order_id',$order_child->order_id)->count();  

$pickup_name = DB::table('warehouses')->get();

@endphp

@extends('admin.master')
@section('content')

        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order Details / EBP-{{$order_child->id}} 
                                
                                @if ($order_child->isCustomerReceived=='1' && $order_child->status=='1')
                                    <span class="text-success font-weight-bold"><i class="fas fa-check-double"></i> Completed
                                    </span> 
                                
                                @elseif($order_child->isWarehouseSend=='1' && $order_child->status=='0')
                                    
                                <span class="text-success font-weight-bold"><i class="fas fa-check"></i> Almost Done 
                                </span>

                                @elseif($order_child->isWarehouseReceived=='1' && $order_child->status=='0')
                                    
                                <span class="text-success font-weight-bold"><i class="fas fa-check"></i> Product In Pickup Point
                                </span>


                                @elseif($order_child->isShopSend=='1' && $order_child->status=='0')
                                    
                                <span class="text-success font-weight-bold"><i class="fas fa-check"></i> Progressing
                                </span>

                                @else 

                                <span class="text-danger font-weight-bold"><i class="fas fa-check"></i> New
                                </span>

                                @endif

                            </h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Order</li>
                                <li class="breadcrumb-item active">Order Details</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Order Processing Steps</h4> 
                            </div>
                            <div class="card-body">
                                <div class="progress" style="height: 25px;">

                                    <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Vendor Just Received Order</div>
                                    
                                    @if ($order_child->isShopSend==1)
                                        <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Vendor Send to Pickup Point</div>
                                    @endif

                                    @if($order_child->isWarehouseReceived==1)
                                        <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Pickup Point Received</div>
                                    @endif

                                    @if($order_child->isWarehouseSend==1)
                                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Pickup Point Send to Customer</div>
                                    @endif

                                    @if($order_child->isCustomerReceived==1)
                                        <div class="progress-bar bg-primary w-25" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Customer received product.</div>
                                    @endif
                                    

                                    
                                    
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>
                


                <div class="row">
                   
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="font-weight-bold text-secondary"> <a href="{{URL::to('admin/view/customer/'.$order_parent->who_orders)}}" class="text-secondary" style="text-decoration: underline;">{{$order_parent->name}}</a> ({{$order_parent->phone}}) place this order. Order Date: <span class="text-danger">{{$order_parent->order_date}}</span> & Time: <span class="text-danger">{{$order_parent->order_time}}</span></p>
    
                                    @if ($order_child->warehouse_id==null)
                                        <p class="font-weight-bold text-secondary">No Pickup Point Selected Yet!</p>
                                    @else 
    
                                        @php
                                            $pickup_point = DB::table('warehouses')->where('id',$order_child->warehouse_id)->first();
                                        @endphp
                                        
                                        <p class="font-weight-bold text-secondary">Selected Pickup Point: 
                                            
                                            <a href="{{URL::to('admin/view/warehouse/'.$pickup_point->id)}}" style="text-decoration: underline;" class="text-secondary" >{{$pickup_point->w_district}}/{{$pickup_point->w_name}}</a>
                                            
                                            - <span class="text-danger">{{$pickup_point->phone}}</span> </p>
    
                                        <p class=" text-secondary"><span class="font-weight-bold">Pickup Point Location:</span> {{$pickup_point->w_location}}</p>

                                    @endif

                                            <ul>
                                                <li class="font-weight-bold text-secondary"> Order Place Date & Time: <span style="opacity: 0">---------- ----</span> {{$order_parent->order_date}} - {{$order_parent->order_time}}</li>
                                                
                                                @if ($order_child->ssd!=null)
                                                    <li class="font-weight-bold text-secondary"> Vendor send to pickup point : <span style="opacity: 0">---- ----</span> {{$order_child->ssd}} - {{$order_child->sst}}</li>
                                                @endif
                                                
                                                @if ($order_child->prd!=null)
                                                    <li class="font-weight-bold text-secondary"> Pickup Point received product : <span style="opacity: 0">------</span> {{$order_child->prd}} - {{$order_child->prt}}</li>
                                                @endif
                                                
                                                @if ($order_child->psd!=null)
                                                    <li class="font-weight-bold text-secondary"> Pickup Point send to Customer : <span style="opacity: 0">-----</span> {{$order_child->psd}} - {{$order_child->pst}}</li>
                                                @endif

                                                @if ($order_child->crd!=null)
                                                    <li class="font-weight-bold text-secondary"> Customer Received Product : <span style="opacity: 0">---------</span> {{$order_child->crd}} - {{$order_child->crt}}</li>
                                                @endif
                                                
                                            
                                            </ul>
                                        
                                        
                                
    
                                </div>
                            </div>
                        </div>
                </div>



                <div class="row">
                    
                        
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-store"></i> Shipping Information</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Name</dt>
                                    <dd class="col-sm-7">{{$order_parent->s_name}}</dd>

                                    <dt class="col-sm-5">Email</dt>
                                    <dd class="col-sm-7">{{$order_parent->s_email}}</dd>

                                    <dt class="col-sm-5">Phone</dt>
                                    <dd class="col-sm-7"><span class="text-danger font-weight-bold">{{$order_parent->s_phone}}</span></dd>

                                    <dt class="col-sm-5">Post Code</dt>
                                    <dd class="col-sm-7">{{$order_parent->s_postcode}}</dd>

                                    <dt class="col-sm-5">Thana</dt>
                                    <dd class="col-sm-7">{{$order_parent->s_thana}}</dd>

                                    <dt class="col-sm-5">Area</dt>
                                    <dd class="col-sm-7">{{$order_parent->s_area}}</dd>

                                    <dt class="col-sm-5">District</dt>
                                    <dd class="col-sm-7">{{$order_parent->s_district}}</dd>

                                    <dt class="col-sm-5">Address </dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold"> 
                                            
                                        {{$order_parent->shipping_address}}
                                            
                                    </span></dd>

                                    {{-- <dt class="col-sm-5">Shop status</dt>
                                    <dd class="col-sm-7">
                                    
                                            <span class=" badge badge-info font-weight-bold"> Active </span> 

                                    </dd> --}}


                                </dl>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-user"></i> Billing Information</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Name</dt>
                                    <dd class="col-sm-7">{{$order_parent->b_name}}</dd>

                                    <dt class="col-sm-5">Email</dt>
                                    <dd class="col-sm-7">{{$order_parent->b_email}}</dd>

                                    <dt class="col-sm-5">Phone</dt>
                                    <dd class="col-sm-7"><span class="text-danger font-weight-bold">{{$order_parent->b_phone}}</span></dd>

                                    <dt class="col-sm-5">Post Code</dt>
                                    <dd class="col-sm-7">{{$order_parent->b_postcode}}</dd>

                                    <dt class="col-sm-5">Thana</dt>
                                    <dd class="col-sm-7">{{$order_parent->b_thana}}</dd>

                                    <dt class="col-sm-5">Area</dt>
                                    <dd class="col-sm-7">{{$order_parent->b_area}}</dd>

                                    <dt class="col-sm-5">District</dt>
                                    <dd class="col-sm-7">{{$order_parent->b_district}}</dd>

                                    <dt class="col-sm-5">Address </dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold"> 
                                            
                                        {{$order_parent->shipping_address}}
                                            
                                    </span></dd>

                                    {{-- <dt class="col-sm-5">Shop status</dt>
                                    <dd class="col-sm-7">
                                    
                                            <span class=" badge badge-info font-weight-bold"> Active </span> 

                                    </dd> --}}


                                </dl>
                            </div>
                        </div>


                    </div>

                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-store"></i> Payment Details</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">

                                    <dt class="col-sm-5">Order Quantity</dt>
                                    <dd class="col-sm-7">{{$order_child->qty}}</dd>

                                    <dt class="col-sm-5">Pay Amount</dt>
                                    <dd class="col-sm-7">৳ {{$order_child->selling_price_for_this}} * {{$order_child->qty}} = {{$order_child->selling_price_for_this * $order_child->qty}}</dd>

                                    <dt class="col-sm-5">Use Cashback</dt>
                                    {{-- <dd class="col-sm-7">৳ {{$order_child->u_cashback == null?0:$order_child->u_cashback}}</dd> --}}
                                    <dd class="col-sm-7">৳ {{$order_child->u_cashback==null?0:$order_child->u_cashback}} * {{$order_child->qty}} = {{$order_child->u_cashback * $order_child->qty}}</dd>


                                    <dt class="col-sm-5">Get Cashback</dt>
                                    {{-- <dd class="col-sm-7">৳ {{$order_child->g_cashback == null?0:$order_child->g_cashback}}</dd> --}}
                                    <dd class="col-sm-7">৳ {{$order_child->g_cashback==null?0:$order_child->g_cashback}} * {{$order_child->qty}} = {{$order_child->g_cashback * $order_child->qty}}</dd>


                                    <dt class="col-sm-5">Use Gift Balance</dt>
                                    {{-- <dd class="col-sm-7">৳ {{$order_child->u_gift == null?0:$order_child->u_gift}}</dd> --}}
                                    <dd class="col-sm-7">৳ {{$order_child->u_gift==null?0:$order_child->u_gift}} * {{$order_child->qty}} = {{$order_child->u_gift * $order_child->qty}}</dd>


                                    <dt class="col-sm-5">Pay Method</dt>
                                    <dd class="col-sm-7">
                                        @if ($order_child->p_method=='ssl')
                                            Direct Pay with SSL
                                        @elseif($order_child->p_method=='ebp_mb')
                                            Only Main Balance
                                        @elseif($order_child->p_method=='ebp_mbcbb')
                                            Main + Cashback Balance
                                        @elseif($order_child->p_method=='ebp_mbgftb')
                                            Main + Gift Balance
                                            
                                        @endif
                                    </dd>

                                </dl>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-user"></i> Product & Shop Details</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Product</dt>
                                    <dd class="col-sm-7"> <a href="{{URL::to('admin/show/product/'.$product->id)}}">{{$product->product_name}}</a> </dd>

                                    <dt class="col-sm-5">Current Quantity</dt>
                                    <dd class="col-sm-7">{{$product->product_quantity}}</dd>

                                    <dt class="col-sm-5">Shop Name</dt>
                                    {{-- {{$product->product_owner_id}} --}}
                                    <dd class="col-sm-7"> <a href="{{URL::to('admin/view/shop/'.$product->product_owner_id)}}" style="text-decoration: underline;">{{$product->shop_name}}</a> </dd>

                                    <dt class="col-sm-5">Shop Owner</dt>
                                    <dd class="col-sm-7"><a href="{{URL::to('admin/view/customer/'.$product->product_owner_id)}}" style="text-decoration: underline;">{{$product->name}}</a></dd>

                                    <dt class="col-sm-5">Owner Phone</dt>
                                    <dd class="col-sm-7"><span class="text-danger font-weight-bold">{{$order_parent->b_phone}}</span></dd>

                        

                                </dl>
                            </div>
                        </div>


                    </div>

                </div>


                @if ($order_child->isShopSend==0)
                <div class="row">
                    <!--QUICK EDIT PART-->
                    
                    <div class="col-12 mt-2">

                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.set.pickuppoint')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$order_child->id}}">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Selected Pickup Point</label>
                                                
                                                <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                                                    
                                                    <option value="">--Select Pickup Point--</option>

                                                    @foreach ($pickup_name as $item)
                                                        <option value="{{$item->id}}" <?php if($order_child->warehouse_id==$item->id){echo 'selected';} ?> >{{$item->w_district}}/{{$item->w_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        
                                    
                                    </div>
                                    
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
                @endif

            

                <!-- END: Card DATA--> 

                {{-- <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Shop || Images </h6></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                               
                                <img src="" alt="Shop Logo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption>Shop Logo</figcaption>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                               
                                <img src="" alt="Shop Trad Photo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption class="mt-1">Shop Banner</figcaption>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="" alt="Shop Trad Photo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption class="mt-1">Trade License</figcaption>
                            </div>
                        </div>
                    </div>

                </div> --}}



                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Product Image </h6></div>
                    </div>
                </div>
                <div class="row mt-4">

                    
                    <div class="col-md-3 mt-1">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                            
				                <img src="{{asset($product->image_one)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                                    
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-1">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                            
				                <img src="{{asset($product->image_two)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                                    
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-1">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                            
				                <img src="{{asset($product->image_three)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                                    
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-1">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                            
				                <img src="{{asset($product->image_four)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                                    
                                </a>
                            </div>
                        </div>
                    </div>
              
                    
                    
                </div>




            </div>
        </main>
        <!-- END: Content-->
@endsection
