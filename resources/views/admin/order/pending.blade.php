@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{$pageTag}}</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Orders</li>

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
                                      <th>Transaction Id</th>
                                      <th>Order by</th>
                                      <th>Product</th>
                                      <th>Quantity</th>  
                                      <th>Payment Status</th> 
                                      <th>Delivery Status</th>
                                      <th>Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($orders as $item)
                                <tr>
                                  <td>{{$item->transaction_id}}</td>
                                  <td>{{$item->name}}</td>
                                  <td>{{$item->product_ids}}</td>
                                 
                                  <td>{{$item->qtys}}</td>
                                  <td>{{$item->status}}</td>
                                  <td>
                                      @if ($item->admin_status=='pending')
                                        <span class="badge badge-warning">{{$item->admin_status}}</span>
                                      @elseif($item->admin_status=='on the way')
                                      <span class="badge badge-info">{{$item->admin_status}}</span>
                                      @elseif($item->admin_status=='delivered')
                                      <span class="badge badge-success">{{$item->admin_status}}</span>
                                      @endif
                                  </td> 

                                  
                                  <td>
                                    
                                    <a href="{{URL::to('admin/show/order/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="View Order" ><i class="fa fa-eye"></i>  view </a> 
                                    
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
