



@extends('layouts.app')
@section('content')

@if($product->status=='block')
	
	<script>window.location = "https://ebipone.com/";</script> 

@endif

<div class="site__body">
    <div class="block-header block-header--has-breadcrumb">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--parent"><a href="{{route('shop')}}" class="breadcrumb__item-link">My shop</a></li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">product view</span></li>
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
                        <div class="widget__header"><h4>Categories</h4></div>
                        <ul class="widget-categories__list widget-categories__list--root" data-collapse data-collapse-opened-class="widget-categories__item--open">
                            @foreach ($category as $item)
                            <li class="widget-categories__item" data-collapse-item>
                                <a href="{{URL::to(('category/').Str::slug($item->url_name))}}" class="widget-categories__link"> {{$item->category_name}} </a>
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
                                                    <a href="{{URL::to(('category/').Str::slug($item->subcategory_name))}}" class="widget-categories__link">{{$item->subcategory_name}}</a>
                                                </li> 
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
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

                                        <a class="image image--type--product" href="{{asset($product->image_one)}}" target="_blank" data-width="700" data-height="700" >
                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_one)}}" alt="" /></div>
                                        </a>

                                        <a class="image image--type--product" href="{{asset($product->image_two)}}" target="_blank" data-width="700" data-height="700" >

                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_two)}}" alt="" /></div>
                                        </a>

                                        <a class="image image--type--product" href="{{asset($product->image_three)}}" target="_blank" data-width="700" data-height="700">
                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_three)}}" alt="" /></div>
                                        </a>
                                        
                                        <a class="image image--type--product" href="{{asset($product->image_four)}}" target="_blank" data-width="700" data-height="700">

                                            <div class="image__body">
                                                <img class="image__tag" src="{{asset($product->image_four)}}" alt="" /> 
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="product-gallery__thumbnails">
                                    <div class="owl-carousel">
                                        <div class="product-gallery__thumbnails-item image image--type--product">
                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_one)}}" alt="" /></div>
                                        </div>
                                        <div class="product-gallery__thumbnails-item image image--type--product">
                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_two)}}" alt="" /></div>
                                        </div>
                                        <div class="product-gallery__thumbnails-item image image--type--product">
                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_three)}}" alt="" /></div>
                                        </div>
                                        <div class="product-gallery__thumbnails-item image image--type--product">
                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_four)}}" alt="" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__header">
                                <h1 class="product__title">{{$product->product_name}}</h1>
                                <div class="product__subtitle">
                                    
                                    <div class="status-badge status-badge--style--success product__fit status-badge--has-icon status-badge--has-text">
                                        <div class="status-badge__body">
                                            <div class="status-badge__icon">
                                                <svg width="13" height="13"><path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" /></svg>
                                            </div>
                                            <div class="status-badge__text">{{$product->category_name}} --- {{$product->subcategory_name}}</div>
                                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            

				
                            
                            <div class="product__info">

                                @if ($product->status=='active')

                                        <form action="{{route('insert.to.cart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">

                                            <div class="product__info-card">
                                                <div class="product__info-body">
                                                    <div class="product__badge tag-badge tag-badge--sale">
								
							@if ($product->product_quantity<2)
                                                        	<span >Stock Out</span>
                                                        @elseif($product->product_quantity<10)
                                                        	<span>Stock Limited</span>
                                                        @else 
                                                        	<span class="text">Available </span>
                                                        @endif			
											
												
							</div>
                                                    <div class="product__prices-stock">
                                                        <div class="product__prices"><div class="product__price product__price--current">৳ {{$product->selling_price}}</div>
                                                        </div>
                                                        <div class="status-badge status-badge--style--success product__stock status-badge--has-text">
                                                            <div class="status-badge__body">
                                                                <div class="status-badge__text"> 
										
								    @if ($product->product_quantity<2)
                                                                    	<span >Need extra 7 days</span>
                                                                    @elseif($product->product_quantity<10)
                                                                    	<span>Hurry Up! </span>
                                                                    @else 
                                                                    	<span class="text">In Stock </span>
                                                                    @endif
										
									
									 </div>
                                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="In&#x20;Stock"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product__meta">
                                                        <table class="text-secondary">

							    <tr>
                                                                <th style="width: 50%;font-size: 13px;">Max buy quantity</th>
                                                                <td style="width: 50%; text-align: center;font-size: 13px;">
                                                                    @if ($product->max_buy==0)
                                                                        Unlimited
                                                                    @else
                                                                         @if ($product->max_buy<10)
                                                                        	0{{$product->max_buy}}
                                                                        @else
                                                                        	{{$product->max_buy}}
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 50%;font-size: 13px;">Get Cashback </th>
                                                                    @php
                                                                        $get_cb_tk = ($product->cashback *$product->present_price )/100; 
                                                                    @endphp
                                                                <td style="width: 50%; text-align: center;font-size: 13px;">৳ {{$get_cb_tk}} ({{$product->cashback}}%)</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 50%;font-size: 13px;">Use Cashback </th>
                                                                    @php
                                                                        $use_cb_tk = ($product->cashback_use *$product->present_price )/100; 
                                                                    @endphp
                                                                <td style="width: 50%; text-align: center;font-size: 13px;">৳ {{$use_cb_tk}} ({{$product->cashback_use}}%)</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 50%;font-size: 13px;">Use Gift Balance </th>
                                                                    @php
                                                                        $use_gf_tk = ($product->gift_use * $product->present_price )/100; 
                                                                    @endphp
                                                                <td style="width: 50%; text-align: center;font-size: 13px;">৳ {{$use_gf_tk}} ({{$product->gift_use}}%)</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th style="width: 50%;font-size: 13px;"> CODE  </th>
                                                                <td style="width: 50%; text-align: center;font-size: 13px;" >{{$product->product_code}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 50%;font-size: 13px;">Category</th>
                                                                <td style="width: 50%; text-align: center;font-size: 13px;"><a href="{{URL::to(('category/').Str::slug($product->category_name))}}" class="text-secondary" style="text-decoration: none;">{{$product->category_name}}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 50%;font-size: 13px;">Sub category</th>
                                                                <td style="width: 50%; text-align: center;font-size: 13px;"><a href="{{URL::to(('category/').Str::slug($product->subcategory_name))}}" class="text-secondary" style="text-decoration: none;">{{$product->subcategory_name}}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 50%;font-size: 13px;">Shop name</th>
                                                                <td style="width: 50%; text-align: center;font-size: 13px;">{{$product->shop_name}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="product-form product__form">
                                                    <div class="product-form__body">
                                                        <div class="product-form__row mb-3">
                                                            @if ($product->product_size==null)
                                                            <div class="product-form__title">Size - No Specific size </div>  
                                                            @else 
                                                            <div class="product-form__title">Size</div>
                                                            @endif
                                                            
                                                            <div class="product-form__control">
                                                                <div class="input-radio-label">
                                                                    <div class="input-radio-label__list">
                                                                    
                                                                                @if ($product->s==1)
                                                                                <label class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Small">   S
                                                                                <input type="radio" name="size" value="small" required/><span></span>
                                                                                    
                                                                                </label>
                                                                        
                                                                                @endif

                                                                                @if ($product->m==1)
                                                                                <label class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Medium">   M
                                                                                <input type="radio" name="size" value="medium" /><span></span>
                                                                                    
                                                                                </label>
                                                                        
                                                                                @endif

                                                                                @if ($product->l==1)
                                                                                <label class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Large">   L
                                                                                <input type="radio" name="size" value="large" /><span></span>
                                                                                    
                                                                                </label>
                                                                        
                                                                                @endif

                                                                                @if ($product->xl==1)
                                                                                <label class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="XL">   XL
                                                                                <input type="radio" name="size" value="xl" /><span></span>
                                                                                    
                                                                                </label>
                                                                        
                                                                                @endif

                                                                                @if ($product->xxl==1)
                                                                                <label class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="XXL">   XXL
                                                                                <input type="radio" name="size" value="xxl" /><span></span>
                                                                                    
                                                                                </label>
                                                                        
                                                                                @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-form__row">
                                                            @if ($product->product_color==null)
                                                                <div class="product-form__title mt-5">Color - No Specific Color</div>
                                                            @else
                                                                <div class="product-form__title mt-5">Color</div>
                                                            @endif
                                                            
                                                            <div class="product-form__control">
                                                                <div class="input-radio-color">
                                                                    <div class="input-radio-color__list">
                                                                        
                                                                        @if ($product->white=='1')
                                                                            <label class="input-radio-color__item input-radio-color__item--white" style="color: #fff;" data-toggle="tooltip" title="White">
                                                                                <input type="radio" name="color" value="white" required/> <span></span>
                                                                            </label>
                                                                        @endif

                                                                        @if ($product->green=='1')
                                                                            <label class="input-radio-color__item input-radio-color__item--green" style="color: rgb(10, 243, 60);" data-toggle="tooltip" title="Green">
                                                                                <input type="radio" name="color" value="green" /> <span></span>
                                                                            </label>
                                                                        @endif

                                                                        @if ($product->blue=='1')
                                                                            <label class="input-radio-color__item input-radio-color__item--blue" style="color: rgb(0, 119, 255);" data-toggle="tooltip" title="Blue">
                                                                                <input type="radio" name="color" value="blue" /> <span></span>
                                                                            </label>
                                                                        @endif

                                                                        @if ($product->red=='1')
                                                                            <label class="input-radio-color__item input-radio-color__item--red" style="color: rgb(255, 6, 6);" data-toggle="tooltip" title="Red">
                                                                                <input type="radio" name="color" value="red" /> <span></span>
                                                                            </label>
                                                                        @endif

                                                                        @if ($product->black=='1')
                                                                            <label class="input-radio-color__item input-radio-color__item--black" style="color: rgb(0, 0, 0);" data-toggle="tooltip" title="Black">
                                                                                <input type="radio" name="color" value="black" /> <span></span>
                                                                            </label>
                                                                        @endif

                                                                        @if ($product->yellow=='1')
                                                                            <label class="input-radio-color__item input-radio-color__item--black" style="color: rgb(255, 217, 0);" data-toggle="tooltip" title="Yellow">
                                                                                <input type="radio" name="color" value="yellow" /> <span></span>
                                                                            </label>
                                                                        @endif

                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__actions">
                                                    <div class="product__actions-item product__actions-item--quantity">
                                                        <div class="input-number">

                                                            @if ($product->max_buy!=0)
                                                                <input class="input-number__input form-control form-control-lg" type="number" min="1" max="{{$product->max_buy}}" value="1" name="qty" />
                                                            @else
                                                                <input class="input-number__input form-control form-control-lg" type="number" min="1" value="1" name="qty" />
                                                            @endif

                                                            


                                                            <div class="input-number__add"></div> 
                                                            <div class="input-number__sub"></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="product__actions-item product__actions-item--addtocart">
                                                        <button type="submit" class="btn btn-primary btn-lg btn-block"> Add to cart</button>
                                                    </div>


                                                    <div class="product__actions-divider"></div>
                                                    <button  data-id="{{ $product->id }}"  class=" addwishlist product__actions-item product__actions-item--wishlist" type="button">
                                                        <svg width="16" height="16">
                                                            <path
                                                                d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                                                    l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"
                                                            />
                                                        </svg>
                                                        <span>Add to wishlist</span>                                                                                                      
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                  

                                @endif

                            </div>
                           


                            <div class="product__tabs product-tabs product-tabs--layout--sidebar">
                                <ul class="product-tabs__list">
                                    <li class="product-tabs__item product-tabs__item--active"><a href="#product-tab-description">Description</a></li>
                                    <li class="product-tabs__item"><a href="#product-tab-specification">Specification</a></li>
                                    
                                    
                                </ul>
                                <div class="product-tabs__content">
                                    <div class="product-tabs__pane product-tabs__pane--active" id="product-tab-description">
                                        <div class="typography">
                                            <p>
                                                {{$product->product_description}}
                                            </p>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="product-tabs__pane" id="product-tab-specification">
                                        <div class="spec">
                                            <div class="spec__section">
                                                <h4 class="spec__section-title">General</h4>
                                                <div class="spec__row">
                                                    <div class="spec__name">Name</div>
                                                    <div class="spec__value">{{$product->product_name}}</div>
                                                </div>
                                                <div class="spec__row">
                                                    <div class="spec__name">Category</div>
                                                    <div class="spec__value"> {{$product->category_name}} </div>
                                                </div>
                                                <div class="spec__row">
                                                    <div class="spec__name">Sub category</div>
                                                    <div class="spec__value"> {{$product->subcategory_name}} </div>
                                                </div>
                                                <div class="spec__row">
                                                    <div class="spec__name">Price</div>
                                                    <div class="spec__value">৳ {{$product->selling_price}}</div>
                                                </div>

						
						<div class="spec__row">
                                                    <div class="spec__name">Get Cashback</div>
                                                    @php
                                                        $get_cb_tk = ($product->cashback *$product->present_price )/100; 
                                                    @endphp
                                                    <div class="spec__value">৳ {{$get_cb_tk}} ({{$product->cashback}}%)</div>
                                                </div>

                                                <div class="spec__row">
                                                    <div class="spec__name">Use Cashback</div>
                                                    @php
                                                        $use_cb_tk = ($product->cashback_use *$product->present_price )/100; 
                                                    @endphp
                                                    <div class="spec__value">৳ {{$use_cb_tk}} ({{$product->cashback_use}}%)</div>
                                                </div>

                                                <div class="spec__row">
                                                    <div class="spec__name">Use Gift Balance</div>
                                                    @php
                                                                        $use_gf_tk = ($product->gift_use * $product->present_price )/100; 
                                                    @endphp
                                                    <div class="spec__value">৳ {{$use_gf_tk}} ({{$product->gift_use}}%)</div>
                                                </div>


                                                
                                            </div>
                                            <div class="spec__section">
                                                <h4 class="spec__section-title">Authorization</h4>
                                                <div class="spec__row">
                                                    <div class="spec__name">Shop name</div>
                                                    <div class="spec__value"> {{$product->shop_name}} </div>
                                                </div>
                                                <div class="spec__row">
                                                    <div class="spec__name">Product Code</div>
                                                    <div class="spec__value"> {{$product->product_code}} </div>
                                                </div>
                                                
                                            </div>
                                            <div class="spec__disclaimer">
                                                {{-- Information on technical characteristics, the delivery set, the country of manufacture and the appearance of the goods is for reference only and is based on the latest information
                                                available at the time of publication. --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-space block-space--layout--divider-nl"></div>

                    @if ($product->status=='active')
                    <div class="block block-products-carousel" data-layout="grid-4-sidebar">
                        <div class="container">
                            <div class="section-header">
                                <div class="section-header__body">
                                    <h2 class="section-header__title">Related Products</h2>
                                    <div class="section-header__spring"></div>
                                    <div class="section-header__arrows">
                                        <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                            <button class="arrow__button" type="button">
                                                <svg width="7" height="11">
                                                    <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                            <button class="arrow__button" type="button">
                                                <svg width="7" height="11">
                                                    <path
                                                        d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                        C-0.1,9.8-0.1,10.4,0.3,10.7z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="section-header__divider"></div>
                                </div>
                            </div>
                            <div class="block-products-carousel__carousel">
                                <div class="block-products-carousel__carousel-loader"></div>
                                <div class="owl-carousel">
                                    


                                    @foreach ($releted_product as $item)
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--layout--grid">
                                                <div class="product-card__actions-list">
                                                    
                                                    @if ($item->product_owner_id!=1)
                                                        <button class="addwishlist product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list" data-id="{{ $item->id }}">
                                                            <svg width="16" height="16">
                                                                <path
                                                                    d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                                                        l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"
                                                                />
                                                            </svg>
                                                        </button>
                                                    @endif

                                                    
                                                    
                                                    

                                                </div>
                                                <div class="product-card__image">
                                                    <div class="image image--type--product">
                                                        <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}" class="image__body"><img class="image__tag" src="{{asset($item->image_one)}}"  /></a> 
                                                    </div>
                                                    
                                                </div>
                                                <div class="product-card__info">
                                                    
                                                    <div class="product-card__name">
                                                        <div>
                                                            <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}">{{$item->product_name}}</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="product-card__footer">
                                                    <div class="product-card__prices">
                                                        <div class="product-card__price product-card__price--new">৳ {{$item->present_price}}</div>
                                                        <div class="product-card__price product-card__price--old"></div>
                                                    </div>
                                                    
                                                        <!-- @if ($item->product_color==null || $item->product_size==null)

                                                            @if ($item->product_owner_id!=1) -->
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
                                                            <!-- @endif -->

                                                               
    
                                                        @else 

                                                                @if ($item->product_owner_id!=1)
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

                                                            
    
                                                        @endif
    
                                                    <!---->
                                                    {{-- <button class="addwishlist mx-2" type="button"  aria-label="Add to cart" data-id="{{ $item->id }}">
    
                                                        <i class="fa fa-heart"></i>
                                                    </button> --}}
                                                    <!---->
    
                                                    <button class="product-card__addtocart-full" type="button">Add to wishlist</button>
    
                                                    <button class="addwishlist product-card__wishlist" type="button" data-id="{{ $item->id }}">
                                                        
                                                        <span>Add to wishlist</span>
                                                    </button>
                                                    
                                                    <button class="product-card__compare" type="button">
                                                        <svg width="16" height="16">
                                                            <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                                                            <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                                                            <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
                                                        </svg>
                                                        <span>Add to wishlist</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

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

