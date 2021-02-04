
@extends('layouts.app')

@section('content')



            <!-- site__header / end --><!-- site__body -->
            <div class="site__body text-dark">
                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">
                        <div class="row">
                            <div class="col-12 col-lg-3 d-flex">
                                <div class="account-nav flex-grow-1">
                                    <h4 class="account-nav__title">{{Auth::user()->name}}</h4>
                                    <ul class="account-nav__list">
                                        <li class="account-nav__item account-nav__item--active"><a href="{{route('home')}}">Dashboard</a></li>
                                        
                                        @if (Auth::user()->isVendor=='0')
                                            <li class="account-nav__item"><a href="{{route('shop.create')}}">Create Shop</a></li>
                                        @else
                                            <li class="account-nav__item"><a href="{{route('shop')}}">My Shop</a></li>
                                        @endif
            
                                        <li class="account-nav__item"><a href="#">My Wishlist</a></li>        
                                        <li class="account-nav__item"><a href="#">My Cart</a></li>  
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
                                    <div class="card-header"><h5>Edit Shop</h5></div>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-12 col-xl-12">

                                                

                                                @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                @endif

                                                

                                            <form method="POST" action="{{route('update.shop')}}" enctype="multipart/form-data">
                                            @csrf

                                            <p style="font-weight: bold;">1. Shop Information</p>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Name*</label> 
                                                        <input type="text" name="shop_name" class="form-control" value="{{Auth::user()->shop_name}}"  required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Tradlicence picture</label> 
                                                        <input type="file" name="shop_trad_photo" class="form-control" >
                                                        <input type="hidden" name="old_shop_trad_photo" value="{{Auth::user()->shop_trad_photo}}" class="form-control">
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Logo</label> 
                                                        
                                                        <input type="file" name="shop_logo" class="form-control">
                                                        <input type="hidden" name="old_shop_logo" value="{{Auth::user()->shop_logo}}" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Banner</label> 
                                                        
                                                        <input type="file" name="shop_banner" class="form-control"> 
                                                        <input type="hidden" name="old_shop_banner" value="{{Auth::user()->shop_banner}}" class="form-control">


                                                    </div>
                                                </div>
                                               
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Phone number</label> 
                                                        <input type="number"  name="shop_phone" value="{{Auth::user()->shop_phone}}" class="form-control"  required>
    
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Tradlicence no</label> 
                                                        <input type="text" name="shop_trad_no" class="form-control" value="{{Auth::user()->shop_trad_no}}" required>
    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <p style="font-weight: bold;">2. Shop Location</p>
                                            
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="shop_address" rows="4" placeholder="Write here shope specific location. Example: 25/2,Palbari road,Palbari, Jashore" required>{{Auth::user()->shop_address}}</textarea>
    
                                                    </div>
                                                </div>
                                               
                                            </div>

                                            <p style="font-weight: bold;">3.Shop Owner Information </p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Owner Name</label> 
                                                        <input type="text" name="shop_owner" class="form-control" value="{{Auth::user()->shop_owner}}" required>
    
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Shop Owner NID No</label> 
                                                        <input type="number" name="nid" class="form-control" value="{{Auth::user()->nid}}" required>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary mt-3">Update Shop Information</button>
                                            </div>

                                        </form>


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

