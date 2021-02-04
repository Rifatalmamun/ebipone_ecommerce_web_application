
@extends('layouts.app')

@section('content')



            <!-- site__header / end --><!-- site__body -->
            <div class="site__body text-secondary">
                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">
                        <div class="row">
                            <div class="col-12 col-lg-3 d-flex">
                                <div class="account-nav flex-grow-1">
                                    <h4 class="account-nav__title">{{Auth::user()->name}}</h4>
                                    <ul class="account-nav__list">
                                        <li class="account-nav__item "><a href="{{route('home')}}"><i class="fas fa-tachometer-alt mr-1"></i> Dashboard</a></li>
                                        
                                        @if (Auth::user()->isVendor=='0')
                                            <li class="account-nav__item "><a href="{{route('shop.create')}}"><i class="fab fa-shopify mr-1"></i> Create Shop</a></li>
                                        @else
                                            <li class="account-nav__item"><a href="{{route('shop')}}"><i class="fab fa-shopify mr-1"></i> My Shop</a></li>
                                        @endif
            
                                        <li class="account-nav__item"><a href="{{route('wishlist')}}"><i class="fas fa-heart mr-1"></i> My Wishlist</a></li>        
                                        <li class="account-nav__item"><a href="{{route('cart')}}"><i class="fas fa-cart-arrow-down mr-1"></i> My Cart</a></li>  
                                        <li class="account-nav__item"><a href="{{route('transactionHistory')}}"><i class="fas fa-history mr-1"></i> Transaction History</a></li>    
                                        
                                        @if (Auth::user()->isWarehouse=='0')
                                            <li class="account-nav__item account-nav__item--active"><a href="{{route('warehouse.create')}}"><i class="fas fa-warehouse mr-1"></i> Apply for Pickup Point</a></li>
                                        @else
                                            <li class="account-nav__item account-nav__item--active"><a href="{{route('warehouse.index')}}"><i class="fas fa-warehouse mr-1"></i> My Pickup Point</a></li>
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
                            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                                <div class="card">
                                    <div class="card-header text-secondary"><h5>Apply for Pickup Point</h5></div>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-12 col-xl-12">

                                                @if(Auth::user()->name==null || Auth::user()->phone==null || Auth::user()->avatar==null || Auth::user()->gender==null ||  Auth::user()->birthday==null ||  Auth::user()->district==null ||  Auth::user()->village==null ||  Auth::user()->ps==null ||  Auth::user()->postcode==null )

                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Wait!</h4>
                                                    <p> First, Make your profile 100% update and fill up all the field from <a href="{{route('show.profile.edit.form')}}">EDIT PROFILE</a></p>
                                                    <hr />
                                                    <p class="mb-0"> When you make your profile 100% updated, we unlock the Pickup Point option </p>
                                                </div> 
                                                @else 
                                                {{-- @if ($errors->any())
                                                        <div class="alert">
                                                            <ul style="list-style: none;">
                                                                @foreach ($errors->all() as $error)
                                                                    <li class="text-danger font-weight-bold">{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                @endif --}}

                                            <form method="POST" action="{{route('warehouse.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Pickup Point Name*</label> 
                                                        <input type="text" name="w_name" value="{{old('w_name')}}" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Pickup Point Tradlicence picture*</label> 
                                                        <input type="file" name="w_trade_picture" class="form-control"  required>
    
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Pickup Point Phone number*</label> 
                                                        <input type="number" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror"  required>

                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong> 
                                                            </span>
                                                        @enderror
    
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Pickup Point Tradlicence no*</label> 
                                                        <input type="text" name="w_trade_no" value="{{old('w_trade_no')}}" class="form-control"  required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Pickup Point Logo <small class="text-info">Dimension ( 512 * 512 )</small> </label> 
                                                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{old('logo')}}">

                                                        @error('logo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong> 
                                                            </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Pickup Point Banner <small class="text-info">Dimension ( 1110 * 512 )</small> </label> 
                                                        
                                                        <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" value="{{old('banner')}}">

                                                        @error('banner')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong> 
                                                            </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Location*</label> 
                                                        <textarea class="form-control" name="w_location" rows="4" placeholder="Write here shope specific location. Example: 25/2,Palbari road,Palbari, Jashore" required>{{old('w_location')}}</textarea>
    
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Pickup Point District*</label> 
                                                        <select name="w_district" class="form-control" required>

                                                            <option value="">--Select one--</option>
                                                            <option value="Barguna">Barguna</option>
                                                            <option value="Barisal" >Barisal</option>
                                                            <option value="Jhalokati" >Jhalokati</option>
                                                            <option value="Patuakhali">Patuakhali</option>
                                                            <option value="Pirojpur" >Pirojpur</option>
                                                            <option value="Bandarban" >Bandarban</option>
                                                            <option value="Brahmanbaria">Brahmanbaria</option>
                                                            <option value="Chandpur" >Chandpur</option>
                                                            <option value="Chittagong" >Chittagong</option>
                                                            <option value="Comilla" >Comilla</option>
                                                            <option value="Cox\'s Bazar" >Cox's Bazar</option>
                                                            <option value="Feni">Feni</option>
                                                            <option value="Khagrachhari" >Khagrachhari</option>
                                                            <option value="Lakshmipur" >Lakshmipur</option>
                                                            <option value="Noakhali">Noakhali</option>
                                                            <option value="Rangamati" >Rangamati</option>
                                                            <option value="Dhaka">Dhaka</option>
                                                            <option value="Faridpur" >Faridpur</option>
                                                            <option value="Gazipur" >Gazipur</option>
                                                            <option value="Gopalganj" >Gopalganj</option>
                                                            <option value="Kishoreganj" >Kishoreganj</option>
                                                            <option value="Madaripur" >Madaripur</option>
                                                            <option value="Manikganj" >Manikganj</option>
                                                            <option value="Munshiganj" >Munshiganj</option>
                                                            <option value="Narayanganj" >Narayanganj</option>
                                                            <option value="Narsingdi" >Narsingdi</option>
                                                            <option value="Rajbari" >Rajbari</option>
                                                            <option value="Shariatpur" >Shariatpur</option>
                                                            <option value="Tangail" >Tangail</option>
                                                            <option value="Bagerhat" >Bagerhat</option>
                                                            <option value="Chuadanga" >Chuadanga</option>
                                                            <option value="Jessore" >Jessore</option>
                                                            <option value="Jhenaidah" >Jhenaidah</option>
                                                            <option value="Khulna" >Khulna</option>
                                                            <option value="Kushtia" >Kushtia</option>
                                                            <option value="Magura" >Magura</option>
                                                            <option value="Meherpur" >Meherpur</option>
                                                            <option value="Narail" >Narail</option>
                                                            <option value="Satkhira">Satkhira</option>
                                                            <option value="Jamalpur" >Jamalpur</option>
                                                            <option value="Mymensingh" >Mymensingh</option>
                                                            <option value="Netrokona" >Netrokona</option>
                                                            <option value="Sherpur">Sherpur</option>
                                                            <option value="Bogra" >Bogra</option>
                                                            <option value="Joypurhat" >Joypurhat</option>
                                                            <option value="Naogaon" >Naogaon</option>
                                                            <option value="Natore">Natore</option>
                                                            <option value="Chapainawabganj" >Chapainawabganj</option>
                                                            <option value="Pabna" >Pabna</option>
                                                            <option value="Rajshahi" >Rajshahi</option>
                                                            <option value="Sirajganj" >Sirajganj</option>
                                                            <option value="Dinajpur" >Dinajpur</option>
                                                            <option value="Gaibandha" >Gaibandha</option>
                                                            <option value="Kurigram" >Kurigram</option>
                                                            <option value="Lalmonirhat" >Lalmonirhat</option>
                                                            <option value="Nilphamari" >Nilphamari</option>
                                                            <option value="Panchagarh" >Panchagarh</option>
                                                            <option value="Rangpur" >Rangpur</option>
                                                            <option value="Thakurgaon" >Thakurgaon</option>
                                                            <option value="Habiganj" >Habiganj</option>
                                                            <option value="Moulvibazar" >Moulvibazar</option>
                                                            <option value="Sunamganj" >Sunamganj</option>
                                                            <option value="Sylhet" >Sylhet</option>
                                                            
                                                        </select> 
    
                                                    </div>
                                                </div>
                                               
                                            </div>

                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary mt-3">Apply</button>
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

