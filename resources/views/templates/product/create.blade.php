
@extends('layouts.app')

@section('content')



            <!-- site__header / end --><!-- site__body -->
            <div class="site__body">
                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">
                        <div class="row">
                            <div class="col-12 col-lg-3 d-flex">
                                <div class="account-nav flex-grow-1">
                                    <h4 class="account-nav__title">{{Auth::user()->shop_name}}</h4>
                                    <ul class="account-nav__list">
                                        
                                        <li class="account-nav__item "><a href="{{route('shop')}}">My Shop</a></li>

                                        <li class="account-nav__item account-nav__item--active"><a href="{{route('product.create')}}">Add Product</a></li>   
            
                                        <li class="account-nav__item"><a href="#">Shop Account</a></li>   
                        
                                        <li class="account-nav__divider" role="presentation"></li>
            
                                        <li class="account-nav__item"><a href="{{route('show.profile.edit.form')}}">Edit Profile</a></li>       
                                        <li class="account-nav__item"><a href="{{route('show.user.password.change')}}">Change Password</a></li>               
                                        <li class="account-nav__divider" role="presentation"></li>
                                        <li class="account-nav__item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="text-danger" style="font-weight: bold;">Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf 
                                        </form>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                                <div class="card">
                                    <div class="card-header"><h5>Add Product </h5></div>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-12 col-xl-12">

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <p style="font-weight: bold;" class="mt-4">1.Basic</p>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Product Name</label> 
                                                            <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Vendor Price (Tk)</label> 
                                                            <input type="number" name="buying_price" value="{{ old('buying_price') }}" min="1" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Selling Price (Tk)</label> 
                                                            <input type="number" name="selling_price" value="{{old('selling_price')}}" min="1" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Brand</label> 

                                                            <select class="form-control" name="brand_id" required> 
                                                                 <option value="">--Seletec One--</option>
                                                                @foreach ($brand as $item)
                                                                    <option value="{{$item->id}}" >{{$item->brand_name}}</option> 
                                                                @endforeach
                                                                
                                                            </select>
        
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Category</label> 

                                                            <select class="form-control" name="category_id" required>
                                                                 <option value="">--Seletec One--</option>
                                                                @foreach ($category as $item)
                                                                    <option value="{{$item->id}}" >{{$item->category_name}}</option> 
                                                                @endforeach
                                                                
                                                            </select>
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Sub Category</label> 
                                                            <select class="form-control " name="subcategory_id" required>

                                                                <option value="">--Seletec One--</option>
                                                                @foreach ($subcategory as $item)
                                                                    <option value="{{$item->id}}" >{{$item->subcategory_name}}</option> 
                                                                @endforeach
                                                                
                                                            </select>
        
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >micro Category</label> 

                                                            <select class="form-control" name="microcategory_id" required>
                                                                 <option value="">--Seletec One--</option>
                                                                @foreach ($microcategory as $item)
                                                                    <option value="{{$item->id}}" >{{$item->microcategory_name}}</option> 
                                                                @endforeach
                                                                
                                                            </select>
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                       
                                                    </div>
                                                </div>

                                                <div class="card-divider"></div>
                                                <p style="font-weight: bold;" class="mt-4">2. Product Image</p>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Image One* <small>(Size 500 kb max)</small></label> 
                                                            <input type="file" name="image_one" value="{{old('image_one')}}" class="form-control" required>
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Image Two* <small>(Size 500 kb max)</small></label> 
                                                            <input type="file" name="image_two" value="{{old('image_two')}}" class="form-control" required>
        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Image Three* <small>(Size 500 kb max)</small></label> 
                                                            <input type="file" name="image_three" value="{{old('image_three')}}"  class="form-control" required>
        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Image Four* <small>(Size 500 kb max)</small></label> 
                                                            <input type="file" name="image_four" value="{{old('image_four')}}" class="form-control" required>
        
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Image Five (Optional) <small>(Size 500 kb max)</small></label> 
                                                            <input type="file" name="image_five" value="{{old('image_five')}}" class="form-control">               
                                    
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                    </div>
                                                </div>

                                                <p style="font-weight: bold;" class="mt-4">3. Product Code & Description</p>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Product Code</label> 
                                                            <input type="text" name="product_code" value="{{old('product_code')}}" class="form-control">         
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label >Product Description</label> 
                                                            <textarea name="product_description" rows="6" class="form-control" required minlength="100">{{old('product_description')}}</textarea> 
        
                                                        </div>
                                                    </div>
                                                </div>

                                                <p style="font-weight: bold;" class="mt-4">4. Product Size & Color</p>

                                                <div class="row">
                                                    

                                                    <div class="col-md-8">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input onclick="redColor()" type="checkbox" id="red" name="red" value="1">
                                                                <label for="red"> Red Color</label><br>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <input style="opacity: 0;" id="redColorQuantity" type="number" min="0" id="red" name="red_color_quantity" class="form-control" placeholder="Red Colur Product Quantiry" value="{{old('red_color_quantity')}}">
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="row mt-1">
                                                            <div class="col-md-6">
                                                                <input onclick="greenColor()" type="checkbox" id="green" name="green" value="1">
                                                            <label for="green"> Green Color</label><br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input style="opacity: 0;" id="greenColorQuantity" type="number" min="0" id="green" name="green_color_quantity" class="form-control" placeholder="Green Colur Product Quantiry" value="{{old('green_color_quantity')}}"> 
                                                            </div>
                                                        </div>

                                                        <div class="row mt-1">
                                                            <div class="col-md-6">
                                                                <input onclick="blueColor()" type="checkbox" id="blue" name="blue" value="1">
                                                                <label for="blue"> Blue Color</label><br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input style="opacity: 0;" id="blueColorQuantity" type="number" min="0" id="blue" name="blue_color_quantity" class="form-control" placeholder="Blue Colur Product Quantiry" value="{{old('blue_color_quantity')}}"> 
                                                            </div>
                                                        </div>

                                                        <div class="row mt-1">
                                                            <div class="col-md-6">
                                                                <input onclick="whiteColor()" type="checkbox" id="white" name="white" value="1">
                                                                <label for="white"> White Color</label><br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input style="opacity: 0;" id="whiteColorQuantity" type="number" min="0" id="white" name="white_color_quantity" class="form-control" placeholder="White Colur Product Quantiry" value="{{old('white_color_quantity')}}"> 
                                                            </div>
                                                        </div>

                                                        <div class="row mt-1">
                                                            <div class="col-md-6">
                                                                <input onclick="blackColor()" type="checkbox" id="black" name="black" value="1">
                                                        <label for="black"> Black Color</label><br><br> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input style="opacity: 0;" id="blackColorQuantity" type="number" min="0" id="black" name="black_color_quantity" class="form-control" placeholder="Black Colur Product Quantiry" value="{{old('black_color_quantity')}}"> 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input onclick="yellowColor()" type="checkbox" id="yellow" name="yellow" value="1">
                                                                <label for="yellow"> Yellow Color</label><br><br> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input style="opacity: 0;" id="yellowColorQuantity" type="number" min="0" id="yellow" name="yellow_color_quantity" class="form-control" placeholder="Yellow Colur Product Quantiry" value="{{old('yellow_color_quantity')}}"> 
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!--*** PRODUCT SIZE BOXES ***-->
                                                <p style="font-weight: bold;" class="mt-4">4. Quantity & Size based on size </p>
                                                
                                                
                                                <!--small size , quantity & price -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input onclick="smallSize()" type="checkbox" id="s" name="s" value="1">
                                                        <label class="mt-2" for="s"> Small size</label><br>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="s1" class="form-group" style="display: none;">
                                                            <label> Quantity</label> 
                                                            <input type="number" name="s_size_quantity" value="{{old('s_size_quantity')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>                       
                                                    <div class="col-md-4">
                                                        <div id="s2" class="form-group" style="display: none;">
                                                            <label> Price</label> 
                                                            <input type="number" name="s_size_price" value="{{old('s_size_price')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--medium size , quantity & price -->
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <input onclick="mediumSize()" type="checkbox" id="m" name="m" value="1">
                                                        <label class="mt-2" for="m"> Medium size</label><br>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="m1" class="form-group" style="display: none;">
                                                            <label> Quantity</label> 
                                                            <input type="number" name="m_size_quantity" value="{{old('m_size_quantity')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="m2" class="form-group" style="display: none;">
                                                            <label> Price increase</label> 
                                                            <input type="number" name="m_size_price" value="{{old('m_size_price')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!--large size , quantity & price -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input onclick="largeSize()" type="checkbox" id="l" name="l" value="1">
                                                        <label class="mt-2" for="l"> Large size</label><br>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="l1" class="form-group" style="display: none;">
                                                            <label> Quantity</label> 
                                                            <input type="number" name="l_size_quantity" value="{{old('l_size_quantity')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="l2" class="form-group" style="display: none;">
                                                            <label> Price increase</label> 
                                                            <input type="number" name="l_size_price" value="{{old('l_size_price')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!--X large size , quantity & price -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input onclick="xLargeSize()" type="checkbox" id="xl" name="xl" value="1">
                                                        <label class="mt-2" for="xl"> XL size</label><br>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="xl1" class="form-group" style="display: none;">
                                                            <label> Quantity</label> 
                                                            <input type="number" name="xl_size_quantity" value="{{old('xl_size_quantity')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="xl2" class="form-group" style="display: none;">
                                                            <label> Price increase</label> 
                                                            <input type="number" name="xl_size_price" value="{{old('xl_size_price')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--XX large size , quantity & price -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input onclick="xxLargeSize()" type="checkbox" id="xxl" name="xxl" value="1">
                                                        <label class="mt-2" for="xxl"> XXL size</label><br>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="xxl1" class="form-group" style="display: none;">
                                                            <label> Quantity</label> 
                                                            <input type="number" name="xxl_size_quantity" value="{{old('xxl_size_quantity')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="xxl2" class="form-group" style="display: none;">
                                                            <label> Price increase</label> 
                                                            <input type="number" name="xxl_size_price" value="{{old('xxl_size_price')}}" class="form-control" min="0">         
                                                        </div>
                                                    </div>
                                                </div>

                                                <p style="font-weight: bold;" class="mt-4">5. Total Quantity  </p>

                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Total Quantiry*</label> 
                                                            <input type="number" name="product_quantity" value="{{old('product_quantity')}}" class="form-control" min="0" placeholder="Minimum quantity 1" required> 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary mt-3">Upload Product</button>
                                                </div>

                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-space block-space--layout--before-footer"></div>
            </div>


<script>

    function smallSize(){
        
        let s1_id = document.getElementById('s1');
        let s2_id = document.getElementById('s2');
        
        if(s1_id.style.display=='none'){
            s1_id.style.display='block'
            s2_id.style.display='block'
        }else{
            s1_id.style.display='none'
            s2_id.style.display='none'
        }
    }
    function mediumSize(){
        
        let m1_id = document.getElementById('m1');
        let m2_id = document.getElementById('m2');
        
        if(m1_id.style.display=='none'){
            m1_id.style.display='block'
            m2_id.style.display='block'
        }else{
            m1_id.style.display='none'
            m2_id.style.display='none'
        }
    }
    function largeSize(){
        
        let l1_id = document.getElementById('l1');
        let l2_id = document.getElementById('l2');
        
        if(l1_id.style.display=='none'){
            l1_id.style.display='block'
            l2_id.style.display='block'
        }else{
            l1_id.style.display='none'
            l2_id.style.display='none'
        }
    }

    function xLargeSize(){
        
        let xl1_id = document.getElementById('xl1');
        let xl2_id = document.getElementById('xl2');
        
        if(xl1_id.style.display=='none'){
            xl1_id.style.display='block'
            xl2_id.style.display='block'
        }else{
            xl1_id.style.display='none'
            xl2_id.style.display='none'
        }
    }

    function xxLargeSize(){
        
        let xxl1_id = document.getElementById('xxl1');
        let xxl2_id = document.getElementById('xxl2');
        
        if(xxl1_id.style.display=='none'){
            xxl1_id.style.display='block'
            xxl2_id.style.display='block'
        }else{
            xxl1_id.style.display='none'
            xxl2_id.style.display='none'
        }
    }

</script>
<script>

    function redColor(){

        let redColorQuantityID = document.getElementById('redColorQuantity');
        
        if(redColorQuantityID.style.opacity==0){
            redColorQuantityID.style.opacity=1
        }else{
            redColorQuantityID.style.opacity=0
        }
    }

    function greenColor(){

        let greenColorQuantityID = document.getElementById('greenColorQuantity');

        if(greenColorQuantityID.style.opacity==0){
            greenColorQuantityID.style.opacity=1
        }else{
            greenColorQuantityID.style.opacity=0
        }

    }

    function blueColor(){

        let blueColorQuantityID = document.getElementById('blueColorQuantity');

        if(blueColorQuantityID.style.opacity==0){
            blueColorQuantityID.style.opacity=1
        }else{
            blueColorQuantityID.style.opacity=0
        }
   }

   function whiteColor(){

        let whiteColorQuantityID = document.getElementById('whiteColorQuantity');

        if(whiteColorQuantityID.style.opacity==0){
            whiteColorQuantityID.style.opacity=1
        }else{
            whiteColorQuantityID.style.opacity=0
        }
    }

    function blackColor(){

        let blackColorQuantityID = document.getElementById('blackColorQuantity');

        if(blackColorQuantityID.style.opacity==0){
            blackColorQuantityID.style.opacity=1
        }else{
            blackColorQuantityID.style.opacity=0
        }
    }

    function yellowColor(){
                                    
        let yellowColorQuantityID = document.getElementById('yellowColorQuantity');

        if(yellowColorQuantityID.style.opacity==0){
            yellowColorQuantityID.style.opacity=1
        }else{
            yellowColorQuantityID.style.opacity=0
        }
    }


</script>
            
@endsection

