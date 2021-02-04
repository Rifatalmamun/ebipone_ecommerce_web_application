@extends('admin.master')
@section('content')


        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order Details : {{$order->admin_status}}</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Order</li>
                                <li class="breadcrumb-item active">View</li> 
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Billing Address </h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Name:</dt>
                                    <dd class="col-sm-7">{{$order->b_name}}</dd>

                                    <dt class="col-sm-5">Email</dt> 
                                    <dd class="col-sm-7">{{$order->b_email}}</dd>

                                    <dt class="col-sm-5">Phone</dt> 
                                    <dd class="col-sm-7">{{$order->b_phone}}</dd>

                                    <dt class="col-sm-5">Post code</dt>
                                    <dd class="col-sm-7">{{$order->b_postcode}}</dd>

                                    <dt class="col-sm-5">Thana</dt>
                                    <dd class="col-sm-7">{{$order->b_thana}}</dd>

                                    <dt class="col-sm-5">Area name</dt>
                                    <dd class="col-sm-7">{{$order->b_area}}</dd> 

                                    <dt class="col-sm-5">Address</dt>
                                    <dd class="col-sm-7">{{$order->billing_address}}</dd> 

                                    
                                </dl>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Shipping Address</h4> 
                            </div>
                            <div class="card-body"> 
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Name:</dt>
                                    <dd class="col-sm-7">{{$order->s_name}}</dd>

                                    <dt class="col-sm-5">Email</dt> 
                                    <dd class="col-sm-7">{{$order->s_email}}</dd>

                                    <dt class="col-sm-5">Phone</dt> 
                                    <dd class="col-sm-7">{{$order->s_phone}}</dd>

                                    <dt class="col-sm-5">Post code</dt>
                                    <dd class="col-sm-7">{{$order->s_postcode}}</dd>

                                    <dt class="col-sm-5">Thana</dt>
                                    <dd class="col-sm-7">{{$order->s_thana}}</dd>

                                    <dt class="col-sm-5">Area name</dt>
                                    <dd class="col-sm-7">{{$order->s_area}}</dd> 

                                    <dt class="col-sm-5">Address</dt>
                                    <dd class="col-sm-7">{{$order->shipping_address}}</dd> 

                                    
                                </dl>
                            </div>
                        </div>


                    </div>


                   
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Products </h6></div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Color</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @for ($i = 0; $i < $loop_count; $i++)
                                      <tr>
                                        <th>
                                            @php
                                                $product = DB::table('products')->where('id',$ids[$i])->first();
                                                echo $product->product_name;
                                            @endphp
                                        </th>
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$q[$i]}}</td>
                                        <td>
                                            @if($s[$i]=='no')
                                            ---
                                            @else 
                                            {{$s[$i]}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($c[$i]=='no')
                                            ---
                                            @else 
                                            {{$c[$i]}}
                                            @endif
                                        </td>
                                      </tr>
                                      @endfor
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>

               

                <!-- END: Card DATA--> 

                <div class="row mt-4">
                    <div class="col mt-2">
                        <div class="card">
                            <div class="card-body">
                                {{-- <a href="" class="btn btn-primary rounded-btn mb-2"> <i class="fa fa-home"></i> Edit Product Details </a> --}}

                                @if($order->admin_status=='pending')                                                                             
                                    <a href="{{URL::to('admin/delivery/product/'.$order->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="mx-1 fa fa-home"></i>প্রোডাক্ট গুলো ডেলিভারির জন্য পাঠিয়ে দিন
                                     </a>
                                
                                @elseif($order->admin_status=='on the way')                                                                             
                                    <a href="{{URL::to('admin/delivered/product/'.$order->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="mx-1 fa fa-home"></i> প্রোডাক্ট ডেলিভারি কমপ্লিট করুন </a>                
                                @elseif($order->admin_status=='delivery complete')
                                <p class="text-primary">
                                    Product Successfully Delivered to Customer ...........
                                </p>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Ordered Product Picture</h6></div>
                    </div>
                </div>
                <div class="row mt-4 mb-5">

                    @for ($i = 0; $i < $loop_count; $i++)
                    <div class="col-md-3">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                @php
                                    $product = DB::table('products')->where('id',$ids[$i])->first();
                                @endphp
                                <img src="{{asset($product->image_one)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                            </div>
                        </div>
                    </div>
                    @endfor

                    

                </div>


            </div>
        </main>
        <!-- END: Content-->




@endsection
