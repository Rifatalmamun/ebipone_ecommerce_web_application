@extends('admin.master')
@section('content')


        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Pickup Point || {{$warehouse->w_name}}</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Pickup Point</li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->


                @if ($warehouse->w_status=='approve')
                <div class="row">
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                    <i class="icon-basket icons card-liner-icon mt-2"></i>
                                    <div class='card-liner-content'>
                                        <h2 class="card-liner-title">2,390</h2>
                                        <h6 class="card-liner-subtitle">Shop Products</h6>                                       
                                    </div>                                
                                </div>
                                                           
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                    <i class="icon-user icons card-liner-icon mt-2"></i>
                                    <div class='card-liner-content'>
                                        <h2 class="card-liner-title">9,390</h2>
                                        <h6 class="card-liner-subtitle">Shop Profit</h6> 
                                    </div>                                
                                </div>
                                <span class="bg-primary card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                    <i class="icon-bag icons card-liner-icon mt-2"></i>
                                    <div class='card-liner-content'>
                                        <h2 class="card-liner-title">$4,390</h2>
                                        <h6 class="card-liner-subtitle">Total Earning</h6> 
                                    </div>                                
                                </div>
                     
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                    <span class="card-liner-icon mt-1">$</span>
                                    <div class='card-liner-content'> 
                                        <h2 class="card-liner-title">$4,390</h2>
                                        <h6 class="card-liner-subtitle">Pending</h6> 
                                    </div>                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- START: Card Data-->






                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Pickup Point Info</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Pickup Point name</dt>
                                    <dd class="col-sm-7">{{$warehouse->w_name}}</dd>

                                    <dt class="col-sm-5">Pickup Point phone</dt>
                                    <dd class="col-sm-7"><span class="text-danger font-weight-bold">{{$warehouse->phone}}</span></dd>

                                    <dt class="col-sm-5">Pickup Point district</dt>
                                    <dd class="col-sm-7">{{$warehouse->w_district}}</dd>

                                    <dt class="col-sm-5">Trade license no</dt>
                                    <dd class="col-sm-7">{{$warehouse->w_trade_no}}</dd>

                                    <dt class="col-sm-5">Pickup Point status</dt>
                                    <dd class="col-sm-7">
                                        
                                        @if ($warehouse->w_status=='pending')
                                        <span class=" badge badge-danger font-weight-bold"> Pending</span>
                                       
                                        @elseif ($warehouse->w_status=='active')
                                        <span class=" badge badge-info font-weight-bold"> Active </span> 

                                        @elseif ($warehouse->w_status=='block')
                                        <span class=" badge badge-danger font-weight-bold"> Block </span> 

                                        @endif

                                    </dd>


                                </dl>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Owner Info</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Owner name </dt>
                                    <dd class="col-sm-7"> {{$owner->name}} </dd>

                                    <dt class="col-sm-5">Owner phone </dt>
                                    <dd class="col-sm-7"> <span class="text-danger font-weight-bold">{{$owner->phone}}</span> </dd>

                                    <dt class="col-sm-5">Owner email</dt>
                                    <dd class="col-sm-7">{{$owner->email}}</dd>

                                    <dt class="col-sm-5">Area/Village</dt>
                                    <dd class="col-sm-7">{{$owner->village}}</dd>

                                    <dt class="col-sm-5">Address</dt>
                                    <dd class="col-sm-7">{{$owner->address}}</dd>

                                    <dt class="col-sm-5">District</dt>
                                    <dd class="col-sm-7">{{$owner->district}}</dd>

                                </dl>
                            </div>
                        </div>


                    </div>
                    
                    <div class="col mt-2">
                        <div class="card">
                            <div class="card-body">
                                {{-- <a href="" class="btn btn-primary rounded-btn mb-2"> <i class="fa fa-home"></i> Edit Shop Details </a> --}} 

                                @if ($warehouse->w_status=='block')
                                    <a href="{{URL::to('admin/unblock/warehouse/'.$warehouse->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="fa fa-home"></i> Unblock Pickup Point </a>
                                @elseif($warehouse->w_status=='pending')
                                    <a href="{{URL::to('admin/approve/warehouse/'.$warehouse->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="fa fa-home"></i> Approve Pickup Point </a>
                                @else 
                                    <a href="{{URL::to('admin/block/warehouse/'.$warehouse->id)}}" class="mx-2 btn btn-danger rounded-btn mb-2"> <i class="fa fa-home"></i> Block Pickup Point </a>
                                @endif


                            </div>
                        </div>
                    </div>
                    
                </div>



                <!--PICKUP POINT QUICK EDIT START-->

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0 text-info font-weight-bold">Pickup Point | Quick Edit</h6></div>
                    </div>
                </div> 

                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.update.pickuppoint')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="warehouse_id" value="{{$warehouse->id}}">

                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">1. Pickup Point Name</label>
                                                <input type="text" class="form-control" value="{{$warehouse->w_name}}" name="w_name" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">2. Pickup Point Phone</label>
                                                <input type="number" class="form-control" value="{{$warehouse->phone}}" name="phone" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">3. Trade License</label>
                                                <input type="text" class="form-control" value="{{$warehouse->w_trade_no}}" name="w_trade_no" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">4. Pickup Point District</label>

                                                <select name="w_district" class="form-control" required>

                                                    <option value="">--Select one--</option>
                                                    <option value="Barguna" <?php if($warehouse->w_district=='Barguna') echo 'selected'; ?>>Barguna</option>
                                                    <option value="Barisal" <?php if($warehouse->w_district=='Barisal') echo 'selected'; ?>>Barisal</option>
                                                    <option value="Jhalokati" <?php if($warehouse->w_district=='Jhalokati') echo 'selected'; ?>>Jhalokati</option>
                                                    <option value="Patuakhali" <?php if($warehouse->w_district=='Patuakhali') echo 'selected'; ?>>Patuakhali</option>
                                                    <option value="Pirojpur" <?php if($warehouse->w_district=='Pirojpur') echo 'selected'; ?>>Pirojpur</option>
                                                    <option value="Bandarban" <?php if($warehouse->w_district=='Bandarban') echo 'selected'; ?>>Bandarban</option>
                                                    <option value="Brahmanbaria" <?php if($warehouse->w_district=='Brahmanbaria') echo 'selected'; ?>>Brahmanbaria</option>
                                                    <option value="Chandpur" <?php if($warehouse->w_district=='Chandpur') echo 'selected'; ?>>Chandpur</option>
                                                    <option value="Chittagong" <?php if($warehouse->w_district=='Chittagong') echo 'selected'; ?>>Chittagong</option>
                                                    <option value="Comilla" <?php if($warehouse->w_district=='Comilla') echo 'selected'; ?>>Comilla</option>
                                                    <option value="Cox\'s Bazar" <?php if($warehouse->w_district=='Cox\'s Bazar') echo 'selected'; ?>>Cox's Bazar</option>
                                                    <option value="Feni" <?php if($warehouse->w_district=='Feni') echo 'selected'; ?>>Feni</option>
                                                    <option value="Khagrachhari" <?php if($warehouse->w_district=='Khagrachhari') echo 'selected'; ?>>Khagrachhari</option>
                                                    <option value="Lakshmipur" <?php if($warehouse->w_district=='Lakshmipur') echo 'selected'; ?>>Lakshmipur</option>
                                                    <option value="Noakhali" <?php if($warehouse->w_district=='Noakhali') echo 'selected'; ?>>Noakhali</option>
                                                    <option value="Rangamati" <?php if($warehouse->w_district=='Rangamati') echo 'selected'; ?>>Rangamati</option>
                                                    <option value="Dhaka" <?php if($warehouse->w_district=='Dhaka') echo 'selected'; ?>>Dhaka</option>
                                                    <option value="Faridpur" <?php if($warehouse->w_district=='Faridpur') echo 'selected'; ?>>Faridpur</option>
                                                    <option value="Gazipur" <?php if($warehouse->w_district=='Gazipur') echo 'selected'; ?>>Gazipur</option>
                                                    <option value="Gopalganj" <?php if($warehouse->w_district=='Gopalganj') echo 'selected'; ?>>Gopalganj</option>
                                                    <option value="Kishoreganj" <?php if($warehouse->w_district=='Kishoreganj') echo 'selected'; ?>>Kishoreganj</option>
                                                    <option value="Madaripur" <?php if($warehouse->w_district=='Madaripur') echo 'selected'; ?>>Madaripur</option>
                                                    <option value="Manikganj" <?php if($warehouse->w_district=='Manikganj') echo 'selected'; ?>>Manikganj</option>
                                                    <option value="Munshiganj" <?php if($warehouse->w_district=='Munshiganj') echo 'selected'; ?>>Munshiganj</option>
                                                    <option value="Narayanganj" <?php if($warehouse->w_district=='Narayanganj') echo 'selected'; ?>>Narayanganj</option>
                                                    <option value="Narsingdi" <?php if($warehouse->w_district=='Narsingdi') echo 'selected'; ?>>Narsingdi</option>
                                                    <option value="Rajbari" <?php if($warehouse->w_district=='Rajbari') echo 'selected'; ?>>Rajbari</option>
                                                    <option value="Shariatpur" <?php if($warehouse->w_district=='Shariatpur') echo 'selected'; ?>>Shariatpur</option>
                                                    <option value="Tangail" <?php if($warehouse->w_district=='Tangail') echo 'selected'; ?>>Tangail</option>
                                                    <option value="Bagerhat" <?php if($warehouse->w_district=='Bagerhat') echo 'selected'; ?>>Bagerhat</option>
                                                    <option value="Chuadanga" <?php if($warehouse->w_district=='Chuadanga') echo 'selected'; ?>>Chuadanga</option>
                                                    <option value="Jessore" <?php if($warehouse->w_district=='Jessore') echo 'selected'; ?>>Jessore</option>
                                                    <option value="Jhenaidah" <?php if($warehouse->w_district=='Jhenaidah') echo 'selected'; ?>>Jhenaidah</option>
                                                    <option value="Khulna" <?php if($warehouse->w_district=='Khulna') echo 'selected'; ?>>Khulna</option>
                                                    <option value="Kushtia" <?php if($warehouse->w_district=='Kushtia') echo 'selected'; ?>>Kushtia</option>
                                                    <option value="Magura" <?php if($warehouse->w_district=='Magura') echo 'selected'; ?>>Magura</option>
                                                    <option value="Meherpur" <?php if($warehouse->w_district=='Meherpur') echo 'selected'; ?>>Meherpur</option>
                                                    <option value="Narail" <?php if($warehouse->w_district=='Narail') echo 'selected'; ?>>Narail</option>
                                                    <option value="Satkhira" <?php if($warehouse->w_district=='Satkhira') echo 'selected'; ?>>Satkhira</option>
                                                    <option value="Jamalpur" <?php if($warehouse->w_district=='Jamalpur') echo 'selected'; ?>>Jamalpur</option>
                                                    <option value="Mymensingh" <?php if($warehouse->w_district=='Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                                                    <option value="Netrokona" <?php if($warehouse->w_district=='Netrokona') echo 'selected'; ?>>Netrokona</option>
                                                    <option value="Sherpur" <?php if($warehouse->w_district=='Sherpur') echo 'selected'; ?>>Sherpur</option>
                                                    <option value="Bogra" <?php if($warehouse->w_district=='Bogra') echo 'selected'; ?>>Bogra</option>
                                                    <option value="Joypurhat" <?php if($warehouse->w_district=='Joypurhat') echo 'selected'; ?>>Joypurhat</option>
                                                    <option value="Naogaon" <?php if($warehouse->w_district=='Naogaon') echo 'selected'; ?>>Naogaon</option>
                                                    <option value="Natore" <?php if($warehouse->w_district=='Natore') echo 'selected'; ?>>Natore</option>
                                                    <option value="Chapainawabganj" <?php if($warehouse->w_district=='Chapainawabganj') echo 'selected'; ?>>Chapainawabganj</option>
                                                    <option value="Pabna" <?php if($warehouse->w_district=='Pabna') echo 'selected'; ?>>Pabna</option>
                                                    <option value="Rajshahi" <?php if($warehouse->w_district=='Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                                                    <option value="Sirajganj" <?php if($warehouse->w_district=='Sirajganj') echo 'selected'; ?>>Sirajganj</option>
                                                    <option value="Dinajpur" <?php if($warehouse->w_district=='Dinajpur') echo 'selected'; ?>>Dinajpur</option>
                                                    <option value="Gaibandha" <?php if($warehouse->w_district=='Gaibandha') echo 'selected'; ?>>Gaibandha</option>
                                                    <option value="Kurigram" <?php if($warehouse->w_district=='Kurigram') echo 'selected'; ?>>Kurigram</option>
                                                    <option value="Lalmonirhat" <?php if($warehouse->w_district=='Lalmonirhat') echo 'selected'; ?>>Lalmonirhat</option>
                                                    <option value="Nilphamari" <?php if($warehouse->w_district=='Nilphamari') echo 'selected'; ?>>Nilphamari</option>
                                                    <option value="Panchagarh" <?php if($warehouse->w_district=='Panchagarh') echo 'selected'; ?>>Panchagarh</option>
                                                    <option value="Rangpur" <?php if($warehouse->w_district=='Rangpur') echo 'selected'; ?>>Rangpur</option>
                                                    <option value="Thakurgaon" <?php if($warehouse->w_district=='Thakurgaon') echo 'selected'; ?>>Thakurgaon</option>
                                                    <option value="Habiganj" <?php if($warehouse->w_district=='Habiganj') echo 'selected'; ?>>Habiganj</option>
                                                    <option value="Moulvibazar" <?php if($warehouse->w_district=='Moulvibazar') echo 'selected'; ?>>Moulvibazar</option>
                                                    <option value="Sunamganj" <?php if($warehouse->w_district=='Sunamganj') echo 'selected'; ?>>Sunamganj</option>
                                                    <option value="Sylhet" <?php if($warehouse->w_district=='Sylhet') echo 'selected'; ?>>Sylhet</option>
                                                    <option value="Bhola" <?php if($warehouse->w_district=='Bhola') echo 'selected'; ?>>Bhola</option>

                                                </select>  


                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">5. Pickup Point Logo</label>
                                                <input type="hidden" name="old_logo" value="{{$warehouse->logo}}">
                                                <input type="file" class="form-control" name="logo" >
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">6. Pickup Point Banner</label>
                                                <input type="hidden" name="old_banner" value="{{$warehouse->banner}}">
                                                <input type="file" class="form-control" name="banner" >
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">7. Pickup Point Trade License</label>
                                                <input type="hidden" name="old_w_trade_picture" value="{{$warehouse->w_trade_picture}}">
                                                <input type="file" class="form-control" name="w_trade_picture" >
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">8. Pickup Point Location</label>
                                                <textarea name="w_location" rows="5" class="form-control">{{$warehouse->w_location}}</textarea>
                                            </div>
                                        </div>

                                        

                                    </div>
                                   
                                    <input type="submit" class="btn btn-primary w-25" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!--PICKUP POINT QUICK EDIT END-->
            

                <!-- END: Card DATA--> 

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0">Pickup Point Images </h6></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                @if ($warehouse->logo)
                                <img src="{{asset($warehouse->logo)}}" alt="Shop Logo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption>Pickup Point Logo</figcaption>
                                @else
                                Pickup Point logo not given by Pickup Point owner
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                @if ($warehouse->banner)
                                <img src="{{asset($warehouse->banner)}}" alt="Shop Trad Photo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption class="mt-1">warehouse Banner</figcaption>
                                @else
                                Pickup Point banner not given by Pickup Point owner
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="{{asset($warehouse->w_trade_picture)}}" alt="Shop Trad Photo" style="width: 80%; height: 80%;margin-left: 10%;">
                                <figcaption class="mt-1">Trade License</figcaption>
                            </div>
                        </div>
                    </div>

                </div>






            </div>
        </main>
        <!-- END: Content-->
@endsection
