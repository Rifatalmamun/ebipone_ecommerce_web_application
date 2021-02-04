
@php
    
    // auth order 
    $auth_order = DB::table('orders')->where('who_orders',Auth::user()->id)->where('status','complete')->where('reason','order_product')->orderBy('id','DESC')->get(); 
    $auth_order_count = DB::table('orders')->where('who_orders',Auth::user()->id)->where('status','complete')->where('reason','order_product')->count();
    
    // auth money upload
    $auth_money_upload = DB::table('orders')->where('who_orders',Auth::user()->id)->where('status','complete')->where('reason','money_upload')->orderBy('id','DESC')->get(); 

    $auth_money_upload_count = DB::table('orders')->where('who_orders',Auth::user()->id)->where('status','complete')->where('reason','money_upload')->count();

    // auth transaction

    $auth_transaction = DB::table('orders')->where('who_orders',Auth::user()->id)->where('status','complete')->orderBy('id','DESC')->get(); 
    $auth_transaction_count = DB::table('orders')->where('who_orders',Auth::user()->id)->where('status','complete')->count();
    
    $countNewOrder = DB::table('order_childs')
                        ->join('orders','orders.id','order_childs.order_id')
                        ->join('users','users.id','order_childs.shop_id')
                        ->join('products','products.id','order_childs.product_id')
                        ->select('order_childs.*','users.shop_name','products.un_id','products.product_name','products.image_one','orders.finalStatus','orders.admin_status','orders.order_date','orders.s_district','orders.s_area')
                        ->where('order_childs.shop_id',Auth::user()->id)
                        ->where('order_childs.isShopReceived','1')
                        ->where('order_childs.isShopSend','0')
                        ->where('order_childs.isWarehouseReceived','0')
                        ->where('order_childs.isWarehouseSend','0')
                        ->where('orders.finalStatus','pending')
                        ->where('orders.status','complete')->count();

    
    // auth warehouse 
    $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        $countAuthPickupPointNewOrder = DB::table('order_childs')
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


	$profit_manages = DB::table('profit_manages')->where('id','1')->first();

@endphp

@extends('layouts.app')
@section('content')

<!-- Profile dashboard banner  -->



<div class="site__body ">
<br>
    <div class="block-features block " style="height: auto; width: 100%; box-shadow: 10px  #ffffff; border-radius: 5px;">
        <div class="container ">
            <ul class="block-features__list shadow-sm bg-white">
                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                  
                    </div>
                    <div class="block-features__item-info">
                        <div class="block-features__item-title"><i class="far fa-money-bill-alt"></i> Main Balance</div>
                        <div class="block-features__item-subtitle">৳ {{Auth::user()->user_balance}}</div>
                    </div>
                </li>
                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <i class="fa fa-money " style="font-size: 25px; color: #92c8fa; "></i>
                        
                    </div>
                    <div class="block-features__item-info">
                        <div class="block-features__item-title"><i class="far fa-money-bill-alt"></i> Cashback Balance</div>
                        <div class="block-features__item-subtitle">৳ {{Auth::user()->user_cashback}}</div> 
                    </div>
                </li>
                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                  
                    </div>
                    <div class="block-features__item-info">
                        <div class="block-features__item-title"><i class="fas fa-gift"></i> Gift Balance</div>
                        <div class="block-features__item-subtitle">৳ {{Auth::user()->user_giftbalance}}</div>
                    </div>
                </li>
                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                  
                    </div>
                    <div class="block-features__item-info">
                        <div class="block-features__item-title"> <a href="{{route('my.gift.pending')}}"><i class="fas fa-hourglass-half"></i> Gift Pending</a> </div>
                        <div class="block-features__item-subtitle">৳ {{Auth::user()->gift_pending}}</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>




    {{-- <div class="form-group">
        <button class="btn btn-primary btn-sm">Button Small</button>
    </div> --}}

    <div class="container mt-3">
        <p>
            <a class="btn btn-sm btn-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-upload"></i> Upload Money 
            </a>

            @if(Auth::user()->first_upload==0)
                    <div class="card">
                            <div class="alert" role="alert" style="background: #e7f3fd">
                                    <span class="font-weight-bold" style="font-size: 13px;">Only for First Upload, You will get 100% Cashback in your Gift balance.</span>
                            </div>
                    </div>
		
                
            @endif

          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              
                <form action="{{route('uploadMoney')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="up" class="text-secondary">Amount</label>
                        <input id="up" type="number" name="amount" class="form-control w-75" placeholder="" min="{{$profit_manages->min_upload}}" required>

                        <small>You need to upload minimum ৳ {{$profit_manages->min_upload}}</small> 
                    </div>

                    <input type="submit" class="btn btn-sm btn-dark">
                </form>

            </div>
          </div>
    </div>

    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-3 d-flex">
                    <div class="account-nav flex-grow-1">
                        <h4 class="account-nav__title">{{Auth::user()->name}}</h4>
                        <ul class="account-nav__list">
                            <li class="account-nav__item account-nav__item--active"><a href="{{route('home')}}"> <i class="fas fa-tachometer-alt mr-1"></i> Dashboard</a></li>
                            
                            
                            @if (Auth::user()->isVendor=='0')
                                <li class="account-nav__item"><a href="{{route('shop.create')}}"><i class="fab fa-shopify mr-1"></i> Create Shop</a></li>
                            @else
                                <li class="account-nav__item"><a href="{{route('shop')}}"><i class="fab fa-shopify mr-1"></i> My Shop
                                    @if ($countNewOrder!=0)
                                            <sup class="badge badge-danger">{{$countNewOrder}}</sup></a></li>
                                    @endif
                            @endif

                            <li class="account-nav__item"><a href="{{route('wishlist')}}"><i class="fas fa-heart mr-1"></i> My Wishlist </a></li>        
                            <li class="account-nav__item"><a href="{{route('cart')}}"><i class="fas fa-cart-arrow-down mr-1"></i> My Cart</a></li>  
                            <li class="account-nav__item"><a href="{{route('transactionHistory')}}"><i class="fas fa-history mr-1"></i> Transaction History</a></li>     
                                                                                    
                            @if (Auth::user()->isWarehouse=='0')
                                {{-- <li class="account-nav__item"><a href="{{route('warehouse.create')}}"><i class="fas fa-warehouse mr-1"></i> Apply for Pickup Point</a></li> --}}
                            @else
                                <li class="account-nav__item"><a href="{{route('warehouse.index')}}"><i class="fas fa-warehouse mr-1"></i> Pickup Point
                                    
                                    @if ($countAuthPickupPointNewOrder!=0)
                                            <sup class="badge badge-danger">{{$countAuthPickupPointNewOrder}}</sup></a></li>
                                    @else 
                                        <sup class="badge badge-dark">0</sup></a></li>
                                    @endif
                                
                                </a>
                                
                                </li> 
                            @endif   
                            
                            <li class="account-nav__divider" role="presentation"></li>

                            <li class="account-nav__item"><a href="{{route('show.profile.edit.form')}}"><i class="fas fa-user-edit mr-1"></i> Edit Profile</a></li>       
                            <li class="account-nav__item"><a href="{{route('show.user.password.change')}}"><i class="fas fa-key mr-1"></i> Change Password</a></li>               
                            <li class="account-nav__divider" role="presentation"></li>
                            <li class="account-nav__item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="text-danger" style="font-weight: bold;"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a></li>
                                                
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf 
                            </form>

                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9 mt-1 mt-lg-0">
                    <div class="dashboard">
                        <div class="dashboard__profile card profile-card">
                            <div class="card-body profile-card__body">
                                <div class="profile-card__avatar">
                                    @if (Auth::user()->avatar==null)
                                        <img src="{{asset('public/media/profile/avtar-man.png')}}" alt="" />                                       
                                    @else
                                        <img src="{{asset(Auth::user()->avatar)}}" alt="Profile" />
                                    @endif
                                </div>
                                <div class="profile-card__name mt-1">{{Auth::user()->name}}</div>
                                <div class="profile-card__email">{{Auth::user()->email}}</div>
                                <div class="profile-card__edit"><a href="{{route('show.profile.edit.form')}}" class="btn btn-secondary btn-sm"><i class="fas fa-user-edit"></i> Edit Profile</a></div>
                            </div>
                        </div>
                        <div class="dashboard__address card address-card address-card--featured">
                            <div class="address-card__badge tag-badge tag-badge--theme"> Customer </div> 
                            <div class="address-card__body">
                                <div class="address-card__name text-secondary">Information</div>
                                <hr>
                                <div class="address-card__row">                        
                                   Area- {{Auth::user()->village}}<br />                     
                                    Thana- {{Auth::user()->ps}}<br />                                                                           
                                    Post code- {{Auth::user()->postcode}}                                         
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Phone Number</div>
                                    <div class="address-card__row-content">+88 {{Auth::user()->phone}}</div>
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Email Address</div>
                                    <div class="address-card__row-content">{{Auth::user()->email}}</div>
                                </div>
                                <div class="address-card__footer"> 
                                    @if (Auth::user()->isVendor==1)
                                    <a href="{{route('shop')}}" class="font-weight-bold text-dark" ><i class="fab fa-shopify"></i> My Shop  
                                        
                                        @if ($countNewOrder>0)
                                            <sup class="badge badge-danger">{{$countNewOrder}}</sup>
                                        
                                        @endif
                                    
                                    </a>
                                    @else
                                    <a href="{{route('shop.create')}}">Create Shop</a>                                 
                                    @endif
                                </div>
                            </div>
                        </div>

                        

					                        <!-- START : CSS TABS CONTENT-->

                          <div class="w3-bar mt-3" style="background: #F0F0F0">
                            <button id="ln" class="w3-bar-item w3-button" onclick="openCity('London')" style="background: #CCCCCC;">Recent Order</button>
                            <button id="pr" class="w3-bar-item w3-button" onclick="openCity('Paris')">Recent Money Upload</button>
                            <button id="tk" class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Recent Transaction</button>
                          </div>
                          
                          <div id="London" class="w3-container city" style="padding: 0 0; width: 100%;">
                           
                            @if ($auth_order_count==0)
                                <div class="dashboard__orders card">
                                    <div class="card-header"><h5 class="text-secondary">No recent order history!</h5></div>
                                    <div class="card-divider"></div><br>

                                    <img src="{{asset('public/media/files.png')}}" style="width: 20%;margin-left: 38%;opacity: .7;">
                                    <br>
                                </div>
                            @else
                                <div class="dashboard__orders card ">
                                    {{-- <div class="card-header"><h5>Recent Orders</h5></div>
                                    <div class="card-divider"></div> --}}
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table class="text-secondary">
                                                <thead>
                                                    <tr>
                                                        <th>Order Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                        <th>Order Status</th>
                                                        <th>Invoice</th>
                                                        

                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($auth_order as $item)

                                                        @php
                                                            
                                                            $id     =    $item->product_ids;
                                                            $ids    =    explode (",", $id);

                                                            $flag = 1;

                                                            foreach ($ids as $d) {
                                                                
                                                                $pending = DB::table('order_childs')->where('id',$id)->where('isCustomerReceived','0')->count();
                                                                
                                                                if($pending>0){
                                                                    $flag = 0 ;
                                                                }

                                                            }

                                                            
                                
                                                        @endphp


                                                        <tr>
                                                            <td> {{$item->order_date}}</td>
                                                            <td> {{$item->transaction_id}}</td> 
                                                            <td> ৳ {{$item->pay_price}}</td> 

                                                            <td>{{$item->status}}</td>
                                                            <td>{{$item->finalStatus}}</td>
                                                            <td style="text-align: left;"><a href="{{URL::to('order/invoice/'.$item->transaction_id)}}" target="_blank"> <i class="fas fa-scroll" style="font-size: 20px;"></i></a> </td>

                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            
                          </div>
                          
                          <div id="Paris" class="w3-container city" style="display:none;padding: 0 0; width: 100%;">
                            @if ($auth_money_upload_count==0)
                                <div class="dashboard__orders card">
                                    <div class="card-header"><h5 class="text-secondary">No money upload history!</h5></div>
                                    <div class="card-divider"></div><br>

                                    <img src="{{asset('public/media/files.png')}}" style="width: 20%;margin-left: 38%;opacity: .7;">
                                    <br>
                                </div>
                            @else
                                <div class="dashboard__orders card ">
                                    {{-- <div class="card-header"><h5>Recent Orders</h5></div>
                                    <div class="card-divider"></div> --}}
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table class="text-secondary">
                                                <thead>
                                                    <tr>
                                                        <th>Order Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                        <th>Invoice</th>
                                                        

                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($auth_money_upload as $item)

                                                        @php
                                                            
                                                            $id     =    $item->product_ids;
                                                            $ids    =    explode (",", $id);

                                                            $flag = 1;

                                                            foreach ($ids as $d) {
                                                                
                                                                $pending = DB::table('order_childs')->where('id',$id)->where('isCustomerReceived','0')->count();
                                                                
                                                                if($pending>0){
                                                                    $flag = 0 ;
                                                                }

                                                            }

                                                            
                                
                                                        @endphp


                                                        <tr>
                                                            <td> {{$item->order_date}}</td>
                                                            <td> {{$item->transaction_id}}</td> 
                                                            <td> ৳ {{$item->pay_price}}</td> 

                                                            <td>{{$item->status}}</td>
                                                            <td style="text-align: left;"><a href="{{URL::to('order/invoice/'.$item->transaction_id)}}" target="_blank"> <i class="fas fa-scroll" style="font-size: 20px;"></i></a> </td>

                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                          </div>
                          
                          <div id="Tokyo" class="w3-container city" style="display:none;padding: 0 0; width: 100%;">
                            @if ($auth_transaction_count==0)
                                <div class="dashboard__orders card">
                                    <div class="card-header"><h5 class="text-secondary">No transaction history!</h5></div>
                                    <div class="card-divider"></div><br>

                                    <img src="{{asset('public/media/files.png')}}" style="width: 20%;margin-left: 38%;opacity: .7;">
                                    <br>
                                </div>
                            @else
                                <div class="dashboard__orders card ">
                                    {{-- <div class="card-header"><h5>Recent Orders</h5></div>
                                    <div class="card-divider"></div> --}}
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table class="text-secondary">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                        <th>Reason</th>
                                                        <th>Invoice</th>
                                                        

                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($auth_transaction as $item)

                                                        @php
                                                            
                                                            $id     =    $item->product_ids;
                                                            $ids    =    explode (",", $id);

                                                            $flag = 1;

                                                            foreach ($ids as $d) {
                                                                
                                                                $pending = DB::table('order_childs')->where('id',$id)->where('isCustomerReceived','0')->count();
                                                                
                                                                if($pending>0){
                                                                    $flag = 0 ;
                                                                }

                                                            }

                                                            
                                
                                                        @endphp


                                                        <tr>
                                                            <td> {{$item->order_date}}</td>
                                                            <td> {{$item->transaction_id}}</td> 
                                                            <td> ৳ {{$item->pay_price}}</td> 
                                                            
                                                            <td>{{$item->status}}</td>
                                                            <td>{{$item->reason}}</td>
                                                            <td style="text-align: left;"><a href="{{URL::to('order/invoice/'.$item->transaction_id)}}"> <i class="fas fa-scroll text-danger" style="font-size: 20px;" target="_blank"></i></a> </td>

                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
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



@endsection
