
@extends('layouts.app')
@section('content')

            <!-- site__header / end --><!-- site__body -->
            <div class="site__body">
                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">
                        <div class="row">
                            
                            <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                                <div class="card">
                                    <div class="order-header">
                                        <h5 class="font-weight-bold">Order Details (EBP-{{$order_child->id}})</h5>
                                    </div>
                                    
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table>
                                                <thead>

                                                    <tr>
                                                        
                                                        <th>Product</th>
                                                        <th>Qty</th>
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Paid</th>
                                                    </tr>

                                                </thead>
                                                <tbody class="card-table__body card-table__body--merge-rows">
                                                    
                                                     
                                                    <tr>
                                                        
                                                        <td> {{$product->product_name}} </td>
                                                        <td> {{$order_child->qty }}</td>
                                                        <td> 
                                                            @if($order_child->sz=='no')
                                                                N/A 
                                                            @else
                                                            {{$order_child->sz}}
                                                            @endif  
                                                        </td>
                                                        <td> 
                                                            @if($order_child->clr=='no')
                                                                N/A 
                                                            @else
                                                            {{$order_child->clr}}
                                                            @endif 

                                                        </td>
                                                        <td>৳ {{$order_child->selling_price_for_this }} </td>
                                                    </tr>
                                                    
                                                    
                                                </tbody>
                                                
                                            
                                            </table>
                                            <table class="mt-3 text-secondary">
                                                <tbody class="card-table__body card-table__body--merge-rows">
                                                    <tr>
                                                        <th style="font-size: 14px;">Order Date & Time</th>
                                                        <td>{{$order->order_date}} - {{$order->order_time}}</td>
                                                    </tr>
                                                    @if ($order_child->prd!=null)
                                                        <tr>
                                                            <th style="font-size: 14px;">Pickup Point Received</th>
                                                            <td>{{$order_child->prd}} - {{$order_child->prt}}</td>
                                                        </tr>
                                                    @endif
                                                    @if ($order_child->psd!=null)
                                                        <tr>
                                                            <th style="font-size: 14px;">Pickup Point Send</th>
                                                            <td>{{$order_child->psd}} - {{$order_child->pst}}</td>
                                                        </tr>
                                                    @endif

                                                    @if ($order_child->crd!=null)
                                                        <tr>
                                                            <th style="font-size: 14px;">Customer Received</th>
                                                            <td>{{$order_child->crd}} - {{$order_child->crt}}</td>
                                                        </tr>

                                                    @endif
                                                    
                                                    <tr>
                                                        <th style="font-size: 14px;">Delivery Charge</th>
                                                        <td>৳ </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-3 no-gutters mx-n2">
                                    <div class="col-sm-6 col-12 px-2">
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Billing Address</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name"> From: {{$order->b_name}}</div>
                                                <div class="address-card__row">
                                                    Post code: {{$order->b_postcode}} <br />
                                                    Thana: {{$order->b_thana}} <br />
                                                    Area: {{$order->b_area}} <br>
                                                    District: {{$order->b_district}} <br>
                                                    Address: {{$order->billing_address}}
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content">{{$order->b_phone}}</div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content">{{$order->b_email}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                                        
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Shipping Address</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name">  
                                                    To: {{$order->s_name}} 
                                                </div>
                                                <div class="address-card__row">
                                                    
                                                    Post code: {{$order->s_postcode}} <br />
                                                    Thana: {{$order->s_thana}} <br />
                                                    Area: {{$order->s_area}} <br>
                                                    District: {{$order->s_district}} <br>
                                                    Address: {{$order->shipping_address}}

                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content">{{$order->s_phone}}</div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content"> {{$order->s_email}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                {{-- <div class="row mt-4">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                            token="if you have any token validation"
                                            postdata="your javascript arrays or objects which requires in backend"
                                            order="If you already have the transaction generated for current order"
                                            endpoint="{{ url('/pay-via-ajax/'.$data['amount']) }}"> Pay Now 
                                        </button>
                                    </div>
                                    <div class="col-md-4"></div>

                                </div> --}}
                            </div>
                        </div>

                        
                    </div>
                </div>
                

                <div class="block-space block-space--layout--before-footer"></div>
            </div>



@endsection
