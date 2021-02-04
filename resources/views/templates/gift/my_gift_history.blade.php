
@extends('layouts.app')
@section('content')



<!-- Profile dashboard banner  -->



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

                            <li class="account-nav__item "><a href="{{route('wishlist')}}">My Wishlist</a></li>        
                            <li class="account-nav__item "><a href="{{route('cart')}}">My Cart</a></li>  
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
                    <div class="dashboard">

                        @if ($gift_count==0)
                            <div class="card" style="width: 100%;">
                                <div class="card-header"><h5 class="text-secondary"> <i class="fa fa-gift" aria-hidden="true"></i> Gift Empty!!</h5></div>
                                <div class="card-divider"></div>
                               
                                <div class="card-divider"></div>
                                <div class="card-img">
                                    <img src="{{asset('public/media/box.png')}}" alt="" style="width: 20%; margin-left: 38%;padding: 50px 0; opacity: .8;">
                                </div>
                            </div>
                        @else
                        <div class="dashboard__orders card">
                            <div class="card-header"><h5 class="text-secondary"> <i class="fa fa-gift" aria-hidden="true"></i> Gift purchase history</h5></div>
                            <div class="card-divider"></div>
                            <div class="card-table">
                                <div class="table-responsive-sm">
                                    <table class="text-secondary">
                                        <thead>
                                            <tr>
                                                <th>Gift name</th>
                                                <th>Price</th>
                                                <th>Offer</th>
                                                <th>Purchase date</th>
                                                <th>Duration</th>
                                                <th>Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($giftHistory as $item)
                                            <tr>
                                                <td>{{$item->voucher_name}}</td>
                                                <td>৳ {{ $item->amount  }}</td>
                                                <td>৳ {{ $item->offer  }}</td>
                                                <td>{{ $item->purchase_date  }}</td>
                                                <td>{{ $item->duration  }} days</td>
                                                <td> 
                                                    @if ($item->status=='pending')
                                                        <span class="badge badge-danger">{{ $item->status  }}</span>
                                                    @elseif($item->status=='complete')
                                                        <span class="badge badge-success">{{ $item->status  }}</span>
                                                    @endif    
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                           

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>


@endsection
