@extends('admin.master')
@section('content')


        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Shop || {{$shop->shop_name}}</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Shop</li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->


                @if ($shop->shop_status=='approve')
                <div class="row">
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                    <span class="card-liner-icon mt-2">৳</span>
                                    <div class='card-liner-content'>
                                        <h2 class="card-liner-title">{{$shop->total_earning}}</h2>
                                        <h6 class="card-liner-subtitle font-weight-bold">Total Earning</h6>                                       
                                    </div>                                
                                </div>
                                                           
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                     <span class="card-liner-icon mt-2">৳</span>
                                    {{-- <i class="icon-user icons card-liner-icon mt-2"></i> --}}
                                    <div class='card-liner-content'>
                                        <h2 class="card-liner-title">{{$shop->shop_balance}}</h2>
                                        <h6 class="card-liner-subtitle font-weight-bold">Current Balance</h6> 
                                    </div>                                
                                </div>
                                {{-- <span class="bg-primary card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span> --}}
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                    <span class="card-liner-icon mt-2">৳</span>
                                    <div class='card-liner-content'>
                                        <h2 class="card-liner-title">{{$shop->pending_withdraw}}</h2>
                                        <h6 class="card-liner-subtitle font-weight-bold">Pending Withdraw</h6> 
                                    </div>                                
                                </div>
                     
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                    <i class="fas fa-sort-numeric-up-alt card-liner-icon mt-2"></i>
                                    <div class='card-liner-content'> 
                                        <h2 class="card-liner-title">{{$shop->total_withdraw}}</h2>
                                        <h6 class="card-liner-subtitle font-weight-bold">Total Withdraw</h6> 
                                    </div>                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-store"></i> Shop Information</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Shop name:</dt>
                                    <dd class="col-sm-7">{{$shop->shop_name}}</dd>

                                    <dt class="col-sm-5">Shop ID</dt>
                                    <dd class="col-sm-7">{{$shop->shop_id}}</dd>

                                    <dt class="col-sm-5">Shop phone</dt>
                                    <dd class="col-sm-7"><span class="text-danger font-weight-bold">{{$shop->shop_phone}}</span></dd>

                                    <dt class="col-sm-5">Shop address</dt>
                                    <dd class="col-sm-7">{{$shop->shop_address}}</dd>

                                    <dt class="col-sm-5">Trad license no</dt>
                                    <dd class="col-sm-7">{{$shop->shop_trad_no}}</dd>

                                    <dt class="col-sm-5">Shop rating</dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold"> 
                                            @if ($shop->shop_rating==null)
                                                -------
                                            @else
                                                {{$shop->shop_rating}}
                                            @endif
                                    </span></dd>

                                    <dt class="col-sm-5">Shop status</dt>
                                    <dd class="col-sm-7">
                                        
                                        @if ($shop->shop_status=='pending')
                                        <span class=" badge badge-danger font-weight-bold"> Pending </span>
                                        @elseif($shop->shop_status=='block')

                                        <span class=" badge badge-danger font-weight-bold"> Blocked </span> 

                                        @else 
                                        <span class=" badge badge-info font-weight-bold"> Active </span> 

                                        @endif

                                    </dd>


                                </dl>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-user"></i> Owner Information</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Owner name :</dt>
                                    <dd class="col-sm-7"> {{$shop->shop_owner}} </dd>

                                    <dt class="col-sm-5">Owner phone :</dt>
                                    <dd class="col-sm-7"> <span class="text-danger font-weight-bold">{{$shop->phone}}</span> </dd>

                                    <dt class="col-sm-5">Owner email:</dt>
                                    <dd class="col-sm-7">{{$shop->email}}</dd>

                                    <dt class="col-sm-5">Area/Village:</dt>
                                    <dd class="col-sm-7">{{$shop->village}}</dd>

                                    <dt class="col-sm-5">Address:</dt>
                                    <dd class="col-sm-7">{{$shop->address}}</dd>

                                    <dt class="col-sm-5">District:</dt>
                                    <dd class="col-sm-7">{{$shop->district}}</dd>

                                    <dt class="col-sm-5">Owner NID no:</dt>
                                    <dd class="col-sm-7"><span class="badge badge-danger text-white">{{$shop->nid}}</span></dd> 
                                </dl>
                            </div>
                        </div>


                    </div>
                    
                    <div class="col mt-2">
                        <div class="card">
                            <div class="card-body">
                                {{-- <a href="" class="btn btn-primary rounded-btn mb-2"> <i class="fa fa-home"></i> Edit Shop Details </a> --}} 

                                @if ($shop->shop_status=='block')
                                    <p class="font-weight-bold text-danger">Currently, {{$shop->shop_name}} is Blocked By eBipone. If you want to unblock this shop, Please Click below Button.</p>
                                    <a id="unblock" href="{{URL::to('admin/unblock/shop/'.$shop->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="fas fa-lock-open"></i> Unblock This Shop </a>
                                @elseif($shop->shop_status=='pending')
                                <p class="font-weight-bold text-danger">Currently, {{$shop->shop_name}} is Pending. If you want to Approve this shop, Please Click below Button.</p>
                                    <a id="approve" href="{{URL::to('admin/approve/shop/'.$shop->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="fas fa-check-double"></i> Approve This Shop </a>
                                @else 
                                <p class="font-weight-bold text-danger">Currently, {{$shop->shop_name}} is Active. If you want to block this shop, Please Click below Button.</p>

                                    <a id="block" href="{{URL::to('admin/block/shop/'.$shop->id)}}" class="mx-2 btn btn-danger rounded-btn mb-2"> <i class="fas fa-times"></i> Block This Shop</a>
                                @endif


                            </div>
                        </div>
                    </div>
                    
                </div>

            

                <!-- END: Card DATA--> 

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Shop || Images </h6></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                @if ($shop->shop_logo)
                                <img src="{{asset($shop->shop_logo)}}" alt="Shop Logo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption>Shop Logo</figcaption>
                                @else
                                    Shop logo not given by shop owner
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                @if ($shop->shop_banner)
                                <img src="{{asset($shop->shop_banner)}}" alt="Shop Trad Photo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption class="mt-1">Shop Banner</figcaption>
                                @else
                                    Shop banner not given by shop owner
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="{{asset($shop->shop_trad_photo)}}" alt="Shop Trad Photo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption class="mt-1">Trade License</figcaption>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> {{$shop->shop_name}} || Product </h6></div>
                    </div>
                </div>
                <div class="row mt-4">

                    @foreach ($shop_products as $item)
                    <div class="col-md-3 mt-1">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <a href="{{URL::to('admin/show/product/'.$item->id)}}">

				<img src="{{asset($item->image_one)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>




            </div>
        </main>
        <!-- END: Content-->
@endsection
