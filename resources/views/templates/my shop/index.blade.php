 
@extends('layouts.app') 
@section('content')

<div class="site__body">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--parent"><a href="{{URL::to('shops')}}" class="breadcrumb__item-link">Shop</a></li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">All Shop</span></li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title text-secondary">Shop</h1> 
            </div>
        </div>
    </div>
    <div class="block block-brands block-brands--layout--columns-8-full mb-5">
        <div class="container">
           
            <ul class="block-brands__list">
                
                @foreach ($shops as $item)
                <li class="block-brands__item"> 
                    <a href="{{URL::to('shop/'.Str::slug($item->shop_name))}}" class="block-brands__item-link">
                        @if ($item->shop_logo!=null)
                        <img src="{{asset($item->shop_logo)}}" alt=""/> 
                        @else
                        <img src="{{asset('public/media/shop_logo/shop_logo.png')}}" alt=""/> 
                        @endif
                        <span class="block-brands__item-name">{{$item->shop_name}}</span>
                    </a>
                </li>
                <li class="block-brands__divider" role="presentation"></li>
                @endforeach
                
            </ul>
        </div>
    </div>
</div>
  


@endsection



