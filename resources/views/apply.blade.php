

@extends('layouts.app')
@section('content')


<div class="site__body ">


        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--xl">

                <div class="row">
                    <div class="col">
                        <h6 class="text-dark font-weight-bold">eBipoine Online Apply Form</h6>
                    </div>
                </div>

                <div class="row">
                   
                    <div class="col-12 col-lg-3" style="background: rgb(240, 240, 240);height: 80px; margin: 25px;">
                        @if (Auth::user()->isVendor==1)
                            <h6><a href="{{route('shop')}}" style="margin-top: 20px; display: block; text-align: center; font-weight: bold">My Shop</a></h6>
                        @else
                            <h6><a href="{{route('shop.create')}}" style="margin-top: 20px; display: block; text-align: center; font-weight: bold">Create Shop</a></h6>
                        @endif
                        
                    </div>

                    <div class="col-12 col-lg-3" style="background: rgb(240, 240, 240);height: 80px; margin: 25px;">
                        @if (Auth::user()->isWarehouse==1)
                            <h6><a href="{{route('warehouse.index')}}" style="margin-top: 20px; display: block; text-align: center; font-weight: bold">My Pickup Point</a></h6>
                        @else
                            <h6><a href="{{route('pickuppoint.create')}}" style="margin-top: 20px; display: block; text-align: center; font-weight: bold">Create Pickup Point</a></h6>
                        @endif
                    </div>

                    <div class="col-12 col-lg-3" style="background: rgb(240, 240, 240);height: 80px; margin: 25px;">
                        
                            <h6><a onclick="alert('Warehouse Comming Soon...!')" href="javascript:void(0)" style="margin-top: 20px; display: block; text-align: center; font-weight: bold">Create Warehouse</a></h6>
                        
                    </div>


                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br>


@endsection
