
@extends('admin.master')
@section('content')


        <main>
            <div class="container-fluid site-width">

                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto">
                                <h4 class="mb-0">Money Upload Details / ৳ {{$upload_money_details->pay_price}} 
                                    <span class="text-success font-weight-bold"><i class="fas fa-check-double"></i> Completed
                                    </span> 
                                </h4>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Money Upload</li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                   
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="font-weight-bold text-secondary"> <a href="{{URL::to('admin/view/customer/'.$user->id)}}" class="text-secondary" style="text-decoration: underline;" target="_blank">{{$user->name}}</a> ({{$user->phone}}) uploaded ৳ {{$upload_money_details->pay_price}}. Date: <span class="text-danger">{{$upload_money_details->order_date}}</span> & Time: <span class="text-danger">{{$upload_money_details->order_time}}</span></p>
                                        <p class="text-secondary" style="margin: 0;"><span class="font-weight-bold">Uploaded Money: </span> ৳ {{$upload_money_details->pay_price}} </p>
                                        <p class="text-secondary"><span class="font-weight-bold">Uploaded Method: </span> SSL PAYMENT GATEWAY </p>
                                            <ul>
                                                <li class="font-weight-bold text-secondary"> Main Balance <span style="opacity: 0">---------- --</span> ৳ {{$user->user_balance}}</li>
                                                <li class="font-weight-bold text-secondary"> Cashback Balance <span style="opacity: 0">------</span> ৳ {{$user->user_cashback}}</li>
                                                <li class="font-weight-bold text-secondary"> Gift Balance <span style="opacity: 0">---------------</span> ৳ {{$user->user_giftbalance}}</li>
                                            </ul>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-store"></i> Customer Details</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Name</dt>
                                    <dd class="col-sm-7">{{$user->name}}</dd>

                                    <dt class="col-sm-5">Email</dt>
                                    <dd class="col-sm-7">{{$user->email}}</dd>

                                    <dt class="col-sm-5">Phone</dt>
                                    <dd class="col-sm-7"><span class="text-danger font-weight-bold">{{$user->phone}}</span></dd>

                                    <dt class="col-sm-5">Post Code</dt>
                                    <dd class="col-sm-7">{{$user->postcode}}</dd>

                                    <dt class="col-sm-5">Thana</dt>
                                    <dd class="col-sm-7">{{$user->ps}}</dd>

                                    <dt class="col-sm-5">Area</dt>
                                    <dd class="col-sm-7">{{$user->village}}</dd>

                                    <dt class="col-sm-5">District</dt>
                                    <dd class="col-sm-7">{{$user->district}}</dd>

                                    <dt class="col-sm-5">Address </dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold"> 
                                            
                                        {{$user->address}}
                                    </span></dd>
                                </dl>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card ">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title"> <i class="fas fa-user"></i> Profile</h4> 
                            </div>
                            <div class="card-body">


                                @if ($user->avatar!=null)
                                    <a href="{{URL::to('admin/view/customer/'.$user->id)}}" target="_blank">
                                        <img src="{{asset($user->avatar)}}" style="width: 36%; height: 36%;margin-left: 32%; border-radius: 50%;">
                                    </a>
                                @else
                                    <a href="{{URL::to('admin/view/customer/'.$user->id)}}" target="_blank">
                                        <img src="{{asset('public/media/profile/avtar-man.png')}}" style="width: 36%; height: 36%;margin-left: 32%; border-radius: 50%;">
                                    </a>
                                @endif


                                {{-- <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Name</dt>
                                    <dd class="col-sm-7">{{$upload_money_details->b_name}}</dd>

                                    <dt class="col-sm-5">Email</dt>
                                    <dd class="col-sm-7">{{$upload_money_details->b_email}}</dd>

                                    <dt class="col-sm-5">Phone</dt>
                                    <dd class="col-sm-7"><span class="text-danger font-weight-bold">{{$upload_money_details->b_phone}}</span></dd>

                                    <dt class="col-sm-5">Post Code</dt>
                                    <dd class="col-sm-7">{{$upload_money_details->b_postcode}}</dd>

                                    <dt class="col-sm-5">Thana</dt>
                                    <dd class="col-sm-7">{{$upload_money_details->b_thana}}</dd>

                                    <dt class="col-sm-5">Area</dt>
                                    <dd class="col-sm-7">{{$upload_money_details->b_area}}</dd>

                                    <dt class="col-sm-5">District</dt>
                                    <dd class="col-sm-7">{{$upload_money_details->b_district}}</dd>

                                    <dt class="col-sm-5">Address </dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold"> 

                                        {{$upload_money_details->shipping_address}}

                                    </span></dd>
                                </dl> --}}

                            </div>
                        </div>
                    </div>

                </div>


                {{-- <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0 font-weight-bold"> Customer </h6></div>
                    </div>
                </div>

                <div class="row mt-4">

                    <div class="col-md-3 mt-1">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                            
				                <a href="{{URL::to('admin/view/customer/'.$user->id)}}" target="_blank">
                                    <img src="{{asset($user->avatar)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                                </a>
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div> --}}


            </div>
        </main>
@endsection
