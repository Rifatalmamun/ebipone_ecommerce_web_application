@extends('layouts.app')
@section('content')


<div class="site__body">
    <div class="block-header block-header--has-breadcrumb">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--parent"><a href="{{route('gift')}}" class="breadcrumb__item-link">Gift</a></li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">{{$gift->voucher_name}}</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block-split block-split--has-sidebar">
        <div class="container">
            <div class="block-split__row row no-gutters">
                <div class="block-split__item block-split__item-sidebar col-auto">
                    <div class="card widget widget-categories">
                        <div class="widget__header"><h4>Gift Shop</h4></div>
                        <ul class="widget-categories__list widget-categories__list--root" data-collapse data-collapse-opened-class="widget-categories__item--open">
                           
                            @php
                                $shop_ids  = $gift->shop_ids;

                                // echo $shop_ids;
                                $shopIds_explode = explode (",", $shop_ids); 
                            @endphp

                            @foreach ($shopIds_explode as $id)

                                @php
                                    $sn = DB::table('users')->where('id',$id)->first() ;
                                @endphp

                                <li class="widget-categories__item" data-collapse-item>
                                    {{-- <a href="{{URL::to('shop/'.Str::slug($sn->shop_name))}}" class="widget-categories__link"> {{$sn->shop_name}} </a> --}}
                                </li>
                            @endforeach 
                        
                        </ul>
                    </div>
                
                </div>
                <div class="block-split__item block-split__item-content col-auto">
                    <div class="product product--layout--sidebar">
                        <div class="product__body">
                            <div class="product__card product__card--one"></div>
                            <div class="product__card product__card--two"></div>
                            <div class="product-gallery product-gallery--layout--product-sidebar product__gallery" data-layout="product-sidebar">
                                <div class="product-gallery__featured">
                                    <button type="button" class="product-gallery__zoom">
                                        <svg width="24" height="24">
                                            <path
                                                d="M15,18c-2,0-3.8-0.6-5.2-1.7c-1,1.3-2.1,2.8-3.5,4.6c-2.2,2.8-3.4,1.9-3.4,1.9s-0.6-0.3-1.1-0.7
                                                c-0.4-0.4-0.7-1-0.7-1s-0.9-1.2,1.9-3.3c1.8-1.4,3.3-2.5,4.6-3.5C6.6,12.8,6,11,6,9c0-5,4-9,9-9s9,4,9,9S20,18,15,18z M15,2
                                                c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S18.9,2,15,2z M16,13h-2v-3h-3V8h3V5h2v3h3v2h-3V13z"
                                            />
                                        </svg>
                                    </button>
                                    <div class="owl-carousel">

                                        <a class="image image--type--product" href="{{asset($gift->voucher_picture)}}" target="_blank" data-width="700" data-height="700" >
                                            <div class="image__body"><img class="image__tag" src="{{asset($gift->voucher_picture)}}" alt="" /></div>
                                        </a>

                                    </div>
                                </div>
                               
                            </div>
                            <div class="product__header">
                                <h1 class="product__title">{{$gift->voucher_name}}</h1>
                                <div class="product__subtitle">
                                    
                                    <div class="status-badge status-badge--style--success product__fit status-badge--has-icon status-badge--has-text">
                                        <div class="status-badge__body">
                                            <div class="status-badge__icon">
                                                <svg width="13" height="13"><path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" /></svg>
                                            </div>
                                            <div class="status-badge__text">Price: ৳ {{$gift->amount}} </div>
                                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__info">

                                
                                    

                                    <div class="product__info-card">
                                        <div class="product__info-body">
                                            <div class="product__badge tag-badge tag-badge--sale">Gift voucher</div>
                                            <div class="product__prices-stock">
                                                <div class="product__prices"><div class="product__price product__price--current">৳ {{$gift->amount}}</div> 
                                                </div>
                                            </div>

                                            <div class="product__meta">
                                                <table>
                                                    <tr>
                                                        <th>OFFER </th>
                                                        <td>৳ {{$gift->offer}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>GIFT CODE  </th>
                                                        <td>{{$gift->voucher_code}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>LAST DATE</th>
                                                        @if ($gift->end_date!=null)
                                                            <td>{{$gift->end_date}}</td>
                                                        @else
                                                            <td>-------</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>DURATION</th>
                                                        <td>{{$gift->time_duration}} Days</td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="product__actions">
                                            
                                            <div class="product__actions-item product__actions-item--addtocart">
                                                
                                                

                                                @guest
                                                    <a href="{{route('login')}}" class="btn btn-primary btn-lg btn-block">Sign in to purchase</a>
                                                @else 
                                                    @if ((Auth::user()->user_balance)>=($gift->amount) )
                                                        <a href="{{URL::to('/purchase-gift-'.$gift->voucher_code)}}" class="btn btn-primary btn-lg btn-block">Purchase</a>
                                                    @else
                                                        <span class="text-danger font-weight-bold"> ৳ Balance insuficient!</span>

                                                    @endif
                                                @endguest
                                                
                                                
                                            </div>
                                            <div class="product__actions-divider"></div>
                                        </div>
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

