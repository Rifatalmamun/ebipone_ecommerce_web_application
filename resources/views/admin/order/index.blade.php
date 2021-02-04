@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">Shops</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Shop</li>

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
                      <h4 class="card-title">All Shops</h4> 
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="example" class="display table dataTable table-striped table-bordered" >
                              <thead>
                                  <tr>
                                      <th width="100">Shop name</th>
                                      <th width="100">Shop owner</th>
                                      <th width="100">Mobile</th>
                                      <th width="100">Shop Address</th>
                                      <th width="50">Status</th>
                                      <th width="50">Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($shop as $item)
                                <tr>
                                  <td>{{$item->shop_name}}</td>
                                  <td>{{$item->shop_owner}}</td>
                                  <td>{{$item->shop_phone}}</td>
                                  <td>{{$item->shop_address}}</td>
                                  <td>
                                      @if ($item->shop_status=='pending')
                                           <span class="badge badge-warning">Pending</span>
                                      @elseif($item->shop_status=='block')
                                      <span class="badge badge-danger">Blocked</span>
                                        @else 
                                        <span class="badge badge-info">Active</span>
                                      @endif
                                  </td>
                                  <td>
                                    <a href="{{URL::to('admin/view/shop/'.$item->id)}}"><i class="fa fa-eye"></i></a>
                                    <a href="{{URL::to('admin/edit/shop/'.$item->id)}}"><i class="mx-2 fa fa-edit"></i></a>
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




@endsection
