
@extends('layouts.app')
@section('content')


<!-- Profile dashboard banner  -->



<div class="site__body text-secondary">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            @if (Auth::user())
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
                            <li class="account-nav__item account-nav__item--active"><a href="{{route('cart')}}">My Cart</a></li>  
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

                        @if (Cart::count()<=0)
                            

                        <div class="card" style="width: 100%;">
                            <div class="card-header"><h5 class="text-secondary"> <i class="fa fa-shopping-cart "></i> Cart Empty!!</h5></div>
                            <div class="card-divider"></div>
                           
                            <div class="card-divider"></div>
                            <div class="card-img">
                                <img src="{{asset('public/media/paper-bag.png')}}" alt="" style="width: 20%; margin-left: 38%;padding: 50px 0; opacity: .7;">
                            </div>
                        </div>



                        @else
                        <div class="dashboard__orders card">
         
                            <div class="card-header pull-right" > 
                                <a href="{{URL::to('cart/destroy')}}" class="text-secondary"> <i class="fa fa-trash mx-1 "></i> Clear Cart</a> 
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-table">
                                <div class="table-responsive-sm">
                                    <form action="{{route('updateCartItem')}}" method="POST" class="text-secondary">
                                        @csrf
                                        
                                        <table>
                                        <thead>
                                            <tr>
                                                <th style="width: 30%;">Product name</th>
                                                <th style="width: 20%;">Unit Price</th>
                                                <th style="width: 15%;">Quantity</th>
                                                <th style="width: 20%;">Total Price</th>
                                                <!-- <th>Cashback</th> -->
                                                <th style="width: 10%;">Action</th>

                                                <th style="width: 5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach (Cart::content() as $item)

                                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                            <tr>
                                                @php 

                                                    $name_slice = substr($item->name,0,20) ;
                                                    
                                                        $get_product = DB::table('products')->where('id',$item->id)->first(); 
                                                        
                                                        $cashback = (($get_product->cashback * $get_product->present_price)/100);

                                                    @endphp

                                                
                                                <td>
                                                	<a href="{{URL::to($get_product->un_id.'/'.Str::slug($get_product->product_name))}}" target="_blank" style="text-decoration: none;" class="text-secondary">{{$item->name}}</a> 
                                                </td>

                                                <td>৳ {{$item->price}}</td>
                                                <td>
                                                	<input class="form-control text-secondary" style="border: none;" type="number" min="1" name="qty" value="{{$item->qty}}"> 
                                                </td>
                                                <td>৳ {{$item->price * $item->qty}}</td>
                                                
                                                <td>
                                                    <input type="submit" class="btn btn-sm text-secondary" value="Update">
                                                </td>

                                                <td>
                                                	<a href="{{URL::to('delete/cart/product/'.$item->rowId)}}" class="btn btn-sm"><span class="text-danger"> <i class="fas fa-times"></i> </span> </a>
                                                </td>
                                            </tr> 
                                            @endforeach
                                           

                                        </tbody>
                                    </table>


                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                       
                           {{-- <div style="margin-top: 75px;">
                            <form class="cart-table__coupon-form form-row">
                                <div class="form-group mb-0 col flex-grow-1"><input type="text" class="form-control form-control-sm" placeholder="Coupon Code" /></div>
                                <div class="form-group mb-0 col-auto"><button type="button" class="btn btn-sm btn-primary">Apply Coupon</button></div>
                            </form>
                           </div> --}}
                                
                    
                    

                        <div class="cart__totals mt-2">
                            <div class="card">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Cart Totals</h3>
                                    <table class="cart__totals-table">
                                        <thead>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>৳ {{Cart::total()}}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <td>৳ {{Cart::total()}}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <a class="btn btn-primary btn-xl btn-block" href="{{route('proceed.to.checkout')}}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                        
                        @endif

                        
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                
                <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                    <div class="dashboard">

                        @if (Cart::count()<=0)
                            

                        <div class="card" style="width: 100%;">
                            <div class="card-header"><h5 class="text-secondary"> <i class="fa fa-shopping-cart "></i> Cart Empty!!</h5></div>
                            <div class="card-divider"></div>
                           
                            <div class="card-divider"></div>
                            <div class="card-img">
                                <img src="{{asset('public/media/paper-bag.png')}}" alt="" style="width: 20%; margin-left: 38%;padding: 50px 0; opacity: .8;">
                            </div>
                        </div>

                        @else
                        <div class="dashboard__orders card">
         
                            <div class="card-header pull-right" > 
                                <a href="{{URL::to('cart/destroy')}}" class="text-secondary"> <i class="fa fa-trash mx-1 text-secondary"></i> Clear Cart</a> 
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-table">
                                <div class="table-responsive-sm">
                                    <form action="{{route('updateCartItem')}}" method="POST" class="text-secondary">
                                        @csrf
                                        
                                        <table>
                                        <thead>
                                            <tr>
                                                <th style="width: 30%;">Product name</th>
                                                <th style="width: 20%;">Unit Price</th>
                                                <th style="width: 15%;">Quantity</th>
                                                <th style="width: 20%;">Total Price</th>
                                                <!-- <th>Cashback</th> -->
                                                <th style="width: 10%;">Action</th>

                                                <th style="width: 5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach (Cart::content() as $item)

                                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                            <tr>
                                                @php 

                                                    $name_slice = substr($item->name,0,20) ;
                                                    
                                                        $get_product = DB::table('products')->where('id',$item->id)->first(); 
                                                        
                                                        $cashback = (($get_product->cashback * $get_product->present_price)/100);

                                                    @endphp

                                                
                                                <td>
                                                	<a href="{{URL::to($get_product->un_id.'/'.Str::slug($get_product->product_name))}}" target="_blank" style="text-decoration: none;" class="text-secondary">{{$item->name}}</a> 
                                                </td>

                                                <td>৳ {{$item->price}}</td>
                                                <td>
                                                	<input class="form-control text-secondary" style="border: none;" type="number" min="1" name="qty" value="{{$item->qty}}"> 
                                                </td>
                                                <td>৳ {{$item->price * $item->qty}}</td>
                                                
                                                <td>
                                                    <input type="submit" class="btn btn-sm text-secondary" value="Update">
                                                </td>

                                                <td>
                                                	<a href="{{URL::to('delete/cart/product/'.$item->rowId)}}" class="btn btn-sm"><span class="text-danger"> <i class="fas fa-times"></i> </span> </a>
                                                </td>
                                            </tr> 
                                            @endforeach
                                           

                                        </tbody>
                                    </table>


                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="cart__totals">
                            <div class="card">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Cart Totals</h3>
                                    <table class="cart__totals-table">
                                        <thead>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>৳ {{Cart::total()}}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>
                                                   	 ৳ 00 
                                                    {{-- <div><a href="#">Calculate shipping</a></div> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tax</th>
                                                <td>৳ 00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <td>৳ {{Cart::total()}}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @guest
					<a class="btn btn-primary btn-xl btn-block" href="{{route('login')}}">Login to Proceed</a>
				    @else
				<a class="btn btn-primary btn-xl btn-block" href="{{route('proceed.to.checkout')}}">Proceed to checkout</a>
				    @endguest		
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>



@endsection
