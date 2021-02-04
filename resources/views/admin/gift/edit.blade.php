@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">Edit Gift Voucher</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Edit Gift voucher</li>

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
                      <h4 class="card-title">Gift voucher edit form</h4> 
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
                    <form action="{{route('admin.update.giftvoucher')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf

                        <input type="hidden" name="id" value="{{$gift->id}}" >
                                                                                                                            
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher name</label>
                                    <input type="text" class="form-control"  name="voucher_name" required value="{{$gift->voucher_name}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher amount</label>
                                    <input type="number" class="form-control" name="amount" required value="{{$gift->amount}}">   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher picture</label>
                                    <input type="hidden" name="old_voucher_picture" value="{{$gift->voucher_picture}}">
                                    <input type="file" class="form-control" name="voucher_picture" >   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher code</label>
                                    <input type="text" class="form-control"  name="voucher_code" required value="{{$gift->voucher_code}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher duration</label>
                                    <input type="number" class="form-control" name="time_duration" required value="{{$gift->time_duration}}" min="0">
                                </div>
                            </div>

                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Voucher offer</label>
                                    <input type="number" class="form-control"  name="offer" required value="{{$gift->offer}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Start date</label>
                                    <input type="date" class="form-control" name="start_date" required value="{{$gift->start_date}}">   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">End date</label>
                                    <input type="date" class="form-control" name="end_date" value="{{$gift->end_date}}">   
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">

                                    <label class="font-weight-bold">Gift Voucher Description</label>
                                    <textarea class="form-control" name="description" rows="5" name="description">{{$gift->description}}</textarea>  

                                </div>
                            </div>

                        </div>
                        
                        
                        
                        <input type="submit" class="btn btn-primary w-25" value="Update Voucher">
                    </form>

                  </div>
              </div> 

          </div>                  
      </div>
      <!-- END: Card DATA-->
  </div>
</main>




@endsection
