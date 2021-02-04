@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">Add Gift Voucher</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Add Gift voucher</li>

                  </ol>
              </div>
          </div>
      </div>
      <!-- END: Breadcrumbs-->

      <!-- START: Card Data-->
      <div class="row">
          <div class="col-12 mt-3">
              <div class="card">
                  <div class="card-header  justify-content-between align-items-center">                               
                      <h4 class="card-title">Gift voucher create form</h4> 
                  </div>
                  <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form action="{{route('admin.store.giftvoucher')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                                                                                                                            
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher name</label>
                                    <input type="text" class="form-control"  name="voucher_name" required value="{{old('voucher_name')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher amount</label>
                                    <input type="number" class="form-control" name="amount" required value="{{old('amount')}}">   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher picture</label>
                                    <input type="file" class="form-control" name="voucher_picture" required>   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher code</label>
                                    <input type="text" class="form-control"  name="voucher_code" required >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher duration</label>
                                    <input type="number" class="form-control" name="time_duration" min="0" required >
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher offer</label>
                                    <input type="number" class="form-control"  name="offer" required value="{{old('offer')}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Start date</label>
                                    <input type="date" class="form-control" name="start_date" required value="{{old('start_date')}}">   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">End date</label>
                                    <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}">   
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">

                                    <label class="font-weight-bold">Gift Voucher Description</label>
                                    <textarea class="form-control" name="description" rows="5" name="description">{{old('description')}}</textarea>  

                                </div>
                            </div>

                        </div>

                        <h6 class="font-weight-bold" style="font-size: 14px;">SELECT AVAILABLE SHOP</h6>

                        <div class="row row-eq-height">

                            @foreach ($shop as $item)
                            <div class="col-2 mt-3">
                                <div class="custom-control custom-checkbox custom-control-inline m-3"> 
                                    
                                    <input type="checkbox" class="custom-control-input" id="{{$item->id}}" name="{{$item->id}}" value="{{$item->id}}"> 
                                    
                                    <label class="custom-control-label checkbox-primary" for="{{$item->id}}">{{$item->shop_name}}</label>  

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <input type="submit" class="btn btn-primary w-25" value="Add Voucher">
                    </form>

                  </div>
              </div> 

          </div>                  
      </div>
      <!-- END: Card DATA-->
  </div>
</main>




@endsection
