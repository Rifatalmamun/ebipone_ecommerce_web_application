@extends('layouts.app')

@section('content')


<div class="site__body">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                        
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Email Verify</span></li>

                    </ol>
                </nav>
                {{-- <h1 class="block-header__title">Verify your email</h1> --}}
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="card mb-4">
                <div class="card-body card-body--padding--2">
                    <h2 class="card-title font-weight-bold text-danger" >Email Verify</h2>

                    <div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Dear User! A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="alert alert-light" role="alert">
                        <h4 class="alert-heading">Almost done!</h4>
                        <p>Dear User! A verification link has been sent to your email address from <a href="https://www.ebipone.com/">eBipone</a>.</p>
                        <hr />
                        <p class="mb-0">Before proceeding, please check your email for a verification link. </p>
                    </div>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Click here to request another') }}</button>
                    </form>

                        <div class="mt-3">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="text-danger" style="font-weight: bold;">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout
                            </a>
                        </div>
                                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf 
                        </form>


                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>






{{-- <div class="container" style="margin: 100px 0;">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Dear User! A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection
