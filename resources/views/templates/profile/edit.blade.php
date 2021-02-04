
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
                                            <li class="account-nav__item"><a href="{{route('shop.create')}}">Create Shop</a></li>
                                        @else
                                            <li class="account-nav__item"><a href="{{route('shop')}}">My Shop</a></li>
                                        @endif
            
                                        <li class="account-nav__item"><a href="{{route('wishlist')}}">My Wishlist</a></li>        
                                        <li class="account-nav__item"><a href="{{route('cart')}}">My Cart</a></li>  
                                        <li class="account-nav__item"><a href="#">Order History</a></li>     
                                        
                                        <li class="account-nav__divider" role="presentation"></li>
            
                                        <li class="account-nav__item account-nav__item--active"><a href="{{route('show.profile.edit.form')}}">Edit Profile</a></li>       
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
                                    <div class="card-header"><h5>Edit Profile</h5></div>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-12 col-xl-12">

                                                @if ($errors->any())
                                                        <h6 style="font-size: 14px;" class="font-weight-bold text-danger">Error!</h6>
                                                @endif

                                                <form method="POST" action="{{ route('update.user.profile') }}" enctype="multipart/form-data">

                                                @csrf

                                                

                                                <p style="font-weight: bold;">1. Basic Information</p>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Name</label> 
                                                            <input type="text" name="name" value="{{$data->name}}" class="form-control" required>
        
                                                            <input type="hidden" name="email" value="{{$data->email}}">
                                                            <input type="hidden" name="username" value="{{$data->username}}">
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Phone</label> 
                                                            <input type="number" name="phone" value="{{$data->phone}}" class="form-control" required>
                                                            
                                                            @if ($errors->has('phone'))
                                                                <span style="font-size: 13px;" class="text-danger font-weight-bold">{{ $errors->first('phone') }}</span>
                                                            @endif
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Profile Picture</label> 
                                                            <input type="hidden" name="old_avatar" value="{{$data->avatar}}" class="form-control">
                                                            <input type="file" name="avatar" class="form-control">
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Select Gender</label> 
                                                            <select class="form-control" name="gender" required>
                                                                <option value="">--Select one--</option>
                                                                <option value="male" <?php if($data->gender=='male') echo 'selected'; ?>>Male</option> 
                                                                <option value="female" <?php if($data->gender=='female') echo 'selected'; ?>>Female</option> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Birthday</label> 
                                                            <input type="date" name="birthday" value="{{$data->birthday}}" class="form-control">
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        
                                                    </div>
                                                </div>

                                                <div class="card-divider"></div>
                                                <p style="font-weight: bold;" class="mt-4">2. Present Address</p>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >District</label> 
                                                            <select name="district" class="form-control" required>

                                                                <option value="">--Select one--</option>
                                                                <option value="Barguna" <?php if($data->district=='Barguna') echo 'selected'; ?>>Barguna</option>
                                                                <option value="Barisal" <?php if($data->district=='Barisal') echo 'selected'; ?>>Barisal</option>
                                                                <option value="Jhalokati" <?php if($data->district=='Jhalokati') echo 'selected'; ?>>Jhalokati</option>
                                                                <option value="Patuakhali" <?php if($data->district=='Patuakhali') echo 'selected'; ?>>Patuakhali</option>
                                                                <option value="Pirojpur" <?php if($data->district=='Pirojpur') echo 'selected'; ?>>Pirojpur</option>
                                                                <option value="Bandarban" <?php if($data->district=='Bandarban') echo 'selected'; ?>>Bandarban</option>
                                                                <option value="Brahmanbaria" <?php if($data->district=='Brahmanbaria') echo 'selected'; ?>>Brahmanbaria</option>
                                                                <option value="Chandpur" <?php if($data->district=='Chandpur') echo 'selected'; ?>>Chandpur</option>
                                                                <option value="Chittagong" <?php if($data->district=='Chittagong') echo 'selected'; ?>>Chittagong</option>
                                                                <option value="Comilla" <?php if($data->district=='Comilla') echo 'selected'; ?>>Comilla</option>
                                                                <option value="Cox\'s Bazar" <?php if($data->district=='Cox\'s Bazar') echo 'selected'; ?>>Cox's Bazar</option>
                                                                <option value="Feni" <?php if($data->district=='Feni') echo 'selected'; ?>>Feni</option>
                                                                <option value="Khagrachhari" <?php if($data->district=='Khagrachhari') echo 'selected'; ?>>Khagrachhari</option>
                                                                <option value="Lakshmipur" <?php if($data->district=='Lakshmipur') echo 'selected'; ?>>Lakshmipur</option>
                                                                <option value="Noakhali" <?php if($data->district=='Noakhali') echo 'selected'; ?>>Noakhali</option>
                                                                <option value="Rangamati" <?php if($data->district=='Rangamati') echo 'selected'; ?>>Rangamati</option>
                                                                <option value="Dhaka" <?php if($data->district=='Dhaka') echo 'selected'; ?>>Dhaka</option>
                                                                <option value="Faridpur" <?php if($data->district=='Faridpur') echo 'selected'; ?>>Faridpur</option>
                                                                <option value="Gazipur" <?php if($data->district=='Gazipur') echo 'selected'; ?>>Gazipur</option>
                                                                <option value="Gopalganj" <?php if($data->district=='Gopalganj') echo 'selected'; ?>>Gopalganj</option>
                                                                <option value="Kishoreganj" <?php if($data->district=='Kishoreganj') echo 'selected'; ?>>Kishoreganj</option>
                                                                <option value="Madaripur" <?php if($data->district=='Madaripur') echo 'selected'; ?>>Madaripur</option>
                                                                <option value="Manikganj" <?php if($data->district=='Manikganj') echo 'selected'; ?>>Manikganj</option>
                                                                <option value="Munshiganj" <?php if($data->district=='Munshiganj') echo 'selected'; ?>>Munshiganj</option>
                                                                <option value="Narayanganj" <?php if($data->district=='Narayanganj') echo 'selected'; ?>>Narayanganj</option>
                                                                <option value="Narsingdi" <?php if($data->district=='Narsingdi') echo 'selected'; ?>>Narsingdi</option>
                                                                <option value="Rajbari" <?php if($data->district=='Rajbari') echo 'selected'; ?>>Rajbari</option>
                                                                <option value="Shariatpur" <?php if($data->district=='Shariatpur') echo 'selected'; ?>>Shariatpur</option>
                                                                <option value="Tangail" <?php if($data->district=='Tangail') echo 'selected'; ?>>Tangail</option>
                                                                <option value="Bagerhat" <?php if($data->district=='Bagerhat') echo 'selected'; ?>>Bagerhat</option>
                                                                <option value="Chuadanga" <?php if($data->district=='Chuadanga') echo 'selected'; ?>>Chuadanga</option>
                                                                <option value="Jessore" <?php if($data->district=='Jessore') echo 'selected'; ?>>Jessore</option>
                                                                <option value="Jhenaidah" <?php if($data->district=='Jhenaidah') echo 'selected'; ?>>Jhenaidah</option>
                                                                <option value="Khulna" <?php if($data->district=='Khulna') echo 'selected'; ?>>Khulna</option>
                                                                <option value="Kushtia" <?php if($data->district=='Kushtia') echo 'selected'; ?>>Kushtia</option>
                                                                <option value="Magura" <?php if($data->district=='Magura') echo 'selected'; ?>>Magura</option>
                                                                <option value="Meherpur" <?php if($data->district=='Meherpur') echo 'selected'; ?>>Meherpur</option>
                                                                <option value="Narail" <?php if($data->district=='Narail') echo 'selected'; ?>>Narail</option>
                                                                <option value="Satkhira" <?php if($data->district=='Satkhira') echo 'selected'; ?>>Satkhira</option>
                                                                <option value="Jamalpur" <?php if($data->district=='Jamalpur') echo 'selected'; ?>>Jamalpur</option>
                                                                <option value="Mymensingh" <?php if($data->district=='Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                                                                <option value="Netrokona" <?php if($data->district=='Netrokona') echo 'selected'; ?>>Netrokona</option>
                                                                <option value="Sherpur" <?php if($data->district=='Sherpur') echo 'selected'; ?>>Sherpur</option>
                                                                <option value="Bogra" <?php if($data->district=='Bogra') echo 'selected'; ?>>Bogra</option>
                                                                <option value="Joypurhat" <?php if($data->district=='Joypurhat') echo 'selected'; ?>>Joypurhat</option>
                                                                <option value="Naogaon" <?php if($data->district=='Naogaon') echo 'selected'; ?>>Naogaon</option>
                                                                <option value="Natore" <?php if($data->district=='Natore') echo 'selected'; ?>>Natore</option>
                                                                <option value="Chapainawabganj" <?php if($data->district=='Chapainawabganj') echo 'selected'; ?>>Chapainawabganj</option>
                                                                <option value="Pabna" <?php if($data->district=='Pabna') echo 'selected'; ?>>Pabna</option>
                                                                <option value="Rajshahi" <?php if($data->district=='Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                                                                <option value="Sirajganj" <?php if($data->district=='Sirajganj') echo 'selected'; ?>>Sirajganj</option>
                                                                <option value="Dinajpur" <?php if($data->district=='Dinajpur') echo 'selected'; ?>>Dinajpur</option>
                                                                <option value="Gaibandha" <?php if($data->district=='Gaibandha') echo 'selected'; ?>>Gaibandha</option>
                                                                <option value="Kurigram" <?php if($data->district=='Kurigram') echo 'selected'; ?>>Kurigram</option>
                                                                <option value="Lalmonirhat" <?php if($data->district=='Lalmonirhat') echo 'selected'; ?>>Lalmonirhat</option>
                                                                <option value="Nilphamari" <?php if($data->district=='Nilphamari') echo 'selected'; ?>>Nilphamari</option>
                                                                <option value="Panchagarh" <?php if($data->district=='Panchagarh') echo 'selected'; ?>>Panchagarh</option>
                                                                <option value="Rangpur" <?php if($data->district=='Rangpur') echo 'selected'; ?>>Rangpur</option>
                                                                <option value="Thakurgaon" <?php if($data->district=='Thakurgaon') echo 'selected'; ?>>Thakurgaon</option>
                                                                <option value="Habiganj" <?php if($data->district=='Habiganj') echo 'selected'; ?>>Habiganj</option>
                                                                <option value="Moulvibazar" <?php if($data->district=='Moulvibazar') echo 'selected'; ?>>Moulvibazar</option>
                                                                <option value="Sunamganj" <?php if($data->district=='Sunamganj') echo 'selected'; ?>>Sunamganj</option>
                                                                <option value="Sylhet" <?php if($data->district=='Sylhet') echo 'selected'; ?>>Sylhet</option>
                                                                
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Area/Village</label> 
                                                            <input type="text" name="village" value="{{$data->village}}" class="form-control" required>
        
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Thana</label> 
                                                            <input type="text" name="ps" value="{{$data->ps}}" class="form-control" required>
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Post Code</label> 
                                                            <input type="number" name="postcode" value="{{$data->postcode}}" class="form-control" required>
        
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
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

