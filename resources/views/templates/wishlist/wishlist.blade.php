
@extends('layouts.app')
@section('content')



<!-- Profile dashboard banner  -->



<div class="site__body">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-3 d-flex">
                    <div class="account-nav flex-grow-1">
                        <h4 class="account-nav__title">{{Auth::user()->name}}</h4>
                        <ul class="account-nav__list">
                            <li class="account-nav__item "><a href="{{route('home')}}">Dashboard</a></li>
                            
                            
                            @if (Auth::user()->isVendor=='0')
                                <li class="account-nav__item"><a href="{{route('shop.create')}}">Create Shop</a></li>
                            @else
                                <li class="account-nav__item"><a href="{{route('shop')}}">My Shop</a></li>
                            @endif

                            <li class="account-nav__item account-nav__item--active"><a href="{{route('wishlist')}}">My Wishlist</a></li>        
                            <li class="account-nav__item "><a href="{{route('cart')}}">My Cart</a></li>  
                            <li class="account-nav__item"><a href="#">Order History</a></li>     
                            
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
                    <div class="dashboard">

                        @if ($wishlist_count==0)
                            <div class="card" style="width: 100%;">
                                <div class="card-header"><h5 class="text-secondary"> <i class="fa fa-heart "></i> Wishlist Empty!!</h5></div>
                                <div class="card-divider"></div>
                               
                                <div class="card-divider"></div>
                                <div class="card-img">
                                    <img src="{{asset('public/media/box.png')}}" alt="" style="width: 20%; margin-left: 38%;padding: 50px 0; opacity: .7;">
                                </div>
                            </div>
                        @else
                        <div class="dashboard__orders card text-secondary">
                            <div class="card-header"><h5>My Wishlist</h5></div>
                            <div class="card-divider"></div>
                            <div class="card-table">
                                <div class="table-responsive-sm">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product name</th>
                                                <th>Price</th>
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($wishlist as $item)
                                            <tr>
                                                <td>{{$item->product_name}}</td>
                                                <td>{{ $item->selling_price  }} tk</td>

                                                <td>
                                                    <a id="{{$item->product_id}}" href="#" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)" ><i class="fa fa-shopping-cart text-secondary"></i></a>       
                                                    <a href="{{URL::to($item->un_id.'/'.Str::slug($item->product_name))}}"><i class="mx-2 fa fa-eye text-secondary"></i></a>                    
                                                    <a href="{{URL::to('delete/wishlist/product/'.$item->id)}}"><i class="mx-2 fa fa-trash text-secondary"></i></a>    
                                                </td>
                                            </tr>
                                            @endforeach
                                           

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>









<!--product cart add modal-->



<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Product </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="row">
           
            <div class="col-md-6 ml-auto">
                <ul class="list-group">
                  <li class="list-group-item"> <h5 id="pname"></h5></span></li>
               <li class="list-group-item">Product code: <span id="pcode"> </span></li>
                <li class="list-group-item">Category:  <span id="pcat"> </span></li>
                <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
                <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Available</span></li>
              </ul>
            </div>
            <div class="col-md-6 ">
                
                <form action="{{route('insert.into.cart')}}" method="post">
                  @csrf
                  <input type="hidden" name="product_id" id="product_id">

                  <div class="product-form__row">
                    <div class="product-form__title">Color</div>
                    <div class="product-form__control">
                        <div class="input-radio-color">
                            <div class="input-radio-color__list">
                                
                                    <label id="whiteInput" class="input-radio-color__item input-radio-color__item--white" style="color: #fff;" data-toggle="tooltip" title="White">
                                        <input type="radio" name="color" value="white" required/> <span></span>
                                    </label>
                                
                                    <label id="greenInput" class="input-radio-color__item input-radio-color__item--green" style="color: rgb(10, 243, 60);" data-toggle="tooltip" title="Green">
                                        <input type="radio" name="color" value="green" /> <span></span>
                                    </label>
                                                               
                                    <label id="blueInput" class="input-radio-color__item input-radio-color__item--blue" style="color: rgb(0, 119, 255);" data-toggle="tooltip" title="Blue">
                                        <input type="radio" name="color" value="blue" /> <span></span>
                                    </label>
                             
                                    <label id="redInput" class="input-radio-color__item input-radio-color__item--red" style="color: rgb(255, 6, 6);" data-toggle="tooltip" title="Red">
                                        <input type="radio" name="color" value="red" /> <span></span>
                                    </label>
                                
                                    <label id="blackInput" class="input-radio-color__item input-radio-color__item--black" style="color: rgb(0, 0, 0);" data-toggle="tooltip" title="Black">
                                        <input type="radio" name="color" value="black" /> <span></span>
                                    </label>
                              
                            </div>
                        </div>
                    </div>
                </div>


                <div class="product-form__row mb-5">
                    <div class="product-form__title">Size</div>
                    <div class="product-form__control">
                        <div class="input-radio-label">
                            <div class="input-radio-label__list">
                            
                    
                                        <label id="sId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Small">   S
                                        <input type="radio" name="size" value="small" required/><span></span>
                                            
                                        </label>

                                        <label id="mId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Medium">   M
                                        <input type="radio" name="size" value="medium" /><span></span>
                                            
                                        </label>

                                        <label id="lId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="Large">   L
                                        <input type="radio" name="size" value="large" /><span></span>
                                            
                                        </label>

                                        <label id="xlId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="XL">   XL
                                        <input type="radio" name="size" value="xl" /><span></span>
                                            
                                        </label>

                                        <label id="xlIId" class="input-radio-color__item  input-radio-color__item--green" style="color: rgb(99, 139, 248);" data-toggle="tooltip" title="XXL">   XXL
                                        <input type="radio" name="size" value="xxl" /><span></span>
                                            
                                        </label>

                            </div>
                        </div>
                    </div>
                </div>
                  
                  {{-- <div class="form-group" id="colordiv">
                    <label for="">Color</label>
                    
                    <select name="product_color" class="form-control">
                    
                    </select>
                  
                  </div> --}}



                  <div class="form-group mt-3">
                    <div class="product-form__title">Quantity</div>
                    <input type="number" class="form-control" value="1" min="1" name="qty">
                  </div>
                  <button type="submit" class="btn btn-primary">Add To Cart</button>
                </form>
             </div>
           </div>
        </div>  
      </div>
    </div>
  </div>
  
  <!--modal end-->



  
<script type="text/javascript">
      function productview(id){
            $.ajax({
                       url: "{{  url('/cart/product/view/') }}/"+id,
                       type:"GET",
                       dataType:"json",
                       success:function(data) {
                         $('#pname').text(data.product.product_name);
                         $('#pcat').text(data.product.category_name);
                         $('#psubcat').text(data.product.subcategory_name);
                         $('#pcode').text(data.product.product_code);
                         $('#product_id').val(data.product.id);
  
                          var d =$('select[name="product_size"]').empty();

                           $.each(data.product_size, function(key, value){
                               $('select[name="product_size"]').append('<option value="'+ value +'">' + value + '</option>');
                                if (data.product_size == "") {
                                       $('#sizediv').hide();   
                                }else{
                                      $('#sizediv').show();
                                } 
                           });

                          var d =$('select[name="product_color"]').empty();
                           $.each(data.product_color, function(key, value){
                               $('select[name="product_color"]').append('<option value="'+ value +'">' + value + '</option>');
                                 if (data.product_color == "") {
                                       $('#colordiv').hide();
                                } else{
                                     $('#colordiv').show();
                                }
                           });
               }
        })
      }
</script>





@endsection
