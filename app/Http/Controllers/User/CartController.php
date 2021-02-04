<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cart;
use DB;
use Response;
use Auth;
use Session;

class CartController extends Controller
{

    public function check()
    {
    	$content=Cart::content();
    	return response()->json($content);
    }

    public function showCart()
    {
        
         if(Auth::user()){
             
            foreach (Cart::content() as $item){

                $flag = 0;

                //return response()->json($item);

                $product=DB::table('products')->where('id',$item->id)->first();

                # cart a add korar age dekhi je, product tar maximum buy quantity koto?
                $max_buy_quantity = $product->max_buy;

                    #ebar dekhi je Auth user koto bar kinse product ta
                        
                        $order_child_count = DB::table('order_childs')
                                            ->join('orders','orders.id','order_childs.order_id')
                                            ->where('orders.status','complete')
                                            ->where('orders.who_orders',Auth::user()->id)
                                            ->where('order_childs.product_id',$product->id)->sum('order_childs.qty');
                    
                            if($max_buy_quantity!='0' ){ // $max_buy_quantity !0 mane, ei product gulur buy limit ache.

                                if($order_child_count>0 && $order_child_count>=$max_buy_quantity){

                                    if($item->rowId){

                                            Cart::remove($item->rowId);
                                            $flag = 1;
                                        
                                    }
                                }

                                # now check kori je, cart a koto bar add korese? jodi oto bar add kore  max er besi hoy tahole remove korbo product

                                if( ($item->qty + $order_child_count) > $max_buy_quantity ){

                                    if($flag==0){
                                        
                                            if(Cart::get($item->rowId)){
                                                Cart::remove($item->rowId);
                                            }
                                        
                                    }
                                }
                            }
                    
            }
         }
        
        $cart=Cart::content();
            return view('templates.cart.cart',compact('cart'));

    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);

        $notification=array(
            'messege'=>'Item remove successfully',
            'alert-type'=>'info'
        );

        return redirect()->back()->with($notification);
    }


    public function UpdateCart(Request $request)
    {
        $rowId =$request->rowId;
        $qty=$request->qty;
        Cart::update($rowId, $qty);
        return redirect()->back();
    }

    public function AddCart($id)
    {
          $product=DB::table('products')->where('id',$id)->first();


	  # je product ta add korbo cart a , setar pay method jodi existing cart product er pay method er sathe na mile
          # tahole sei product ta cart a add korte deya jabe na ........................................................
          
          
          foreach (Cart::content() as $cart) {
              $cart_product = DB::table('products')->where('id',$cart->id)->first();

              if($cart_product->pay_method!=$product->pay_method){
                return response()->json(['error' => 'You can\'t add this product because of different payment method. First Clear the Cart then add this product to Cart.']);     
              }

          }



          $max_buy_quantity = $product->max_buy;

          if(Auth::user()){

            $order_child_count = DB::table('order_childs')
            ->join('orders','orders.id','order_childs.order_id')
            ->where('orders.status','complete')
            ->where('orders.who_orders',Auth::user()->id)
            ->where('order_childs.product_id',$product->id)->sum('order_childs.qty');
        
      if(Auth::user() && $max_buy_quantity!='0' ){

        # cart a add korar age dekhi je, product tar maximum buy quantity koto?
        #ebar dekhi je Auth user koto bar kinse product ta

        if($order_child_count>0 && $order_child_count>=$max_buy_quantity){
            ;
  
         return response()->json(['error' => 'You Already Order '.$product->product_name.' Max Time']); 

        }

        # now check kori je, cart a koto bar add korte chasse? jodi oto bar add kore max er besi na hoy , tahole add korte dibo

        $add_cart_quantity = 1;

        $sum = $add_cart_quantity + $order_child_count ;

        # previous cart er product gulo check korbo............................ foreach loop diye. 
        $prev_qty = 0;

        foreach (Cart::content() as $c) {
            
            $product_id = $c->id;

            if($product_id==$product->id){
                $prev_qty = $c->qty;
            }
        }

        if(($sum+$prev_qty) > $max_buy_quantity ){

         return response()->json(['error' => 'You Can not order '.$add_cart_quantity.' times. Because if you order '.$add_cart_quantity.' times, your cross the max limit of this product']);     

        }

      }
          }

          $data=array();
          
    	  	$data['id']=$product->id;
    	    $data['name']=$product->product_name;
    	    $data['qty']=1;
    	    $data['price']= $product->present_price;           
    	 	$data['weight']=1;
    	    $data['options']['image']=$product->image_one;
            $data['options']['color']='no';
            $data['options']['size']='no';
                
            Cart::add($data);

            $product_name = $product->product_name;

    	    return response()->json(['success' => 'Successfully '.$product_name.' Added on your Cart']);                  
    }

    public function getCart(){

        return response::json(array(
            'cTotal' => Cart::total(),
            'cCount' => Cart::count(),
            'cSubTotal'=>Cart::subtotal(),
     ));                  

    }

    public function ViewProduct($id){

        $product=DB::table('products')
                              ->join('categories','products.category_id','categories.id')
                              ->join('subcategories','products.subcategory_id','subcategories.id')
                              ->select('products.*','categories.category_name','subcategories.subcategory_name')
                              ->where('products.id',$id)->first();

        $red = $product->red;
        $green = $product->green;
        $blue = $product->blue;
        $black = $product->black;
        $white = $product->white; 

        $s = $product->s;
        $m = $product->m;
        $l = $product->l;
        $xl = $product->xl;
        $xxl = $product->xxl;

        $color=$product->product_color;                            
        $product_color = explode(' ', $color);                        

        $size=$product->product_size;
        $product_size = explode(' ', $size);
        
        //return response()->json($product_color);
        return response::json(array(
                'product' => $product,
                'product_color' => $product_color,
                 'product_size' => $product_size,
                 'red'=>$red,
                 'green'=>$green,
                 'blue'=>$blue,
                 'black'=>$black,
                 'white'=>$white,
                 's'=>$s,
                 'm'=>$m,
                 'l'=>$l,
                 'xl'=>$xl,
                 'xxl'=>$xxl,
         ));


    }

    public function InsertCart(Request $request)
    {
         $id=$request->product_id;
          
         $product=DB::table('products')->where('id',$id)->first();

         $max_buy_quantity = $product->max_buy;



         foreach (Cart::content() as $cart){ 
            $cart_product = DB::table('products')->where('id',$cart->id)->first();

            

            if($cart_product->pay_method!=$product->pay_method){
                $notification=array(
                    'messege'=>'You can\'t add this product because of different payment method. First Clear the Cart then add this product to Cart.',
                     'alert-type'=>'error' 
               );
             return Redirect()->back()->with($notification);
            }
        }


        # for all user first check the quantity of the added product!


        if(Auth::user()){

            $order_child_count = DB::table('order_childs')
            ->join('orders','orders.id','order_childs.order_id')
            ->where('orders.status','complete')
            ->where('orders.who_orders',Auth::user()->id)
            ->where('order_childs.product_id',$product->id)->sum('order_childs.qty');
        
                if($max_buy_quantity!='0' ){

                    # cart a add korar age dekhi je, product tar maximum buy quantity koto?
                    #ebar dekhi je Auth user koto bar kinse product ta

                    if($order_child_count>0 && $order_child_count>=$max_buy_quantity){
                        
                        $notification=array(
                            'messege'=>'You Already Order '.$product->product_name.' Maximum Time',
                            'alert-type'=>'error'
                    );
                    return Redirect()->back()->with($notification);

                    }

                    # now check kori je, cart a koto bar add korte chasse? jodi oto bar add kore max er besi na hoy , tahole add korte dibo

                    $add_cart_quantity = $request->qty;

                    $sum = $add_cart_quantity + $order_child_count ;

                    # previous cart er product gulo check korbo............................ foreach loop diye. 
                    $prev_qty = 0;

                    foreach (Cart::content() as $c) {
                        
                        $product_id = $c->id;

                        if($product_id==$request->product_id){
                            $prev_qty = $c->qty;
                        }
                    }

                    if(($sum+$prev_qty) > $max_buy_quantity ){

                        $notification=array(
                            'messege'=>'You Can not order '.$add_cart_quantity.' times. Because if you order '.$add_cart_quantity.' times, your cross the max limit of this product',
                            'alert-type'=>'error'
                    );

                    return Redirect()->back()->with($notification);

                    }

                }

        }
          $data=array();
                       $data['id']=$product->id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;
                        $data['price']= $product->present_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one;  
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;

                        Cart::add($data);  
                      $notification=array(
                              'messege'=>'Successfully Added on your Cart ',
                               'alert-type'=>'info'
                         );
                       return Redirect()->back()->with($notification);
         
    }

    public function InsertToCart(Request $request)
    {   

          $product=DB::table('products')->where('id',$request->product_id)->first();

          $max_buy_quantity = $product->max_buy;
	  
	# je product ta add korbo cart a , setar pay method jodi existing cart product er pay method er sathe na mile
        # tahole sei product ta cart a add korte deya jabe na ........................................................

         foreach (Cart::content() as $cart) {
            $cart_product = DB::table('products')->where('id',$cart->id)->first();


        #  kew jodi limit bound kora product ekbar cart a add kore, tahole take r oi product tai vinno color er ba size er add korte deya hobe na
        # jodi se qty barate chay , tahole login kore qty barate hobe.
    

        

        if( ($request->product_id == $cart_product->id ) && $max_buy_quantity!=0  ) {

            $notification=array(
                'messege'=>'Product Already On Your Cart!',
                 'alert-type'=>'warning' 
           );
         return Redirect()->back()->with($notification);

        }


        if($cart_product->pay_method!=$product->pay_method){

                $notification=array(
                    'messege'=>'You can\'t add this product because of different payment method. First Clear the Cart then add this product to Cart.',
                     'alert-type'=>'error'
               );
             return Redirect()->back()->with($notification);
     
        }

        }

          


          if(Auth::user()){

            $order_child_count = DB::table('order_childs')
                ->join('orders','orders.id','order_childs.order_id')
                ->where('orders.status','complete')
                ->where('orders.who_orders',Auth::user()->id)
                ->where('order_childs.product_id',$product->id)->sum('order_childs.qty');
            
          if(Auth::user() && $max_buy_quantity!='0' ){

            # cart a add korar age dekhi je, product tar maximum buy quantity koto?
            #ebar dekhi je Auth user koto bar kinse product ta

            if($order_child_count>0 && $order_child_count>=$max_buy_quantity){
                
                $notification=array(
                    'messege'=>'You Already Order '.$product->product_name.' Max Time',
                     'alert-type'=>'error'
               );
             return Redirect()->back()->with($notification);

            }

            # now check kori je, cart a koto bar add korte chasse? jodi oto bar add kore max er besi na hoy , tahole add korte dibo

            $add_cart_quantity = $request->qty;

            $sum = $add_cart_quantity + $order_child_count ;

            # previous cart er product gulo check korbo............................ foreach loop diye. 
            $prev_qty = 0;

            foreach (Cart::content() as $c) {
                
                $product_id = $c->id;

                if($product_id==$request->product_id){
                    $prev_qty = $c->qty;
                }
            }

            if(($sum+$prev_qty) > $max_buy_quantity ){

                $notification=array(
                    'messege'=>'You Can not order '.$add_cart_quantity.' times. Because if you order '.$add_cart_quantity.' times, your cross the max limit of this product',
                     'alert-type'=>'error'
               );

             return Redirect()->back()->with($notification);

            }

          }

          }

          


          $data=array();
         
                        $data['id']=$request->product_id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;
                        $data['price']= $product->present_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one; 
                        
                        if($request->color=='' || $request->color==null){
                            $data['options']['color']='no';
                        }else{
                            $data['options']['color']=$request->color;
                        }

                        if($request->size=='' || $request->size==null){
                            $data['options']['size']='no';
                        }else{
                            $data['options']['size']=$request->size;
                        }
                        
                        




                        Cart::add($data);  

                      $notification=array(
                              'messege'=>'Successfully Added on your Cart',
                               'alert-type'=>'info'
                         );
                       return Redirect()->back()->with($notification);
         
    }

    public function destroy(){

        Cart::destroy();

        $notification=array(
            'messege'=>'Cart clear successfully!',
            'alert-type'=>'info'
        );
        return redirect()->back()->with($notification);

    }
}
