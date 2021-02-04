@extends('admin.master')

@section('content')

     <!-- START: Main Content-->
     <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">Datatable</h4></div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Table</li>
                            <li class="breadcrumb-item active"><a href="#">Datatable</a></li>
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
                            <h4 class="card-title">Data Tabel</h4> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Logo</th>
                                            <th>Rating</th>
                                            <th>Comment</th>
                                            <th>Date</th>
                                            <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($userLogo as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>
                                                <img src="{{asset($item->logo)}}" alt="" style="width: 40px;height: 40px;">
                                            </td>
                                            <td> {{round($item->logo_rating,3)}} </td>
                                            
                                            @php
                                                $totalComment = DB::table('ratings')->where('logo_id',$item->id)->count();
                                            @endphp
                                            <td>{{$totalComment}}</td>

                                            <td>{{$item->day}}.{{$item->month}}.{{$item->year}}</td>
                                            <td>
                                                <a class="text-success edit-contact" href="{{URL::to('admin/view/logo/'.$item->id)}}"><i class="fa fa-eye"></i></a>  
                                                <a id="delete" class="text-danger edit-contact" href="{{URL::to('admin/delete/logo/'.$item->id)}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div> 

                </div>                  
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->

@endsection
