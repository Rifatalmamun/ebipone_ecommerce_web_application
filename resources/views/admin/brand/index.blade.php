@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">Brand</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Brand</li>

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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addBrandModal">Add Brand</a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="example" class="display table dataTable table-striped table-bordered" >
                              <thead>
                                  <tr>
                                      <th>Brand</th>
                                      <th>Brand Logo</th>
                                      <th>Created Date</th>
                                      <th>Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($brand as $item)
                                <tr>
                                  <td>{{$item->brand_name}}</td>
                                  <td>
                                      <img src="{{asset($item->brand_picture)}}" alt="" style="width: 50px;height: 40px;">
                                  </td>
                                  <td>{{$item->uploaded_date}}</td> 
                                  <td>
                                    
                                    <a href="#" id="{{ $item->id }}" data-toggle="modal" data-target="#editBrandModal" title="Edit" onclick="brandview(this.id)"><i class="fa fa-edit"></i></a>

                                    <a id="delete" href="{{URL::to('admin/delete/brand/'.$item->id)}}"><i class=" mx-2 text-danger fa fa-trash"></i></a> 

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

      <!-- ADD BRAND MODAL -->

      <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <form action="{{route('admin.store.brand')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf
                        <label>Brand name</label>
                        <input type="text" name="brand_name" class="form-control" required>

                        <label>Brand picture</label>
                        <input type="file" name="brand_picture" class="form-control" required>

			<br>
                        <input type="checkbox" name="show_home" id="show" value="yes">
                        <label for="show">Show home page</label>                                                                 			

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>


          <!-- EDIT BRAND MODAL -->

          <div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
            <div class="modal-dialog" role="document"> 
                <div class="modal-content">
                    <form action="{{route('admin.update.brand')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            @csrf

                            <input type="hidden" class="form-control" id="cid" value=""  name="brand_id">

                            <label>Brand name</label>
                            <input type="text" id="cname" value=""  name="brand_name" class="form-control" required>
    
                            <label>Brand picture</label>
                            <input type="hidden" id="cpicture" name="old_brand_picture" value="" >
                            <input type="file" name="brand_picture" class="form-control" > 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div> 
                </form>
                </div>
            </div>
        </div>

  </div>
</main>

          <!--Ajax cdn link-->

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
          <script type="text/javascript">
          
          function brandview(id){
                $.ajax({
                           url: "{{ url('/admin/edit/brand/') }}/"+id,
                           type:"GET",
                           dataType:"json",
                           success:function(data) {
                            $('#cid').val(data.id);
                            $('#cname').val(data.brand_name);
                            $('#cpicture').val(data.brand_picture);
                            
                   }
            })
          }
    
          </script>


@endsection
