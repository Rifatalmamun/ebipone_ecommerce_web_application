
@extends('layouts.app')

@section('content')


    @if ($w->w_status=='block')
        <script>window.location = "http://localhost/dev_ebipone/";</script>
    
    @else
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
                                        <li class="account-nav__item "><a href="{{route('shop.create')}}">Create Shop</a></li>
                                    @else
                                        <li class="account-nav__item"><a href="{{route('shop')}}">My Shop</a></li>
                                    @endif
        
                                    <li class="account-nav__item"><a href="{{route('wishlist')}}">My Wishlist</a></li>        
                                    <li class="account-nav__item"><a href="{{route('cart')}}">My Cart</a></li>  
                                    <li class="account-nav__item"><a href="#">Order History</a></li>    
                                    @if (Auth::user()->isWarehouse=='0')
                                        <li class="account-nav__item account-nav__item--active"><a href="{{route('warehouse.create')}}">Apply for Warehouse</a></li>
                                    @else
                                        <li class="account-nav__item account-nav__item--active"><a href="{{route('warehouse.index')}}">My Pickup Point</a></li>
                                    @endif  
                                    
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
                                <div class="card-header text-secondary"><h5>Edit Pickup Point</h5></div>
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

                                        <form method="POST" action="{{route('warehouse.update')}}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <input type="hidden" value="{{$w->user_id}}" name="user_id">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Pickup Point Name*</label> 
                                                    <input type="text" name="w_name" value="{{$w->w_name}}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Pickup Point Tradlicence picture*</label> 
                                                    <input type="file" name="w_trade_picture" class="form-control">
                                                    <input type="hidden" name="old_w_trade_picture" value="{{$w->w_trade_picture}}" class="form-control">
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Pickup Point Phone number*</label> 
                                                    <input type="number" name="phone" value="{{$w->phone}}" class="form-control @error('phone') is-invalid @enderror"  required>

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
                                                    <input type="text" name="w_trade_no" value="{{$w->w_trade_no}}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Pickup Point Logo <small class="text-info">Dimension ( 512 * 512 )</small> </label> 
                                                    
                                                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{old('logo')}}">
                                                    <input type="hidden" name="old_logo" class="form-control" value="{{$w->logo}}">
                                                    
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
                                                    <input type="hidden" name="old_banner" class="form-control" value="{{$w->banner}}"> 
                                                    
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
                                                    <textarea class="form-control" name="w_location" rows="4" placeholder="Write here shope specific location. Example: 25/2,Palbari road,Palbari, Jashore" required>{{$w->w_location}}</textarea>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Pickup Point District*</label> 
                                                    <select name="w_district" class="form-control" required>

                                                        <option value="">--Select one--</option>
                                                            <option value="Barguna" <?php if($w->w_district=='Barguna') echo 'selected'; ?>>Barguna</option>
                                                            <option value="Barisal" <?php if($w->w_district=='Barisal') echo 'selected'; ?>>Barisal</option>
                                                            <option value="Jhalokati" <?php if($w->w_district=='Jhalokati') echo 'selected'; ?>>Jhalokati</option>
                                                            <option value="Patuakhali" <?php if($w->w_district=='Patuakhali') echo 'selected'; ?>>Patuakhali</option>
                                                            <option value="Pirojpur" <?php if($w->w_district=='Pirojpur') echo 'selected'; ?>>Pirojpur</option>
                                                            <option value="Bandarban" <?php if($w->w_district=='Bandarban') echo 'selected'; ?>>Bandarban</option>
                                                            <option value="Brahmanbaria" <?php if($w->w_district=='Brahmanbaria') echo 'selected'; ?>>Brahmanbaria</option>
                                                            <option value="Chandpur" <?php if($w->w_district=='Chandpur') echo 'selected'; ?>>Chandpur</option>
                                                            <option value="Chittagong" <?php if($w->w_district=='Chittagong') echo 'selected'; ?>>Chittagong</option>
                                                            <option value="Comilla" <?php if($w->w_district=='Comilla') echo 'selected'; ?>>Comilla</option>
                                                            <option value="Cox\'s Bazar" <?php if($w->w_district=='Cox\'s Bazar') echo 'selected'; ?>>Cox's Bazar</option>
                                                            <option value="Feni" <?php if($w->w_district=='Feni') echo 'selected'; ?>>Feni</option>
                                                            <option value="Khagrachhari" <?php if($w->w_district=='Khagrachhari') echo 'selected'; ?>>Khagrachhari</option>
                                                            <option value="Lakshmipur" <?php if($w->w_district=='Lakshmipur') echo 'selected'; ?>>Lakshmipur</option>
                                                            <option value="Noakhali" <?php if($w->w_district=='Noakhali') echo 'selected'; ?>>Noakhali</option>
                                                            <option value="Rangamati" <?php if($w->w_district=='Rangamati') echo 'selected'; ?>>Rangamati</option>
                                                            <option value="Dhaka" <?php if($w->w_district=='Dhaka') echo 'selected'; ?>>Dhaka</option>
                                                            <option value="Faridpur" <?php if($w->w_district=='Faridpur') echo 'selected'; ?>>Faridpur</option>
                                                            <option value="Gazipur" <?php if($w->w_district=='Gazipur') echo 'selected'; ?>>Gazipur</option>
                                                            <option value="Gopalganj" <?php if($w->w_district=='Gopalganj') echo 'selected'; ?>>Gopalganj</option>
                                                            <option value="Kishoreganj" <?php if($w->w_district=='Kishoreganj') echo 'selected'; ?>>Kishoreganj</option>
                                                            <option value="Madaripur" <?php if($w->w_district=='Madaripur') echo 'selected'; ?>>Madaripur</option>
                                                            <option value="Manikganj" <?php if($w->w_district=='Manikganj') echo 'selected'; ?>>Manikganj</option>
                                                            <option value="Munshiganj" <?php if($w->w_district=='Munshiganj') echo 'selected'; ?>>Munshiganj</option>
                                                            <option value="Narayanganj" <?php if($w->w_district=='Narayanganj') echo 'selected'; ?>>Narayanganj</option>
                                                            <option value="Narsingdi" <?php if($w->w_district=='Narsingdi') echo 'selected'; ?>>Narsingdi</option>
                                                            <option value="Rajbari" <?php if($w->w_district=='Rajbari') echo 'selected'; ?>>Rajbari</option>
                                                            <option value="Shariatpur" <?php if($w->w_district=='Shariatpur') echo 'selected'; ?>>Shariatpur</option>
                                                            <option value="Tangail" <?php if($w->w_district=='Tangail') echo 'selected'; ?>>Tangail</option>
                                                            <option value="Bagerhat" <?php if($w->w_district=='Bagerhat') echo 'selected'; ?>>Bagerhat</option>
                                                            <option value="Chuadanga" <?php if($w->w_district=='Chuadanga') echo 'selected'; ?>>Chuadanga</option>
                                                            <option value="Jessore" <?php if($w->w_district=='Jessore') echo 'selected'; ?>>Jessore</option>
                                                            <option value="Jhenaidah" <?php if($w->w_district=='Jhenaidah') echo 'selected'; ?>>Jhenaidah</option>
                                                            <option value="Khulna" <?php if($w->w_district=='Khulna') echo 'selected'; ?>>Khulna</option>
                                                            <option value="Kushtia" <?php if($w->w_district=='Kushtia') echo 'selected'; ?>>Kushtia</option>
                                                            <option value="Magura" <?php if($w->w_district=='Magura') echo 'selected'; ?>>Magura</option>
                                                            <option value="Meherpur" <?php if($w->w_district=='Meherpur') echo 'selected'; ?>>Meherpur</option>
                                                            <option value="Narail" <?php if($w->w_district=='Narail') echo 'selected'; ?>>Narail</option>
                                                            <option value="Satkhira" <?php if($w->w_district=='Satkhira') echo 'selected'; ?>>Satkhira</option>
                                                            <option value="Jamalpur" <?php if($w->w_district=='Jamalpur') echo 'selected'; ?>>Jamalpur</option>
                                                            <option value="Mymensingh" <?php if($w->w_district=='Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                                                            <option value="Netrokona" <?php if($w->w_district=='Netrokona') echo 'selected'; ?>>Netrokona</option>
                                                            <option value="Sherpur" <?php if($w->w_district=='Sherpur') echo 'selected'; ?>>Sherpur</option>
                                                            <option value="Bogra" <?php if($w->w_district=='Bogra') echo 'selected'; ?>>Bogra</option>
                                                            <option value="Joypurhat" <?php if($w->w_district=='Joypurhat') echo 'selected'; ?>>Joypurhat</option>
                                                            <option value="Naogaon" <?php if($w->w_district=='Naogaon') echo 'selected'; ?>>Naogaon</option>
                                                            <option value="Natore" <?php if($w->w_district=='Natore') echo 'selected'; ?>>Natore</option>
                                                            <option value="Chapainawabganj" <?php if($w->w_district=='Chapainawabganj') echo 'selected'; ?>>Chapainawabganj</option>
                                                            <option value="Pabna" <?php if($w->w_district=='Pabna') echo 'selected'; ?>>Pabna</option>
                                                            <option value="Rajshahi" <?php if($w->w_district=='Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                                                            <option value="Sirajganj" <?php if($w->w_district=='Sirajganj') echo 'selected'; ?>>Sirajganj</option>
                                                            <option value="Dinajpur" <?php if($w->w_district=='Dinajpur') echo 'selected'; ?>>Dinajpur</option>
                                                            <option value="Gaibandha" <?php if($w->w_district=='Gaibandha') echo 'selected'; ?>>Gaibandha</option>
                                                            <option value="Kurigram" <?php if($w->w_district=='Kurigram') echo 'selected'; ?>>Kurigram</option>
                                                            <option value="Lalmonirhat" <?php if($w->w_district=='Lalmonirhat') echo 'selected'; ?>>Lalmonirhat</option>
                                                            <option value="Nilphamari" <?php if($w->w_district=='Nilphamari') echo 'selected'; ?>>Nilphamari</option>
                                                            <option value="Panchagarh" <?php if($w->w_district=='Panchagarh') echo 'selected'; ?>>Panchagarh</option>
                                                            <option value="Rangpur" <?php if($w->w_district=='Rangpur') echo 'selected'; ?>>Rangpur</option>
                                                            <option value="Thakurgaon" <?php if($w->w_district=='Thakurgaon') echo 'selected'; ?>>Thakurgaon</option>
                                                            <option value="Habiganj" <?php if($w->w_district=='Habiganj') echo 'selected'; ?>>Habiganj</option>
                                                            <option value="Moulvibazar" <?php if($w->w_district=='Moulvibazar') echo 'selected'; ?>>Moulvibazar</option>
                                                            <option value="Sunamganj" <?php if($w->w_district=='Sunamganj') echo 'selected'; ?>>Sunamganj</option>
                                                            <option value="Sylhet" <?php if($w->w_district=='Sylhet') echo 'selected'; ?>>Sylhet</option>
                                                        
                                                    </select> 

                                                </div>
                                            </div>
                                        
                                        </div>

                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary mt-3">Update Pickup Point</button>
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
    @endif

            



            
@endsection

