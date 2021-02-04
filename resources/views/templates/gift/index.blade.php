
@extends('layouts.app')
@section('content')

<div class="site__body">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="index.html" class="breadcrumb__item-link">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--parent"><a href="#" class="breadcrumb__item-link">Breadcrumb</a></li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Current Page</span></li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title">Gift Voucher</h1>
            </div>
        </div>
    </div>
    <div class="block block-split">
        <div class="container">
            <div class="block-split__row row no-gutters">
                <div class="block-split__item block-split__item-content col">
                    <div class="block">
                        <div class="categories-list categories-list--layout--columns-4-full">
                            <ul class="categories-list__body">
                                
                                @foreach ($gift as $item)
                                <li class="categories-list__item">
                                    <a href="{{URL::to('gift-voucher-'.$item->voucher_code)}}">
                                        <div class="image image--type--category">
                                            <div class="image__body"><img class="image__tag" src="{{asset($item->voucher_picture)}}" alt="" /></div>
                                        </div>
                                        <div class="categories-list__item-name">{{$item->voucher_name}}</div>
                                    </a>
                                    <div class="categories-list__item-products">Price: ৳ {{$item->amount}}</div>
                                </li>
                                <li class="categories-list__divider"></li>
                                @endforeach
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="block-space block-space--layout--divider-nl"></div>
                  
                    
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </div>
</div>

@endsection
