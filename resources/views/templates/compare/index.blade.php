@extends('layouts.app')
@section('content')




<div class="site__body">
                <div class="block-header block-header--has-breadcrumb block-header--has-title">
                    <div class="container">
                        <div class="block-header__body">
                            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                                <ol class="breadcrumb__list">
                                    <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Compare</span></li>
                                    <li class="breadcrumb__title-safe-area" role="presentation"></li>
                                </ol>
                            </nav>
                            <h1 class="block-header__title">Compare</h1> 
                        </div>
                    </div>
                </div>
                @if (Session::has('compare'))
                <div class="block">
                    <div class="container">
                        <div class="compare card">
                            <div class="compare__options-list">
                                
                                <div class="compare__option">
                                    <div class="compare__option-control">
                                        <a href="{{route('compare.destroy')}}" class="btn btn-secondary btn-xs bg-danger text-light">Clear</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="compare__table compare-table">
                                    <tbody>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Product</th>
                                            
                                            @foreach (Session::get('compare') as $item)
                                                     {{-- {{ $item }} --}}
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp

                                                <td class="compare-table__column compare-table__column--product">
                                                    <a href="{{URL::to('product/'.$product->id)}}" class="compare-table__product">
                                                        <div class="compare-table__product-image image image--type--product">
                                                            <div class="image__body"><img class="image__tag" src="{{asset($product->image_one)}}" alt="" /></div>
                                                        </div>
                                                        <div class="compare-table__product-name">{{$product->product_name}}</div>
                                                    </a>
                                                </td>

                                            @endforeach
                                          
                                            

                                            <td class="compare-table__column compare-table__column--fake"></td>
                                        </tr>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Rating</th>

                                            @foreach (Session::get('compare') as $item)
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp
                                                <td class="compare-table__column compare-table__column--product">
                                                    <div class="compare-table__rating">
                                                        <div class="compare-table__rating-title">{{$product->product_rating}}</div>
                                                    </div>
                                                </td>
                                            @endforeach

                                            <td class="compare-table__column compare-table__column--fake"></td>
                                        </tr>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Availability</th>
                                           
                                            @foreach (Session::get('compare') as $item)
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp
                                                <td class="compare-table__column compare-table__column--product">
                                                    <div class="status-badge status-badge--style--success status-badge--has-text">
                                                        <div class="status-badge__body">
                                                            @if ($product->product_quantity>0)
                                                                <div class="status-badge__text">In Stock</div>
                                                            @else
                                                                <div class="status-badge__text">Not Available</div>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            @endforeach
                                            
                                            <td class="compare-table__column compare-table__column--fake"></td>
                                        </tr>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Price</th>
                                            
                                            @foreach (Session::get('compare') as $item)
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp
                                                <td class="compare-table__column compare-table__column--product">{{$product->present_price}} tk</td>
                                            @endforeach

                                        </tr>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Add to cart</th>
                                            
                                            @foreach (Session::get('compare') as $item)
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp

                                                @if ($product->product_color==null || $product->product_size==null)

                                                    <td class="compare-table__column compare-table__column--product">

                                                        <button data-id="{{ $product->id }}" type="button" class="addcart btn btn-sm btn-primary" >Add to cart</button> 

                                                    </td>

                                                @else
                                                    <td class="compare-table__column compare-table__column--product">

                                                        <button data-id="{{ $product->id }}" type="button" data-toggle="modal" data-target="#cartmodal"  onclick="productviewFromCompare({{$product->id}})" class="btn btn-sm btn-primary" >Add to cart </button> 

                                                    </td>

                                                @endif
                                                 
                                            @endforeach
                                            
                                            <td class="compare-table__column compare-table__column--fake"></td>
                                        </tr>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Code</th>

                                            @foreach (Session::get('compare') as $item)
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp
                                                 <td class="compare-table__column compare-table__column--product"> {{$product->product_code}} </td> 
                                            @endforeach
                                            
                                            <td class="compare-table__column compare-table__column--fake"></td>
                                        </tr>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Size</th>
                                            
                                            @foreach (Session::get('compare') as $item)
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp
                                                @if ($product->product_size!=null)
                                                    <td class="compare-table__column compare-table__column--product">{{$product->product_size}}</td> 
                                                @else
                                                    <td class="compare-table__column compare-table__column--product">Not specific</td> 
                                                @endif
                                            @endforeach

                                            
                                            
                                            <td class="compare-table__column compare-table__column--fake"></td>
                                        </tr>
                                        <tr class="compare-table__row">
                                            <th class="compare-table__column compare-table__column--header">Color</th>
                                            @foreach (Session::get('compare') as $item)
                                                @php
                                                    $product = DB::table('products')->where('id',$item)->first();
                                                @endphp
                                                @if ($product->product_color!=null)
                                                <td class="compare-table__column compare-table__column--product">{{$product->product_color}}</td>
                                                @else
                                                <td class="compare-table__column compare-table__column--product">Not specific</td>
                                                @endif
                                            @endforeach
                                            
                                            <td class="compare-table__column compare-table__column--fake"></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @else 
                

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-light" role="alert">
                                <h4 class="alert-heading">Compare List Empty!!</h4>
                                <hr>

                                <img src="{{asset('public/media/compare-img.png')}}" alt="" style="width: 20%;margin-left: 38%;opacity: .7;">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                @endif
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
                  <input type="text" name="product_id" id="product_id">

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
      function productviewFromCompare(id){
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
                            // product color condition
                                if (data.product.red!='1') {
                                    $('#redInput').hide();
                                }
                                if (data.product.green!='1') {
                                    $('#greenInput').hide();
                                }
                                if (data.product.blue!='1') {
                                    $('#blueInput').hide();
                                }
                                if (data.product.black!='1') {
                                    $('#blackInput').hide();
                                }
                                if (data.product.white!='1') {
                                    $('#whiteInput').hide();
                                }
                            
                            // product size condition
                            if (data.product.s!='1') {
                                    $('#sId').hide();
                            }
                            if (data.product.m!='1') {
                                    $('#mId').hide();
                            }
                            if (data.product.l!='1') {
                                    $('#lId').hide();
                            }
                            if (data.product.xl!='1') {
                                    $('#xlId').hide();
                            }
                            if (data.product.xxl!='1') {
                                    $('#xlIId').hide();
                            }

               }
        })
      }
</script>



@endsection
