
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

                                        <h5 class="fdfsd">#Invoice - {{$gift->voucher_code}}</h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table>

                                                <tbody class="card-table__body card-table__body--merge-rows">
                                                    <tr>
                                                        <th>Gift Price</th>
                                                        <td>৳ {{$gift->amount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gift Offer</th>
                                                        <td>৳ {{$gift->offer}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Amount</th>
                                                        <td>৳ {{ ($gift->amount) + ($gift->offer) }}</td>
                                                    </tr>
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th> <i class="fa fa-pen"></i> </th>
                                                        <td> 
                                                            <span class="text-danger font-weight-bold" style="text-transform: uppercase">
                                                                If you buy this gift voucher, ৳ {{ ($gift->amount) + ($gift->offer) }} will be added to your gift balance after {{$gift->time_duration}} days.
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 no-gutters mx-n2">
                                    <div class="col-sm-6 col-12 px-2">
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Current Status</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name">  
                                                    {{Auth::user()->name}} 
                                                </div>
                                                <div class="address-card__row">
                                                    
                                                    E-mail - {{Auth::user()->email}} <br /> <br />
                                                    Phone - {{Auth::user()->phone}} <br /> <br />
                                                    Main Balance - ৳ {{Auth::user()->user_balance}} <br /> <br />
                                                    Cashback Balance - ৳ {{Auth::user()->user_cashback}} <br /> <br />
                                                    Gift Balance - ৳ {{Auth::user()->user_cashback}} <br /> <br />

                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                                        <div class="card address-card address-card--featured">
                                            <div class="address-card__badge tag-badge tag-badge--theme">Gift Voucher</div>
                                            <div class="address-card__body">
                                                <div class="address-card__name">  
                                                    {{$gift->voucher_name}} 
                                                </div>

                                                <div class="address-card__row">
                                                    
                                                    Code - {{$gift->voucher_code}}  <br /> <br />
                                                    Price - ৳ {{$gift->amount}}  <br /> <br />
                                                    Offer - ৳ {{$gift->offer}} <br /> <br />
                                                    Duration - {{$gift->time_duration}} Days <br /> <br />
                                                    Date & Time -
                                                    
                                                    @php
                                                        date_default_timezone_set('Asia/Dhaka');
                                                        echo date("Y.m.d").' & '.date("h:i:sa");
                                                    @endphp

                                                     <br/> <br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">

                                        <a href="{{URL::to('gift-purchase-complete-'.$gift->id)}}" class="btn btn-primary btn-lg btn-block">Purchase ৳ {{$gift->amount}}</a>
                                       
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
