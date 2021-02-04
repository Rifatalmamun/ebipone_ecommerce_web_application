

@php
$category = DB::table('categories')->get();
$profit_table = DB::table('profit_manages')->where('id',1)->first();

$set_one_taka_tshirt_quantity = DB::table('order_childs')->where('product_id',522)->update(['qty'=>1]);
//$upd = DB::table('products')->update(['show_home'=>1]);
 
@endphp

<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from red-parts.html.themeforest.scompiler.ru/themes/red-ltr/header-spaceship-variant-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Sep 2020 04:34:57 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />

    <meta name="description" content="Your Best Online Shopping Mall">
    <meta name="keywords" content="ecommerce, best ecommerce, online store, online shopping mall, ebipone, ebipone.com, www.ebipone.com">
    <meta name="author" content="Mithun Kumar Ray, ebipone@gmail.com">
    <meta name="subject" content="eCommerce Website">
    <meta name="designer" content="Ongsho Limited">
    <meta name="og:title" content="eBipone : Your Best Online Shopping Mall"/>
    <meta name="robots" content="index,follow" />


    <!-- Social Meta -->

    <meta property="og:title" content="eBipone : Your Best Online Shopping Mall">
    <meta property="og:description" content="Time is Yours">
    <meta property="og:image" content="http://euro-travel-example.com/thumbnail.jpg">
    <meta property="og:url" content="https://www.ebipone.com">



    <title>eBipone : Your Best Online Shopping Mall</title>                                                                                      
    <link rel="icon" type="image/png" href="{{asset('public/frontend/images/favicon.png')}}" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" />
 
    <!-- css -->
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.css')}}" /> 
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/owl-carousel/assets/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/photoswipe/photoswipe.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/photoswipe/default-skin/default-skin.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/custom.css')}}" />                                        
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.header-spaceship-variant-one.css')}}" media="(min-width: 1200px)" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.mobile-header-variant-one.css')}}" media="(max-width: 1199px)" />                                                           
   
	<!--TABS LINK-->
    <link rel="stylesheet" href="{{asset('public/frontend/css/tabs.css')}}" /> 

    <!-- Sweet alert CDN link -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

   	<link rel="stylesheet" href="sweetalert2.min.css">

    <!-- font - fontawesome --> 
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/fontawesome/css/all.min.css')}}" />

    <!--DATA TABLE CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/datatable.css')}}"/>
	


    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "UA-97489509-8");
    </script>

</head>
<body>
 <div id="app">

    <!-- site -->     
    <div class="site">
        <!-- site__mobile-header -->
        {{-- <header class="site__mobile-header ">
            <div class="mobile-header">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button" type="button">
                            <svg width="18px" height="14px"><path d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z" /></svg>
                        </button>
                        <a class="mobile-header__logo" href="{{route('welcome')}}">
                            
                            <img src="{{asset('public/media/logo.jpg')}}" alt="eBipone">
                            
                        </a>
                        
                        <div class="mobile-header__indicators">
                            
                            <div class="mobile-indicator">
                                <a href="{{route('cart')}}" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <circle cx="7" cy="17" r="2" />
                                            <circle cx="15" cy="17" r="2" />
                                            <path
                                                d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                                    V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                                    C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"
                                            />
                                        </svg>
                                        <span class="mobile-indicator__counter">{{Cart::count()}}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </header> --}}

        <header class="site__header">
            <div class="header">
                <div class="header__megamenu-area megamenu-area"></div>
                <div class="header__topbar-start-bg"></div>
                <div class="header__topbar-start"> 
                    <div class="topbar topbar--spaceship-start">
                        <div class="topbar__item-text d-none d-xxl-flex">Call Us: (+88) 096-78 221223</div>
                        <div class="topbar__item-text"><a class="topbar__link" href="{{route('about')}}">About</a></div>
                        <div class="topbar__item-text"><a class="topbar__link" href="{{route('contact')}}">Contacts</a></div>
                        <div class="topbar__item-text"><a class="topbar__link" href="" data-toggle="modal" data-target="#trackModal">Track Order</a></div>
                    </div>
                </div>
                <div class="header__topbar-end-bg"></div> 
                <div class="header__topbar-end">
                    <div class="topbar topbar--spaceship-end">

                        <div class="topbar__item-button">
                            <a href="{{route('compare.index')}}" class="topbar__button"><span class="topbar__button-label">Compare</span> <span class="topbar__button-title"></span></a>
                        </div>
                        
                        <div class="topbar__item-button">
                            <a href="{{route('terms')}}" class="topbar__button"><span class="topbar__button-label">Terms & conditions</span> <span class="topbar__button-title"></span></a>
                        </div>

                        <div class="topbar__item-button">
                            <a href="{{route('privacy')}}" class="topbar__button"><span class="topbar__button-label">Privacy</span> <span class="topbar__button-title"></span></a>
                        </div>
                    </div>
                </div>
                <div class="header__navbar">
                    <div class="header__navbar-departments">
                        <div class="departments">
                            <button class="departments__button" type="button">
                                <span class="departments__button-icon">
                                    <svg width="16px" height="12px"><path d="M0,7L0,5L16,5L16,7L0,7ZM0,0L16,0L16,2L0,2L0,0ZM12,12L0,12L0,10L12,10L12,12Z" /></svg>
                                </span>
                                <span class="departments__button-title">eBipone</span>
                                <span class="departments__button-arrow">
                                    <svg width="9px" height="6px"><path d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z" /></svg>
                                </span>
                            </button>
                            <div class="departments__menu">
                                <div class="departments__arrow"></div>
                                <div class="departments__body">
                                    <ul class="departments__list">
                                        <li class="departments__list-padding" role="presentation"></li>
                                       
                                        @foreach ($category as $item)
                                        
                                            @php
                                            $subcategory = DB::table('subcategories')->where('category_id',$item->id)->get();
                                            $subcategory_count = DB::table('subcategories')->where('category_id',$item->id)->count();
                                            @endphp
                                        
                                        <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                            <a href="{{URL::to(('category/').Str::slug($item->url_name))}}" class="departments__item-link">
                                                {{$item->category_name}}
                                                <span class="departments__item-arrow">
                                                    @if ($subcategory_count>0)
                                                        <svg width="7" height="11">
                                                            <path
                                                                d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                C-0.1,9.8-0.1,10.4,0.3,10.7z"
                                                            />
                                                        </svg>
                                                    @endif
                                                </span>
                                            </a>
                                            @if ($subcategory_count>0)
                                            <div class="departments__item-menu">
                                                <div class="megamenu departments__megamenu departments__megamenu--size--sm">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <ul class="megamenu-links">
                                                                        @foreach ($subcategory as $sub)
                                                                            <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="{{URL::to(('category/').Str::slug($sub->subcategory_name))}}">{{$sub->subcategory_name}}
                                                                                
                                                                                @php
                                                                                    $microcategory = DB::table('micros')->where('subcategory_id',$sub->id)->get();
                                                                                    $microcategory_count = DB::table('micros')->where('subcategory_id',$sub->id)->count();
                                                                                 @endphp

                                                                                @if ($microcategory_count>0)
                                                                                    
                                                                                @endif
                                                                            </a>
                                                                             
                                                                            <!--Micro category-->
                                                                            @if ($microcategory_count>0)
                                                                            <div class="departments__item-menu">
                                                                                <div class="megamenu departments__megamenu departments__megamenu--size--sm">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                                                    <ul class="megamenu-links">
                                                                                                        @foreach ($microcategory as $micro)
                                                                                                            <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="{{URL::to(('category/').Str::slug($micro->microcategory_name))}}">{{$micro->microcategory_name}}</a></li>
                                                                                                        @endforeach
                                                                                                        
                                                                                                    </ul>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            
                                                                            
                                                                            </li>
                                                                        @endforeach
                                                                        
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            
                                        </li>
                                        @endforeach

                                    </ul>
                                    <div class="departments__menu-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__navbar-menu">
                        <div class="main-menu">
                            <ul class="main-menu__list">
                                
				<li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="{{route('welcome')}}" class="main-menu__link">
                                        Home
                                    </a>
                                    
                                </li>

                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="{{route('all.shop')}}" class="main-menu__link">
                                        Shop
                                    
                                    </a>
                        
                                </li>
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="{{route('brand')}}" class="main-menu__link">
                                        Brand
                                    </a>
                                </li>

                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="{{route('gift')}}" class="main-menu__link">
                                        Gift
                                    </a>
                                    
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header__logo"> 
                    <a href="{{route('welcome')}}" class="logo">
                        <div class="logo__slogan">eBipone Online Shopping Mall-Bangladesh.</div>
                        <div class="logo__image">
                            <!-- logo -->
                        <img src="{{asset('public/media/logo.jpg')}}" alt="eBipone">
                            
                            <!-- logo / end -->
                        </div>
                    </a>
                </div>
                <div class="header__search">
                    <div class="search">

                        <form action="{{route('search')}}" method="POST" class="search__body">
                            @csrf
                                                    
                            <div class="search__shadow"></div>
                            <input class="search__input" type="text" placeholder="Search product " name="search_key" required/>
                            <button class="search__button search__button--start" type="button">
                                <span class="search__button-icon">
                                   

                                    <i class="fa fa-home text-secondary"></i>

                                </span> 
                                <span class="search__button-title">Select Category</span>
                            </button>
                            <button class="search__button search__button--end" type="submit">
                                <span class="search__button-icon">
                                    
                                    <i class="fas fa-search text-secondary"></i>
                                </span>
                            </button>
                            <div class="search__box"></div>
                            <div class="search__decor">
                                <div class="search__decor-start"></div>
                                <div class="search__decor-end"></div>
                            </div>
                            
                            <div class="search__dropdown search__dropdown--vehicle-picker vehicle-picker">
                                <div class="search__dropdown-arrow"></div>
                                <div class="vehicle-picker__panel vehicle-picker__panel--list vehicle-picker__panel--active" data-panel="list">
                                    <div class="vehicle-picker__panel-body">
                                        <div class="vehicle-picker__text">Select category</div>
                                        <div class="vehicles-list">
                                            <div class="vehicles-list__body">

                                                <label class="vehicles-list__item">
                                                    <span class="vehicles-list__item-radio input-radio">
                                                        <span class="input-radio__body">

                                <input class="input-radio__input" value="all_category" name="cat" type="radio" checked/> 
                                                                                                    
                                                            <span class="input-radio__circle"></span>  </span>
                                                    </span>              
                                                    <span class="vehicles-list__item-info">
                                                        <span class="vehicles-list__item-name">All category</span> 
                                                    </span>
                                                </label> 

                                                @foreach ($category as $item)

                                                    <label class="vehicles-list__item">
                                                        <span class="vehicles-list__item-radio input-radio">
                                                            <span class="input-radio__body">

                                                                <input class="input-radio__input" value="{{$item->category_name}}" name="cat" type="radio" /> 
                                                                                                        
                                                                <span class="input-radio__circle"></span>  </span>
                                                        </span>              
                                                        <span class="vehicles-list__item-info">
                                                            <span class="vehicles-list__item-name">{{$item->category_name}}</span> 
                                                        </span>
                                                    </label>           
                                                
                                                @endforeach

                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="header__indicators">
                    @guest
                        @else 
                        <div class="indicator">
                            <a href="{{route('wishlist')}}" class="indicator__button">
                                <span class="indicator__icon">
                                    <svg width="32" height="32">
                                        <path
                                            d="M23,4c3.9,0,7,3.1,7,7c0,6.3-11.4,15.9-14,16.9C13.4,26.9,2,17.3,2,11c0-3.9,3.1-7,7-7c2.1,0,4.1,1,5.4,2.6l1.6,2l1.6-2
                                                C18.9,5,20.9,4,23,4 M23,2c-2.8,0-5.4,1.3-7,3.4C14.4,3.3,11.8,2,9,2c-5,0-9,4-9,9c0,8,14,19,16,19s16-11,16-19C32,6,28,2,23,2L23,2
                                                    z"
                                        />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    @endguest

                 @guest
                 
                 <div class="indicator indicator--trigger--click">
                    <a href="{{route('register')}}" >
                        <span class="indicator__icon">
                            <svg width="32" height="32">
                                <path
                                    d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7
                                    C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z"
                                />
                            </svg>
                        </span>
                        <span class="indicator__title">Hello, Log In</span> <span class="indicator__value text-dark">Join/Sign in</span>
                    </a>
                  
                </div>
                     
                 @else 

                    <div class="indicator indicator--trigger--click"> 
                        <a href="{{route('home')}}" >
                            <span class="indicator__icon">
                                <svg width="32" height="32">
                                    <path
                                        d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7
                                        C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z"
                                    />
                                </svg>
                            </span>
                            <span class="indicator__title">Hello, Dear</span> <span class="indicator__value text-dark">My Profile</span>
                        </a>
                       
                    </div>

                 @endguest

         
                    <div class="indicator indicator--trigger--click">
                        <a href="{{route('cart')}}" class="indicator__button">
                            <span class="indicator__icon">
                                <svg width="32" height="32">
                                    <circle cx="10.5" cy="27.5" r="2.5" />
                                    <circle cx="23.5" cy="27.5" r="2.5" />
                                    <path
                                        d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3
                                                l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14
                                                c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z"
                                    />
                                </svg>
                                <span class="indicator__counter" id="cartCount"> {{Cart::count()}} </span>
                            </span>
                            <span class="indicator__title">Shopping Cart</span> <span class="indicator__value" id="cartTotal">৳ {{Cart::total()}} </span>
                        </a>
                        <div class="indicator__content">
                            <div class="dropcart">
                               
                                <div class="dropcart__totals">
                                    <table>

                                        @if (Cart::count()>0)
                                            <tr>
                                                <th>Subtotal</th>
                                                <td id="cSubTotal">৳ {{Cart::subtotal()}}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>৳ {{$profit_table->shipping_charge}}</td> 
                                            </tr>
                                        
                                            <tr>
                                                <th>Total</th>
                                                <td id="cTotall">৳ {{Cart::total() + $profit_table->shipping_charge}}</td> 
                                            </tr>
                                        @else

                                            <tr>
                                                <th>Subtotal</th>
                                                <td id="cSubTotal">৳ 00</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>৳ 00</td> 
                                            </tr>
                                        
                                            <tr>
                                                <th>Total</th>
                                                <td id="cTotall">৳ 00</td> 
                                            </tr>
                                            
                                        @endif



                                        
                                    </table>
                                </div>
                                <div class="dropcart__actions"><a href="{{route('cart')}}" class="btn btn-secondary">View Cart</a> 
                                    <a href="{{route('proceed.to.checkout')}}" class="btn btn-primary">Process to pay</a></div>
                            </div>
                        </div>
                    </div>
                
                    
                </div>
            </div>
        </header>


        <main class="py-4">

        <div class="site__body" id="printableArea">

            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">

                    {{-- <a href="javascript:void(0);" onclick="printPageArea('printableArea')">Print</a> --}}

                    <div class="row no-gutters mx-n2">

                        <div class="col-12 px-2">
                            <div class="card">
                                <div class="order-header">
                                    <div class="row">
                                        <div class="col-4">
                                            <h3 class=" font-weight-bold" style="margin: 0;"> <span class="text-dark">#INVOICE</span> <span class="text-danger">EBP-{{$invoice_data->id}}</span>  </h3>

                                        </div>
                                        <div class="col-4">
                                            <img style="display: block;margin-left: auto;margin-right: auto;" src="{{asset('public/media/logo.jpg')}}" alt="">
                                        </div>
                                        <div class="col-4">
                                            <a class="text-danger" style="display: block;text-align: right;" onclick="window.print()" href=""> <i class="fas fa-print"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 px-2">
                            <div class="card address-card address-card--featured">
                      
                                <div class="address-card__body">
                                    <div class="address-card__name"> <span style="font-size: 18px;">From</span>: eBipone</div>
                                    <div class="address-card__row text-secondary">
                                        <span style="color: #000">Arpara,Magura,Bangladesh. <br>
                                        <br>
                                        <span class="text-dark">
                                            <span>Order Date</span>: <span style="opacity: 0;">-</span> {{$invoice_data->order_date}} <br/>
                                            <span>Order Time</span>: <span style="opacity: 0;">-</span> {{$invoice_data->order_time}} <br/>
                                            {{-- <span style="opacity: 0;">
                                                <span>District</span>: <span style="opacity: 0;">-------</span> {{$invoice_data->b_district}} <br>
                                                
                                            </span> --}}
                                        </span>
                                            
                                       
                                        
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Call Center</div>
                                        <div class="address-card__row-content"><i class="fas fa-phone-alt"></i> <span class="font-weight-bold">+88 09678 221223</span></div>

                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Email Address</div>
                                        <div class="address-card__row-content"><i class="far fa-envelope"></i> {{$invoice_data->b_email}}</div>
                                    </div>
                                    
                                    <span class="text-secondary"><span>Website</span>: <span style="opacity: 0;">-</span> https://www.ebipone.com </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                            
                            <div class="card address-card address-card--featured">
                               
                                <div class="address-card__body">
                                    <div class="address-card__name">  
                                        <span style="font-size: 18px;">To</span>: {{$invoice_data->s_name}} 
                                    </div>
                                    <div class="address-card__row text-secondary">
                                        <span style="color: #000">Area/Village</span>: <span style="opacity: 0;">--</span> {{$invoice_data->s_area}} <br>
                                        <span style="color: #000">Post Code</span>: <span style="opacity: 0;">-- -</span> {{$invoice_data->s_postcode}} <br />
                                        <span style="color: #000">Thana</span>: <span style="opacity: 0;">--------</span> {{$invoice_data->s_thana}} <br />
                                        <span style="color: #000">District</span>: <span style="opacity: 0;">-------</span> {{$invoice_data->s_district}} <br>
                                        <span style="color: #000">Address</span>: <span style="opacity: 0;">------</span> {{$invoice_data->shipping_address}}

                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Phone Number</div>
                                        <div class="address-card__row-content"><i class="fas fa-phone-alt"></i> <span class="font-weight-bold">{{$invoice_data->s_phone}}</span></div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Email Address</div>
                                        <div class="address-card__row-content"><i class="far fa-envelope"></i> {{$invoice_data->s_email}}</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        
                        <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                            <div class="card">
                                
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table >
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Product code</th>
                                                    <th>Quantity</th>
                                                    <th>Size</th>
                                                    <th>Color</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                            
                                                <tr>
                                                    <td>
                                                        <a style="text-decoration: none;" target="_blank" href="{{URL::to($invoice_data->un_id.'/'.Str::slug($invoice_data->product_name))}}">{{$invoice_data->product_name}}</a>
                                                    </td>
                                                    <td>{{$invoice_data->product_code}}  </td>
                                                    <td> {{$invoice_data->qty}}</td>
                                                    <td> 
                                                            @if ($invoice_data->sz=='no')
                                                                N/A
                                                            @else
                                                                {{$invoice_data->sz}}
                                                            @endif

                                                    </td>
                                                    <td> 
                                                        @if ($invoice_data->clr=='no')
                                                        N/A
                                                    @else
                                                        {{$invoice_data->clr}}
                                                    @endif
                                                </td>
                                                    <td class="text-success"> 
                                                        
                                                        @if ($invoice_data->isCustomerReceived=='1')
                                                            <span class="text-info">Complete</span>
                                                        @elseif ($invoice_data->isWarehouseSend=='1')
                                                            <span class="text-info">Pending</span>
                                                        @elseif ($invoice_data->isWarehouseReceived=='1')
                                                            <span class="text-info">Received</span>
                                                        @elseif($invoice_data->isShopSend)
                                                            <span class="text-primary">Pending</span>
                                                        @else 
                                                            <span class="text-danger">In Shop</span>
                                                        @endif
                                                        
                                                        
                                                    </td>
                                          
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <ul style="list-style: none;">
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Paid Amount </span><span style="opacity: 0;">-----</span> ৳ {{$invoice_data->pay_price}}</li>
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Transaction ID </span><span style="opacity: 0;">--</span> {{$invoice_data->transaction_id}} </li>
                                                    
                                                   
                                                </ul>
                                            </div>

                                            <div class="col-md-7">
                                                <ul style="list-style: none;">
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Pay Method</span><span style="opacity: 0;">-------</span> 
                                                    
                                                            @if ($invoice_data->p_method=='ssl')
                                                                SSL Payment Gateway
                                                            @else
                                                                eBipone Balance
                                                            @endif
                                                    </li>
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Shipping Method</span><span style="opacity: 0;">--</span>Pickup Point </li>
                                                    
                                                </ul>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>
                    </div>









                    <!--OFFICE COPY-->

                    <hr>
                    <br>
                    <br>
                    <br>
                    
                    <div class="row">
                        <div class="col">
                            <h6 style="text-align: center;" class="font-weight-bold">eBipone Office Copy</h6>
                        </div>
                    </div>

                    <hr>





                    <div class="row no-gutters mx-n2">

                        <div class="col-12 px-2">
                            <div class="card">
                                <div class="order-header">
                                    <div class="row">
                                        <div class="col-4">
                                            <h3 class=" font-weight-bold" style="margin: 0;"> <span class="text-dark">#INVOICE</span> <span class="text-danger">EBP-{{$invoice_data->id}}</span>  </h3>

                                        </div>
                                        <div class="col-4">
                                            <img style="display: block;margin-left: auto;margin-right: auto;" src="{{asset('public/media/logo.jpg')}}" alt="">
                                        </div>
                                        <div class="col-4">
                                            <a class="text-danger" style="display: block;text-align: right;" onclick="window.print()" href=""> <i class="fas fa-print"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 px-2">
                            <div class="card address-card address-card--featured">
                      
                                <div class="address-card__body">
                                    <div class="address-card__name"> <span style="font-size: 18px;">From</span>: eBipone</div>
                                    <div class="address-card__row text-secondary">
                                        <span style="color: #000">Arpara,Magura,Bangladesh. <br>
                                        <br>
                                        <span class="text-dark">
                                            <span>Order Date</span>: <span style="opacity: 0;">-</span> {{$invoice_data->order_date}} <br/>
                                            <span>Order Time</span>: <span style="opacity: 0;">-</span> {{$invoice_data->order_time}} <br/>
                                            
                                        </span>
                                            
                                       
                                        
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Call Center</div>
                                        <div class="address-card__row-content"><i class="fas fa-phone-alt"></i> <span class="font-weight-bold">+88 09678 221223</span></div>

                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Email Address</div>
                                        <div class="address-card__row-content"><i class="far fa-envelope"></i> {{$invoice_data->b_email}}</div>
                                    </div>
                                    
                                    <span class="text-secondary"><span>Website</span>: <span style="opacity: 0;">-</span> https://www.ebipone.com </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                            
                            <div class="card address-card address-card--featured">
                               
                                <div class="address-card__body">
                                    <div class="address-card__name">  
                                        <span style="font-size: 18px;">To</span>: {{$invoice_data->s_name}} 
                                    </div>
                                    <div class="address-card__row text-secondary">
                                        <span style="color: #000">Area/Village</span>: <span style="opacity: 0;">--</span> {{$invoice_data->s_area}} <br>
                                        <span style="color: #000">Post Code</span>: <span style="opacity: 0;">-- -</span> {{$invoice_data->s_postcode}} <br />
                                        <span style="color: #000">Thana</span>: <span style="opacity: 0;">--------</span> {{$invoice_data->s_thana}} <br />
                                        <span style="color: #000">District</span>: <span style="opacity: 0;">-------</span> {{$invoice_data->s_district}} <br>
                                        <span style="color: #000">Address</span>: <span style="opacity: 0;">------</span> {{$invoice_data->shipping_address}}

                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Phone Number</div>
                                        <div class="address-card__row-content"><i class="fas fa-phone-alt"></i> <span class="font-weight-bold">{{$invoice_data->s_phone}}</span></div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Email Address</div>
                                        <div class="address-card__row-content"><i class="far fa-envelope"></i> {{$invoice_data->s_email}}</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        
                        <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                            <div class="card">
                                
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table >
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Product code</th>
                                                    <th>Quantity</th>
                                                    <th>Size</th>
                                                    <th>Color</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                            
                                                <tr>
                                                    <td>
                                                        <a style="text-decoration: none;" target="_blank" href="{{URL::to($invoice_data->un_id.'/'.Str::slug($invoice_data->product_name))}}">{{$invoice_data->product_name}}</a>
                                                    </td>
                                                    <td>{{$invoice_data->product_code}}  </td>
                                                    <td> {{$invoice_data->qty}}</td>
                                                    <td> 
                                                            @if ($invoice_data->sz=='no')
                                                                N/A
                                                            @else
                                                                {{$invoice_data->sz}}
                                                            @endif

                                                    </td>
                                                    <td> 
                                                        @if ($invoice_data->clr=='no')
                                                        N/A
                                                    @else
                                                        {{$invoice_data->clr}}
                                                    @endif
                                                </td>
                                                    <td class="text-success"> 
                                                        
                                                        @if ($invoice_data->isCustomerReceived=='1')
                                                            <span class="text-info">Complete</span>
                                                        @elseif ($invoice_data->isWarehouseSend=='1')
                                                            <span class="text-info">Pending</span>
                                                        @elseif ($invoice_data->isWarehouseReceived=='1')
                                                            <span class="text-info">Received</span>
                                                        @elseif($invoice_data->isShopSend)
                                                            <span class="text-primary">Pending</span>
                                                        @else 
                                                            <span class="text-danger">In Shop</span>
                                                        @endif
                                                        
                                                        
                                                    </td>
                                          
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <ul style="list-style: none;">
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Paid Amount </span><span style="opacity: 0;">-----</span> ৳ {{$invoice_data->pay_price}}</li>
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Transaction ID </span><span style="opacity: 0;">--</span> {{$invoice_data->transaction_id}} </li>
                                                    
                                                   
                                                </ul>
                                            </div>

                                            <div class="col-md-7">
                                                <ul style="list-style: none;">
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Pay Method</span><span style="opacity: 0;">-------</span> 
                                                    
                                                            @if ($invoice_data->p_method=='ssl')
                                                                SSL Payment Gateway
                                                            @else
                                                                eBipone Balance
                                                            @endif
                                                    </li>
                                                    <li style="font-size: 14px;"><span class="font-weight-bold" >Shipping Method</span><span style="opacity: 0;">--</span>Pickup Point </li>
                                                    
                                                </ul>
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




            
</main>



</div>

</div>





<script>

function changeUrlToLogin(){

window.history.pushState('', 'New Page Title', 'https://ebipone.com/login');                                   
}

function changeUrlToRegister(){

window.history.pushState('', 'New Page Title', 'https://ebipone.com/register');                                   

}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<!-- photoswipe / end --><!-- scripts -->

<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('public/frontend/js/number.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>





<script>
    function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=1200,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    
}
</script>



<script>
@if(Session::has('messege'))
var type="{{Session::get('alert-type','info')}}"
switch(type){ 
case 'info':
toastr.info("{{ Session::get('messege') }}");
break;
case 'success':
toastr.success("{{ Session::get('messege') }}");
break;
case 'warning':
toastr.warning("{{ Session::get('messege') }}");
break;
case 'error':
toastr.error("{{ Session::get('messege') }}");
break;
}
@endif
</script>  

<script>  
$(document).on("click", "#delete", function(e){
e.preventDefault();
var link = $(this).attr("href");
swal({
title: "Are you Want to Delete?",
text: "Once Delete,Its deleted permanently!",                      
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  window.location.href = link;
} else {
swal("Save");
}
});
});
</script>

<script>  
$(document).on("click", "#return", function(e){
e.preventDefault();
var link = $(this).attr("href");
swal({
title: "Are you Want to Return?",
text: "Once Return,You will return your money!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  window.location.href = link;
} else {
swal("Cancel");
}
});
});
</script>

<script>  

$(document).on("click", "#clearcart", function(e){
e.preventDefault();
var link = $(this).attr("href");
swal({
title: "Are you Want to Clear Cart?",
text: "Once Clear,Cart will be empty!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {    
if (willDelete) {
  window.location.href = link;
} else {
swal("Save Cart");
}
});
});

</script>


<!--ADD TO CART AJAX-->

<script type="text/javascript">      
$(document).ready(function() {
$('.addcart').on('click', function(){  
var id = $(this).data('id');
if(id){                                                                                            
$.ajax({                                                           
   url: "{{ url('/add/to/cart/') }}/"+id,                               
   type:"GET",                                                      
   dataType:"json",                                                                   
   success:function(data){

    //console.log({{Cart::total()}}) ;

    //-------------------------------------------------------------------------------
        // $.ajax({                                      
        //         url: "{{ url('/get/cart/') }}/",                                           
        //         data: "",                 
        //         dataType: 'json',                
        //         success: function(data)           
        //         {
        //             document.getElementById('cartCount').innerHTML = data.cCount;
        //             document.getElementById('cartTotal').innerHTML = data.cTotal+' BDT';

        //             document.getElementById('cSubTotal').innerHTML = data.cSubTotal+' BDT';
        //             document.getElementById('cTotall').innerHTML = data.cTotal+' BDT';
        //         } 
        //     });
    //-------------------------------------------------------------------------------
       
     const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',  
        showConfirmButton: false,
        timer: 2000,
        
      })
     if($.isEmptyObject(data.error)){
          Toast.fire({
            type: 'success',
            title: data.success
            
          })
     }else{
           Toast.fire({
              type: 'error',
              title: data.error
          })
     }
   },
});
} else {
alert('danger');
}
// e.preventDefault();
});
});

</script>



<script type="text/javascript">      
$(document).ready(function() {
$('.realcart').on('click', function(){  
var id = $(this).data('id');
if(id){        
    setTimeout(function() { 
        $.ajax({                                      
                    url: "{{ url('/get/cart/value/') }}/",   
         
                    data: "",                                                       
                    dataType: 'json',                
                    success: function(data)          
                    {
                        document.getElementById('cartCount').innerHTML = data.cCount;
                        document.getElementById('cartTotal').innerHTML = data.cTotal+' BDT';

                        document.getElementById('cSubTotal').innerHTML = data.cSubTotal+' BDT';
                        document.getElementById('cTotall').innerHTML = data.cTotal+' BDT';

                        console.log(data.cTotal) ;
                    } 
                });

     }, 1000);

} 
//    else {
//        alert('danger');
//    }
// e.preventDefault();
});
});

</script>



<!--ADD TO WISHLIST AJAX-->
<script type="text/javascript">
$(document).ready(function() {
$('.addwishlist').on('click', function(){  
var id = $(this).data('id');
if(id) {
$.ajax({
   url: "{{  url('/add/wishlist/') }}/"+id,
   type:"GET",
   dataType:"json",
   success:function(data) {
     const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })

     if($.isEmptyObject(data.error)){
          Toast.fire({
            type: 'success',
            title: data.success
          })
     }else{
           Toast.fire({
              type: 'error',
              title: data.error
          })
     }

   },
  
});
} else {
alert('danger');
}
e.preventDefault();
});
});
</script>


<!--ADD TO COMPARE AJAX-->
<script type="text/javascript">
$(document).ready(function() { 
$('.addcompare').on('click', function(){  
var id = $(this).data('id'); 
if(id) { 
$.ajax({
   url: "{{  url('/add/compare/') }}/"+id,
   type:"GET",
   dataType:"json",
   success:function(data) {
     const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      })

     if($.isEmptyObject(data.error)){
          Toast.fire({
            type: 'success',
            title: data.success
          })
     }else{
           Toast.fire({
              type: 'error',
              title: data.error
          })
     }

   },
  
});
} else {
alert('danger');
}
e.preventDefault();
});
});
</script>


<script>  
$(document).on("click", "#return", function(e){
e.preventDefault();
var link = $(this).attr("href");
swal({
title: "Are you Want to Return?",
text: "Once Return,You will return your money!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  window.location.href = link;
} else {
swal("Cancel");
}
});
});
</script>


<script>  
$(document).on("click", "#clicktoaccept", function(e){
e.preventDefault();
var link = $(this).attr("href");
swal({
 title: "If you received this product, click ok button?",
 text: "Receive or Not",
 icon: "warning",
 buttons: true,
 dangerMode: true,
})
.then((willDelete) => {
 if (willDelete) {
      window.location.href = link;
 } else {
   swal("Safe!"); 
 }
});
});
</script>

<script>  
$(document).on("click", "#sendToCustomer", function(e){
e.preventDefault();
var link = $(this).attr("href");
swal({
 title: "Send Product to Customer?",
 text: "Yes or Not",
 icon: "warning",
 buttons: true,
 dangerMode: true,
})
.then((willDelete) => {
 if (willDelete) {
      window.location.href = link;
 } else {
   swal("Safe!"); 
 }
});
});
</script>

<script>  
$(document).on("click", "#customerReceived", function(e){
e.preventDefault();
var link = $(this).attr("href");
swal({
 title: "Wow! Customer Received ?",
 text: "Yes or Not",
 icon: "warning",
 buttons: true,
 dangerMode: true,
 //alert:true,
})
.then((willDelete) => {
 if (willDelete) {
      window.location.href = link;
 } else {
   swal("Safe!"); 
 }
});
});
</script>





<script>  

    $(document).on("click", "#confirm", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
        swal({
        title: "Delivery Complete?",
        text: "Be Carefull!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {    
        if (willDelete) {
            window.location.href = link;
        } else {
        swal("No Change!");
        }
        });
    });

</script>



<script>



function callMe(){

console.log('test ok');

}

</script>




<!--Payment gateway popup-->

<script>
(function (window, document) {
var loader = function () {
var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];

script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);

//script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX

tag.parentNode.insertBefore(script, tag);
};

window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
</script>



<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>



</body>

</html>















