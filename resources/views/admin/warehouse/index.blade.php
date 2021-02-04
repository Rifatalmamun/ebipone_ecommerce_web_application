@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{$tag}}</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Pickup Point</li>
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

                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="example" class="display table dataTable table-striped table-bordered" >
                              <thead>
                                  <tr>
                                      <th>Pickup Point name</th>
                                      <th>Pickup Point Owner</th>
                                      <th>Pickup Point Phone</th>
                                      <th>Location</th>
                                      <th>Status</th>
                                      <th>Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($warehouse as $item)
                                <tr>
                                  <td>{{$item->w_name}}</td>
                                  <td>{{$item->name}}</td>
                                  <td>{{$item->phone}}</td>
                                  <td>{{$item->w_district}}</td>
                                  
                                  <td>
                                      @if ($item->w_status=='active')
                                           <span class="badge badge-info">Active</span>

                                      @elseif ($item->w_status=='pending')
                                           <span class="badge badge-danger">Pending</span>

                                      @elseif ($item->w_status=='block')
                                           <span class="badge badge-danger">Block</span> 

                                      @endif
                                  </td>

                                  <td>
                                    <a href="{{URL::to('admin/view/warehouse/'.$item->id)}}"><i class="fa fa-eye"></i></a>
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
