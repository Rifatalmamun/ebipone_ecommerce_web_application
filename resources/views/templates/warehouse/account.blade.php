@extends('layouts.app')
@section('content')

    @if ($warehouse->w_status=='pending')
    <div class="site__body ">
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--xl">
                <div class="row">
                    <div class="col-12 col-lg-3 d-flex">
                        <div class="account-nav flex-grow-1">
                            <h4 class="account-nav__title">{{Auth::user()->name}}</h4>
                            <ul class="account-nav__list">
                                <li class="account-nav__item "><a href="{{route('home')}}"> <i class="fas fa-tachometer-alt mr-1"></i> Dashboard</a></li>
                                
                                
                                @if (Auth::user()->isVendor=='0')
                                    <li class="account-nav__item"><a href="{{route('shop.create')}}"><i class="fab fa-shopify mr-1"></i> Create Shop</a></li>
                                @else
                                    <li class="account-nav__item"><a href="{{route('shop')}}"><i class="fab fa-shopify mr-1"></i> My Shop</a></li>
                                @endif
    
                                <li class="account-nav__item"><a href="{{route('wishlist')}}"><i class="fas fa-heart mr-1"></i> My Wishlist </a></li>        
                                <li class="account-nav__item"><a href="{{route('cart')}}"><i class="fas fa-cart-arrow-down mr-1"></i> My Cart</a></li>  
                                <li class="account-nav__item"><a href="{{route('transactionHistory')}}"><i class="fas fa-history mr-1"></i> Transaction History</a></li>     
    
                                
                                <li class="account-nav__item account-nav__item--active"><a href="{{route('warehouse.index')}}"><i class="fas fa-warehouse mr-1"></i> My Warehouse</a></li> 
                              
                                
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
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-header"><h5>{{$warehouse->w_name}}</h5></div>
                            <div class="card-divider"></div>
                            <div class="card-body card-body--padding--2">
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <div class="alert alert-light" role="alert">
                                            <h4 class="alert-heading">Request Pending ...</h4>
                                            <p> We receive all of yours Warehouse information. We will verify your warehouse ( {{$warehouse->w_name}} ) information for approving your warehouse. </p>
                                            <hr />
                                            <p class="mb-0"> Please wait until ebipone confirmation. </p>
                                        </div> 
                                    </div>

                                    <a href="{{URL::to('edit/warehouse/'.$warehouse->id)}}" class="text-info"> <i class="fa fa-edit"></i> Edit Pickup Point</a> 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>

    @else
    
        @if ($warehouse->w_status=='active')
        <div class="site__body">

            @php
                $authWarehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();
            @endphp


            <div class="block-header block-header--has-breadcrumb block-header--has-title" style="margin-bottom: 0px;">
                <div class="container">
                    <div class="block-header__body">
                        <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb__list">
                                
                                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Pickup point Account</span></li>

                            </ol>
                        </nav>
                    <div>
                        
                        <div class="shadow-sm p-3 mb-2 bg-white rounded" style="height: auto; width: 100%; box-shadow: 10px  #e0e0e0; border-radius: 5px;">
                            <div class="row">
                                <div class="col-md-2 ">
                                    @if ($authWarehouse->logo!=null)
                                        <img class="shop_logo overflow-hidden img-fluid" src="{{asset($authWarehouse->logo)}}" alt="Shop" title="shop" style="border-radius: 50%;">
                                    @else
                                        <img class="shop_logo overflow-hidden img-fluid" src="{{asset('public/media/shop_logo/shop_logo.png')}}" alt="Shop" title="shop" style="border-radius: 50%;">
                                    @endif
                                </div>
                                <div class="col-md-10 " style="height: auto; margin-top: 5px;">
                                        <div class="pl-3">
                                            <div class="text-left sm:text-left">
                                                <h2 class="shop_name" >{{$authWarehouse->w_name}}</h2> 
                                                <p class="shop_details Details___StyledP-sc-10bhd3a-1 fIGmwe text-gray-700 text-secondary">Address - {{$authWarehouse->w_location}}</p>  
                                            </div>
                                        </div> 
                                </div>      
                            </div>  
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            <div class="block" style="margin-top: 0px;">
                <div class="container container--max--xl">
                    <div class="row">
                        <div class="col-12 col-lg-3 d-flex">
                            <div class="account-nav flex-grow-1">
                                <ul class="account-nav__list mt-2">
                                    
                                    <li class="account-nav__item account-nav__item--active"><a href="{{route('warehouse.index')}}"><i class="fas fa-money-check-alt mr-1"></i> Pickup Point Account</a></li>

                                    <li class="account-nav__item "><a href="{{route('warehouse.upcomming.product')}}"><i class="fas fa-sync-alt mr-1" style="font-size: 14px;"></i> Comming Product 
                                        
                                        
                                        @if ($count_upcomming_product>0)
                                            <sup class="badge badge-danger">{{$count_upcomming_product}}</sup>
                                        @else
                                        <sup class="badge badge-secondary">{{$count_upcomming_product}}</sup>
                                        @endif
                                        
                                    </a></li>

                                    <li class="account-nav__item"><a href="{{route('warehouse.receive.product')}}"><i class="fas fa-truck-loading mr-1" style="font-size: 14px;"></i> Received Product 
                                        

                                        @if ($count_received_product>0)
                                            <sup class="badge badge-info">{{$count_received_product}}</sup>
                                        @else
                                        <sup class="badge badge-secondary">{{$count_received_product}}</sup>
                                        @endif

                                    </a></li> 
                                    
                                    <li class="account-nav__item"><a href="{{route('warehouse.delivery.pending')}}"><i class="fas fa-hourglass-half mr-1" style="font-size: 14px;"></i> Delivery Pending
                                        

                                        @if ($count_customer_delivery_pending_product>0)
                                            <sup class="badge badge-warning">{{$count_customer_delivery_pending_product}}</sup>
                                        @else
                                        <sup class="badge badge-secondary">{{$count_customer_delivery_pending_product}}</sup>
                                        @endif

                                    </a></li>  

                                    <li class="account-nav__item"><a href="{{route('warehouse.order.complete')}}"><i class="fas fa-hands-helping mr-1" style="font-size: 14px;"></i> Delivery Complete

                                        @if ($count_complete_delivery>0)
                                            <sup class="badge badge-success">{{$count_complete_delivery}}</sup>
                                        @else
                                        <sup class="badge badge-secondary">{{$count_complete_delivery}}</sup>
                                        @endif

                                    </a></li>  

                                    <li class="account-nav__divider" role="presentation"></li>                      

                                    @if (Auth::user()->isVendor=='1')
                                        <li class="account-nav__item"><a href="{{route('shop')}}"><i class="fab fa-shopify mr-1" style="font-size: 14px;"></i> My Shop</a></li>  
                                    @endif
            
                                    <li class="account-nav__item"><a href="{{route('home')}}"><i class="far fa-user-circle mr-1" style="font-size: 14px;"></i> My Profile</a></li>  


                                    <li class="account-nav__item"><a href="{{route('show.user.password.change')}}"><i class="fas fa-key mr-1" style="font-size: 14px;"></i> Change Password</a></li>       

                                    <li class="account-nav__divider" role="presentation"></li>

                                    <li class="account-nav__item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="text-danger" style="font-weight: bold;"><i class="fas fa-sign-out-alt mr-1" style="font-size: 14px;"></i> Logout</a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf 
                                    </form>

                                </ul>
                            </div>
                        </div>    
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            
                            <div class="site__body">
                                <div class="block-features block " style="margin-bottom: 15px;height: auto; width: 100%; box-shadow: 10px  #ffffff; border-radius: 5px;">
                                    <div class="container ">
                                        <ul class="block-features__list shadow-sm bg-white text-secondary">
                                            <li class="block-features__item">
                                                <div class="block-features__item-icon">
                                                    <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                                              
                                                </div>
                                                <div class="block-features__item-info">
                                                    <div class="block-features__item-title">Total Earning</div>
                                                    <div class="block-features__item-subtitle">৳ {{$authWarehouse->w_total_earning}}</div>
                                                </div>
                                            </li>
                                            <li class="block-features__item">
                                                <div class="block-features__item-icon">
                                                    <i class="fa fa-money " style="font-size: 25px; color: #92c8fa; "></i>
                                                    
                                                </div>
                                                <div class="block-features__item-info">
                                                    <div class="block-features__item-title">Current Balance</div>
                                                    <div class="block-features__item-subtitle">৳ {{$authWarehouse->w_main_balance}}</div> 
                                                </div>
                                            </li>
                                            <li class="block-features__item">
                                                <div class="block-features__item-icon">
                                                    <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                                              
                                                </div>
                                                <div class="block-features__item-info">
                                                    <div class="block-features__item-title">Withdraw Balance</div>
                                                    <div class="block-features__item-subtitle">৳ {{$authWarehouse->w_withdraw_balance}}</div>
                                                </div>
                                            </li>
                                            <li class="block-features__item">
                                                <div class="block-features__item-icon">
                                                    <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                                              
                                                </div>
                                                <div class="block-features__item-info">
                                                    <div class="block-features__item-title"> <a href="#">Pending Balance</a> </div>
                                                    <div class="block-features__item-subtitle">৳ {{$authWarehouse->w_pending_balance}}</div>
                                                </div>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                </div>

                                    
                                        
                                    
                                    <a class="btn btn-sm btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-location-arrow"></i> Withdraw Money</a>
                                   

                                    <div class="collapse mt-3" id="collapseExample">
                                        <div class="card card-body">

                                            @if ($authWarehouse->w_main_balance==0)
                                                <span class="text-secondary d-block ">Current balance is insufficient for a withdrawal.</span>
                                            @else 


                                                <form action="" method="POST" class="text-secondary">
                                                    @csrf
                                                    
                                                    <h6 class="text-secondary">Method 1. Mobile Banking </h6>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Withdraw Method</label>
                                                                
                                                                <select class="form-control" name="withdraw_method" required>
                                                                    <option value="">--Select one--</option>
                                                                    <option value="bkash">bKash</option>
                                                                    <option value="nogod">Nogod</option>
                                                                    <option value="rocket">Rocket</option>
                                                                </select>
        
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="amount">Phone Number</label>
                                                                <input id="amount" type="number" name="withdraw_number" class="form-control" min="1" max="{{$authWarehouse->w_main_balance}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="amount">Withdraw Amount</label>
                                                                <input id="amount" type="number" name="withdraw_amount" class="form-control" min="1" max="{{$authWarehouse->w_main_balance}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-secondary">Method 2. Bank Transfer </h6>
                                                    <hr>
                                                    <div class="row">
                                                        
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="amount">Bank Name</label>
                                                                <input id="amount" type="number" name="withdraw_amount" class="form-control" min="1" max="{{$authWarehouse->w_main_balance}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="amount">Account Number</label>
                                                                <input id="amount" type="number" name="withdraw_amount" class="form-control" min="1" max="{{$authWarehouse->w_main_balance}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            @endif
                                        </div>
                                    </div>

                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>


        @elseif($warehouse->w_status=='block')

        <div class="site__body ">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                        <div class="col-12 col-lg-3 d-flex">
                            <div class="account-nav flex-grow-1">
                                <h4 class="account-nav__title">{{Auth::user()->name}}</h4>
                                <ul class="account-nav__list">
                                    <li class="account-nav__item "><a href="{{route('home')}}"> <i class="fas fa-tachometer-alt mr-1"></i> Dashboard</a></li>
                                    
                                        @if (Auth::user()->isVendor=='0')
                                            <li class="account-nav__item"><a href="{{route('shop.create')}}"><i class="fab fa-shopify mr-1"></i> Create Shop</a></li>
                                        @else
                                            <li class="account-nav__item"><a href="{{route('shop')}}"><i class="fab fa-shopify mr-1"></i> My Shop</a></li>
                                        @endif
        
                                    <li class="account-nav__item"><a href="{{route('wishlist')}}"><i class="fas fa-heart mr-1"></i> My Wishlist </a></li>        
                                    <li class="account-nav__item"><a href="{{route('cart')}}"><i class="fas fa-cart-arrow-down mr-1"></i> My Cart</a></li>  
                                    <li class="account-nav__item"><a href="{{route('transactionHistory')}}"><i class="fas fa-history mr-1"></i> Transaction History</a></li>     
        
                                    
                                    <li class="account-nav__item account-nav__item--active"><a href="{{route('warehouse.show')}}"><i class="fas fa-warehouse mr-1"></i> My Warehouse</a></li> 
                                  
                                    
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
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="card-header"><h5>{{$warehouse->w_name}}</h5></div>
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <div class="alert alert-light" role="alert">
                                                <h4 class="alert-heading text-danger">Blocked !!</h4>
                                                <p>We blocked your warehouse ({{$warehouse->w_name}}) due to unusual activity. </p>
                                                <hr />
                                                <p class="mb-0"> Contact with eBipone Team. </p>
                                            </div> 
                                        </div>
    
                                        {{-- <a href="{{URL::to('edit/warehouse/'.$warehouse->id)}}" class="text-info"> <i class="fa fa-edit"></i> Edit Warehouse</a>  --}}
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
            
        @endif
    @endif

          



            
@endsection

