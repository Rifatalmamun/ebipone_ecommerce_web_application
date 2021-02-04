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
                                    <h4 class="account-nav__title">Navigation</h4>
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
            
                                        <li class="account-nav__item"><a href="{{route('show.profile.edit.form')}}">Edit Profile</a></li>       
                                        <li class="account-nav__item account-nav__item--active"><a href="{{route('show.user.password.change')}}">Change Password</a></li>               
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
                                    <div class="card-header"><h5>Change Password</h5></div>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-7 col-xl-6">

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <form method="POST" action="{{ route('change.user.password') }}"    enctype="multipart/form-data">
                                                    @csrf

                                                <div class="form-group">
                                                    <label for="password-current">Current Password</label>
                                                    <input type="password" class="form-control" required name="oldpass" placeholder="Current password">    
                                                </div>

                                                <div class="form-group">
                                                    <label for="password-new">New Password</label> 
                                                    <input type="password" class="form-control" name="password" placeholder="New password" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="password-confirm">Reenter New Password</label> 
                                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" >
                                                </div>

                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary mt-3">Change Password</button>
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





{{-- <section id="Edit_profile_section" class="clearfix pb-5">
  <div class="container">
 
      <div class="row my-5">
          <div class="col-lg-8">

            
            @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
            @endif



            <form method="POST" action="{{ route('change.user.password') }}"    enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="Your name" class="font-weight-bold">Current password</label>
                <input type="password" class="form-control" required name="oldpass" placeholder="Current password">        
              </div>

              <div class="form-group">
                  <label for="Your name" class="font-weight-bold">New password <small>(length must be greater or equal 8)</small></label>
                  <input type="password" class="form-control" name="password" placeholder="New password" >
               </div>

               <div class="form-group">
                <label for="Your name" class="font-weight-bold">Confirm password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" >
             </div>
              <input type="submit" value="Change password" class="btn btn-info">
            </form>


            
          </div>
      </div>
  </div>

</section> --}}


@endsection
