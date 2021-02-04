@extends('admin.master')

@section('content')


<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">Shop Edit || Admin</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Home</li>
                      <li class="breadcrumb-item"> <a href="{{route('admin.index.shop')}}">Shop</a></li>
                      <li class="breadcrumb-item active"><a href="#">Edit</a></li>
                  </ol>
              </div>
          </div>
      </div>
      <!-- END: Breadcrumbs-->

      <!-- START: Card Data-->
      <div class="row">
          <div class="col-12 mt-4">
              <div class="card">
                  <div class="card-header">                               
                      <h6 class="card-title font-weight-bold">Shop Information</h6>                                
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <div class="row">                                           
                              <div class="col-12">

                                  <form action="{{route('admin.update.shop')}}" method="POST" enctype="multipart/form-data"> 
                                    @csrf  

                                    {{-- @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                    @endif --}}

                                    <input type="hidden" name="id" value="{{$shop->id}}">

                                      <div class="form-row">
                                          <div class="form-group col-md-4">
                                              <label for="shop_name">Shop Name</label>
                                              <input type="text" class="form-control rounded @error('shop_name') is-invalid @enderror" id="shop_name" name="shop_name" value="{{$shop->shop_name}}" required>

                                                @error('shop_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror
                                          
                                          
                                            </div>
                                          <div class="form-group col-md-4">
                                              <label for="Phone">Shop Phone</label>
                                              <input type="number" class="form-control @error('shop_phone') is-invalid @enderror" id="Phone" name="shop_phone" value="{{$shop->shop_phone}}" required>
                                          
                                                @error('shop_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror

                                            </div>
                                          <div class="form-group col-md-4">
                                            <label for="shop_trad_no">Shop Trade No</label>
                                            <input type="text" class="form-control" name="shop_trad_no" value="{{$shop->shop_trad_no}}" id="shop_trad_no" required>
                                        </div>
                                      </div>
                                    
                                    {{-- <div class="form-row">

                                        <div class="form-group col-md-4">
                                          <label for="ps">Total Earning(৳)</label>
                                          
                                            @if ($shop->shop_total_earning==null)
                                                <input type="number" class="form-control" id="shop_balance" name="shop_balance" value="0" min="0" >
                                                
                                            @else
                                                <input type="number" class="form-control" id="shop_balance" name="shop_balance" value="{{$shop->shop_total_earning}}" min="0" required>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="pending_delivery">Current Balance (৳)</label>
                                            
                                            @if ($shop->shop_balance==null)
                                                <input type="number" class="form-control" id="pending_delivery" name="pending_delivery" value="0" min="0">
                                            @else
                                                <input type="number" class="form-control" id="pending_delivery" name="pending_delivery" value="{{$shop->shop_balance}}" min="0" required>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-4">
                                              <label for="pending_withdraw">Pending Withdraw (৳)</label>
                                              
                                            @if ($shop->pending_withdraw==null)
                                                <input type="number" class="form-control" id="pending_withdraw" name="pending_withdraw" value="0" min="0">
                                            @else
                                                <input type="number" class="form-control" id="pending_withdraw" name="pending_withdraw" value="{{$shop->pending_withdraw}}" min="0" required>
                                            @endif

                                        </div>
                                          
                                    </div> --}}


                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="shop_trad_photo">Shop Trade License</label>
                                            <input type="file" class="form-control @error('shop_trad_photo') is-invalid @enderror" name="shop_trad_photo" id="shop_trad_photo">
                                            <input type="hidden" name="old_shop_trad_photo" value="{{$shop->shop_trad_photo}}">


                                            @error('shop_trad_photo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror


                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="shop_logo">Shop Logo <small>max (150*150)</small> </label>
                                            <input type="file" class="form-control @error('shop_logo') is-invalid @enderror" name="shop_logo" id="shop_logo">
                                            <input type="hidden" name="old_shop_logo" value="{{$shop->shop_logo}}">


                                            @error('shop_logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Shop Logo Dimension Maximum 150*150 </strong> 
                                            </span>
                                        @enderror


                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="shop_banner">Shop Banner <small>max (1110*150)</small></label>
                                            <input type="file" class="form-control @error('shop_banner') is-invalid @enderror" name="shop_banner" id="shop_banner">
                                            <input type="hidden" name="old_shop_banner" value="{{$shop->shop_banner}}"> 


                                            @error('shop_banner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Shop Banner Dimension Maximum 1110*150 </strong> 
                                            </span>
                                        @enderror


                                        </div>
                                        
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-12">
                                          <label for="shop_address">Shop Address</label>
                                          <textarea name="shop_address" id="shop_address" rows="3" class="form-control" required>{{$shop->shop_address}}</textarea>
                                        </div>
                                        
                                    </div>

                                      <div class="form-row">
                                        <div class="form-group col-4">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    @if ($shop->show_home=='yes')

                                                        <input type="checkbox" class="custom-control-input" id="show_in_home" checked name="show_home" value="yes">
                                                    @else
                                                        <input type="checkbox" class="custom-control-input" id="show_in_home"  name="show_home" value="yes">

                                                    @endif
                                                      <label class="custom-control-label" for="show_in_home">Shop Show in Home?</label>
                                                </div>
                                              </div>
                                        </div>

                                      </div>

                                      <button type="submit" class="btn btn-primary">Update Shop</button>
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
