@extends('admin.master')
@section('content')

<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{$pageTag}} </h4></div>

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
                                      <th>ID</th>
                                      <th>Date</th>
                                      <th>Tran</th>
                                      <th>C.Name</th>
                                      <th>C.Phone</th>
                                      <th>S.District</th>
                                      <th>Product</th>
                                      <th>Qty</th>  
				      <th>Size/Color</th> 
					@if ($pageTag=='List of Customer Delivery Pending Product')
                                        
					@else
						<th>Status</th>
                                      	@endif
				
                                      
                                      <th>Action</th>
				      @if ($pageTag=='List of Customer Delivery Pending Product')
                                        <th>Confirm</th>
                                      @endif
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($orders as $item)
                                <tr>
                                  <td>
                                    <a href="" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Shipping Address : {{$item->shipping_address}}" class="red-tooltip">EBP {{$item->order_id}}</a>   
                                    
                                  </td>

				   <td>
                                    
                                    {{$item->order_date}}  {{$item->order_time}}
                                  </td>
			         
                                  <td>{{$item->transaction_id}}</td>
                                    @php
                                        // find who orders details
                                        $order  = DB::table('orders')->where('id',$item->order_id)->first();


                                        if ($order!=null) {
                                            $customer = DB::table('users')->where('id',$order->who_orders)->first();
                                        }

                                        
                                        
                                    @endphp
                                  <td>

                                    @if ($customer!=null)
                                    <a href="{{URL::to('admin/view/customer/'.$customer->id)}}" target="_blank">{{$customer->name}}</a>
                                    @else
                                        ----
                                    @endif

                                  </td>

                                  <td>
                                
                                    @if ($customer!=null)
                                    {{$customer->phone}}
                                    @else
                                        ----
                                  @endif

                                </td>

                                  <td>{{$item->s_district}}</td>
                                  <td>
                                      <a href="{{URL::to('admin/show/product/'.$item->product_id)}}" target="_blank" >{{$item->product_name}}</a>
                                  </td>
                                    
                                  <td>{{$item->qty}}</td>


				   <td>

                                    @if ($item->sz!='no')
                                        {{$item->sz}}
                                    @else
                                        --
                                    @endif
					/
                                    @if ($item->clr!='no')
                                        {{$item->clr}}
                                    @else
                                        --
                                    @endif

                                  </td>
					@if ($pageTag=='List of Customer Delivery Pending Product')
                                        
					@else
						<td> 
                                        
                                        @if ($item->isCustomerReceived==1)
                                            <span class="badge badge-success">Completed</span>
                                        
                                        @elseif($item->isWarehouseSend==1)
                                            <span class="badge badge-primary">Almost Done</span>
                                        
                                        @elseif($item->isWarehouseReceived==1)
                                            <span class="badge badge-info">In Pickup Point</span>

                                        @elseif($item->isShopSend==1)
                                            <span class="badge badge-warning">Progressing</span>
                                        @else
                                            <span class="badge badge-danger">New</span>
                                        @endif
                                
                                  </td>
                                      	@endif

                                  
                                  

                                  <td>
                                                                                                  
                                    <a href="{{URL::to('admin/view-order-details-'.$item->id)}}" data-toggle="tooltip" data-original-title="View Details" > <span class="font-weight-bold">Details</span> </a> 

                                  </td>

				                @if ($pageTag=='List of Customer Delivery Pending Product')
                                   <td> 
                                        <a id="confirm" href="{{URL::to('warehouse-order-complete-'.$item->id)}}" class="font-weight-bold">Confirm</a>    
                                   </td>
                                @endif
                              
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
