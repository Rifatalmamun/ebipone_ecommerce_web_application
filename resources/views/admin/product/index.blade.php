@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{$pageTag}} Products</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Products</li>          

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
                                      <th style="width: 19.28%">Product</th>
                                      <th style="width: 14.28%">Code</th>   
                                      <th style="width: 14.28%">Shop</th>
                                      <th style="width: 14.28%">Vendor Price</th>
                                      <th style="width: 14.28%">Selling Price</th>
                                      <th style="width: 9.28%">Status</th>
                                      <th style="width: 14.28%">Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($products as $item)
                                <tr>
                                  <td>{{$item->product_name}}</td>
                                  <td>{{$item->product_code}}</td>
                                  <td>
                                      @if ($item->shop_name==null)
                                          --
                                      @else
                                      <a href="{{URL::to('admin/view/shop/'.$item->product_owner_id)}}">{{$item->shop_name}}</a>
                                        
                                      @endif
                                  </td>
                                  <td>{{$item->buying_price}}</td>
                                  <td>{{$item->selling_price}}</td>
                                  <td>
                                      @if ($item->status=='pending')
                                        <span class="badge badge-primary">{{$item->status}}</span>
                                      @elseif($item->status=='active')
                                      <span class="badge badge-info">{{$item->status}}</span>
                                      @elseif($item->status=='block')
                                      <span class="badge badge-danger">{{$item->status}}</span>
                                      @endif
                                  </td> 

                                  <td>
                                    <a href="{{URL::to('admin/show/product/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="View Product" ><i class="fa fa-eye"></i></a>
                                    <a href="{{URL::to('admin/edit/product/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="Edit Product"><i class="mx-2 fa fa-edit"></i></a>

                                    @if ($item->status=='pending')
                                        <a id="approveProduct" href="{{URL::to('admin/approve/product/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="Approve Product" ><i class="text-danger fa fa-thumbs-down"></i></a>

                                    @elseif($item->status=='block') 
                                        <a id="unblockProduct" href="{{URL::to('admin/unblock/product/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="Unblock Product" ><i class="text-danger fa fa-thumbs-down"></i></a>

                                    @elseif($item->status=='unblock') 
                                        <a id="blockProduct" href="{{URL::to('admin/block/product/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="Block Product" ><i class="fa fa-thumbs-up"></i></a>
                                    @else 
                                        <a id="blockProduct" href="{{URL::to('admin/block/product/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="Block Product" ><i class="fa fa-thumbs-down"></i></a>
                                    @endif

                                    <a id="delete" href="{{URL::to('admin/delete/product/'.$item->id)}}" data-toggle="tooltip" title="" data-original-title="Delete Product"><i class="mx-2 fa fa-trash text-danger"></i></a>

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
