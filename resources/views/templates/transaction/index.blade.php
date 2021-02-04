
@extends('layouts.app')
@section('content')


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

                            <li class="account-nav__item"><a href="{{route('wishlist')}}">My Wishlist </a></li>        
                            <li class="account-nav__item"><a href="{{route('cart')}}">My Cart</a></li>  
                            <li class="account-nav__item account-nav__item--active"><a href="{{route('transactionHistory')}}">Transaction History</a></li>     
                            
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
                        <div class="card-header"><h5>Transaction History</h5></div>
                        <div class="card-divider"></div>
                        <div class="card-table">
                            <div class="table-responsive-sm">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Transaction id</th>
                                            <th>Amount</th>
                                            <th>Reason</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{$item->transaction_id}}</td>
                                            <td>৳ {{$item->amount}}</td>
                                            <td>
                                                @if ($item->reason=='money_upload')
                                                    Money Upload
                                                @else
                                                    Order Place
                                                @endif
                                            </td>
                                            <td>{{$item->status}}</td>
                                        </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-divider"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>


@endsection
