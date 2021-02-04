
@php
    
    $pickupPoint = DB::table('warehouses')->where('w_status','active')->get();
@endphp

@extends('layouts.app')
@section('content')
 
            <div class="site__body">
                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">

                                <!--PRINT AREA START-->

                                <a href="javascript:void(0);" onclick="printPageArea('printableArea')">Print</a>


                                <div id="printableArea">
                                    All the printable content goes here......
                                </div>


                                <!--PRINT AREA END-->

                        <div class="row">

                            <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                                <div class="card">
                                    <div class="order-header">



                                        <h5 class=" font-weight-bold"> <span class="text-dark">#INVOICE</span> <span class="text-danger">EBP-{{$invoice_data->id}}</span> 
                                        
                                                @if ($invoice_data->isCustomerReceived=='1')
                                                    <span class="ml-3 text-success">Complete</span>
                                                @elseif($invoice_data->isWarehouseSend=='1')
                                                    <span class="ml-3 text-info">Almost Done! Waiting for Customer Receive!</span>
                                                @elseif($invoice_data->isWarehouseReceived=='1')
                                                    <span class="ml-3 text-info">Received By Pickup Point</span>
                                                @elseif($invoice_data->isShopSend=='1')
                                                    <span class="ml-3 text-primary">Pickup Point Pending!</span>
                                                @else 
                                                    <span class="ml-3 text-danger">New Order!</span>
                                                @endif
                                        </h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table >
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Product code</th>
                                                        <th>Quantity</th>
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="card-table__body card-table__body--merge-rows">
                                                    
                                                    
                                                    <tr>
                                                        
                                                        <td>
                                                            <a style="text-decoration: none;" target="_blank" href="{{URL::to($invoice_data->un_id.'/'.Str::slug($invoice_data->product_name))}}">{{$invoice_data->product_name}}</a>
                                                        </td>
                                                        <td>{{$invoice_data->product_code}}  </td>
                                                        <td> {{$invoice_data->qty}}</td>
                                                        <td> 
                                                                @if ($invoice_data->sz=='no')
                                                                    N/A
                                                                @else
                                                                    {{$invoice_data->sz}}
                                                                @endif

                                                        </td>
                                                        <td> 
                                                            @if ($invoice_data->clr=='no')
                                                            N/A
                                                        @else
                                                            {{$invoice_data->clr}}
                                                        @endif
                                                    </td>
                                                        <td class="text-success"> 
                                                            
                                                            @if ($invoice_data->isCustomerReceived=='1')
                                                                <span class="text-info">Complete</span>
                                                            @elseif ($invoice_data->isWarehouseSend=='1')
                                                                <span class="text-info">Pending</span>
                                                            @elseif ($invoice_data->isWarehouseReceived=='1')
                                                                <span class="text-info">Received</span>
                                                            @elseif($invoice_data->isShopSend)
                                                                <span class="text-primary">Pending</span>
                                                            @else 
                                                                <span class="text-danger">In Shop</span>
                                                            @endif
                                                            
                                                            
                                                        </td>
                                              
                                                    </tr>
                                                </tbody>
                                                
                                            </table>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <ul style="list-style: none;">
                                                        <li style="font-size: 14px;"><span class="font-weight-bold" >Pay Amount </span><span style="opacity: 0;">------</span> ৳ {{$invoice_data->pay_price}}</li>
                                                        <li style="font-size: 14px;"><span class="font-weight-bold" >Transaction ID </span><span style="opacity: 0;">--</span> {{$invoice_data->transaction_id}} </li>
                                                        <li style="font-size: 14px;"><span class="font-weight-bold" >Order ID </span><span style="opacity: 0;">----------</span> {{$invoice_data->order_id}} </li>
                                                       
                                                    </ul>
                                                </div>

                                                <div class="col-md-7">
                                                    <ul style="list-style: none;">
                                                        <li class="text-secondary"><span class="font-weight-bold" style="font-size: 12px;">Order Date </span><span style="opacity: 0;"> ------------ - </span> {{$invoice_data->order_date}}-{{$invoice_data->order_time}}</li>
                                                        
                                                        @if ($invoice_data->ssd!=null)
                                                            <li class="text-secondary"><span class="font-weight-bold" style="font-size: 12px;">Shop Send </span><span style="opacity: 0;">--------------</span> {{$invoice_data->ssd}}-{{$invoice_data->sst}} </li>
                                                        @endif

                                                        @if ($invoice_data->prd!=null)
                                                            <li class="text-secondary"><span class="font-weight-bold" style="font-size: 12px;">Pickup Point Received </span><span style="opacity: 0;">- - </span> {{$invoice_data->prd}}-{{$invoice_data->prt}} </li>
                                                        @endif

                                                        @if ($invoice_data->psd!=null)
                                                            <li class="text-secondary"><span class="font-weight-bold" style="font-size: 12px;">Pickup Point Send </span><span style="opacity: 0;">----------</span> {{$invoice_data->psd}}-{{$invoice_data->prt}} </li>
                                                        @endif

                                                        @if ($invoice_data->crd!=null)
                                                            <li class="text-secondary"><span class="font-weight-bold" style="font-size: 12px;">Customer Received </span><span style="opacity: 0;">----------</span> {{$invoice_data->crd}}-{{$invoice_data->crt}} </li>
                                                        @endif


                                                    </ul>
                                                </div>
                                                
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <p class="text-secondary" style="text-align: center;">
                                            
                                            @if ($who_order!=null)
                                                @if ($who_order->name!=null)
                                                {{$who_order->name}} ({{$who_order->phone}}) Order this product at {{$invoice_data->order_date}} - {{$invoice_data->order_time}}
                                                @elseif($who_order->phone!=null)
                                                    {{$who_order->phone}} Order this product at {{$invoice_data->order_date}} - {{$invoice_data->order_time}}
                                                @endif
                                            @endif
                                            
                                        </p>
                                    </div>
                                </div>

                                <div class="row mt-3 no-gutters mx-n2">
                                    <div class="col-sm-6 col-12 px-2">
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Billing Address</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name"> <span style="font-size: 18px;">From</span>: {{$invoice_data->b_name}}</div>
                                                <div class="address-card__row text-secondary">
                                                    <span style="color: #000">Area/Village</span>: <span style="opacity: 0;">--</span> {{$invoice_data->b_area}} <br>
                                                    <span style="color: #000">Post Code</span>: <span style="opacity: 0;">-- -</span> {{$invoice_data->b_postcode}} <br />
                                                    <span style="color: #000">Thana</span>: <span style="opacity: 0;">--------</span> {{$invoice_data->b_thana}} <br />
                                                    <span style="color: #000">District</span>: <span style="opacity: 0;">-------</span> {{$invoice_data->b_district}} <br>
                                                    <span style="color: #000">Address</span>: <span style="opacity: 0;">------</span> {{$invoice_data->billing_address}}
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content"><i class="fas fa-phone-alt"></i> <span class="font-weight-bold">{{$invoice_data->b_phone}}</span></div>

                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content"><i class="far fa-envelope"></i> {{$invoice_data->b_email}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                                        
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Shipping Address</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name">  
                                                    <span style="font-size: 18px;">To</span>: {{$invoice_data->s_name}} 
                                                </div>
                                                <div class="address-card__row text-secondary">
                                                    <span style="color: #000">Area/Village</span>: <span style="opacity: 0;">--</span> {{$invoice_data->s_area}} <br>
                                                    <span style="color: #000">Post Code</span>: <span style="opacity: 0;">-- -</span> {{$invoice_data->s_postcode}} <br />
                                                    <span style="color: #000">Thana</span>: <span style="opacity: 0;">--------</span> {{$invoice_data->s_thana}} <br />
                                                    <span style="color: #000">District</span>: <span style="opacity: 0;">-------</span> {{$invoice_data->s_district}} <br>
                                                    <span style="color: #000">Address</span>: <span style="opacity: 0;">------</span> {{$invoice_data->shipping_address}}

                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content"><i class="fas fa-phone-alt"></i> <span class="font-weight-bold">{{$invoice_data->s_phone}}</span></div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content"><i class="far fa-envelope"></i> {{$invoice_data->s_email}}</div>
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


            <script>
                function printPageArea(areaID){
                var printContent = document.getElementById(areaID);
                var WinPrint = window.open('', '', 'width=900,height=650');
                WinPrint.document.write(printContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                
}
            </script>

@endsection
