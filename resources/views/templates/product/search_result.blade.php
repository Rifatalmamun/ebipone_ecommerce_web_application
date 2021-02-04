
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

                                    <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Search result</span></li>
                                    <li class="breadcrumb__title-safe-area" role="presentation"></li>
                                </ol>
                            </nav>
                        
                        </div>
                    </div>
                </div>

                <div class="block-split block-split--has-sidebar">
                    <div class="container">
                        <div class="block-split__row row no-gutters">
                            <div class="block-split__item block-split__item-sidebar col-auto">
                                <div class="sidebar sidebar--offcanvas--mobile">
                                    <div class="sidebar__backdrop"></div>
                                    <div class="sidebar__body">
                                        
                                        <div class="sidebar__content">
                                            <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                                                
                                                <div class="widget-filters__list">
                                                    <div class="widget-filters__item">
                                                        <div class="filter filter--opened" data-collapse-item>
                                                            <button type="button" class="filter__title" data-collapse-trigger>
                                                                <span> <i class="fa fa-list-alt"></i> Categories</span>
                                                                <span class="filter__arrow">
                                                                    <svg width="12px" height="7px">
                                                                        <path
                                                                            d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"
                                                                        />
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                            <div class="filter__body" data-collapse-content>
                                                                <div class="filter__container">
                                                                    <div class="filter-categories">
                                                                        <ul class="filter-categories__list">
                                                                            
                                                                            @foreach ($category as $item)
                                                                            <li class="filter-categories__item filter-categories__item--parent">
                                                                                <a href="{{URL::to('category/'.Str::slug($item->category_name))}}">{{$item->category_name}}</a>
                                                                                <div class="filter-categories__counter">
                                                                                    {{-- @php
                                                                                        $c = DB::table('products')->where('category_id',$item->id)->count();
                                                                                        echo $c;
                                                                                    @endphp --}}
                                                                                     
                                                                                </div>
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{route('filter')}}" method="POST">
                                                        @csrf
                                                        <div class="widget-filters__item">
                                                            <div class="filter filter--opened" data-collapse-item>
                                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                                    <span> <i class="fa fa-money-check"></i> Price </span>
                                                                    <span class="filter__arrow">
                                                                        <svg width="12px" height="7px">
                                                                            <path
                                                                                d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"
                                                                            />
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                                <div class="filter__body" data-collapse-content>
                                                                    <div class="filter__container">
                                                                        
                                                                        <div class="filter-price" data-min="100" data-max="5000" data-from="100" data-to="5000">

                                                                            <div class="filter-price__slider"></div>
                                                                            <div class="filter-price__title-button">
                                                                                <div class="filter-price__title">৳<span class="filter-price__min-value"></span> – ৳<span class="filter-price__max-value"></span></div>
                                                                                <button type="submit" class="btn btn-xs btn-secondary filter-price__button">Filter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                    
                                                    
                                                    
                                                    {{-- <div class="widget-filters__item">
                                                        <div class="filter filter--opened" data-collapse-item>
                                                            <button type="button" class="filter__title" data-collapse-trigger>
                                                                Color
                                                                <span class="filter__arrow">
                                                                    <svg width="12px" height="7px">
                                                                        <path
                                                                            d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"
                                                                        />
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                            <div class="filter__body" data-collapse-content>
                                                                <div class="filter__container">
                                                                    <div class="filter-color">
                                                                        <div class="filter-color__list">
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color input-check-color--white" style="color: #fff;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #d9d9d9;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #b3b3b3;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #808080;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #666;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #4d4d4d;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #262626;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #ff4040;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" checked="checked" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #ff8126;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #ffd440;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color input-check-color--light" style="color: #becc1f;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #8fcc14;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" checked="checked" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #47cc5e;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #47cca0;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #47cccc;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #40bfff;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" disabled="disabled" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #3d6dcc;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" checked="checked" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #7766cc;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #b852cc;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                            <label class="filter-color__item">
                                                                                <span class="filter-color__check input-check-color" style="color: #e53981;">
                                                                                    <label class="input-check-color__body">
                                                                                        <input class="input-check-color__input" type="checkbox" /> <span class="input-check-color__box"></span>
                                                                                        <span class="input-check-color__icon">
                                                                                            <svg width="12px" height="9px"><path d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z" /></svg>
                                                                                        </span>
                                                                                        <span class="input-check-color__stick"></span>
                                                                                    </label>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    
                                                </div>
                                                <div class="widget-filters__actions d-flex"><button class="btn btn-primary btn-sm">Filter</button> 
                                                    {{-- <button class="btn btn-secondary btn-sm">Reset</button> --}}
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-split__item block-split__item-content col-auto">
                                <div class="block">

                                    @if ($count==0)
                                    <div class="card">
                                        <div class="card-header"><h5 class="text-dark">No product found!</h5></div>
                                        <div class="card-divider"></div>
                                        <div class="card-body card-body--padding--2">
                                            <div class="row no-gutters">
                                                <div class="col-12 col-lg-12 col-xl-12">
                                                    <div class="alert alert-light" role="alert">
                                                        <img src="{{asset('public/media/sad.png')}}" style="width: 18%;margin-left: 38%; opacity: .6;" >
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="m-3"> <i class="fa fa-eye"></i> See Others Products</h6>
                                    </div>
                                        @php
                                            $products = DB::table('products')
                                                    ->join('users','users.id','products.product_owner_id')
                                                    ->join('categories','categories.id','products.category_id')
                                                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                                                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')
                                                    ->get();
                                        @endphp
                                    @endif

                                    <div class="products-view">
                                        
                                        <div class="products-view__list products-list products-list--grid--4" data-layout="grid" data-with-features="false">
                                            <div class="products-list__head">
                                                <div class="products-list__column products-list__column--image">Image</div>
                                                <div class="products-list__column products-list__column--meta">SKU</div>
                                                <div class="products-list__column products-list__column--product">Product</div>
                                                <div class="products-list__column products-list__column--rating">Rating</div>
                                                <div class="products-list__column products-list__column--price">Price</div>
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
                                                        <div class="product-card__info mt-2">

                                                            <div class="product-card__name">
                                                                <div>
                                                                    <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}" class="text-secondary"> {{$item->product_name}} </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-card__rating">
                                                                
                                                                
                                                            </div>
                                                            <div class="product-card__features">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="product-card__footer">
                                                            <div class="product-card__prices">
                                                                <div class="product-card__price product-card__price--new">৳ {{$item->present_price}}</div>
                                                                <div class="product-card__price product-card__price--old"></div>
                                                            </div>
                                                            
                                                           

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
                
                <form action="{{route('insert.to.cart')}}" method="POST">
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



