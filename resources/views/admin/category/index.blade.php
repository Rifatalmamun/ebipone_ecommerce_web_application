
 {{-- @php
    
    $cat = DB::table('categories')->get();

    foreach ($cat as $item) {
        
        $url  = $item->category_name; 
        $url = str_replace("&", "", $url);
        $url = str_replace("'", "", $url);
        $url = rtrim($url,'.');
        $url = strtolower($url);
        $url = str_replace("  ", " ", $url);

        DB::table('categories')->where('id',$item->id)->update(['url_name'=>$url]); 
    }
                            
@endphp  --}}

@extends('admin.master')
@section('content')

<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0">Category</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item">Category</li>

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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Category</a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="example" class="display table dataTable table-striped table-bordered" >
                              <thead>
                                  <tr>
                                      <th>Category</th>
                                     
                                      <th>Category Picture</th>
                                      <th>Created Date</th>
                                      <th>Action</th>
                               
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                @foreach ($category as $item)
                                <tr>
                                  <td>{{$item->category_name}}</td>
                                  
                                  <td>
                                      <img src="{{asset($item->category_picture)}}" alt="" style="width: 50px;height: 40px;">
                                  </td>
                                  <td>{{$item->uploaded_date}}</td> 
                                  <td>
                                    
                                    <a href="#" id="{{ $item->id }}" data-toggle="modal" data-target="#editCategoryModal" title="Edit" onclick="categoryview(this.id)"><i class="fa fa-edit"></i></a>
	
                                    {{-- <a id="delete" href="{{URL::to('admin/delete/category/'.$item->id)}}"><i class=" mx-2 text-danger fa fa-trash"></i></a>  --}}

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

      <!-- ADD CATEGORY MODAL -->

      <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">

                <!--ERROR MESSAGE-->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{route('admin.store.category')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf
                        <label>Category name</label>
                        <input type="text" name="category_name" class="form-control" required>

                        <label>Category picture</label>
                        <input type="file" name="category_picture" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>


          <!-- EDIT CATEGORY MODAL -->

          <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
            <div class="modal-dialog" role="document"> 
                <div class="modal-content">
                    
                    <!--ERROR MESSAGE-->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('admin.update.category')}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                @csrf

                                <input type="hidden" class="form-control" id="cid" value=""  name="category_id">

                                <label>Category name</label>
                                <input type="text" id="cname" value=""  name="category_name" class="form-control preventBox" required>

                                <input type="hidden" id='uname' name="url_name" value="">

                                <label>Category picture</label>
                                <input type="hidden" id="cpicture" name="old_category_picture" value="" >
                                <input type="file" name="category_picture" class="form-control" > 
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
          
          function categoryview(id){
                $.ajax({
                           url: "{{ url('/admin/edit/category/') }}/"+id,
                           type:"GET",
                           dataType:"json",
                           success:function(data) {
                            $('#cid').val(data.id);
                            $('#cname').val(data.category_name);
                            $('#uname').val(data.url_name);
                            $('#cpicture').val(data.category_picture);
                            
                   }
            })
          }
    
          </script>


@endsection
