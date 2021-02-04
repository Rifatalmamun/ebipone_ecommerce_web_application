@extends('admin.master')
@section('content')


        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Home Page Modify </h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">home Shop</li>   
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.store.homeshop')}}" method="POST"> 
                                    @csrf
                                    <div class="row row-eq-height">

                                        @foreach ($shop as $item)
                                        <div class="col-3 mt-2">
                                            <div class="custom-control custom-checkbox custom-control-inline m-3"> 
                                                <input type="checkbox" class="custom-control-input" id="{{$item->id}}" name="{{$item->id}}" value="{{$item->id}}" <?php if($item->show_home=='yes'){echo 'checked';} ?>> 
                                                
                                                <label class="custom-control-label checkbox-primary" for="{{$item->id}}">{{$item->shop_name}}</label>                                       
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                    <input type="submit" class="btn btn-primary w-25" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </main>

@endsection
