


@extends('layouts.app')
@section('content')


<div class="site__body">

    @if ($tag=='shop')
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--parent"><a href="{{URL::to('shops')}}" class="breadcrumb__item-link">Shop</a></li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">{{$singleShop->shop_name}}</span></li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
            <!-- Banner And Logo Start Here -->   
            <div>
                <div class="CoverPhoto___StyledDiv-zk3bll-0 hffRps img-fluid shadow-sm  mb-3">
                @if ($singleShop->shop_banner!=null)
                    <img src="{{asset($singleShop->shop_banner)}}" alt="Shop Banner" title="banner" class="w-full lg:hidden" style="width: 100%; height: auto; border-radius: 5px;">
                @else
                    <img src="{{asset('public/frontend/images/shopbanner.jpg')}}" alt="Shop Banner" title="banner" class="w-full lg:hidden" style="width: 100%; height: auto; border-radius: 5px;">
                @endif

    

            </div>

                <div class="shadow-sm p-3 mb-2 bg-white rounded" style="height: auto; width: 100%; box-shadow: 10px  #e0e0e0; border-radius: 5px;">
                    <div class="row">
                        <!-- <div class="col-lg-2 col-md-4 col-sm-6 bg-danger ">

                            <img src="images/banners/logo.jpg" style="width: 100%; height: 100%;" >   
                        </div> -->

                    <div class="col-md-2 ">
                        @if ($singleShop->shop_logo!=null)
                        <img class="shop_logo overflow-hidden img-fluid" src="{{asset($singleShop->shop_logo)}}" alt="Shop" title="shop">
                        @else
                        <img class="shop_logo overflow-hidden img-fluid" src="{{asset('public/media/shop_logo/shop_logo.png')}}" alt="Shop" title="shop">
                        @endif
                        
                    </div>
                        <div class="col-md-10 " style="height: auto; margin-top: 5px;">
                            <div class="p-3">
                                <div class="text-left sm:text-left">
                                    <h2 class="shop_name" >{{$singleShop->shop_name}}</h2> 
                                    <p class="shop_details Details___StyledP-sc-10bhd3a-1 fIGmwe text-gray-700">{{$singleShop->shop_address}}</p> 
                                </div>
                            </div>
                            <div class="cus_button_box ">
                                <div class="child_box">
                                    <span><a href="#" class="cus_link_bn btn btn-info text-sm items-center"><i class="fa fa-star"></i> Ratting</a></span>
                                    <span><a href="#" class="cus_link_bn btn btn-danger"><i class="far fa-bell"></i> Follow</a></span> 
                                    <span><a href="#" class="cus_link_bn btn btn-dark"><i class="far fa-comments"></i> Review</a></span>
                                </div>

                            </div>    
                        </div>      
                    </div>  
                </div>
            </div>

            </div>
        </div>
    </div>
    @endif
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-3 d-flex">
                    @if ($tag=='shop' )
                    <div class="account-nav flex-grow-1">
                        <h4 class="account-nav__title"> <i class="fa fa-list-alt"></i> Category</h4>
                        <ul class="widget-categories__list widget-categories__list--root" data-collapse data-collapse-opened-class="widget-categories__item--open">
                            
                            @php
                          
                                $cat = DB::table('categories')->get();
                            @endphp
                            
                            @foreach ($cat as $item) 
                            <li class="widget-categories__item" data-collapse-item> 
                                <a href="{{URL::to('category/'.Str::slug($item->url_name))}}" class="widget-categories__link"> {{$item->category_name}} </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                
                    @else
                    
                        <div class="account-nav flex-grow-1">
                            <h4 class="text-dark account-nav__title"> <i class="fa fa-list-alt"></i> Categories</h4>
                            <ul class="widget-categories__list widget-categories__list--root" data-collapse data-collapse-opened-class="widget-categories__item--open">
                                @foreach ($category as $item) 
                                <li class="widget-categories__item" data-collapse-item> 
                                    <a href="{{URL::to('category/'.Str::slug($item->url_name))}}" class="widget-categories__link"> {{$item->category_name}} </a>
                                    
                                    @php
                                        $count_subcategory = DB::table('subcategories')->where('category_id',$item->id)->count();
                                        $subcategory = DB::table('subcategories')->where('category_id',$item->id)->get();
                                    @endphp

                                    @if ($count_subcategory>0)
                                    <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                                    <div class="widget-categories__container" data-collapse-content>
                                        <ul class="widget-categories__list widget-categories__list--child">
                                            @foreach ($subcategory as $item)
                                            <button class="widget-categories__expander" type="button" data-collapse-trigger></button>
                                                    <li class="widget-categories__item">
                                                        <a href="{{URL::to(('category/').Str::slug($item->url_name))}}" class="widget-categories__link">{{$item->subcategory_name}}</a>
                                                    </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                </div>
                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    
                        @if ($count==0)
                        <div class="card">
                            <div class="text-dark card-header"><h5>Product Empty!</h5></div>
                            <div class="card-divider"></div>
                            <div class="card-body card-body--padding--2">
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <div class="alert alert-light" role="alert">
                                            <p> No product found !! </p> 
                                            <hr />
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                    <div class="site__body">

                        <div class="block-split">
                    
                            <div class="container">
                                <div class="block-split__row row no-gutters">
                                    <div class="block-split__item block-split__item-content col">
                                        <div class="block">
                                            <div class="products-view">
                                                <div class="products-view__options view-options view-options--offcanvas--mobile">
                                                    <div class="view-options__body">
                                                        <button type="button" class="view-options__filters-button filters-button">
                                                            <span class="filters-button__icon">
                                                                <svg width="16" height="16">
                                                                    <path
                                                                        d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2
                                                                                            C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2
                                                                                            C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3
                                                                                            C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z"
                                                                    />
                                                                </svg>
                                                            </span>
                                                            <span class="filters-button__title">Filters</span> <span class="filters-button__counter">3</span>
                                                        </button>
                                                        <div class="view-options__layout layout-switcher">
                                                            <div class="layout-switcher__list">
                                                                <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false">
                                                                    <svg width="16" height="16">
                                                                        <path
                                                                            d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
                                                                                H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8
                                                                                C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8
                                                                                C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z"
                                                                        />
                                                                    </svg>
                                                                </button>
                                                                <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                                                                    <svg width="16" height="16">
                                                                        <path
                                                                            d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8
                                                                               v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z"
                                                                        />
                                                                    </svg>
                                                                </button>
                                                                <button type="button" class="layout-switcher__button" data-layout="list" data-with-features="false">
                                                                    <svg width="16" height="16">
                                                                        <path
                                                                            d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
                                                                                   H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z"
                                                                        />
                                                                    </svg>
                                                                </button>
                                                                <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                                                                    <svg width="16" height="16">
                                                                        <path
                                                                            d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z
                                                                                     M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8
                                                                                    C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z"
                                                                        />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                  
                                                </div>
                                                <div class="products-view__list products-list products-list--grid--4" data-layout="grid" data-with-features="false">
                                                    <div class="products-list__head">
                                                        <div class="products-list__column products-list__column--image">Product</div>
                                                        {{-- <div class="products-list__column products-list__column--meta">Product name</div> --}}
                                                        {{-- <div class="products-list__column products-list__column--product">Product</div>
                                                        <div class="products-list__column products-list__column--rating">Rating</div> --}}
                                                        {{-- <div class="products-list__column products-list__column--price">Price</div> --}}
                                                    </div>
                                                    <div class="products-list__content">
                                                        
                                                        @foreach ($products as $item)
                                                        <div class="products-list__item">
                                                            <div class="product-card">
                                                                <div class="product-card__actions-list">
                                                                    
                                                                    
                                                                        <button class="addwishlist product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list" data-id="{{ $item->id }}">
                                                                            <svg width="16" height="16">
                                                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                                                                l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"></path>
                                                                            </svg>
                                                                        </button>

                                                                    
                                                                </div>
                                                                <div class="product-card__image">
                                                                    <div class="image image--type--product">
                                                                        <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}" class="image__body">
                                                                        <img class="image__tag" src="{{asset($item->image_one)}}" alt="" /></a>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="product-card__info">
                                                                    
                                                                    <div class="product-card__name">
                                                                        <div>
                                                                           
                                                                            <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}" > {{$item->product_name}} </a> 
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="product-card__features">
                                                                        <ul>
                                                                            <li>Code - {{$item->product_code}}</li>
                                                                            <li>Category - {{$item->category_name}}</li>
                                                                            <li>Sub-category - {{$item->subcategory_name}}</li>
                                                                            <li>Shop name - {{$item->shop_name}}</li>
                                                                            <li>
                                                                                @if ($item->product_quantity>10)
                                                                                    Stock - Available
                                                                                @elseif($item->product_quantity<=5)
                                                                                Stock - Limited
                                                                                @else
                                                                                Stock - Not Available 
                                                                                @endif
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-card__footer">
                                                                    <div class="product-card__prices"><div class="product-card__price product-card__price--current"> ৳ {{$item->present_price}}</div></div>


                                                                    @if ($item->product_color==null || $item->product_size==null)

                                                                        
                                                                        <button class="addcart product-card__addtocart-icon" type="button" aria-label="Add to cart" data-id="{{ $item->id }}"> 
                                                                                        
                                                                            <svg width="20" height="20">            
                                                                                <circle cx="7" cy="17" r="2" />
                                                                                <circle cx="15" cy="17" r="2" />
                                                                                <path
                                                                                    d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                                                                    V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                                                                    C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>      
                                                                            </svg>
                    
                                                                        </button> 
                                                                       

                                                                        
                                                                        @else 
                                                                            
                                                                            <button id="{{ $item->id }}" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)" class="product-card__addtocart-icon" type="button" aria-label="Add to cart"> 
                    
                                                                                <svg width="20" height="20">            
                                                                                    <circle cx="7" cy="17" r="2" />
                                                                                    <circle cx="15" cy="17" r="2" />
                                                                                    <path
                                                                                        d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                                                                        V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                                                                        C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>      
                                                                                </svg>
                    
                                                                            </button>
                                                                            
                                                                            
                    
                                                                        @endif
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                         
                                                        

                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-space block-space--layout--before-footer"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>



<!--product cart add modal-->


<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Product </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="row">
          
            <div class="col-md-6 ml-auto">
                <ul class="list-group">
                  <li class="list-group-item"> <h5 id="pname"></h5></span></li>
               <li class="list-group-item">Product code: <span id="pcode"> </span></li>
                <li class="list-group-item">Category:  <span id="pcat"> </span></li>
                <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
                <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Available</span></li>
              </ul>
            </div>
            <div class="col-md-6 ">
                
                <form action="{{route('insert.into.cart')}}" method="post"> 
                  @csrf

                  <input type="hidden" name="product_id" id="product_id">

                  <div class="product-form__row">
                    <div class="product-form__title">Color</div>
                    <div class="product-form__control">
                        <div class="input-radio-color">
                            <div class="input-radio-color__list">
                                
                                    <label id="whiteInput" class="input-radio-color__item input-radio-color__item--white" style="color: #fff;" data-toggle="tooltip" title="White">
                                        <input type="radio" name="color" value="white" required/> <span></span>
                                    </label>
                                
                                    <label id="greenInput" class="input-radio-color__item input-radio-color__item--green" style="color: rgb(10, 243, 60);" data-toggle="tooltip" title="Green">
                                        <input type="radio" name="color" value="green" /> <span></span>
                                    </label>
                                                               
                                    <label id="blueInput" class="input-radio-color__item input-radio-color__item--blue" style="color: rgb(0, 119, 255);" data-toggle="tooltip" title="Blue">
                                        <input type="radio" name="color" value="blue" /> <span></span>
                                    </label>
                             
                                    <label id="redInput" class="input-radio-color__item input-radio-color__item--red" style="color: rgb(255, 6, 6);" data-toggle="tooltip" title="Red">
                                        <input type="radio" name="color" value="red" /> <span></span>
                                    </label>
                                
                                    <label id="blackInput" class="input-radio-color__item input-radio-color__item--black" style="color: rgb(0, 0, 0);" data-toggle="tooltip" title="Black">
                                        <input type="radio" name="color" value="black" /> <span></span>
                                    </label>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="product-form__row mb-5">
                    <div class="product-form__title">Size</div>
                    <div class="product-form__control">
                        <div class="input-radio-label">
                            <div class="input-radio-label__list">
                            
                    
                                        <label id="sId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Small">   S
                                        <input type="radio" name="size" value="small" required/><span></span>
                                            
                                        </label>

                                        <label id="mId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Medium">   M
                                        <input type="radio" name="size" value="medium" /><span></span>
                                            
                                        </label>

                                        <label id="lId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Large">   L
                                        <input type="radio" name="size" value="large" /><span></span>
                                            
                                        </label>

                                        <label id="xlId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="XL">   XL
                                        <input type="radio" name="size" value="xl" /><span></span>
                                            
                                        </label>

                                        <label id="xlIId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="XXL">   XXL
                                        <input type="radio" name="size" value="xxl" /><span></span>
                                            
                                        </label>

                            </div>
                        </div>
                    </div>
                </div>
                  
                  {{-- <div class="form-group" id="colordiv">
                    <label for="">Color</label>
                    
                    <select name="product_color" class="form-control">
                    
                    </select>
                  
                  </div> --}}



                  <div class="form-group mt-3">
                    <div class="product-form__title">Quantity</div>

                    cartmodal





                    <input type="number" class="form-control" value="1" min="1" name="qty">
                  </div>
                  <button type="submit" class="btn btn-primary">Add To Cart</button>
                </form>
             </div>
           </div>
        </div>  
      </div>
    </div>
  </div>
  
  <!--modal end-->

<script type="text/javascript">
      function productview(id){
            $.ajax({
                       url: "{{  url('/cart/product/view/') }}/"+id,
                       type:"GET",
                       dataType:"json",
                       success:function(data) {
                         $('#pname').text(data.product.product_name);
                         $('#pcat').text(data.product.category_name);
                         $('#psubcat').text(data.product.subcategory_name);
                         $('#pcode').text(data.product.product_code);
                         $('#product_id').val(data.product.id);
                            // product color condition
                                if (data.product.red!='1') {
                                    $('#redInput').hide();
                                }
                                if (data.product.green!='1') {
                                    $('#greenInput').hide();
                                }
                                if (data.product.blue!='1') {
                                    $('#blueInput').hide();
                                }
                                if (data.product.black!='1') {
                                    $('#blackInput').hide();
                                }
                                if (data.product.white!='1') {
                                    $('#whiteInput').hide();
                                }
                            
                            // product size condition
                            if (data.product.s!='1') {
                                    $('#sId').hide();
                            }
                            if (data.product.m!='1') {
                                    $('#mId').hide();
                            }
                            if (data.product.l!='1') {
                                    $('#lId').hide();
                            }
                            if (data.product.xl!='1') {
                                    $('#xlId').hide();
                            }
                            if (data.product.xxl!='1') {
                                    $('#xlIId').hide();
                            }

               }
        })
      }
</script>
  

@endsection



