

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


<!--    CUSTOM STYLE CSS    -->



<style>

    [type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 20px;
    height: 20px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #fa4040;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
</style>


</head>
<body>
 <div id="app">

    <!-- site -->     
    <div class="site">
        <!-- site__mobile-header -->
        <header class="site__mobile-header">
            <div class="mobile-header">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button" type="button">
                            <svg width="18px" height="14px"><path d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z" /></svg>
                        </button>
                        <a class="mobile-header__logo" href="{{route('welcome')}}">
                            
                            <img src="{{asset('public/media/logo.jpg')}}" alt="eBipone">
                            
                        </a>
                        {{-- <div class="mobile-header__search mobile-search">
                            <form class="mobile-search__body" action="{{route('search')}}" method="POST">
                                @csrf

                                <input type="text" class="mobile-search__input" placeholder="Enter product name" />
                                <button type="button" class="mobile-search__vehicle-picker" aria-label="Select Vehicle">
                                    <svg width="20" height="20">
                                        <path
                                            d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
                                                c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
                                                C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
                                                c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
                                                c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
                                                C15.5,10.2,14,11.3,14,12z"
                                        />
                                    </svg>
                                    <span class="mobile-search__vehicle-picker-label">Category</span>
                                </button>
                                <button type="submit" class="mobile-search__button mobile-search__button--search">
                                    <svg width="20" height="20">
                                        <path
                                            d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                                c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                                c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"
                                        />
                                    </svg>
                                </button>
                                <button type="button" class="mobile-search__button mobile-search__button--close">
                                    <svg width="20" height="20">
                                        <path
                                            d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7
                                                c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3
                                                C17.1,15.7,17.1,16.3,16.7,16.7z"
                                        />
                                    </svg>
                                </button>
                                <div class="mobile-search__field"></div>
                            </form>


                        </div> --}}
                        <div class="mobile-header__indicators">
                            {{-- <div class="mobile-indicator mobile-indicator--search d-md-none">
                                <button type="button" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <path
                                                d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                                    c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                                    c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"
                                            />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="mobile-indicator d-none d-md-block">
                                <a href="#" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <path
                                                d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                                                    c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="mobile-indicator d-none d-md-block">
                                <a href="#" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <path
                                                d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
                                                    c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div> --}}
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
        </header>
        <!-- site__mobile-header / end --><!-- site__header -->
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
                                    {{-- <svg width="20" height="20"> 
                                        <path
                                            d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
                                            c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
                                            C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
                                            c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
                                            c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
                                            C15.5,10.2,14,11.3,14,12z"
                                        />
                                    </svg> --}}

                                    <i class="fa fa-home text-secondary"></i>

                                </span> 
                                <span class="search__button-title">Select Category</span>
                            </button>
                            <button class="search__button search__button--end" type="submit">
                                <span class="search__button-icon">
                                    {{-- <svg width="20" height="20">
                                        <path
                                            d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                            c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                            c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"
                                        />
                                    </svg> --}}
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
        <!-- site__header / end --><!-- site__body -->
    

        <main class="py-4">

            @yield('content')

            
        </main>

            <!-- site__body / end --><!-- site__footer -->
            <footer class="site__footer">
                <div class="site-footer">
                    <div class="decor site-footer__decor decor--type--bottom">
                        <div class="decor__body">
                            <div class="decor__start"></div>
                            <div class="decor__end"></div>
                            <div class="decor__center"></div>
                        </div>
                    </div>
                    <div class="site-footer__widgets">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <div class="site-footer__widget footer-contacts">
                                        <h5 class="footer-contacts__title">Contact Us</h5>
                                        <div class="footer-contacts__text">ebipone.com is a completely hassle-free largest online shopping mall in Bangladesh. <a href="https://ebipone.com/about">Read More</a></div>
                                        <address class="footer-contacts__contacts">
                                            <dl>
                                                <dt>Phone Number</dt>
                                                <dd>+88 09678 221223</dd>
                                            </dl>
                                            <dl>
                                                <dt>Email Address</dt>
                                                <dd><a href="mailto:ebipone@gmail.com" >ebipone@gmail.com</a></dd>
                                            </dl>
                                            <dl>
                                                <dt>Our Location</dt>
                                                <dd>Arpara, Magura, Bangladesh </dd>
                                            </dl>
                                            <dl>
                                                <dt>Working Hours</dt>
                                                <dd>Support 24/7</dd>
                                            </dl>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-xl-2">
                                    <div class="site-footer__widget footer-links">
                                        <h5 class="footer-links__title">Category</h5>
                                        @php
                                            $login_category = DB::table('categories')->limit(5)->get();
                                        @endphp
                                        
                                            <ul class="footer-links__list">
                                                @foreach ($login_category as $c) 
                                                    <li class="footer-links__item"><a href="{{URL::to(('category/').Str::slug($c->category_name))}}" class="footer-links__link">{{$c->category_name}}</a></li> 
                                                @endforeach
                                            </ul>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-xl-2">
                                    <div class="site-footer__widget footer-links">
                                        <h5 class="footer-links__title">My Account</h5>
                                        <ul class="footer-links__list">
                                            <ul class="footer-links__list">
                                                <li class="footer-links__item"><a href="{{route('welcome')}}" class="footer-links__link">Home</a></li>
                                                <li class="footer-links__item"><a href="{{route('privacy')}}" class="footer-links__link">Privacy Policy</a></li>
                                                <li class="footer-links__item"><a href="{{route('terms')}}" class="footer-links__link">Terms and conditions</a></li>
                                                
                                                <li class="footer-links__item"><a href="{{route('deliveryPolicy')}}" class="footer-links__link">Delivery Policy</a></li>
                                                <li class="footer-links__item"><a href="{{route('returnPolicy')}}" class="footer-links__link">Return Policy</a></li>
                                                <li class="footer-links__item"><a href="{{route('refundPolicy')}}" class="footer-links__link">Refund Policy</a></li>
                                                <li class="footer-links__item"><a href="{{route('faq')}}" class="footer-links__link">FAQs</a></li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="site-footer__widget footer-newsletter">
                                        <h5 class="footer-newsletter__title">Newsletter</h5>
                                        <div class="footer-newsletter__text">Enter your email address below to subscribe to our newsletter and keep up to date with discounts and special offers.</div>
                                        <form action="#" class="footer-newsletter__form">
                                            <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                            <input type="text" class="footer-newsletter__form-input" id="footer-newsletter-address" placeholder="Email Address..." /> <button class="footer-newsletter__form-button">Subscribe</button>
                                        </form>
                                        <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on social networks</div>
                                        <div class="footer-newsletter__social-links social-links">
                                            <ul class="social-links__list">
                                                <li class="social-links__item social-links__item--facebook">
                                                    <a href="https://www.facebook.com/eBipone/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li class="social-links__item social-links__item--twitter">
                                                    <a href="https://twitter.com/eBipone/" target="_blank"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li class="social-links__item social-links__item--youtube">
                                                    <a href="https://www.youtube.com/channel/UC8fZlaUVV0P_cfiRIXSBsRw" target="_blank"><i class="fab fa-youtube"></i></a>
                                                </li>
                                                <li class="social-links__item social-links__item--instagram">
                                                    <a href="https://www.instagram.com/ebipone/" target="_blank"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li class="social-links__item social-links__item--linkedin">
                                                    <a href="https://www.linkedin.com/company/ebipone" target="_blank"><i class="fa fa-linkedin-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="container">
                            <div class="site-footer__bottom-row">
                                <div class="site-footer__copyright">
                                    <!-- copyright -->
                                    © Copyrights 2020  <a href="https://ebipone.com/" target="_blank">eBipone.com</a>
                                    <!-- copyright / end -->
                                </div>
                                <div class="site-footer__payments">Pay with <img src="{{asset('public/media/ssl.png')}}" width="200" title="sslcommerz" alt="sslcommerz" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- site__footer / end -->

    </div>
    <!-- site / end --><!-- mobile-menu -->
    <div class="mobile-menu">
        <div class="mobile-menu__backdrop"></div>
        <div class="mobile-menu__body">
            <button class="mobile-menu__close" type="button">
                <svg width="12" height="12">
                    <path
                        d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                            c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                            C11.2,9.8,11.2,10.4,10.8,10.8z"
                    />
                </svg>
            </button>
            <div class="mobile-menu__panel">
                <div class="mobile-menu__panel-header"><div class="mobile-menu__panel-title">Menu</div></div>
                <div class="mobile-menu__panel-body">
                    
                    <div class="mobile-menu__divider"></div>
                    <div class="mobile-menu__indicators">
                        
                        @guest
                        <a class="mobile-menu__indicator" href="{{route('register')}}">
                            <span class="mobile-menu__indicator-icon">
                                <svg width="20" height="20">
                                    <path
                                        d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                                            c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"
                                    />
                                </svg>
                            </span>
                            <span class="mobile-menu__indicator-title">Join/Sign in</span>
                        </a>
                        @else 

			<a class="mobile-menu__indicator" href="{{route('home')}}">
                            <span class="mobile-menu__indicator-icon">
                                <svg width="20" height="20">
                                    <path
                                        d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                                            c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"
                                    />
                                </svg>
                            </span>
                            <span class="mobile-menu__indicator-title">Profile</span>
                        </a>

                        <a class="mobile-menu__indicator" href="{{route('wishlist')}}">
                            <span class="mobile-menu__indicator-icon">
                                <svg width="20" height="20">
                                    <path
                                        d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
                                        c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"
                                    />
                                </svg>
                            </span>
                            <span class="mobile-menu__indicator-title">Wishlist</span>
                        </a>

                        
                        @endguest

                        <a class="mobile-menu__indicator" href="{{route('cart')}}">
                            <span class="mobile-menu__indicator-icon">
                                <svg width="20" height="20">
                                    <circle cx="7" cy="17" r="2" />
                                    <circle cx="15" cy="17" r="2" />
                                    <path
                                        d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                            V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                            C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"
                                    />
                                </svg>
                                <span class="mobile-menu__indicator-counter">{{Cart::count()}}</span>
                            </span>
                            <span class="mobile-menu__indicator-title">Cart</span>
                        </a>
                        
                        
                    </div>
                    <div class="mobile-menu__divider"></div> 
                    <ul class="mobile-menu__links">
                        <li data-mobile-menu-item> 
                            <a href="{{route('welcome')}}" class="" data-mobile-menu-trigger>
                                Home
                                
                            </a>
                        </li>
                        <li data-mobile-menu-item>
                            <a href="{{route('all.shop')}}" class="" data-mobile-menu-trigger>
                                Shop
                            </a>
                        </li>
                        <li data-mobile-menu-item>
                            <a href="{{route('brand')}}" class="" data-mobile-menu-trigger>
                                Brand
                            </a>
                        </li>
                        

                        
                    </ul>
                    <div class="mobile-menu__spring"></div>
                    <div class="mobile-menu__divider"></div>
                    <a class="mobile-menu__contacts" href="#">
                        <div class="mobile-menu__contacts-subtitle">eBipone</div>
                        <div class="mobile-menu__contacts-title">+8801301-299194</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu / end --><!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
    <!-- quickview-modal / end --><!-- add-vehicle-modal -->
    <div id="add-vehicle-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="vehicle-picker-modal modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="vehicle-picker-modal__close">
                    <svg width="12" height="12">
                        <path
                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                            c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                            C11.2,9.8,11.2,10.4,10.8,10.8z"
                        />
                    </svg>
                </button>
                <div class="vehicle-picker-modal__panel vehicle-picker-modal__panel--active">
                    <div class="vehicle-picker-modal__title card-title">Add A Vehicle</div>
                    <div class="vehicle-form vehicle-form--layout--modal">
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Year">
                                <option value="none">Select Year</option>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                                <option>2013</option>
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select>
                        </div>
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Brand" disabled="disabled">
                                <option value="none">Select Brand</option>
                                <option>Audi</option>
                                <option>BMW</option>
                                <option>Ferrari</option>
                                <option>Ford</option>
                                <option>KIA</option>
                                <option>Nissan</option>
                                <option>Tesla</option>
                                <option>Toyota</option>
                            </select>
                        </div>
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Model" disabled="disabled">
                                <option value="none">Select Model</option>
                                <option>Explorer</option>
                                <option>Focus S</option>
                                <option>Fusion SE</option>
                                <option>Mustang</option>
                            </select>
                        </div>
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Engine" disabled="disabled">
                                <option value="none">Select Engine</option>
                                <option>Gas 1.6L 125 hp AT/L4</option>
                                <option>Diesel 2.5L 200 hp AT/L5</option>
                                <option>Diesel 3.0L 250 hp MT/L5</option>
                            </select>
                        </div>
                        <div class="vehicle-form__divider">Or</div>
                        <div class="vehicle-form__item"><input type="text" class="form-control" placeholder="Enter VIN number" aria-label="VIN number" /></div>
                    </div>
                    <div class="vehicle-picker-modal__actions">
                        <button type="button" class="btn btn-sm btn-secondary vehicle-picker-modal__close-button">Cancel</button> <button type="button" class="btn btn-sm btn-primary">Add A Vehicle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add-vehicle-modal / end --><!-- vehicle-picker-modal -->
    <div id="vehicle-picker-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="vehicle-picker-modal modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="vehicle-picker-modal__close">
                    <svg width="12" height="12">
                        <path
                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                    c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                    C11.2,9.8,11.2,10.4,10.8,10.8z"
                        />
                    </svg>
                </button>
                <div class="vehicle-picker-modal__panel vehicle-picker-modal__panel--active" data-panel="list">
                    <div class="vehicle-picker-modal__title card-title">Select Vehicle</div>
                    <div class="vehicle-picker-modal__text">Select a vehicle to find exact fit parts</div>
                    <div class="vehicles-list">
                        <div class="vehicles-list__body">
                            <label class="vehicles-list__item">
                                <span class="vehicles-list__item-radio input-radio">
                                    <span class="input-radio__body"><input class="input-radio__input" name="header-vehicle" type="radio" /> <span class="input-radio__circle"></span> </span>
                                </span>
                                <span class="vehicles-list__item-info"><span class="vehicles-list__item-name">2011 Ford Focus S</span> <span class="vehicles-list__item-details">Engine 2.0L 1742DA L4 FI Turbo</span> </span>
                                <button type="button" class="vehicles-list__item-remove">
                                    <svg width="16" height="16"><path d="M2,4V2h3V1h6v1h3v2H2z M13,13c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V5h10V13z" /></svg>
                                </button>
                            </label>
                            <label class="vehicles-list__item">
                                <span class="vehicles-list__item-radio input-radio">
                                    <span class="input-radio__body"><input class="input-radio__input" name="header-vehicle" type="radio" /> <span class="input-radio__circle"></span> </span>
                                </span>
                                <span class="vehicles-list__item-info"><span class="vehicles-list__item-name">2019 Audi Q7 Premium</span> <span class="vehicles-list__item-details">Engine 3.0L 5626CC L6 QK</span> </span>
                                <button type="button" class="vehicles-list__item-remove">
                                    <svg width="16" height="16"><path d="M2,4V2h3V1h6v1h3v2H2z M13,13c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V5h10V13z" /></svg>
                                </button>
                            </label>
                        </div>
                    </div>
                    <div class="vehicle-picker-modal__actions">
                        <button type="button" class="btn btn-sm btn-secondary vehicle-picker-modal__close-button">Cancel</button> <button type="button" class="btn btn-sm btn-primary" data-to-panel="form">Add A Vehicle</button>
                    </div>
                </div>
                <div class="vehicle-picker-modal__panel" data-panel="form">
                    <div class="vehicle-picker-modal__title card-title">Add A Vehicle</div>
                    <div class="vehicle-form vehicle-form--layout--modal">
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Year">
                                <option value="none">Select Year</option>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                                <option>2013</option>
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select>
                        </div>
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Brand" disabled="disabled">
                                <option value="none">Select Brand</option>
                                <option>Audi</option>
                                <option>BMW</option>
                                <option>Ferrari</option>
                                <option>Ford</option>
                                <option>KIA</option>
                                <option>Nissan</option>
                                <option>Tesla</option>
                                <option>Toyota</option>
                            </select>
                        </div>
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Model" disabled="disabled">
                                <option value="none">Select Model</option>
                                <option>Explorer</option>
                                <option>Focus S</option>
                                <option>Fusion SE</option>
                                <option>Mustang</option>
                            </select>
                        </div>
                        <div class="vehicle-form__item vehicle-form__item--select">
                            <select class="form-control form-control-select2" aria-label="Engine" disabled="disabled">
                                <option value="none">Select Engine</option>
                                <option>Gas 1.6L 125 hp AT/L4</option>
                                <option>Diesel 2.5L 200 hp AT/L5</option>
                                <option>Diesel 3.0L 250 hp MT/L5</option>
                            </select>
                        </div>
                        <div class="vehicle-form__divider">Or</div>
                        <div class="vehicle-form__item"><input type="text" class="form-control" placeholder="Enter VIN number" aria-label="VIN number" /></div>
                    </div>
                    <div class="vehicle-picker-modal__actions">
                        <button type="button" class="btn btn-sm btn-secondary" data-to-panel="list">Back to list</button> <button type="button" class="btn btn-sm btn-primary">Add A Vehicle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- vehicle-picker-modal / end --><!-- photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption"><div class="pswp__caption__center"></div></div>
            </div>
        </div>
    </div>    

</div>

<!--TRACT MODAL -->
<div class="modal fade" id="trackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <form action="{{route('trackOrder')}}" method="POST">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Track your Order</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      
        
          @csrf
        <label for="t">Transaction ID</label> 
        <input id="t" type="text" class="form-control" name="transaction_id" required >

      

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
      <input type="submit" class="btn btn-primary" value="Track">                                                   
    </div>
  </div>
</form>
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



    
<!--Normal sweet alert nonification-->

{{-- 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script> --}}


 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>








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










<!--RUN JS CODE IN EVERY 5 SECOND -->



<script>

    // setInterval(function(){
    // $.ajax({                                      
    //     url: "{{ url('/get/cart/') }}/",        
    //     data: "",                        //the data "caller=name1&&callee=name2"
    //     dataType: 'json',                //data format   
    //     success: function(data)          //on receive of reply
    //     {
    //         // var foobar = data[2];           //foobar
    //         // $('#verification').html("(<b>"+foobar+"</b>)");  

    //          document.getElementById('cartCount').innerHTML = data.cCount;
    //          document.getElementById('cartTotal').innerHTML = data.cTotal+' BDT';

    //          document.getElementById('cSubTotal').innerHTML = data.cSubTotal+' BDT';
    //          document.getElementById('cTotall').innerHTML = data.cTotal+' BDT';
             

    //         //console.log(data.cTotal)
    //     } 
    // });
    // }, 1000);

    function callMe(){

        console.log('test ok');

    // $.ajax({                                      
    //     url: "{{ url('/get/cart/') }}/",        
    //     data: "",                        //the data "caller=name1&&callee=name2"
    //     dataType: 'json',                //data format   
    //     success: function(data)          //on receive of reply
    //     {
    //         // var foobar = data[2];           //foobar
    //         // $('#verification').html("(<b>"+foobar+"</b>)");  

    //          document.getElementById('cartCount').innerHTML = data.cCount;
    //          document.getElementById('cartTotal').innerHTML = data.cTotal+' BDT';

    //          document.getElementById('cSubTotal').innerHTML = data.cSubTotal+' BDT';
    //          document.getElementById('cTotall').innerHTML = data.cTotal+' BDT';
             

    //         //console.log(data.cTotal)
    //     } 
    // });

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

<!-- Mirrored from red-parts.html.themeforest.scompiler.ru/themes/red-ltr/ header-spaceship-variant-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Sep 2020 04:34:57 GMT -->
</html>
