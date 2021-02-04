@extends('admin.master')
@section('content')

<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{$title}} </h4></div>
              </div>
          </div>
      </div>
      <!-- END: Breadcrumbs-->

      <!-- START: Card Data-->
      <div class="row">
          <div class="col-12 mt-3">
              <div class="card">
                  <div class="card-header  justify-content-between align-items-center">                               
                      <h4 class="card-title">{{$sub_title}}</h4> 
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          @if ($flag=='order')
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Tnx ID</th>
                                            <th>C.Name</th>
                                            <th>C.Phone</th>
                                            <th>S.District</th>
                                            <th>Paid</th>
                                            <th>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach ($order_transaction_list as $item)
                                    <tr>

                                        <td>{{$item->id}}</td>

                                        <td>{{$item->transaction_id}}</td>
                                        
                                        <td>
                                            {{$item->name}}
                                        </td>

                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->s_district}}</td>

                                        <td>৳ {{$item->pay_price}}</td>

                                        <td> 
                                            <a href="{{URL::to('admin/order-details-'.$item->id)}}" target="_blank"> <i class="fas fa-scroll text-danger" style="font-size: 20px;"></i> </a> 
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                    </tbody>
                                
                                </table>
                          @else
                          <table id="example" class="display table dataTable table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>Upload ID</th>
                                    <th>Tnx ID</th>
                                    <th>C.Name</th>
                                    <th>C.Phone</th>
                                    <th>Amount</th>
                                    <th>Invoice</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach ($upload_transaction_list as $item)
                            <tr>

                                <td>{{$item->id}}</td>

                                <td>{{$item->transaction_id}}</td>
                                
                                <td>
                                    {{$item->name}}
                                </td>

                                <td>{{$item->phone}}</td>

                                <td>৳ {{$item->pay_price}}</td>

                                <td> 
                                    <a href="{{URL::to('admin/view-money-upload-details-'.$item->id)}}" target="_blank"> <i class="fas fa-scroll text-danger" style="font-size: 20px;"></i> </a> 
                                </td>

                                <td> 
                                    Complete <i class="fas fa-check-double text-success" style="font-size: 20px;"></i> 
                                </td>
                                
                            </tr>
                            @endforeach
                            
                            </tbody>
                        
                        </table> 
                          @endif
                          
                      </div>
                  </div>
              </div> 

          </div>                  
      </div>
      <!-- END: Card DATA-->
  </div>
</main>




@endsection
