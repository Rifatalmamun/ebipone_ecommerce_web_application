
@php
        // COUNT SHOP NEW ORDER, DELIVERY PENDING, DELIVERY COMPLETE PRODUCT
        
        $count_new_order = DB::table('order_childs')
                    ->join('orders','orders.id','order_childs.order_id')
                    ->join('users','users.id','order_childs.shop_id')
                    ->join('products','products.id','order_childs.product_id')
                    ->where('order_childs.shop_id',Auth::user()->id)
                    ->where('order_childs.isShopReceived','1')
                    ->where('order_childs.isShopSend','0')
                    ->where('order_childs.isWarehouseReceived','0')
                    ->where('order_childs.isWarehouseSend','0')
                    ->where('order_childs.status','0')->count();

        $count_delivery_pending = DB::table('order_childs')
                    ->join('orders','orders.id','order_childs.order_id')
                    ->join('warehouses','warehouses.id','order_childs.warehouse_id')
                    ->join('users','users.id','order_childs.shop_id')
                    ->join('products','products.id','order_childs.product_id')
                    ->where('order_childs.shop_id',Auth::user()->id)
                    ->where('order_childs.isShopReceived','1')
                    ->where('order_childs.isShopSend','1')
                    ->where('order_childs.isWarehouseReceived','0')
                    ->where('order_childs.status','0')->count(); 

        $count_delivery_complete = DB::table('order_childs')
                    ->join('orders','orders.id','order_childs.order_id')
                    ->join('users','users.id','order_childs.shop_id')
                    ->join('products','products.id','order_childs.product_id')
                    ->select('order_childs.*','users.shop_name','products.un_id','products.product_name','products.buying_price','products.image_one','orders.finalStatus','orders.admin_status','orders.order_date','orders.s_district','orders.s_area')
                    ->where('order_childs.shop_id',Auth::user()->id)
                    ->where('order_childs.isShopReceived','1')
                    ->where('order_childs.isShopSend','1')
                    ->where('order_childs.isWarehouseReceived','1')->count();
        
@endphp



@extends('layouts.app')

@section('content')

    @if (Auth::user()->shop_status=='pending')
    <div class="site__body">
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--xl">
                <div class="row">
                    <div class="col-12 col-lg-3 d-flex">
                        <div class="account-nav flex-grow-1">
                            <h4 class="account-nav__title">{{Auth::user()->name}}</h4>
                            <ul class="account-nav__list">
                                <li class="account-nav__item "><a href="{{route('home')}}">Dashboard</a></li>
                                
                                @if (Auth::user()->isVendor=='0')
                                    <li class="account-nav__item account-nav__item--active"><a href="{{route('shop.create')}}">Create Shop</a></li>
                                @else
                                    <li class="account-nav__item account-nav__item--active"><a href="{{route('shop')}}">My Shop</a></li>
                                @endif
    
                                <li class="account-nav__item"><a href="{{route('wishlist')}}">My Wishlist</a></li>        
                                <li class="account-nav__item"><a href="{{route('cart')}}">My Cart</a></li>  
                                <li class="account-nav__item"><a href="#">Order History</a></li>     
                                
                                <li class="account-nav__divider" role="presentation"></li>
    
                                <li class="account-nav__item"><a href="{{route('show.profile.edit.form')}}">Edit Profile</a></li>       
                                <li class="account-nav__item"><a href="{{route('show.user.password.change')}}">Change Password</a></li>               
                                <li class="account-nav__divider" role="presentation"></li>
                                <li class="account-nav__item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="text-danger" style="font-weight: bold;">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf 
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-header"><h5>{{Auth::user()->shop_name}}</h5></div>
                            <div class="card-divider"></div>
                            <div class="card-body card-body--padding--2">
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <div class="alert alert-light" role="alert">
                                            <h4 class="alert-heading">Pending...</h4>
                                            <p> We receive all of yours shop information. We will verify your shop ( {{Auth::user()->shop_name}} ) information for opeing your shop. </p>
                                            <hr />
                                            <p class="mb-0"> Please wait until ebipone confirmation. </p>
                                        </div> 
                                    </div>

                                    <a href="{{URL::to('edit/shop/'.Auth::user()->id)}}" class="text-info"> <i class="fa fa-edit"></i> Edit Shop Information</a> 
                                    
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
        @if (Auth::user()->shop_status=='approve')

        
<!-- Profile dashboard banner  -->

        <div class="site__body">

            @php
                $authShop = DB::table('users')->where('id',Auth::user()->id)->first();
            @endphp

            <!--SHOP BANNER AND LOGO-->

            <div class="block-header block-header--has-breadcrumb block-header--has-title" style="margin-bottom: 0px;">
                <div class="container">
                    <div class="block-header__body">
                                                                                                                                    
                        <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb__list">
                                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                                <li class="breadcrumb__item breadcrumb__item--parent"><a href="{{route('home')}}" class="breadcrumb__item-link">My Profile</a></li>
                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">My Shop</span></li>
                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>

                    <!-- Banner And Logo Start Here -->   

                    <div>

                        <div class="CoverPhoto___StyledDiv-zk3bll-0 hffRps img-fluid shadow-sm  mb-1">
                                                                                                                            
                        @if ($authShop->shop_banner!=null)
                            <img src="{{asset($authShop->shop_banner)}}" alt="Shop Banner" title="banner" class="w-full lg:hidden" style="width: 100%; height: auto; border-radius: 5px;">
                        @else
                            <img src="{{asset('public/frontend/images/shopbanner.jpg')}}" alt="Shop Banner" title="banner" class="w-full lg:hidden" style="width: 100%; height: auto; border-radius: 5px;">
                        @endif
                        
                    </div>

                        <div class="shadow-sm p-3 mb-0 bg-white rounded" style="height: auto; width: 100%; box-shadow: 10px  #e0e0e0; border-radius: 5px;">
                            <div class="row">
                                <!-- <div class="col-lg-2 col-md-4 col-sm-6 bg-danger ">

                                    <img src="images/banners/logo.jpg" style="width: 100%; height: 100%;" >   
                                </div> -->

                            <div class="col-md-2 ">

                                @if ($authShop->shop_logo!=null)
                                    <img class="shop_logo overflow-hidden img-fluid" src="{{asset($authShop->shop_logo)}}" alt="Shop" title="shop">
                                @else
                                    <img class="shop_logo overflow-hidden img-fluid" src="{{asset('public/media/shop_logo/shop_logo.png')}}" alt="Shop" title="shop">
                                    
                                @endif
                            
                            </div>


                                <div class="col-md-10 " style="height: auto; margin-top: 5px;">
                                    <div class="p-3">
                                        <div class="text-left sm:text-left">
                                            <h2 class="shop_name" >{{$authShop->shop_name}}</h2> 
                                            <p class="shop_details Details___StyledP-sc-10bhd3a-1 fIGmwe text-gray-700">{{$authShop->shop_address}}</p>  
                                        </div>
                                    </div>
                                    <div class="cus_button_box">
                                        <div class="child_box">
                                            <span><a href="#" class="cus_link_bn btn btn-warning text-sm items-center"><i class="fa fa-star"></i> Ratting</a></span>
                                            <span><a href="#" class="cus_link_bn btn btn-success"><i class="far fa-bell"></i> Follow</a></span>  
                                            <span><a href="#" class="cus_link_bn btn btn-info"><i class="far fa-comments"></i> Revview</a></span>
                                        </div>

                                    </div>    
                                </div>      
                            </div>  
                        </div>
                    </div>

                    </div>
                </div>
            </div>

            <!--SHOP ACCOUNT SECTION-->

            <div class="block-features block " style="height: auto; width: 100%; box-shadow: 10px  #ffffff; border-radius: 5px;">
                <div class="container ">
                    <ul class="block-features__list shadow-sm bg-white">
                        <li class="block-features__item">
                            <div class="block-features__item-icon">
                                <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                            </div>
                            <div class="block-features__item-info">
                                <div class="block-features__item-title">Total Earning</div>
                                @if (Auth::user()->shop_balance==null)
                                    <div class="block-features__item-subtitle">৳ 0</div>
                                @else
                                    <div class="block-features__item-subtitle">৳ {{Auth::user()->total_earning}}</div>
                                @endif
                                
                            </div> 
                        </li>
                        <li class="block-features__item">
                            <div class="block-features__item-icon">
                                <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                            </div>
                            <div class="block-features__item-info">
                                <div class="block-features__item-title">Current Balance</div>
                                @if (Auth::user()->shop_balance==null)
                                    <div class="block-features__item-subtitle">৳ 0</div>
                                @else
                                    <div class="block-features__item-subtitle">৳ {{Auth::user()->shop_balance}}</div>
                                @endif
                                
                            </div> 
                        </li>
                        <li class="block-features__item">
                            <div class="block-features__item-icon">
                                <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                        
                            </div>
                            <div class="block-features__item-info">
                                <div class="block-features__item-title">Total Withdraw</div>
                                <div class="block-features__item-subtitle">৳ 00</div>
                            </div>
                        </li>
                        <li class="block-features__item">
                            <div class="block-features__item-icon">
                                <i class="fa fa-money " style="font-size: 25px; color: #0A2238; "></i>
                        
                            </div>
                            <div class="block-features__item-info">
                                <div class="block-features__item-title">Pending Withdraw </div>
                                <div class="block-features__item-subtitle">৳ 00</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                        <div class="col-12 col-lg-3 d-flex">
                            <div class="account-nav flex-grow-1">
                                <h4 class="account-nav__title"> <i class="fa fa-home"></i> {{Auth::user()->shop_name}}</h4>
                                <ul class="account-nav__list">
                                    
                                    <li class="account-nav__item account-nav__item--active"><a href="{{route('shop')}}"> <i class="fab fa-shopify"></i> My Shop</a></li>

                                    <li class="account-nav__item "><a href="{{route('product.create')}}"> <i class="fas fa-cloud-upload-alt"></i> Upload Product</a></li>

                                    <li class="account-nav__item"><a href="{{route('shop.new.order')}}"> <i class="fas fa-sign-out-alt"></i> New Order 
                                        @if ($count_new_order>0)
                                            <sup class="badge badge-danger">{{$count_new_order}}</sup>
                                        @else   
                                            <sup class="badge badge-secondary">0</sup>
                                        @endif
                                    </a></li>
 
                                    <li class="account-nav__item"><a href="{{route('shop.delivery.pending.order')}}"> <i class="fas fa-truck-moving"></i> Delivery Pending
                                    
                                        @if ($count_delivery_pending>0)
                                            <sup class="badge badge-warning">{{$count_delivery_pending}}</sup>
                                        @else   
                                            <sup class="badge badge-secondary">0</sup>
                                        @endif

                                    </a></li>   

                                    <li class="account-nav__item"><a href="{{route('shop.delivery.complete')}}"> <i class="fas fa-check-double"></i> Delivery Complete
                                    
                                        @if ($count_delivery_complete>0)
                                            <sup class="badge badge-success">{{$count_delivery_complete}}</sup>
                                        @else   
                                            <sup class="badge badge-secondary">0</sup>
                                        @endif
                                    
                                    </a></li>   

                                    <li class="account-nav__divider" role="presentation"></li>

                                    @if (Auth::user()->isWarehouse=='0')
                                        <li class="account-nav__item"><a href="{{route('warehouse.create')}}"><i class="fas fa-warehouse mr-1"></i> Apply for Pickup Point</a></li>
                                    @else
                                        <li class="account-nav__item"><a href="{{route('warehouse.upcomming.product')}}"><i class="fas fa-warehouse mr-1"></i> My Pickup Point</a></li> 
                                    @endif 
                                    
                                    <li class="account-nav__divider" role="presentation"></li>

                                    <li class="account-nav__item"><a href="{{route('show.profile.edit.form')}}"><i class="fas fa-user-edit mr-1"></i> Edit Profile</a></li>   

                                    <li class="account-nav__item"><a href="{{route('show.user.password.change')}}"><i class="fas fa-key mr-1"></i> Change Password</a></li> 

                                    <li class="account-nav__divider" role="presentation"></li>
                                    <li class="account-nav__item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="text-danger" style="font-weight: bold;">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf 
                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            
                                @if ($count_shop_product==0) 
                                <div class="card">
                                    <div class="card-header"><h5>Shop Product Empty!</h5></div>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <div class="alert alert-light" role="alert">
                                                    <p> Now, your shop is ready to upload products. </p>
                                                    <hr />
                                                    <p class="mb-0"> <a href="{{route('product.create')}}" class="text-info">Upload Shop Product</a> </p>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            <div class="site__body">
                                
                                <div class="block block-split block-split--has-sidebar">
                                    <div class="container">
                                        <div class="block-split__row row no-gutters">
                                            <div class="block-split__item block-split__item-content col">
                                                <div class="block">
                                                    <div class="categories-list categories-list--layout--columns-4-sidebar">
                                                        <ul class="categories-list__body">


                                                        <!--******* PRODUCT LOOP START-->

                                                            @foreach ($shop_product as $item)
                                                                
                                                            <li class="categories-list__item">
                                                                <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}">
                                                                    <div class="image image--type--category">
                                                                        <div class="image__body">
                                                                            <img class="image__tag" src="{{asset($item->image_one)}}" alt="" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="categories-list__item-name">{{$item->product_name}}</div>
                                                                </a>
                                                                <div class="categories-list__item-products">
                                                                    @if ($item->status=='pending')
                                                                        PENDING
                                                                    @else
                                                                    {{$item->selling_price}} TK
                                                                    @endif
                                                                </div>
                                                            </li>
                                                            <li class="categories-list__divider"></li>
                                                            @endforeach

                                                            <!--******* PRODUCT LOOP END-->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-space block-space--layout--before-footer"></div>
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

        Your Shop has been Blocked by eBipone !! 
            
        @endif
    @endif

          



            
@endsection

