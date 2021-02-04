
@extends('layouts.app')
@section('content')


            <!-- site__header / end --><!-- site__body -->
            <div class="site__body">
                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">


                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header  justify-content-between align-items-center">                               
                                        <h4 class="card-title">Order Processing Steps</h4> 
                                    </div>
                                    <div class="card-body">
                                        <div class="progress" style="height: 25px;">
        
                                            <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Vendor Just Received Order</div>
                                            
                                            {{-- @if ($order_child->isShopSend==1)
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
                                            @endif --}}
                                            
                                            
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            
                            <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                                <div class="card">
                                    <div class="order-header">

                                        <h5 class="font-weight-bold">#INVOICE : <span class="text-danger">EBP-{{$invoice_data->id}}</span> </h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table class="text-secondary">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Code</th>
                                                        <th>QTY</th>
                                                        <th>Size-Color</th>
                                                      
                                                        <th>Status</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="card-table__body card-table__body--merge-rows">

                                                    

                                                    @php
                                                    $sl = 1;
                                                        $id     =    $invoice_data->product_ids;
                                                        $ids    =    explode (",", $id);

						         $order_id = $invoice_data->id;


							$single_product = DB::table('order_childs')
                                                                ->join('users','users.id','order_childs.shop_id')
                                                                ->join('orders','orders.id','order_childs.order_id')
                                                                ->join('products','products.id','order_childs.product_id')
                                                                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.transaction_id','orders.billing_address','orders.b_name','orders.b_email','orders.b_phone','orders.b_postcode','orders.b_thana','orders.b_area','orders.b_district','orders.shipping_address','orders.s_name','orders.s_email','orders.s_phone','orders.s_postcode','orders.s_thana','orders.s_area','orders.s_district','orders.total_product','orders.order_date','orders.pay_price','products.product_name','products.image_one','products.product_code','products.un_id')
                                                                ->where('order_childs.order_id',$order_id)->get();

                                                    @endphp
                                                    
                                                    @foreach ($single_product as $item)

                                                    <tr>
                                                        <td>{{$sl++}}  </td>

                                                        <td>{{$item->product_name}}  </td>

                                                        <td>{{$item->product_code}}  </td>

                                                        <td> {{$item->qty}}</td>
                                                        <td> 
                                                            @if ($item->sz =='no')
                                                                N/A
                                                            @else
                                                                {{$item->sz}}
                                                             @endif
                                                             -
                                                             @if ($item->clr =='no')
                                                                N/A
                                                            @else
                                                                {{$item->clr}}
                                                             @endif

                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            @if ($item->isCustomerReceived=='1')
                                                                <span class="badge badge-success ">Complete</span>

                                                            @elseif($item->isWarehouseSend=='1')
                                                            <span class="badge badge-info ">Comming...</span>

                                                            @elseif($item->isWarehouseReceived=='1')
                                                            <span class="badge badge-primary">Packing</span>

                                                            @elseif($item->isShopSend=='1')
                                                            <span class="badge badge-warning ">Processing</span>

                                                            @else 
                                                            <span class="badge badge-dark ">Pending</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <a href=""> <i class="fas fa-mouse"></i> </a>
                                                        </td>


                                                    </tr>

                                                    @endforeach
                                                    
                                                   
                                                </tbody>
                                                
                                                
                                            </table>
                                            
                                            <table class="text-secondary" style="font-size: 14px;">
                                                <tr>
                                                    <th>Pay Amount</th>
                                                    <td>৳ {{$invoice_data->pay_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Transaction Id</th>
                                                    <td>{{$invoice_data->transaction_id}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Method</th> 
                                                    <td>
                                                        @if ($invoice_data->pay_method=='ssl')
                                                            SSL Payment Gateway
                                                        @elseif($invoice_data->pay_method=='ebp_mb')
                                                            eBipone Balance (Main Balance)
                                                        @elseif($invoice_data->pay_method=='ebp_mbcbb')
                                                            eBipone Balance (Main Balance + Cashback Balance)
                                                        @elseif($invoice_data->pay_method=='ebp_mbgftb')
                                                            eBipone Balance (Main Balance + Gift Balance)

                                                        @endif
                                                    </td>
                                                </tr>
                                                    <tr>
                                                    <th>Date & time</th>
                                                    <td>{{$invoice_data->order_date}} - {{$invoice_data->order_time}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 no-gutters mx-n2 text-secondary">
                                    <div class="col-sm-6 col-12 px-2">
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Billing Address</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name"> From: {{$invoice_data->b_name}}</div>
                                                <div class="address-card__row">
                                                    Post code: {{$invoice_data->b_postcode}} <br />
                                                    Thana: {{$invoice_data->b_thana}} <br />
                                                    Area: {{$invoice_data->b_area}} <br>
                                                    District: {{$invoice_data->b_district}} <br>
                                                    Address: {{$invoice_data->billing_address}}
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content">{{$invoice_data->b_phone}}</div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content">{{$invoice_data->b_email}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3 text-secondary">
                                        
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Shipping Address</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name">  
                                                    To: {{$invoice_data->s_name}} 
                                                </div>
                                                <div class="address-card__row">
                                                    
                                                    Post code: {{$invoice_data->s_postcode}} <br />
                                                    Thana: {{$invoice_data->s_thana}} <br />
                                                    Area: {{$invoice_data->s_area}} <br>
                                                    District: {{$invoice_data->s_district}} <br>
                                                    Address: {{$invoice_data->shipping_address}}

                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content">{{$invoice_data->s_phone}}</div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content"> {{$invoice_data->s_email}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="block-space block-space--layout--before-footer"></div>
            </div>



@endsection
