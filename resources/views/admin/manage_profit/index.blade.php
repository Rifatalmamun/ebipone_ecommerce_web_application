@extends('admin.master')
@section('content')

<main>
  <div class="container-fluid site-width">

      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-uppercase">eBipone Profit Management </h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Home</li>
                      <li class="breadcrumb-item active">Profit Management</li>
                  </ol>

              </div>
          </div>
      </div>


      <div class="row">

        <div class="col-12  col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Total Profit</p>
                        <p class="font-w-500 tx-s-12">৳ {{$data->total_profit}}</p> 

                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-info">Details</span> 
                                                                  
                            </div>
                            <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-money-bill-wave" style="font-size: 23px;"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12  col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Pickup Point Profit</p>
                        <p class="font-w-500 tx-s-12">৳ {{$data->pickup_profit}}</p> 

                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-info">Details</span> 
                                                                  
                            </div>
                            <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-people-carry" style="font-size: 23px;"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12  col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">eBipone System Profit</p>
                        <p class="font-w-500 tx-s-12">৳ {{$data->system_profit}}</p>

                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-info">Details</span> 
                                                                  
                            </div>
                            <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-user-shield" style="font-size: 23px;"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12  col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Orjon Limited Profit</p>
                        <p class="font-w-500 tx-s-12">৳ {{$data->orjon_profit}}</p> 

                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-info">Details</span> 
                                                                  
                            </div>
                            <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fab fa-opera" style="font-size: 23px;"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12  col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Call Center Profit</p>
                        <p class="font-w-500 tx-s-12">৳ {{$data->call_center_profit}}</p>

                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-info">Details</span> 
                                                                  
                            </div>
                            <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-headset" style="font-size: 23px;"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12  col-md-6 col-lg-4 mt-3">
            <div class="card">                            
                <div class="card-content">
                    <div class="card-body p-4">
                        <p class="mb-3 font-w-600">Marketing Cost Profit</p>
                        <p class="font-w-500 tx-s-12">৳ {{$data->marketing_profit}}</p>

                        <div class="d-flex">
                            <div class="my-auto line-h-1">
                                <span class="badge outline-badge-info">Details</span> 
                                                                  
                            </div>
                            <img src="" width="30" class="rounded-circle  ml-auto"> <i class="fas fa-bullhorn" style="font-size: 23px;"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>



      </div>

      <div class="row">
          <div class="col-12 mt-4">
              <div class="card">
                  <div class="card-header">                               
                      <h6 class="card-title font-weight-bold ">Total Profit Percentage (100%)</h6>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <div class="row">                                           
                              <div class="col-12">

                                  <form action="{{route('admin.update.profit.percent')}}" method="POST"> 
                                    @csrf  

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                      <div class="form-row">

                                          <div class="form-group col-md-6">

                                            <label class="font-weight-bold">When Pickup Point Got Profit?</label> <br> <br>

                                            <input type="radio" id="after_warehouse_received_product" name="when_warehouse_get_money" value="after_warehouse_get_product" <?php if($data->when_warehouse_get_money=='after_warehouse_get_product'){echo 'checked';} ?>>
                                            <label for="after_warehouse_received_product">After pickup point received product from shop</label><br>
                                           
                                            <input type="radio" id="after_customer_received_product" name="when_warehouse_get_money" value="after_customer_get_product"  <?php if($data->when_warehouse_get_money=='after_customer_get_product'){echo 'checked';} ?>  >
                                            <label for="after_customer_received_product">After customer received product successfully</label><br>

                                          </div>

                                          <div class="form-group col-md-6">

                                            <label class="font-weight-bold">When Shop Got Profit?</label> <br> <br>

                                            <input type="radio" id="when_shop_get_money" name="when_shop_get_money" value="after_warehouse_get_product" <?php if($data->when_shop_get_money=='after_warehouse_get_product'){echo 'checked';} ?>>
                                            <label for="when_shop_get_money">After pickup point received product from shop</label><br>
                                           
                                            <input type="radio" id="after_customer_get" name="when_shop_get_money" value="after_customer_get_product"  <?php if($data->when_shop_get_money=='after_customer_get_product'){echo 'checked';} ?>  >
                                            <label for="after_customer_get">After customer received product successfully</label><br>

                                          </div>

                                            <div class="form-group col-md-4">
                                              <label for="warehouse_percent" class="font-weight-bold">Pickup Point Percentage</label>
                                              <input id="warehouse_percent" type="number" class="form-control @error('warehouse_percent') is-invalid @enderror" id="Phone" name="warehouse_percent" value="{{$data->warehouse_percent}}" required min="0" max="100">
                                          
                                                @error('warehouse_percent')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror

                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="system_percent" class="font-weight-bold">eBipone Admin Percentage</label>
                                                <input type="number" class="form-control  @error('system_percent') is-invalid @enderror" name="system_percent" id="system_percent" value="{{$data->system_percent}}" required min="0" max="100">
                                                                                        
                                                @error('system_percent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> 
                                                        </span>
                                                @enderror
                                           </div>

                                           <div class="form-group col-md-4">
                                                <label for="call_center_percent" class="font-weight-bold">Call Center Percentage</label>
                                                <input type="number" class="form-control  @error('call_center_percent') is-invalid @enderror" name="call_center_percent" id="call_center_percent" value="{{$data->call_center_percent}}" required min="0" max="100">
                                                                                        
                                                @error('call_center_percent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> 
                                                        </span>
                                                @enderror
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="orjon_percent" class="font-weight-bold">Orjon Percentage</label>
                                                <input type="number" class="form-control  @error('orjon_percent') is-invalid @enderror" name="orjon_percent" id="orjon_percent" value="{{$data->orjon_percent}}" required min="0" max="100">
                                                                                        
                                                @error('orjon_percent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> 
                                                        </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="marketing_percent" class="font-weight-bold">Marketing Percentage</label>
                                                <input type="number" class="form-control  @error('marketing_percent') is-invalid @enderror" name="marketing_percent" id="marketing_percent" value="{{$data->marketing_percent}}" required min="0" max="100">
                                                                                        
                                                @error('marketing_percent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> 
                                                        </span>
                                                @enderror
                                            </div>

					<div class="form-group col-md-4">
                                                <label for="shipping_charge" class="font-weight-bold">Shipping Charge (৳)</label>
                                                <input type="number" class="form-control  @error('shipping_charge') is-invalid @enderror" name="shipping_charge" id="shipping_charge" value="{{$data->shipping_charge}}" required min="0" max="100">
                                                                                        
                                                @error('shipping_charge')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> 
                                                        </span>
                                                @enderror
                                            </div>

					<div class="form-group col-md-4">
                                                <label for="min_upload" class="font-weight-bold">Minimum Upload Money (৳)</label>
                                                <input type="number" class="form-control  @error('min_upload') is-invalid @enderror" name="min_upload" id="min_upload" value="{{$data->min_upload}}" required min="0" >
                                                                                        
                                                @error('min_upload')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> 
                                                        </span>
                                                @enderror
                                            </div>

                                            {{-- <div class="form-group col-md-3">
                                                <label for="product_quantity">Total Quantity</label>
                                                <input type="number" class="form-control" name="product_quantity" id="product_quantity"  min="0" required>
                                            </div> --}}
                                      </div>
                                    
                                    
                                      <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- END: Card DATA--> 
  </div>
</main>



<script>
    document.getElementById('create_date').valueAsDate = new Date();
    document.getElementById("create_date").disabled = true;
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection
