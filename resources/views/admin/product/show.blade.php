@extends('admin.master')
@section('content')


        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Product Details 
                                
                                
                                @if ($product->status=='block')
                                <i class="text-danger fas fa-times font-weight-bold"></i> <small style="font-size: 16px;" class="font-weight-bold text-danger">Block Product</small>

                                @elseif($product->status=='pending')
                                <i class="text-danger fas fa-history font-weight-bold"></i> <small style="font-size: 16px;" class="font-weight-bold text-waring">Pending Product</small>
                                @else 
                                <i class="text-success fas fa-check font-weight-bold"></i> <small style="font-size: 16px;" class="font-weight-bold text-success">Active Product</small>
                                @endif
                            
                            
                            </h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Basic Info</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Product name:</dt>
                                    <dd class="col-sm-7"> 
                                        <a style="text-decoration: underline;" href="{{URL::to($product->un_id.'/'.Str::slug($product->product_name))}}" target="_blank">{{$product->product_name}}</a> 
                                    </dd>

                                    <dt class="col-sm-5">Product Code</dt>
                                    <dd class="col-sm-7">{{$product->product_code}}</dd>

                                    <dt class="col-sm-5">Category</dt>
                                    <dd class="col-sm-7">{{$product->category_name}}</dd>

                                    <dt class="col-sm-5">Sub-category</dt>
                                    <dd class="col-sm-7">{{$product->subcategory_name}}</dd>

                                    <dt class="col-sm-5">Sizes</dt>
                                    <dd class="col-sm-7">
                                        @if ($product->s!=null)
                                            S
                                        @endif
                                        @if ($product->m!=null)
                                            M
                                        @endif
                                        @if ($product->l!=null)
                                            L
                                        @endif
                                        @if ($product->xl!=null)
                                            XL
                                        @endif
                                        @if ($product->xxl!=null)
                                            XXL
                                        @endif
                                    </dd>

                                    @php
                                        $profit = $product->selling_price - $product->buying_price ;
                                    @endphp

                                    <dt class="col-sm-5">Vendor Price</dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold text-danger">৳ {{$product->buying_price}}</span></dd>

                                    <dt class="col-sm-5">Selling Price</dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold text-danger">৳ {{$product->selling_price}}</span></dd>


                                    <dt class="col-sm-5">Profit</dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold text-danger">৳ {{($product->selling_price) - ($product->buying_price)}} </span> 
                                        @if ( $profit<0)
                                            <span class="badge badge-danger text-white"> Loss Product </span>
                                        @endif     
                                    </dd>

                                    <dt class="col-sm-5">Quantity</dt>
                                    <dd class="col-sm-7">{{$product->product_quantity}} </dd> 
                         

                                    <dt class="col-sm-5">Status</dt>
                                    <dd class="col-sm-7"> 
                                        @if ($product->status=='pending')
                                        <span class="badge badge-danger"> {{$product->status}}  </span> 
                                        @else
                                        <span class="badge badge-primary"> {{$product->status}}  </span>
                                        @endif
                                    </dd>
                                </dl>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Shop Info</h4> 
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Shop name :</dt>
                                    <dd class="col-sm-7"> {{$product->shop_name}}</dd>

                                    <dt class="col-sm-5">Shop ID:</dt>
                                    <dd class="col-sm-7">{{$product->shop_id}}</dd>

                                    <dt class="col-sm-5">Email:</dt>
                                    <dd class="col-sm-7">{{$product->email}}</dd> 

                                    <dt class="col-sm-5">Phone:</dt>
                                    <dd class="col-sm-7"><span class="font-weight-bold text-danger">{{$product->phone}}</span></dd>

                                    <dt class="col-sm-5">Area/Village:</dt>
                                    <dd class="col-sm-7">{{$product->village}}</dd>

                                    <dt class="col-sm-5">Shop Address:</dt> 
                                    <dd class="col-sm-7">{{$product->shop_address}}</dd>

                                    <dt class="col-sm-5">District:</dt>
                                    <dd class="col-sm-7">{{$product->district}}</dd>

                                    <dt class="col-sm-5">Cashback :</dt>
                                    <dd class="col-sm-7"><span class="badge badge-danger text-white">
                                            
                                            @php
                                                    $cashback_price = (($product->cashback * $product->present_price)/100);
                                            @endphp
                                                    {{$product->cashback}} % </span>
                                                    <span class="font-weight-bold" > {{$cashback_price}} TK</span>
                                    </dd> 
                                    <dt class="col-sm-5">Discount Price:</dt>
                                    <dd class="col-sm-7"><span class="badge badge-danger text-white">

                                                {{$product->discount}} %
                                                </span> <span class="font-weight-bold" > {{$product->present_price}} TK</span>

                                             
                                        </span>
                                    </dd> 
                                </dl>
                            </div>
                        </div>


                    </div>
                    
                    <div class="col mt-2">
                        <div class="card">
                            <div class="card-body">
                                {{-- <a href="" class="btn btn-primary rounded-btn mb-2"> <i class="fa fa-home"></i> Edit Product Details </a> --}}

                                @if ($product->status=='block')
                                    <a href="{{URL::to('admin/unblock/product/'.$product->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="fa fa-thumbs-up"></i> Unblock Product </a>
                                @elseif($product->status=='pending')
                                    <a href="{{URL::to('admin/approve/product/'.$product->id)}}" class="mx-2 btn btn-info rounded-btn mb-2"> <i class="fa fa-thumbs-up"></i> Approve Product </a>
                                @else 
                                    <a href="{{URL::to('admin/block/product/'.$product->id)}}" class="mx-2 btn btn-danger rounded-btn mb-2"> <i class="fa fa-thumbs-down"></i> Block Product </a>
                                @endif


                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0 text-info font-weight-bold">Product | Quick Edit</h6></div>
                    </div>
                </div> 
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.set.cashback')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">1. Delivery Charge (৳)</label>
                                                <input type="number" min="0" class="form-control" value="{{$product->delivery_charge}}" name="delivery_charge" required placeholder="Set Delivery Charge">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">2. Delivery Time (In Day) Upto</label>
                                                <input type="number" min="0" class="form-control" value="{{$product->delivery_time}}" name="delivery_time" required placeholder="Set Delivery Time">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">3. Selling Price (৳)</label>
                                                <input type="number" min="1" class="form-control" value="{{$product->selling_price}}" name="selling_price" required placeholder="Set Selling Price">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">4. Vendor Price (৳)</label>
                                                <input type="number" min="1" class="form-control" value="{{$product->buying_price}}" name="buying_price" required placeholder="Set Vendor Price">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">5. Get Cashback ( % )</label>
                                                <input type="number" min="0" max="100" class="form-control" name="cashback" value="{{$product->cashback}}" placeholder="Set Cachback Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">6. Use Cashback ( % )</label>
                                                <input type="number" min="0" max="100" class="form-control" name="cashback_use" value="{{$product->cashback_use}}" placeholder="Set Cachback Percentage">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">7. Use Gift Balance ( % )</label>
                                                <input type="number" min="0" max="100" class="form-control" name="gift_use" value="{{$product->gift_use}}" placeholder="Set Cachback Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">8. Discount ( % )</label>
                                                <input type="number" min="0" max="100" class="form-control" value="{{$product->discount}}" name="discount" placeholder="Set Discount">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">9. Maximum Buy Quantity <small class="font-weight-bold text-danger">set 0 for Unlimited</small> </label>
                                                <input type="number" min="0" class="form-control" value="{{$product->max_buy}}" name="max_buy" required placeholder="For Unlimited set 0">
                                            </div>
                                        </div>

					                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">10. Pay Method</label>
                                                <select name="pay_method" id="pay_method" required class="form-control">

                                                    <option value="1" <?php  if($product->pay_method=='1') echo 'selected'; ?> >Both</option>
                                                    <option value="2" <?php  if($product->pay_method=='2') echo 'selected'; ?>>Only eBipone Balance</option>
                                                    <option value="3" <?php  if($product->pay_method=='3') echo 'selected'; ?>>Only SSL Direct Pay</option>
                                                </select>
                                            </div>
                                        </div>

					                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">11. Current Product Quantity</label>
                                                <input type="number" min="0" class="form-control" value="{{$product->product_quantity}}" name="product_quantity" required placeholder="Set Current product quantity">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="note">12. Keep a Note</label>
                                                <textarea class="form-control" name="keep_note" id="note" rows="5" placeholder="Write something">{{$product->keep_note}}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                    <br><br>
                                                <input id="show" name="show_home" <?php if($product->show_home=='1') echo 'checked'; ?> value='1' type="checkbox" data-toggle="toggle" data-onstyle="danger">
                                                <label for="show" class="font-weight-bold"> Show Product in Home Page?</label> <br>

                                                <input id="show_note" name="show_note" <?php if($product->show_note=='1') echo 'checked'; ?> value='1' type="checkbox" data-toggle="toggle" data-onstyle="danger">
                                                <label for="show_note" class="font-weight-bold"> Show Note in Product Description?</label>

                                            </div>
                                        </div>

                                        
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Discount ( % )</label>
                                                <input type="number" min="0" max="100" class="form-control" value="{{$product->discount}}" name="discount" placeholder="Set Discount">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <input type="submit" class="btn btn-primary w-25" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END: Card DATA--> 

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Description </h6></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p>
                                    {{$product->product_description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Product Images </h6></div>
                    </div>
                </div>
                <div class="row mt-4 mb-5">
                    <div class="col-md-3">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="{{asset($product->image_one)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="{{asset($product->image_two)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="{{asset($product->image_three)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="{{asset($product->image_four)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                            </div>
                        </div>
                    </div>
                    @if ($product->image_five!=null)
                    <div class="col-md-3 mt-2">
                        <div class="card" style="height: 220px;">
                            <div class="card-body">
                                <img src="{{asset($product->image_five)}}" style="width: 80%; height: 80%;margin-left: 10%;">
                            </div>
                        </div>
                    </div>
                    @endif
                </div>


            </div>
        </main>
        <!-- END: Content-->




@endsection
