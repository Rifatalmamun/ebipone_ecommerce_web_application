@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0"><i class="fas fa-users mr-2"></i> {{$pageTag}}</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Customer</li>

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
                      @if ($pageTag!='Customers List')
                        <h4  class="card-title" style="display: inline;"><small> <a id="verifyMail" href="{{URL::to('admin/verify/email-for-all-user')}}" class="text-danger font-weight-bold" style="text-align: right"> <i class="fa fa-envelope"></i> Click to verify email for all customer!</a> </small> </h4>  
                    @endif
                  </div> 

                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="example" class="display table dataTable table-striped table-bordered" >
                              <thead>
                                  <tr>
					<th style="width: 16.66%;">Sign up</th>
                                      	<th style="width: 16.66%;">Name</th>
					<th style="width: 16.66%;">Phone</th>
					<th style="width: 8%;">Email</th>
                                      	<th style="width: 24.66%;">Address</th>   
                                        <th style="width: 16.66%;">Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($data as $item)
                                <tr>

				    @php
                                        $created_at = explode(' ',$item->created_at);
                                        $created_at = $created_at[0];
                                    @endphp

                                    <td>{{$created_at}}</td>

                                  <td>{{$item->name}}</td>
				  <td>{{$item->phone}}</td>
			          <td>{{$item->email}}</td>
                                  <td>
                                      @if ($item->shop_name==null)
                                          <span>-- Not Given --</span>
                                      @else
                                        {{$item->address}}
                                      @endif
                                  </td>
                                  
                                  
                                  <td>
                                    <a href="{{URL::to('admin/view/customer/'.$item->id)}}"><i class="fa fa-eye"></i></a>

				                    @if ($item->email_verified_at==null)
                                        <a href="{{URL::to('admin/verify/user/email/'.$item->id)}}" class="font-weight-bold mx-3"> Verify?</a>
                                     @endif
                                     <a href="{{URL::to('admin/edit/customer/'.$item->id)}}"><i class="mx-3 fa fa-edit"></i></a>
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
