@extends('admin.master')
@section('content')

<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Gift Voucher</h4></div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Gift Voucher</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('admin.create.giftvoucher')}}" class="btn btn-info mb-4">Create New Gift Voucher</a>
                        <div class="row">

                            

                            @foreach ($gift as $item)
                            <div class="col-md-6 col-lg-3 mb-5">
                                <div class="position-relative">

                                    @if ($item->voucher_picture!=null)
                                    <img src="{{asset($item->voucher_picture)}}" alt="voucher picture" class="img-fluid">
                                    @else
                                    <img src="{{asset('public/media/voucher/dumy.jpg')}}" alt="voucher picture" class="img-fluid">
                                    @endif

                                    <div class="caption-bg fade bg-transparent text-right">
                                        <div class="d-table w-100 h-100 ">
                                            <div class="d-table-cell align-bottom">
                                                <div class="mb-3">
                                                    <a href="{{URL::to('admin/edit/giftvoucher/'.$item->id)}}" class="text-danger rounded-left bg-white px-3 py-2 shadow2"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <div class=" mb-4">
                                                    <a id="delete" href="{{URL::to('admin/delete/giftvoucher/'.$item->id)}}" class="text-danger rounded-left bg-white px-3 py-2 shadow2"><i class="fa fa-trash"></i></a> 
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3">

                                    {{-- <p class="mb-2">
                                        <a href="{{URL::to('admin/edit/giftvoucher/'.$item->id)}}" class="font-weight-bold text-primary" style="cursor: text;"> <i class="fa fa-edit"></i> </a>

                                        <a href="{{URL::to('admin/delete/giftvoucher/'.$item->id)}}" class="font-weight-bold text-primary" style="cursor: text;"> <i class="fa fa-trash"></i> </a>
                                    </p> --}}


                                    <p class="mb-2"><a href="javascript:void(0)" class="font-weight-bold text-primary" style="display: block; cursor: text;">{{$item->voucher_name}} (৳ {{$item->amount }})</a></p>

                                    <p style="margin: 0;padding: 0;display: block;" class="text-primary font-weight-bold">Offer (৳ {{$item->offer }})</p>

                                    <p  style="margin: 0;padding: 0;display: block;" class="text-primary font-weight-bold"> <i class="fas fa-calendar-alt"></i> {{$item->start_date}}</p> 

                                    {{-- <p  style="display: block;text-align: center;" class="text-primary font-weight-bold"><i class="fas fa-calendar-alt"></i> {{$item->end_date}}</p> --}}
                                    
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- END: Card DATA--> 
    </div>
</main>




@endsection
