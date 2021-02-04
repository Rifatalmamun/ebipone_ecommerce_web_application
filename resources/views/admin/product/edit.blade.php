@extends('admin.master')

@section('content')


<main>
  <div class="container-fluid site-width">
      <!-- START: Breadcrumbs-->
      <div class="row ">
          <div class="col-12  align-self-center">
              <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                  <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-uppercase">Product Edit || Admin</h4></div>

                  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                      <li class="breadcrumb-item">Home</li>
                      <li class="breadcrumb-item"> <a href="{{route('admin.all.products')}}">Product</a></li>
                      <li class="breadcrumb-item active">Edit</li>
                  </ol>
              </div>
          </div>
      </div>
      <!-- END: Breadcrumbs-->

      <!-- START: Card Data-->
      <div class="row">
          <div class="col-12 mt-4">
              <div class="card">
                  <div class="card-header">                               
                      <h6 class="card-title font-weight-bold ">Product Information</h6>                                
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <div class="row">                                           
                              <div class="col-12">

                                  <form action="{{route('admin.update.product')}}" method="POST" enctype="multipart/form-data"> 
                                    @csrf  

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <input type="hidden" name="id" value="{{$product->id}}">

                                      <div class="form-row">
                                          <div class="form-group col-md-3">
                                              <label for="product_name">Product Name</label>
                                              <input type="text" class="form-control rounded @error('shop_name') is-invalid @enderror" id="product_name" name="product_name" value="{{$product->product_name}}" required>

                                                @error('product_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror
                                          
                                          
                                            </div>
                                          <div class="form-group col-md-3">
                                              <label for="buying_price">Vendor Price (৳)</label>
                                              <input type="number" class="form-control @error('buying_price') is-invalid @enderror" id="Phone" name="buying_price" value="{{$product->buying_price}}" required>
                                          
                                                @error('buying_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror

                                            </div>
                                          <div class="form-group col-md-3">
                                            <label for="selling_price">Selling Price (৳)</label>
                                            <input type="number" class="form-control  @error('selling_price') is-invalid @enderror" name="selling_price" id="selling_price" value="{{$product->selling_price}}" min="{{$product->buying_price +1}}" required>
                                                                                      
                                            @error('selling_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="product_quantity">Total Quantity</label>
                                            <input type="number" class="form-control" name="product_quantity" id="product_quantity" value="{{$product->product_quantity}}" min="1" required>
                                        
                                        </div>
                                      </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                          <label for="ps">Category</label>

                                          <select class="form-control" name="category_id" required> 
                                            <option value="">--Seletec One--</option>
                                                @foreach ($category as $item)
                                                    <option value="{{$item->id}}" <?php if($item->id==$product->category_id){ echo 'selected'; }  ?>>{{$item->category_name}}</option> 
                                                @endforeach
                                           
                                        </select>
                                            

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="pending_delivery">Sub-Category</label>
                                            
                                           
                                            <select class="form-control" name="subcategory_id" required> 
                                                <option value="">--Seletec One--</option>
                                                    @foreach ($subcategory as $item)
                                                        <option value="{{$item->id}}" <?php if($item->id==$product->subcategory_id){ echo 'selected'; }  ?> > {{$item->subcategory_name}}</option> 
                                                    @endforeach
                                               
                                            </select>
                                            

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="pending_withdraw">Micro-Category</label>

                                            <select class="form-control" name="microcategory_id" required> 
                                              <option value="">--Seletec One--</option>
                                                  @foreach ($microcategory as $item)
                                                      <option value="{{$item->id}}" <?php if($item->id==$product->microcategory_id){ echo 'selected'; }  ?>>{{$item->microcategory_name}}</option> 
                                                  @endforeach
                                             
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                              <label for="pending_withdraw">Brand</label>

                                              <select class="form-control" name="brand_id" required> 
                                                <option value="">--Seletec One--</option>
                                                    @foreach ($brand as $item)
                                                        <option value="{{$item->id}}" <?php if($item->id==$product->brand_id){ echo 'selected'; }  ?> >{{$item->brand_name}}</option> 
                                                    @endforeach
                                               
                                           </select>
                                        </div>
                                          
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="image_one">Product Image One</label>
                                            <input type="file" class="form-control @error('image_one') is-invalid @enderror" name="image_one" id="image_one">
                                            <input type="hidden" name="old_image_one" value="{{$product->image_one}}">


                                            @error('image_one')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="image_two">Product Image Two</label>
                                            <input type="file" class="form-control @error('image_two') is-invalid @enderror" name="image_two" id="image_two">
                                            <input type="hidden" name="old_image_two" value="{{$product->image_two}}">

                                            @error('image_two')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="image_three">Product Image Three</label>
                                            <input type="file" class="form-control @error('image_three') is-invalid @enderror" name="image_three" id="image_three">
                                            <input type="hidden" name="old_image_three" value="{{$product->image_three}}">


                                            @error('image_three')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="image_four">Product Image Four</label>
                                            <input type="file" class="form-control @error('image_four') is-invalid @enderror" name="image_four" id="image_four">
                                            <input type="hidden" name="old_image_four" value="{{$product->image_four}}">


                                            @error('image_four')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong> 
                                                    </span>
                                                @enderror
                                        </div>
                                        
                                    </div>



                                    <div class="form-row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input id="red" type="checkbox" name="red" value="1" <?php if($product->red=='1'){echo 'checked';}?>>
                                                <label for="red">Red Color</label>
                                                <input type="number" name="red_color_quantity" class="form-control" value="{{$product->red_color_quantity}}">

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input id="green" type="checkbox" name="green" value="1" <?php if($product->green=='1'){echo 'checked';}?>>
                                                <label for="green">Green Color</label>
                                                <input type="number" name="green_color_quantity" class="form-control" value="{{$product->green_color_quantity}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input id="blue" type="checkbox" name="blue" value="1" <?php if($product->blue=='1'){echo 'checked';}?>>
                                                <label for="blue">Blue Color</label>
                                                <input type="number" name="blue_color_quantity" class="form-control" value="{{$product->blue_color_quantity}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input id="white" type="checkbox" name="white" value="1" <?php if($product->white=='1'){echo 'checked';}?>>
                                                <label for="white">White Color</label>
                                                <input type="number" name="white_color_quantity" class="form-control" value="{{$product->white_color_quantity}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input id="black" type="checkbox" name="black" value="1" <?php if($product->black=='1'){echo 'checked';}?>>
                                                <label for="black">Black Color</label>
                                                <input type="number" name="black_color_quantity" class="form-control" value="{{$product->black_color_quantity}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input id="yellow" type="checkbox" name="yellow" value="1" <?php if($product->yellow=='1'){echo 'checked';}?>>
                                                <label for="yellow">Yellow Color</label>
                                                <input type="number" name="yellow_color_quantity" class="form-control" value="{{$product->yellow_color_quantity}}">
                                            </div>
                                        </div>

                                    </div>



                                    <div class="form-row">

                                        <div class="form-group col-12">
                                          <label for="product_description">Product Description</label>
                                          <textarea name="product_description" id="product_description" rows="10" class="form-control" required>{{$product->product_description}}</textarea>
                                        </div>
                                    </div>
                                      <button type="submit" class="btn btn-primary">Update Product</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- END: Card DATA--> 
  </div>
</main>



<script>
    document.getElementById('create_date').valueAsDate = new Date();
    document.getElementById("create_date").disabled = true;
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection
