
@extends('layouts.app')
@section('content')

<div class="site__body">
    <div class="block-header block-header--has-breadcrumb">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a onclick="changeUrl()" href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                        
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Sign up</span></li>
                    </ol> 
                </nav>
            </div>
        </div>
    </div>


    <div class="block-split ">
        <div class="container">
            <div class="block-split__row row no-gutters">
                <div class="block-split__item block-split__item-content col">
                    <div class="product product--layout--sidebar ">
                        <div class="product__body">
                            
                            <div class="product__tabs product-tabs product-tabs--layout--sidebar w-100">
                                <ul class="product-tabs__list">
                                    <li class="product-tabs__item product-tabs__item--active"><a onclick="changeUrlToRegister()" href="#user-registration-tab">Registration</a></li>
                                    <li class="product-tabs__item  mx-3"><a onclick="changeUrlToLogin()" href="#user-login-tab">Sign in</a></li>
                                    <li class="product-tabs__item"></li>
                                </ul>
                                <div class="product-tabs__content">
                                    <div class="product-tabs__pane product-tabs__pane--active" id="user-registration-tab">
                                        <div class="typography" style="width: 100%;">
                                            
                                            <!--Registration form-->
                                            <div class="loginregistration-area pb-100">
                                                <div class="container">
                                                    <form action="{{route('register')}}" method="POST" >
                                                        @csrf

                                                        <p class="font-weight-bold text-danger" style="font-size: 13px;">
                                                            @if (isset($res))
                                                                {{$res}}
                                                            @endif
                                                        </p>

                                                       
                                                        
                                                        @if ($errors->any())

                                                           
                                                                <div class=" mt-1 alert alert-light">
                                                                    <ul style="list-style-type: none;text-align: center;">

                                                                        


                                                                        @foreach ($errors->all() as $error)
                                                                        

                                                                        <div class="status-badge status-badge--style--failure status-badge--has-icon status-badge--has-text m-1">
                                                                            <div class="status-badge__body">
                                                                                <div class="status-badge__icon">
                                                                                    <svg width="13" height="13">
                                                                                        <path
                                                                                            d="M6.5,0C2.9,0,0,2.9,0,6.5S2.9,13,6.5,13S13,10.1,13,6.5S10.1,0,6.5,0z M6.5,2c0.9,0,1.7,0.3,2.4,0.7L2.7,8.9
                                                                                                C2.3,8.2,2,7.4,2,6.5C2,4,4,2,6.5,2z M6.5,11c-0.9,0-1.7-0.3-2.4-0.7l6.2-6.2C10.7,4.8,11,5.6,11,6.5C11,9,9,11,6.5,11z"
                                                                                        />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="status-badge__text">{{ $error }}</div>
                                                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Out&#x20;of&#x20;Stock"></div>
                                                                            </div>
                                                                        </div>                                                                                                        

                                                         
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                        @endif
                                                     <div class="row">
                                                        
                                                        <div class="col-lg-6 col-md-6 col-sm-12  ">
                                                            <div class="login-area">

                                                                    <fieldset>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label> <i class="fa fa-phone mr-2" style="color: #bebaba;"></i> Phone* <small>(Length must be 11)</small> </label>
                                                                                    <input type="number" class="form-control" placeholder="017XXXXXXXX" name="phone" required value="{{old('phone')}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label> <i class="fa fa-envelope mr-2" style="color: #bebaba;"></i> Email *</label>
                                                                                <input id="email" type="email" class="form-control " name="email" placeholder="Type your email address" required value="{{old('email')}}">
                                                                            </div>
                                                                        </div>
                                        
                                                                    </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="login-area">
                                                                    <fieldset>
                                                                        
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label> <i class="fa fa-lock mr-2" style="color: #bebaba;"></i> Password *</label>
                                                                                <input type="password" class="form-control" placeholder="password" name="password" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label> <i class="fa fa-lock mr-2" style="color: #bebaba;"></i> Confirm Password *</label>
                                                                                <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                            </div>
                                                        </div>
                                        
                                                        <div class="col-sm-12 my-3">

                                                            <div class="form-check">
                                                                <span class="input-check form-check-input"><span 
                                                                    class="input-check__body">
                                                                    <input class="input-check__input" type="checkbox" id="signin-remember" required> 
                                                                    <span class="input-check__box"></span> 
                                                                    <span class="input-check__icon">
                                                                        <svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"></path>
                                                                        </svg> 
                                                                    </span>
                                                                </span>
                                                                    </span>
                                                                <label class="form-check-label" for="signin-remember">
                                                                    <p style="width: 100%;margin-left: 0%; font-size: 14px;">
                                                                        Dear Customer! By creating an account, you agree to the ebipone.com Free Membership Agreement and <a href="{{route('privacy')}}" style="text-decoration: none;" >Privacy Policy</a>.
                                                                    </p>
                                                                </label>
                                                            </div>

                                                            <p style="display: block; text-align: center;">
                                                                <span id="one"></span> + <span id="two"></span> = 

                                                                <input id="field_one_id" type="hidden" name="v_one" value="">
                                                                <input id="field_two_id" type="hidden" name="v_two" value="">
                                                                
                                                                <input type="number" style="display: inline; width: 80px;" name="v_result" required>

                                                            </p>

                                                            <div class="form-group">
                                                                <button class="btn text-light" style="background:#D93430; padding: 15px 0;width: 60%;margin-left: 20%;" type="submit">Registration</button>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="product-tabs__pane" id="user-login-tab">
                                        <div class="typography" style="width: 100%;">
                                             <!--Login form-->
                                        <div class="loginregistration-area pb-100">
                                            <div class="container">
                                                <form action="{{route('login')}}" method="POST" >
                                                    @csrf
                                                    
                                                    @if ($errors->any())
                                                        <div class=" mt-1 alert alert-light">
                                                            <ul style="list-style-type: none;text-align: center;">
                                                                @foreach ($errors->all() as $error)
                                                                
                                                                @if ($error=='Email or password wrong.Try again to login...')

                                                                    <div class="status-badge status-badge--style--failure status-badge--has-icon status-badge--has-text m-1">
                                                                        <div class="status-badge__body">
                                                                            <div class="status-badge__icon">
                                                                                <svg width="13" height="13">
                                                                                    <path
                                                                                        d="M6.5,0C2.9,0,0,2.9,0,6.5S2.9,13,6.5,13S13,10.1,13,6.5S10.1,0,6.5,0z M6.5,2c0.9,0,1.7,0.3,2.4,0.7L2.7,8.9
                                                                                            C2.3,8.2,2,7.4,2,6.5C2,4,4,2,6.5,2z M6.5,11c-0.9,0-1.7-0.3-2.4-0.7l6.2-6.2C10.7,4.8,11,5.6,11,6.5C11,9,9,11,6.5,11z"
                                                                                    />
                                                                                </svg>
                                                                            </div>
                                                                            <div class="status-badge__text" >{{ $error }}</div>
                                                                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Out&#x20;of&#x20;Stock"></div>
                                                                        </div>
                                                                    </div>                                                                                                        
                                                                @endif

                                                                {{-- <div class="alert alert-danger mb-3">{{ $error }}</div> --}}
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    @endif

                                                <div class="row">

                                                    <div class="col-md-3">

                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="login-area">
                                                           
                                                                <fieldset>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label> <i class="fa fa-envelope mr-2" style="color: #bebaba;"></i> Email *</label>
                                                                                <input id="email" type="email" class="form-control " name="email" placeholder="E-mail" required value="{{old('email')}}">
                                                                            </div>
                                                                        </div>
                                                                    
                                                                
                                                                        <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label> <i class="fa fa-lock mr-2" style="color: #bebaba;"></i> Password *</label>
                                                                                    <input type="password" class="form-control" placeholder="password" name="password" required>
                                                                                </div>
                                                                        </div>
                                                                        
                                                                </fieldset>
                                                                
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">

                                                    </div>
                                                    
                                    
                                                    <div class=" col-sm-12 my-3">
                                                        <div class="form-group">
                                                            <button onclick="goLogin()" class="btn text-light" style="background:#D93430; padding: 15px 0;width: 30%;margin-left: 35%;" type="submit">Sign in</button>

                                                            <a class="mt-2" style="text-align: center; display: block;" href="{{route('password.request')}}">Forgot password</a> 
                                                            
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
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


<script>

   let regiButton = document.getElementById('regiButtonId');

    min = Math.ceil(1);
    max = Math.floor(5);                     

    let one =  Math.floor(Math.random() * (max - min + 1)) + min; 
    let two =  Math.floor(Math.random() * (max - min + 1)) + min; 

    document.getElementById("one").innerHTML = one;
    document.getElementById("two").innerHTML = two;

    document.getElementById("field_one_id").value = one;
    document.getElementById('field_two_id').value = two;




</script>



@endsection
