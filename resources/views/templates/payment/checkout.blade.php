
@php
$profit = DB::table('profit_manages')->where('id','1')->first();
@endphp



@extends('layouts.app')
@section('content')

        @if (Cart::count()==0)
        
        <div class="site__body">
            <div class="block-header block-header--has-breadcrumb block-header--has-title">
                <div class="container">
                    <div class="block-header__body">
                        <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb__list">
                                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                                <li class="breadcrumb__item breadcrumb__item--parent"><a href="{{route('cart')}}" class="breadcrumb__item-link">Shopping Cart</a></li>
                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Checkout</span></li>
                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>
                        <h1 class="block-header__title text-secondary">Checkout</h1>


                        <div class="card" style="width: 100%;">
                            <div class="card-header"><h5 class="text-secondary"> <i class="fa fa-shopping-cart "></i> Cart Empty to Chekout!!</h5></div>
                            <div class="card-divider"></div>
                           
                            <div class="card-divider"></div>
                            <div class="card-img">
                                <img src="{{asset('public/media/paper-bag.png')}}" alt="" style="width: 15%; margin-left: 38%;padding: 50px 0; opacity: .8;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        
        @else 


        <!-- site__header / end --><!-- site__body -->
        <div class="site__body">
            <div class="block-header block-header--has-breadcrumb block-header--has-title">
                <div class="container">
                    <div class="block-header__body">
                        <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb__list">
                                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                                <li class="breadcrumb__item breadcrumb__item--parent"><a href="{{route('cart')}}" class="breadcrumb__item-link">Shopping Cart</a></li>
                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Checkout</span></li>
                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>
                        <h1 class="block-header__title">Checkout</h1>
                    </div>
                </div>
            </div>
            <form action="{{route('order.with.payment')}}" method="POST">
                @csrf
            <div class="checkout block">
                <div class="container container--max--xl">
                    <div class="row">
            
                        <div class="col-12 col-lg-6 col-xl-7">
                            
                                <div class="card mb-lg-0">
                                    <div class="card-body card-body--padding--2">
                                        <h3 class="card-title">Billing Address</h3>

                                        <div class="form-group"><label for="checkout-street-address">Name</label> <input type="text" class="form-control"  placeholder="Product receiver name" value="{{Auth::user()->name}}" name="b_name" required/></div> 

                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-6"><label for="checkout-email">Email address</label> <input type="email" class="form-control"  placeholder="Email address" value="{{Auth::user()->email}}" name="b_email" required /></div>
                                            <div class="form-group col-md-6"><label for="checkout-phone">Phone</label> <input type="number" class="form-control"  placeholder="Phone" name="b_phone" value="{{Auth::user()->phone}}" required /></div>
                                        
                                        </div>

                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-6"><label for="checkout-email">Post Code</label> <input type="number" class="form-control"  placeholder="Post Code" value="{{Auth::user()->postcode}}" name="b_postcode" required/></div>

                                            <div class="form-group col-md-6"><label for="checkout-phone">Thana</label> <input type="text" class="form-control"  placeholder="Thana" name="b_thana" value="{{Auth::user()->ps}}" required/></div>
                                        
                                        </div>

                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-6"><label for="checkout-email">Area/Village</label> <input type="text" class="form-control"  placeholder="Area/village" value="{{Auth::user()->village}}" name="b_area" required/></div>

                                            <div class="form-group col-md-6"><label for="checkout-phone">District</label> 

                                                <!-- <input type="text" class="form-control" placeholder="District" value="{{Auth::user()->district}}" name="b_district" required/> -->

                                                <select name="b_district" class="form-control" required>

                                                            <option value="">--Select one--</option>
                                                            <option value="Barguna" <?php if(Auth::user()->district=='Barguna') echo 'selected'; ?>>Barguna</option>
                                                            <option value="Barisal" <?php if(Auth::user()->district=='Barisal') echo 'selected'; ?>>Barisal</option>
                                                            <option value="Jhalokati" <?php if(Auth::user()->district=='Jhalokati') echo 'selected'; ?>>Jhalokati</option>
                                                            <option value="Patuakhali" <?php if(Auth::user()->district=='Patuakhali') echo 'selected'; ?>>Patuakhali</option>
                                                            <option value="Pirojpur" <?php if(Auth::user()->district=='Pirojpur') echo 'selected'; ?>>Pirojpur</option>
                                                            <option value="Bandarban" <?php if(Auth::user()->district=='Bandarban') echo 'selected'; ?>>Bandarban</option>
                                                            <option value="Brahmanbaria" <?php if(Auth::user()->district=='Brahmanbaria') echo 'selected'; ?>>Brahmanbaria</option>
                                                            <option value="Chandpur" <?php if(Auth::user()->district=='Chandpur') echo 'selected'; ?>>Chandpur</option>
                                                            <option value="Chittagong" <?php if(Auth::user()->district=='Chittagong') echo 'selected'; ?>>Chittagong</option>
                                                            <option value="Comilla" <?php if(Auth::user()->district=='Comilla') echo 'selected'; ?>>Comilla</option>
                                                            <option value="Cox\'s Bazar" <?php if(Auth::user()->district=='Cox\'s Bazar') echo 'selected'; ?>>Cox's Bazar</option>
                                                            <option value="Feni" <?php if(Auth::user()->district=='Feni') echo 'selected'; ?>>Feni</option>
                                                            <option value="Khagrachhari" <?php if(Auth::user()->district=='Khagrachhari') echo 'selected'; ?>>Khagrachhari</option>
                                                            <option value="Lakshmipur" <?php if(Auth::user()->district=='Lakshmipur') echo 'selected'; ?>>Lakshmipur</option>
                                                            <option value="Noakhali" <?php if(Auth::user()->district=='Noakhali') echo 'selected'; ?>>Noakhali</option>
                                                            <option value="Rangamati" <?php if(Auth::user()->district=='Rangamati') echo 'selected'; ?>>Rangamati</option>
                                                            <option value="Dhaka" <?php if(Auth::user()->district=='Dhaka') echo 'selected'; ?>>Dhaka</option>
                                                            <option value="Faridpur" <?php if(Auth::user()->district=='Faridpur') echo 'selected'; ?>>Faridpur</option>
                                                            <option value="Gazipur" <?php if(Auth::user()->district=='Gazipur') echo 'selected'; ?>>Gazipur</option>
                                                            <option value="Gopalganj" <?php if(Auth::user()->district=='Gopalganj') echo 'selected'; ?>>Gopalganj</option>
                                                            <option value="Kishoreganj" <?php if(Auth::user()->district=='Kishoreganj') echo 'selected'; ?>>Kishoreganj</option>
                                                            <option value="Madaripur" <?php if(Auth::user()->district=='Madaripur') echo 'selected'; ?>>Madaripur</option>
                                                            <option value="Manikganj" <?php if(Auth::user()->district=='Manikganj') echo 'selected'; ?>>Manikganj</option>
                                                            <option value="Munshiganj" <?php if(Auth::user()->district=='Munshiganj') echo 'selected'; ?>>Munshiganj</option>
                                                            <option value="Narayanganj" <?php if(Auth::user()->district=='Narayanganj') echo 'selected'; ?>>Narayanganj</option>
                                                            <option value="Narsingdi" <?php if(Auth::user()->district=='Narsingdi') echo 'selected'; ?>>Narsingdi</option>
                                                            <option value="Rajbari" <?php if(Auth::user()->district=='Rajbari') echo 'selected'; ?>>Rajbari</option>
                                                            <option value="Shariatpur" <?php if(Auth::user()->district=='Shariatpur') echo 'selected'; ?>>Shariatpur</option>
                                                            <option value="Tangail" <?php if(Auth::user()->district=='Tangail') echo 'selected'; ?>>Tangail</option>
                                                            <option value="Bagerhat" <?php if(Auth::user()->district=='Bagerhat') echo 'selected'; ?>>Bagerhat</option>
                                                            <option value="Chuadanga" <?php if(Auth::user()->district=='Chuadanga') echo 'selected'; ?>>Chuadanga</option>
                                                            <option value="Jessore" <?php if(Auth::user()->district=='Jessore') echo 'selected'; ?>>Jessore</option>
                                                            <option value="Jhenaidah" <?php if(Auth::user()->district=='Jhenaidah') echo 'selected'; ?>>Jhenaidah</option>
                                                            <option value="Khulna" <?php if(Auth::user()->district=='Khulna') echo 'selected'; ?>>Khulna</option>
                                                            <option value="Kushtia" <?php if(Auth::user()->district=='Kushtia') echo 'selected'; ?>>Kushtia</option>
                                                            <option value="Magura" <?php if(Auth::user()->district=='Magura') echo 'selected'; ?>>Magura</option>
                                                            <option value="Meherpur" <?php if(Auth::user()->district=='Meherpur') echo 'selected'; ?>>Meherpur</option>
                                                            <option value="Narail" <?php if(Auth::user()->district=='Narail') echo 'selected'; ?>>Narail</option>
                                                            <option value="Satkhira" <?php if(Auth::user()->district=='Satkhira') echo 'selected'; ?>>Satkhira</option>
                                                            <option value="Jamalpur" <?php if(Auth::user()->district=='Jamalpur') echo 'selected'; ?>>Jamalpur</option>
                                                            <option value="Mymensingh" <?php if(Auth::user()->district=='Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                                                            <option value="Netrokona" <?php if(Auth::user()->district=='Netrokona') echo 'selected'; ?>>Netrokona</option>
                                                            <option value="Sherpur" <?php if(Auth::user()->district=='Sherpur') echo 'selected'; ?>>Sherpur</option>
                                                            <option value="Bogra" <?php if(Auth::user()->district=='Bogra') echo 'selected'; ?>>Bogra</option>
                                                            <option value="Joypurhat" <?php if(Auth::user()->district=='Joypurhat') echo 'selected'; ?>>Joypurhat</option>
                                                            <option value="Naogaon" <?php if(Auth::user()->district=='Naogaon') echo 'selected'; ?>>Naogaon</option>
                                                            <option value="Natore" <?php if(Auth::user()->district=='Natore') echo 'selected'; ?>>Natore</option>
                                                            <option value="Chapainawabganj" <?php if(Auth::user()->district=='Chapainawabganj') echo 'selected'; ?>>Chapainawabganj</option>
                                                            <option value="Pabna" <?php if(Auth::user()->district=='Pabna') echo 'selected'; ?>>Pabna</option>
                                                            <option value="Rajshahi" <?php if(Auth::user()->district=='Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                                                            <option value="Sirajganj" <?php if(Auth::user()->district=='Sirajganj') echo 'selected'; ?>>Sirajganj</option>
                                                            <option value="Dinajpur" <?php if(Auth::user()->district=='Dinajpur') echo 'selected'; ?>>Dinajpur</option>
                                                            <option value="Gaibandha" <?php if(Auth::user()->district=='Gaibandha') echo 'selected'; ?>>Gaibandha</option>
                                                            <option value="Kurigram" <?php if(Auth::user()->district=='Kurigram') echo 'selected'; ?>>Kurigram</option>
                                                            <option value="Lalmonirhat" <?php if(Auth::user()->district=='Lalmonirhat') echo 'selected'; ?>>Lalmonirhat</option>
                                                            <option value="Nilphamari" <?php if(Auth::user()->district=='Nilphamari') echo 'selected'; ?>>Nilphamari</option>
                                                            <option value="Panchagarh" <?php if(Auth::user()->district=='Panchagarh') echo 'selected'; ?>>Panchagarh</option>
                                                            <option value="Rangpur" <?php if(Auth::user()->district=='Rangpur') echo 'selected'; ?>>Rangpur</option>
                                                            <option value="Thakurgaon" <?php if(Auth::user()->district=='Thakurgaon') echo 'selected'; ?>>Thakurgaon</option>
                                                            <option value="Habiganj" <?php if(Auth::user()->district=='Habiganj') echo 'selected'; ?>>Habiganj</option>
                                                            <option value="Moulvibazar" <?php if(Auth::user()->district=='Moulvibazar') echo 'selected'; ?>>Moulvibazar</option>
                                                            <option value="Sunamganj" <?php if(Auth::user()->district=='Sunamganj') echo 'selected'; ?>>Sunamganj</option>
                                                            <option value="Sylhet" <?php if(Auth::user()->district=='Sylhet') echo 'selected'; ?>>Sylhet</option>
                                                            <option value="Bhola" <?php if(Auth::user()->district=='Bhola') echo 'selected'; ?>>Bhola</option>
                                                        </select>  





                                            </div>
                                        
                                        </div>

                                        <div class="form-group">
                                            <textarea  class="form-control" rows="4" placeholder="Billing Address here" name="billing_address" value={{Auth::user()->address}} required></textarea>
                                        </div>

                                        <div class="form-group mt-2">
                                            <div class="form-check">
                                                <span class="input-check form-check-input">
                                                    <span class="input-check__body">
                                                        <input onclick="hideShippingAddressBlock()" class="input-check__input" type="checkbox" id="checkout-different-address" name="same" value="same"/> <span class="input-check__box"></span>
                                                        <span class="input-check__icon">
                                                            <svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" /></svg>
                                                        </span>
                                                    </span>
                                                </span>
                                                <label class="form-check-label" for="checkout-different-address">Shipping address and Billing address same?</label>
                                            </div>
                                        </div>
                                
                                    </div>
                                    <div class="card-divider"></div>                                                        
                                    <div style="display: block;" id="shippingAddressBlock" class="card-body card-body--padding--2">
                                        <h3 class="card-title">Shipping Address</h3>
                                        
                                        <div class="form-group">
                                            <textarea id="sShippingAddressId" class="form-control" rows="4" placeholder="Shiping Address here" name="shipping_address" required></textarea>
                                        </div>

                                        <div class="form-group"><label for="checkout-street-address">Name</label> <input  id="sNameId" type="text" class="form-control"  placeholder="Product receiver name"  name="s_name" required/></div> 

                                        <div class="form-row">              
                                            <div class="form-group col-md-6"><label for="checkout-email">Email address</label> <input id="sEmailId" type="email" class="form-control"  placeholder="Email address"  name="s_email" required/></div>
                                            <div class="form-group col-md-6"><label for="checkout-phone">Phone</label> <input id="sPhoneId"id="sPhoneId"type="number" class="form-control"  placeholder="Phone" name="s_phone" required/></div>
                                        </div>
                                                                                                                            
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label for="checkout-email">Post Code</label> <input id="sPostCodeId" type="number" class="form-control"  placeholder="Post Code"  name="s_postcode" required/></div>
                                            <div class="form-group col-md-6"><label for="checkout-phone">Thana</label> <input id="sThanaId" type="text" class="form-control"  placeholder="Thana" name="s_thana"  required/></div>
                                        </div>
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-6"><label for="checkout-email">Area/Village</label> <input id="sAreaId" type="text" class="form-control"  placeholder="Area/village"  name="s_area" required/></div>

                                            <div class="form-group col-md-6"><label for="checkout-phone">District</label> 



                                                <!-- <input  id="sDistrictId" type="text" class="form-control" placeholder="District"  name="s_district" required/> -->

                                                <select id="sDistrictId" name="s_district" class="form-control" required>

                                                            <option value="">--Select one--</option>
                                                            <option value="Barguna" <?php if(Auth::user()->district=='Barguna') echo 'selected'; ?>>Barguna</option>
                                                            <option value="Barisal" <?php if(Auth::user()->district=='Barisal') echo 'selected'; ?>>Barisal</option>
                                                            <option value="Jhalokati" <?php if(Auth::user()->district=='Jhalokati') echo 'selected'; ?>>Jhalokati</option>
                                                            <option value="Patuakhali" <?php if(Auth::user()->district=='Patuakhali') echo 'selected'; ?>>Patuakhali</option>
                                                            <option value="Pirojpur" <?php if(Auth::user()->district=='Pirojpur') echo 'selected'; ?>>Pirojpur</option>
                                                            <option value="Bandarban" <?php if(Auth::user()->district=='Bandarban') echo 'selected'; ?>>Bandarban</option>
                                                            <option value="Brahmanbaria" <?php if(Auth::user()->district=='Brahmanbaria') echo 'selected'; ?>>Brahmanbaria</option>
                                                            <option value="Chandpur" <?php if(Auth::user()->district=='Chandpur') echo 'selected'; ?>>Chandpur</option>
                                                            <option value="Chittagong" <?php if(Auth::user()->district=='Chittagong') echo 'selected'; ?>>Chittagong</option>
                                                            <option value="Comilla" <?php if(Auth::user()->district=='Comilla') echo 'selected'; ?>>Comilla</option>
                                                            <option value="Cox\'s Bazar" <?php if(Auth::user()->district=='Cox\'s Bazar') echo 'selected'; ?>>Cox's Bazar</option>
                                                            <option value="Feni" <?php if(Auth::user()->district=='Feni') echo 'selected'; ?>>Feni</option>
                                                            <option value="Khagrachhari" <?php if(Auth::user()->district=='Khagrachhari') echo 'selected'; ?>>Khagrachhari</option>
                                                            <option value="Lakshmipur" <?php if(Auth::user()->district=='Lakshmipur') echo 'selected'; ?>>Lakshmipur</option>
                                                            <option value="Noakhali" <?php if(Auth::user()->district=='Noakhali') echo 'selected'; ?>>Noakhali</option>
                                                            <option value="Rangamati" <?php if(Auth::user()->district=='Rangamati') echo 'selected'; ?>>Rangamati</option>
                                                            <option value="Dhaka" <?php if(Auth::user()->district=='Dhaka') echo 'selected'; ?>>Dhaka</option>
                                                            <option value="Faridpur" <?php if(Auth::user()->district=='Faridpur') echo 'selected'; ?>>Faridpur</option>
                                                            <option value="Gazipur" <?php if(Auth::user()->district=='Gazipur') echo 'selected'; ?>>Gazipur</option>
                                                            <option value="Gopalganj" <?php if(Auth::user()->district=='Gopalganj') echo 'selected'; ?>>Gopalganj</option>
                                                            <option value="Kishoreganj" <?php if(Auth::user()->district=='Kishoreganj') echo 'selected'; ?>>Kishoreganj</option>
                                                            <option value="Madaripur" <?php if(Auth::user()->district=='Madaripur') echo 'selected'; ?>>Madaripur</option>
                                                            <option value="Manikganj" <?php if(Auth::user()->district=='Manikganj') echo 'selected'; ?>>Manikganj</option>
                                                            <option value="Munshiganj" <?php if(Auth::user()->district=='Munshiganj') echo 'selected'; ?>>Munshiganj</option>
                                                            <option value="Narayanganj" <?php if(Auth::user()->district=='Narayanganj') echo 'selected'; ?>>Narayanganj</option>
                                                            <option value="Narsingdi" <?php if(Auth::user()->district=='Narsingdi') echo 'selected'; ?>>Narsingdi</option>
                                                            <option value="Rajbari" <?php if(Auth::user()->district=='Rajbari') echo 'selected'; ?>>Rajbari</option>
                                                            <option value="Shariatpur" <?php if(Auth::user()->district=='Shariatpur') echo 'selected'; ?>>Shariatpur</option>
                                                            <option value="Tangail" <?php if(Auth::user()->district=='Tangail') echo 'selected'; ?>>Tangail</option>
                                                            <option value="Bagerhat" <?php if(Auth::user()->district=='Bagerhat') echo 'selected'; ?>>Bagerhat</option>
                                                            <option value="Chuadanga" <?php if(Auth::user()->district=='Chuadanga') echo 'selected'; ?>>Chuadanga</option>
                                                            <option value="Jessore" <?php if(Auth::user()->district=='Jessore') echo 'selected'; ?>>Jessore</option>
                                                            <option value="Jhenaidah" <?php if(Auth::user()->district=='Jhenaidah') echo 'selected'; ?>>Jhenaidah</option>
                                                            <option value="Khulna" <?php if(Auth::user()->district=='Khulna') echo 'selected'; ?>>Khulna</option>
                                                            <option value="Kushtia" <?php if(Auth::user()->district=='Kushtia') echo 'selected'; ?>>Kushtia</option>
                                                            <option value="Magura" <?php if(Auth::user()->district=='Magura') echo 'selected'; ?>>Magura</option>
                                                            <option value="Meherpur" <?php if(Auth::user()->district=='Meherpur') echo 'selected'; ?>>Meherpur</option>
                                                            <option value="Narail" <?php if(Auth::user()->district=='Narail') echo 'selected'; ?>>Narail</option>
                                                            <option value="Satkhira" <?php if(Auth::user()->district=='Satkhira') echo 'selected'; ?>>Satkhira</option>
                                                            <option value="Jamalpur" <?php if(Auth::user()->district=='Jamalpur') echo 'selected'; ?>>Jamalpur</option>
                                                            <option value="Mymensingh" <?php if(Auth::user()->district=='Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                                                            <option value="Netrokona" <?php if(Auth::user()->district=='Netrokona') echo 'selected'; ?>>Netrokona</option>
                                                            <option value="Sherpur" <?php if(Auth::user()->district=='Sherpur') echo 'selected'; ?>>Sherpur</option>
                                                            <option value="Bogra" <?php if(Auth::user()->district=='Bogra') echo 'selected'; ?>>Bogra</option>
                                                            <option value="Joypurhat" <?php if(Auth::user()->district=='Joypurhat') echo 'selected'; ?>>Joypurhat</option>
                                                            <option value="Naogaon" <?php if(Auth::user()->district=='Naogaon') echo 'selected'; ?>>Naogaon</option>
                                                            <option value="Natore" <?php if(Auth::user()->district=='Natore') echo 'selected'; ?>>Natore</option>
                                                            <option value="Chapainawabganj" <?php if(Auth::user()->district=='Chapainawabganj') echo 'selected'; ?>>Chapainawabganj</option>
                                                            <option value="Pabna" <?php if(Auth::user()->district=='Pabna') echo 'selected'; ?>>Pabna</option>
                                                            <option value="Rajshahi" <?php if(Auth::user()->district=='Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                                                            <option value="Sirajganj" <?php if(Auth::user()->district=='Sirajganj') echo 'selected'; ?>>Sirajganj</option>
                                                            <option value="Dinajpur" <?php if(Auth::user()->district=='Dinajpur') echo 'selected'; ?>>Dinajpur</option>
                                                            <option value="Gaibandha" <?php if(Auth::user()->district=='Gaibandha') echo 'selected'; ?>>Gaibandha</option>
                                                            <option value="Kurigram" <?php if(Auth::user()->district=='Kurigram') echo 'selected'; ?>>Kurigram</option>
                                                            <option value="Lalmonirhat" <?php if(Auth::user()->district=='Lalmonirhat') echo 'selected'; ?>>Lalmonirhat</option>
                                                            <option value="Nilphamari" <?php if(Auth::user()->district=='Nilphamari') echo 'selected'; ?>>Nilphamari</option>
                                                            <option value="Panchagarh" <?php if(Auth::user()->district=='Panchagarh') echo 'selected'; ?>>Panchagarh</option>
                                                            <option value="Rangpur" <?php if(Auth::user()->district=='Rangpur') echo 'selected'; ?>>Rangpur</option>
                                                            <option value="Thakurgaon" <?php if(Auth::user()->district=='Thakurgaon') echo 'selected'; ?>>Thakurgaon</option>
                                                            <option value="Habiganj" <?php if(Auth::user()->district=='Habiganj') echo 'selected'; ?>>Habiganj</option>
                                                            <option value="Moulvibazar" <?php if(Auth::user()->district=='Moulvibazar') echo 'selected'; ?>>Moulvibazar</option>
                                                            <option value="Sunamganj" <?php if(Auth::user()->district=='Sunamganj') echo 'selected'; ?>>Sunamganj</option>
                                                            <option value="Sylhet" <?php if(Auth::user()->district=='Sylhet') echo 'selected'; ?>>Sylhet</option>
                                                            <option value="Bhola" <?php if(Auth::user()->district=='Bhola') echo 'selected'; ?>>Bhola</option>
                                                        </select>  






                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                            <div class="card mb-0">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Product List</h3>
                                    <table class="checkout__totals">
                                        
                                        <thead class="checkout__totals-header">
                                            <tr>
                                                <th>Product & Quantity</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="checkout__totals-products">
                                            
                                            @foreach (Cart::content() as $item)
                                            <tr>
                                                <td> {{$item->name}} ({{$item->qty}})  </td> 
                                                <td>৳ {{$item->price}}</td> 
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        <tbody class="checkout__totals-subtotals">
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>৳ {{Cart::total()}}</td>
                                            </tr>
                                            
                                            {{-- <tr>
                                                <th>Shipping  <small>Pay After Received Product. </small> </th>
                                                <td>৳ {{$profit->shipping_charge}}</td>
                                            </tr> --}}

                                        </tbody>
                                        <tfoot class="checkout__totals-footer">
                                            <tr>
                                                <th style="font-size: 20px;">Total Payment</th>
                                                <td style="font-size: 20px;">৳ {{Cart::total()}}</td> 
                                            </tr>
                                        </tfoot>
                                    </table>
                                
                                
                                    <button type="submit" class="btn btn-primary btn-xl btn-block">Proceed</button> 
                                    
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>


        @endif




       



<script>

    function hideShippingAddressBlock(){
        
        let hideId = document.getElementById('shippingAddressBlock')

        let s_address_id = document.getElementById('sShippingAddressId')
        let s_name_id = document.getElementById('sNameId')
        let s_email_id = document.getElementById('sEmailId')
        let s_phone_id = document.getElementById('sPhoneId')
        let s_postcode_id = document.getElementById('sPostCodeId')
        let s_thana_id = document.getElementById('sThanaId')
        let s_area_id = document.getElementById('sAreaId')
        let s_district_id = document.getElementById('sDistrictId')


        // by default all required 
            s_address_id.setAttribute("required", "")
            s_name_id.setAttribute("required", "")
            s_email_id.setAttribute("required", "")
            s_phone_id.setAttribute("required", "")
            s_postcode_id.setAttribute("required", "")
            s_thana_id.setAttribute("required", "")
            s_area_id.setAttribute("required", "")
            s_district_id.setAttribute("required", "")


        if(hideId.style.display=='block'){
            hideId.style.display='none'

            s_address_id.removeAttribute("required")
            s_name_id.removeAttribute("required")
            s_email_id.removeAttribute("required")
            s_phone_id.removeAttribute("required")
            s_postcode_id.removeAttribute("required")
            s_thana_id.removeAttribute("required")
            s_area_id.removeAttribute("required")
            s_district_id.removeAttribute("required")


        }else{
            hideId.style.display='block'

            s_address_id.setAttribute("required", "")

            s_name_id.setAttribute("required", "")
            s_email_id.setAttribute("required", "")
            s_phone_id.setAttribute("required", "")
            s_postcode_id.setAttribute("required", "")
            s_thana_id.setAttribute("required", "")
            s_area_id.setAttribute("required", "")
            s_district_id.setAttribute("required", "")


        }
    }

</script>



@endsection
