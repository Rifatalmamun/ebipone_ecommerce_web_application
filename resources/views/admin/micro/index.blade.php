@extends('admin.master')

@section('content')



<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">micro Category</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">micro Category</li>

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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addSubCategoryModal">Add Micro Category</a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="example" class="display table dataTable table-striped table-bordered" >
                              <thead>
                                  <tr>
                                      <th>micro Category</th>
                                      <th>sub category</th>
                                      <th>Created Date</th>
                                      <th>Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($microcategory as $item)
                                <tr>
                                  <td>{{$item->microcategory_name}}</td>
                                  <td>{{$item->subcategory_name}}</td> 
                                  <td>{{$item->uploaded_date}}</td> 
                                  <td>
                                    
                                    <a href="#" id="{{ $item->id }}" data-toggle="modal" data-target="#editSubCategoryModal" title="Edit" onclick="subcategoryview(this.id)"><i class="fa fa-edit"></i></a>

                                    <a id="delete" href="{{URL::to('admin/delete/microcategory/'.$item->id)}}"><i class=" mx-2 text-danger fa fa-trash"></i></a> 

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

      <!-- ADD MICRO CATEGORY MODAL -->

      <div class="modal fade" id="addSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <form action="{{route('admin.store.microcategory')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Micro Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label>Micro Category name</label>
                            <input type="text" name="microcategory_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Select Sub category</label>
                            <select name="subcategory_id" class="form-control" required>
                                <option value="">--select one--</option>
                                @foreach ($subcategory as $item)
                                <option value="{{$item->id}}"> {{$item->subcategory_name}} </option>
                                @endforeach
                            </select>
                        </div>

                        
                    
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>


          <!-- EDIT MICRO CATEGORY MODAL -->

          <div class="modal fade" id="editSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
            <div class="modal-dialog" role="document"> 
                <div class="modal-content">
                    <form action="{{route('admin.update.microcategory')}}" method="POST"> 
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Micro Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            @csrf

                            <input type="hidden" class="form-control" id="cid" value=""  name="microcategory_id">

                            <div class="form-group">
                                <label>Micro Category name</label>
                                <input type="text" id="cname" value=""  name="microcategory_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <select name="subcategory_id" class="form-control" required>
                                    <option value="">--select one--</option>
                                    @foreach ($subcategory as $item)
                                    <option value="{{$item->id}}" > {{$item->subcategory_name}} </option> 
                                    @endforeach
                                </select>
                            </div>   
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
          
          function subcategoryview(id){
                $.ajax({
                           url: "{{ url('/admin/edit/microcategory/') }}/"+id,
                           type:"GET",
                           dataType:"json",
                           success:function(data) {
                            $('#cid').val(data.id);
                            $('#cname').val(data.microcategory_name);
                   }
            })
          }

          </script>


@endsection
