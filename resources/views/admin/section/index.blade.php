@extends('admin.master')
@section('content')


        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Add Section :  </h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Section</li> 
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.store.section')}}" method="POST"> 
                                    @csrf
                                                                                                                                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Section title*</label>
                                                <input type="text" class="form-control"  name="section_title" required placeholder="Section title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Select category*</label>
                                                <div class="form-group">
                                                    <select id="mySelect" onchange="showSubcat()" name="category_id" class="form-control" required>
                                                        <option value="">--select one--</option>

                                                        @foreach ($category as $item)
                                                        <option value="{{$item->id}}" > {{$item->category_name}} </option> 
                                                        @endforeach

                                                    </select>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-eq-height" style="display: none;" id="subCatId">
                                        
                                        <div class="col-12 mt-3">
                                            
                                                <div class="card-header">                               
                                                    <h4 class="card-title">Select sub-category item*</h4>                                
                                                </div>
                                                    <div class="card-body py-5">


                                                        @foreach ($subcategory as $item)
                                                        <div class="custom-control custom-checkbox custom-control-inline m-3"> 
                                                            <input type="checkbox" class="custom-control-input" id="{{$item->id}}" name="{{$item->id}}" value="{{$item->id}}"> 
                                                            <label class="custom-control-label checkbox-primary" for="{{$item->id}}">{{$item->subcategory_name}}</label>                                       
                                                        </div>
                                                        @endforeach
                                                        
                                                        
                                                    </div>
                                                
                                            
                                        </div>                    
                                        
                                    </div>
                                    
                                    <input type="submit" class="btn btn-primary w-25" value="Add">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="w-sm-100 mr-auto"><h6 class="mb-0"> Home Section </h6></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th style="width: 25%">Section title</th>
                                                <th style="width: 25%">Category</th>   
                                                <th style="width: 25%">Subcategory</th>  
                                                <th style="width: 25%">Action</th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                          @foreach ($data as $item)
                                          <tr>
                                            <td>{{$item->section_title}}</td>
                                            <td>{{$item->category_name}}</td>
                                            <td>
                                                @php
                                                    $subIds = $item->subcat_ids;     // get subIds with comma
                                                    $subIds_explode = explode (",", $subIds);  // array expload 

                                                    foreach ($subIds_explode as $sid) {
                                                        
                                                        $getDB = DB::table('subcategories')->where('id',$sid)->first();
                                                        echo $getDB->subcategory_name,', ';
                                                    }

                                                @endphp             
                                            </td>
                                            <td>
                                                <a id="delete" href="{{URL::to('admin/delete/section/'.$item->id)}}"><i class="text-danger fa fa-trash"></i></a>
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



                </div>
            </div>
        </main>


        <script>
            function showSubcat(){
                
                let ele = document.getElementById('subCatId');
                var v = document.getElementById("mySelect").value;

                if(v!=""){
                    ele.style.display='block'
                }else{
                    ele.style.display='none'
                }
                
            }
        </script>



@endsection
