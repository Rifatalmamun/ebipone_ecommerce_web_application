
@extends('layouts.app')
@section('content')


            <!-- site__header / end --><!-- site__body -->
            <div class="site__body">
                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">
                        <div class="row">
                            
                            <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                                <div class="card">
                                    <div class="order-header">
                                        <div class="order-header__actions"><a href="{{route('home')}}" class="btn btn-xs btn-secondary">Back to profile</a></div>
                                        <h5 class="font-weight-bold">Upload Money || ৳ <span>{{$amount}}</span> </h5>
                                    </div>
                               
                                    
                                </div>
                                <div class="row mt-3 no-gutters mx-n2">
                                    <div class="col-sm-6 col-12 px-2">
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge" style="color: #0D6EAD; font-weight: bold;"> User Information </div>
                                            <div class="address-card__body">
                                                <div class="address-card__name">  
                                                    {{Auth::user()->name}}   
                                                </div>
                                                <div class="address-card__row">
                                                    
           

                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Phone Number</div>
                                                    <div class="address-card__row-content"> {{Auth::user()->phone}}  </div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Email Address</div>
                                                    <div class="address-card__row-content"> {{Auth::user()->email}} </div>
                                                </div> 
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Address</div>
                                                    <div class="address-card__row-content"> {{Auth::user()->address}}  </div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">District</div>
                                                    <div class="address-card__row-content"> {{Auth::user()->district}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 px-2">
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge" style="color: #0D6EAD; font-weight: bold;"> Payment Information </div>
                                            <div class="address-card__body">
                                                <div class="address-card__name">  
                                                    BDT. {{$amount}}/-   
                                                </div>
                                                <div class="address-card__row">
                                                    
           

                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Upload Date</div>
                                                    <div class="address-card__row-content"> {{date('Y'.'-M'.'-d')}}  </div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Upload Time</div>
                                                    <div class="address-card__row-content"> 
                                                        @php
                                                            date_default_timezone_set("Asia/Dhaka");
                                                                echo date("h:i:sa");
                                                        @endphp    
                                                    </div>
                                                </div> 
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">Address</div>
                                                    <div class="address-card__row-content"> {{Auth::user()->address}}  </div>
                                                </div>
                                                <div class="address-card__row">
                                                    <div class="address-card__row-title">District</div>
                                                    <div class="address-card__row-content"> {{Auth::user()->district}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button class="btn btn-lg btn-block" id="sslczPayBtn"
                                        token="13"
                                        postdata=""
                                        order="{{Auth::user()->id}}" 
                                            endpoint="{{ url('/pay-via-ajax') }}" style="background: #166FB0; color: #fff;"> <i class="fas fa-cloud-upload-alt mx-2"></i> UPLOAD MONEY NOW
                                        </button>
                                    </div>
                                    <div class="col-md-4"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="block-space block-space--layout--before-footer"></div>
            </div>



@endsection

