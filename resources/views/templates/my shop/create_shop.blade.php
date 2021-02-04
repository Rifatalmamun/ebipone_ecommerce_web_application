
@extends('layouts.app')

@section('content')



            <!-- site__header / end --><!-- site__body -->
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
                                            <li class="account-nav__item"><a href="{{route('shop')}}">My Shop</a></li>
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
                                    <div class="card-header"><h5>Create Shop</h5></div>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-12 col-xl-12">



                                                @if(Auth::user()->name==null || Auth::user()->phone==null || Auth::user()->avatar==null || Auth::user()->gender==null ||  Auth::user()->birthday==null ||  Auth::user()->district==null ||  Auth::user()->village==null ||  Auth::user()->ps==null ||  Auth::user()->postcode==null )


                                                <div class="alert alert-light" role="alert">
                                                    <h4 class="alert-heading">Wait!</h4>
                                                    <p> First, Make your profile 100% update and fill up all the field from <a href="{{route('show.profile.edit.form')}}" class="text-danger">EDIT PROFILE</a></p>
                                                    <hr />
                                                    <p class="mb-0"> When you make your profile 100% updated, we unlock the CREATE SHOPE option </p>
                                                </div> 


                                                @else 

                                                @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                @endif

                                            <form method="POST" action="{{route('shop.store')}}" enctype="multipart/form-data">
                                            @csrf

                                            <p style="font-weight: bold;">1. Shop Information</p>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Name*</label> 
                                                        <input type="text" name="shop_name" value="{{old('shop_name')}}" class="form-control" required>

                                                    

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Tradlicence picture*</label> 
                                                        <input type="file" name="shop_trad_photo" class="form-control"  required>
    
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Logo <small class="text-info">Dimension ( 150 * 150 )</small> </label> 
                                                        
                                                        <input type="file" name="shop_logo" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Banner <small class="text-info">Dimension ( 1110 * 150 )</small> </label> 
                                                        
                                                        <input type="file" name="shop_banner" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Phone number*</label> 
                                                        <input type="number" name="shop_phone" value="{{old('shop_phone')}}" class="form-control @error('name') is-invalid @enderror"  required>

                                                        @error('shop_phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong> 
                                                            </span>
                                                        @enderror
    
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Tradlicence no*</label> 
                                                        <input type="text" name="shop_trad_no" value="{{old('shop_trad_no')}}" class="form-control"  required>
    
                                                    </div>
                                                </div>
                                            </div>
                                           

                                           

                                            <p style="font-weight: bold;">2. Shop Location*</p>
                                            
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="shop_address" rows="4" placeholder="Write here shope specific location. Example: 25/2,Palbari road,Palbari, Jashore" required>{{old('shop_address')}}</textarea>
    
                                                    </div>
                                                </div>
                                               
                                            </div>

                                            <p style="font-weight: bold;">3.Shop Owner Information </p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Owner Name*</label> 
                                                        <input type="text" name="shop_owner" value="{{old('shop_owner')}}" class="form-control"  required>
    
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Owner NID No*</label> 
                                                        <input type="number" name="nid" value="{{old('nid')}}" class="form-control"  required>
                                                        
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary mt-3">Create Shop</button>
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
                </div>
                <div class="block-space block-space--layout--before-footer"></div>
            </div>



            
@endsection

