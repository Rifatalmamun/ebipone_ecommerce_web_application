
@extends('admin.master')
@section('content')


        <main>
            <div class="container-fluid site-width">

                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto">
                                <h4 class="mb-0">Order Package Details / ৳ {{$order_parent->pay_price}} 
                                    <span class="text-success font-weight-bold"><i class="fas fa-check-double"></i> 
                                    </span> 
                                </h4>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Order Package</li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                   
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="font-weight-bold text-secondary"> <a href="{{URL::to('admin/view/customer/'.$user->id)}}" class="text-secondary" style="text-decoration: underline;" target="_blank">{{$user->name}}</a> ({{$user->phone}}) place this order. Date: <span class="text-danger">{{$order_parent->order_date}}</span> & Time: <span class="text-danger">{{$order_parent->order_time}}</span></p>
                                        <p class="text-secondary" style="margin: 0;"><span class="font-weight-bold">Pay Amount: </span> ৳ {{$order_parent->pay_price}} </p>
                                        <p class="text-secondary"><span class="font-weight-bold">Pay Method: </span> {{$order_parent->pay_method}} </p>
                                            <ul>
                                                <li class="font-weight-bold text-secondary"> Total Product <span style="opacity: 0">-------</span> {{$order_parent->total_product}}</li>
                                                <li class="font-weight-bold text-secondary"> Transaction ID <span style="opacity: 0">-----</span> {{$order_parent->transaction_id}}</li>
                                                <li class="font-weight-bold text-secondary"> Order ID <span style="opacity: 0">--------------</span> {{$order_parent->id}}</li>

                                            </ul>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">

                                    <tbody id="transactionHistoryTrns">
                                        
                                        <thead>
                                            <tr>
                                                <th>Invoice ID</th>
                                               
                                                <th>Product</th>
                                                <th>Qty</th>  
                                                <th>Size/Color</th> 
                                                <th>St</th>
                                                <th>Action</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                          @foreach ($order_child as $item)
                                          <tr>

                                            <td>EBP-{{$item->id}}</td>
                                            <td>
                                                <a href="{{URL::to('admin/show/product/'.$item->product_id)}}" target="_blank" >{{$item->product_name}}</a>
                                            </td>
                                              
                                            <td>{{$item->qty}}</td>
          
                                            <td>
          
                                              @if ($item->sz!='no')
                                                  {{$item->sz}}
                                              @else
                                                  --
                                              @endif
                                              /
                                              @if ($item->clr!='no')
                                                  {{$item->clr}}
                                              @else
                                                  --
                                              @endif
          
                                            </td>
          
          
          
                                            <td> 
                                                  
                                                  @if ($item->isCustomerReceived==1)
                                                      <span class="badge badge-success">Completed</span>
                                                  
                                                  @elseif($item->isWarehouseSend==1)
                                                      <span class="badge badge-primary">Almost Done</span>
                                                  
                                                  @elseif($item->isWarehouseReceived==1)
                                                      <span class="badge badge-info">In Pickup Point</span>
          
                                                  @elseif($item->isShopSend==1)
                                                      <span class="badge badge-warning">Progressing</span>
                                                  @else
                                                      <span class="badge badge-danger">New</span>
                                                  @endif
                                          
                                            </td>
                                            
                                            <td>                                                
                                              <a href="{{URL::to('admin/view-order-details-'.$item->id)}}" data-toggle="tooltip" data-original-title="View Details" target="_blank"> <span class="font-weight-bold">Details</span> </a> 
                                            </td>
                                        
                                        </tr>
                                          @endforeach
                                          
                                        </tbody>
                                    
                                       

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-store"></i> Shipping Address</h4> 
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
                                </dl>
                            </div>
                        </div>


                    </div>

                </div>


                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0 font-weight-bold"> Customer </h6></div>
                    </div>
                </div>

                <div class="row mt-4">

                    <div class="col-md-3 mt-1">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                            
				                <a href="{{URL::to('admin/view/customer/'.$user->id)}}" target="_blank">
                                    <img src="{{asset($user->avatar)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                                </a>
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </div>
        </main>
@endsection
