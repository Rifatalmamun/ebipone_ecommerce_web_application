
@php
$profit_table = DB::table('profit_manages')->where('id',1)->first();
$get_payment_method='';

@endphp

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
                                <div >
                                    <h5 class="m-2 text-dark font-weight-bold">#Payment <span class="text-primary">Invoice</span></h5>
                                </div>
                                {{-- <div class="card-divider"></div> --}}
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table style="font-size: 14px;" class="mt-2">
                                            <thead style="background: #eaf0f5;">
                                                <tr>
                                                    <th style="font-size: 11px;">Product</th>
                                                    <th style="font-size: 11px;">Quantity </th>
                                                    <th style="font-size: 11px;">Size & Color</th>
                                                    <th style="font-size: 11px;">Unit Price</th>
                                                    <th style="font-size: 11px;">Total</th>
                                                    <th style="font-size: 11px;">Get Cashback</th>
                                                    <th style="font-size: 11px;">Use Cashback</th>
                                                    <th style="font-size: 11px;">Use Gift Balance</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="card-table__body card-table__body--merge-rows text-secondary">

                                                @php
                                                    $total_use_cashback = 0;
                                                    $total_get_cashback = 0;
                                                    $total_use_giftbalance = 0;
                                                @endphp
                                                
                                                @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td> 
                                                        @php
                                                                $slice_name =  substr($item->name, 0, 18);

                                                                // get product 
                                                                $product = DB::table('products')->where('id',$item->id)->first();
                                $get_payment_method = $product->pay_method;
                                                        @endphp

                                                    <a href="{{URL::to($product->un_id.'/'.Str::slug($product->product_name))}}" style="text-decoration: none;">{{$slice_name}}</a> 

                                                    </td>
                                                    <td> 
                                                        @if ($item->qty<10)
                                                        0{{$item->qty}}
                                                        @else
                                                        {{$item->qty}}   
                                                        @endif

                                                    </td>
                                                    <td> @if ($item->options->color=='no')
                                                        N/A
                                                    @else
                                                        {{$item->options->color}}
                                                    @endif - 
                                                
                                                    @if ($item->options->size=='no')
                                                    N/A
                                                @else
                                                    {{$item->options->size}}
                                                @endif
                                                </td>
                                                    @php
                                                    // Calculate single product cashback,giftbalance

                                                        $product = DB::table('products')->where('id',$item->id)->first();

                                                        $price = $product->present_price * $item->qty;

                                                        $getCashbackTk =  ($price * $product->cashback )/100  ;
                                                        $total_get_cashback+=$getCashbackTk;

                                                        $useCashbackTk = ($price * $product->cashback_use )/100 ;
                                                        $total_use_cashback+=$useCashbackTk;

                                                        $useGiftTk = ($price * $product->gift_use )/100 ;
                                                        $total_use_giftbalance+=$useGiftTk;


                                                    @endphp
                                                

                                                    <td>৳ {{$item->price}}</td>
                                                    <td>৳ {{$item->price * $item->qty}}</td>

                                                    <td>৳ {{$getCashbackTk}} ({{$product->cashback}})%</td>
                                                    <td>৳ {{$useCashbackTk}} ({{$product->cashback_use}})%</td>
                                                    <td>৳ {{$useGiftTk}} ({{$product->gift_use}})%</td>

                                                    
                                                </tr>
                                                @endforeach
                                                
                                               
                                            </tbody>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                                <tr style="font-size: 13px;">
                                                    <th >Subtotal</th>
                                                    <td>৳ {{Cart::subtotal()}}</td>
                                                </tr>
                                                <tr style="font-size: 13px;">
                                                    <th>Shipping Charge</th>
                                                    <td>৳ {{$profit_table->shipping_charge}} <small>pay after receive product</small> </td>
                                                </tr>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr style="font-size: 13px;">
                                                    <th>Total</th>
                                                    <td>৳ {{Cart::total()}}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                

                            </div>
                            <div class="row mt-3 no-gutters mx-n2 text-secondary" >
                                <div class="col-sm-6 col-12 px-2">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge" style="color: #0D6EAD; font-weight: bold;"> Shipping Address </div>
                                        <div class="address-card__body">
                                            <div class="address-card__name">  
                                                {{$data['s_name']}}   
                                            </div>
                                            <div class="address-card__row">
                                                
                                                Post code: {{$data['s_postcode']}} <br />
                                                Thana: {{$data['s_thana']}} <br />
                                                Area: {{$data['s_area']}} <br>
                                                District: {{$data['s_district']}} 

                                                Address: {{$data['shipping_address']}} 

                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Phone Number</div>
                                                <div class="address-card__row-content">{{$data['s_phone']}}  </div>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Email Address</div>
                                                <div class="address-card__row-content"> {{$data['s_email']}} </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3 text-secondary">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge" style="color: #0D6EAD; font-weight: bold;">Billing Address</div>
                                        <div class="address-card__body">
                                            <div class="address-card__name"> {{$data['b_name']}} </div>
                                            <div class="address-card__row">
                                                Post code: {{$data['b_postcode']}} <br />
                                                Thana: {{$data['b_thana']}} <br />
                                                Area: {{$data['b_area']}} <br>
                                                District: {{$data['b_district']}} 

                                                Address: {{$data['billing_address']}} 
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Phone Number</div>
                                                <div class="address-card__row-content">{{$data['b_phone']}}</div>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Email Address</div>
                                                <div class="address-card__row-content">{{$data['b_email']}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="card">
                                <div class="alert" role="alert" style="background: #EAF0F5;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            Main Balance: <span class="font-weight-bold text-dark">৳ {{Auth::user()->user_balance}}</span> 
                                        </div>
                                        <div class="col-md-4">
                                            Cashback Balance: <span class="font-weight-bold text-dark">৳ {{Auth::user()->user_cashback}} </span> 
                                        </div>
                                        <div class="col-md-4">
                                            Gift Balance: <span class="font-weight-bold text-dark">৳ {{Auth::user()->user_giftbalance}}</span> 
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>





                            <div class="row mt-4">
                                
                                <div class="col-md-5">
                
                            @if ($get_payment_method=='1' || $get_payment_method=='3')
                
                                    <button class="btn btn-lg btn-block" id="sslczPayBtn"
                                        token="if you have any token validation"
                                        postdata="your javascript arrays or objects which requires in backend"
                                        order="If you already have the transaction generated for current order"
                                        endpoint="{{ url('/pay-via-ajax/') }}" style="background: #166FB0; color: #fff;"> Direct Pay <small style="font-size: 12px;"> ৳ {{Cart::total()}} </small>
                                    </button>
                            @else
                                    <p><span class="text-secondary font-weight-bold">This order package not support Direct Pay method.</span></p>
                                    <p><span class="text-secondary font-weight-bold">So You need to use eBipone Balance to Payment.</span></p>
                            @endif


                                   <div>
                                        <p style="display: block; margin: 10px;margin-top: 25px;text-align: center;">
                                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin: 15px;text-align: center;">
                                                <span class="text-primary font-weight-bold" style="font-size: 18px;"><i class="fas fa-cloud-upload-alt"></i> Upload Money</span> 
                                            </a>
                                        </p>

                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                              
                                                <form action="{{route('uploadMoney')}}" method="POST">
                                                    @csrf
                                
                                                    <div class="form-group">
                                                        <label for="up" class="text-secondary">Amount</label>
                                                        <input id="up" type="number" name="amount" class="form-control w-75" placeholder="" min="{{$profit_table->min_upload}}" required>
                                
                                                        <small class="text-secondary">Minimum ৳ {{$profit_table->min_upload}}</small> 
                                                    </div>
                                
                                                    <input type="submit" class="btn btn-sm btn-dark">
                                                </form>
                                
                                            </div>
                                          </div>
                                   </div>

                                </div>

                                <div class="col-md-7">

                                        {{-- <a class="btn btn-lg btn-danger btn" style="text-align: center; display: block;" data-toggle="collapse" href="#useEbiponeBalance" role="button" aria-expanded="false" aria-controls="useEbiponeBalance">
                                            Use eBipone Balance 
                                        </a> --}}

                                        @php
                                            
                                        $need_to_upload_by_using_only_main_balance = Cart::total() - Auth::user()->user_balance;
                                        
                                        $need_to_upload_by_using_main_balance_and_cashback = Cart::total() -($total_use_cashback + Auth::user()->user_balance) ;
                                
                                        $need_to_upload_by_using_main_balance_and_gift = Cart::total() -($total_use_giftbalance + Auth::user()->user_balance) ;
                                
                                    @endphp

                    @if($get_payment_method!='3')

                                        <form action="{{route('payWitheBiponeBalance')}}" method="POST">
                                            @csrf

                                            <!--Start:  Need some payment data to pass controller--> 

                                            <!--BILLING ADDRESS-->
                                            <input type="hidden" name="billing_address" value="{{$data['billing_address']}}">
                                            <input type="hidden" name="b_name" value="{{$data['b_name']}}">
                                            <input type="hidden" name="b_email" value="{{$data['b_email']}}">
                                            <input type="hidden" name="b_phone" value="{{$data['b_phone']}}">
                                            <input type="hidden" name="b_postcode" value="{{$data['b_postcode']}}">
                                            <input type="hidden" name="b_thana" value="{{$data['b_thana']}}">
                                            <input type="hidden" name="b_area" value="{{$data['b_area']}}">
                                            <input type="hidden" name="b_district" value="{{$data['b_district']}}">
                                            
                                            <!--SHIPPING ADDRESS-->
                                            <input type="hidden" name="shipping_address" value="{{$data['billing_address']}}">
                                            <input type="hidden" name="s_name" value="{{$data['s_name']}}">
                                            <input type="hidden" name="s_email" value="{{$data['s_email']}}">
                                            <input type="hidden" name="s_phone" value="{{$data['s_phone']}}">
                                            <input type="hidden" name="s_postcode" value="{{$data['s_postcode']}}">
                                            <input type="hidden" name="s_thana" value="{{$data['s_thana']}}">
                                            <input type="hidden" name="s_area" value="{{$data['s_area']}}">
                                            <input type="hidden" name="s_district" value="{{$data['s_district']}}">
                                            


                                            <!--End:  Need some payment data to pass controller-->
        
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <h6 style="font-size: 14px;" class="text-secondary">Total Bill : ৳ {{Cart::total()}} || Get Cashback: ৳ {{$total_get_cashback}} || Use Cashback: ৳ {{$total_use_cashback}} || Use Gift Balance: ৳ {{$total_use_giftbalance}}</h6>
                                                    <hr>
                                                    <h6 style="font-size: 15px;margin: 15px 0;">-- Select eBipone Pay Option -- <small id="errorMessage" class="font-weight-bold text-danger"></small></h6>
                                                        
                                                               
                                                    {{-- Main Balance: {{Auth::user()->user_balance}} || Cashback Balance: {{Auth::user()->user_cashback}} || Gift Balance: {{Auth::user()->user_giftbalance}} 
                                                    <br>
                                                    Use Cashback: {{$total_use_cashback}} || Get Cashback: {{$total_get_cashback}} || Gift Balance: {{$total_use_giftbalance}}  --}}
                                                    
                                                    
        
                                                    <input id="first" type="radio" name="pay_with_ebipone_balance" value="1" required> 
        
                                                    @if ( Auth::user()->user_balance < Cart::total() )               
                                                    
                                                    <label onclick="dissable_pay('Alert! Upload money!')" for="first">Only Main Balance 
                                                            <small class="text-danger font-weight-bold"> 
                                                                You Need to Upload ৳ {{$need_to_upload_by_using_only_main_balance}}
                                                            </small>  
                                                    </label>

                                                    @else 
                                                        <label onclick="enable_pay()" for="first">Only Main Balance </label>
                                                    @endif
        
                                                    <br><br>
        
                                                        <input id="second" type="radio" name="pay_with_ebipone_balance" value="2"> 
                                                        
        
                                                    @if ( Auth::user()->user_cashback <$total_use_cashback ) 
        
                                                    <label onclick="dissable_pay('Cashback Balance Insufficient!')" for="second">Main Balance + Cashback Balance <small class="text-danger font-weight-bold">insufficient Cashback to use</small> </label>
                                                            
                    @elseif( (Cart::total() - $total_use_cashback) > Auth::user()->user_balance )

                                                    <label onclick="dissable_pay('Alert! Upload money!')" for="second">Main Balance + Cashback Balance
                                                        <small class="text-danger font-weight-bold"> 
                                                           Need to Upload ৳ {{$need_to_upload_by_using_main_balance_and_cashback}}
                                                        </small>
                                                    </label>
                                                    
                                                    @else
                                                        <label onclick="enable_pay()" for="second">Main Balance + Cashback Balance </label>

            {{-- @php

                $sub = Cart::total() - $total_use_cashback;

                echo $sub;

                echo ' ';
                                                    
                $c =  (Auth::user()->user_balance + ($sub));
                echo $c;
            @endphp --}}

                                                    @endif
        
                                                    <br><br>
        
                                                   
                                                        <input id="third" type="radio" name="pay_with_ebipone_balance" value="3"> 
                                                        
                                                        
                                                        @if ( Auth::user()->user_giftbalance <$total_use_giftbalance ) 
                                                            <label onclick="dissable_pay('Gift Balance Insufficient!')" for="third">Main Balance + Gift Balance 
                                                                <small class="text-danger font-weight-bold">
                                                                    insufficient Gift Balance to use
                                                                </small>
                                                            </label>
        
                                                        
                                                        @elseif( (Cart::total() - $total_use_giftbalance) > Auth::user()->user_balance )

                                                            <label onclick="dissable_pay('Alert! Upload money!')" for="third">Main Balance + Gift Balance 
                                                                <small class="text-danger font-weight-bold"> 
                                                                    Need to Upload ৳ {{$need_to_upload_by_using_main_balance_and_gift}}
                                                                </small>
                                                            </label>
                                                        @else
                                                            <label onclick="enable_pay()" for="third">Main Balance + Gift Balance 
                                                                
                                                            </label>
                                                        @endif
                                                        
                                                        <br><br>
                                                    
                                                            
                                            <input type="hidden" name="total_get_cashback" value="{{$total_get_cashback}}">
                                            <input type="hidden" name="total_use_cashback" value="{{$total_use_cashback}}">
                                            <input type="hidden" name="total_use_giftbalance" value="{{$total_use_giftbalance}}">


                                                    <input id="payEbiponeButton" type="submit" class="btn btn-lg btn-block" value="Pay With eBipone Balance" style="background: #166FB0; color: #fff;">
        
                                                </div>
                                            </div>
        
                                        </form>
                

                @else 

                                        <p class="text-secondary font-weight-bold">
                                            This order package support only DIRECT PAY option. 
                                        </p>

                @endif

                                </div>

                            </div>


                            {{-- <div class="collapse" id="useEbiponeBalance">
                                dasdfdasdasdasdasdasd
                            </div> --}}





                        </div>
                    </div>
                </div>
            </div>
            

            <div class="block-space block-space--layout--before-footer"></div>
        </div>

    <script>
        function dissable_pay($message){
            

            $error = document.getElementById('errorMessage');
            $payEbiponeButton = document.getElementById('payEbiponeButton');

            $payEbiponeButton.disabled = true;   
            $error.innerHTML  = $message;

            $error.style.opacity ='1';

            setTimeout(function(){ 
                $error.style.opacity ='0';
                
            }, 20000);

            

        }
        function enable_pay(){

            $payEbiponeButton = document.getElementById('payEbiponeButton');

            $payEbiponeButton.disabled = false;      
        }

        
    </script>


@endsection
