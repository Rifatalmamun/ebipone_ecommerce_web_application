<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use Image;

class ProductController extends Controller
{
    public function index(){
        $products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->orderBy('id','DESC')
                    ->get();

        $pageTag = 'All';

        return view('admin.product.index',compact('products','pageTag')) ;
    }

    public function activeProduct(){
        $products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')->orderBy('id','DESC')
                    ->get(); 

                    $pageTag = 'Active';

                    return view('admin.product.index',compact('products','pageTag')) ;
    }

    public function pendingProduct(){

        $products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','pending')->orderBy('id','DESC')
                    ->get(); 

                    $pageTag = 'Pending'; 

                    return view('admin.product.index',compact('products','pageTag')) ;

    }

    public function blockProduct(){

        $products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','block')->orderBy('id','DESC')
                    ->get(); 

                    $pageTag = 'Block'; 

                    return view('admin.product.index',compact('products','pageTag')) ;

    }

    public function show($id){
        $product = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.id',$id)
                    ->first();

        return view('admin.product.show',compact('product')); 
    }

    public function setCachback(Request $request){

        $data = array();
        
        $data['selling_price'] = $request->selling_price;
        $data['buying_price'] = $request->buying_price;

        $data['cashback'] = $request->cashback;
        $data['cashback_use'] = $request->cashback_use;

        $data['gift_use'] = $request->gift_use;
	    $data['max_buy'] = $request->max_buy;
	    $data['product_quantity'] = $request->product_quantity;

	    $data['pay_method'] = $request->pay_method; 


        if($request->show_home=='1'){
            
            $data['show_home'] = '1';
        }else{
            $data['show_home'] = '0';
        }

        if($request->show_note=='1'){
            
            $data['show_note'] = '1';
        }else{
            $data['show_note'] = '0';
        }

        $data['discount'] = $request->discount; 

        $data['delivery_charge'] = $request->delivery_charge; 
        $data['delivery_time'] = $request->delivery_time;  
        $data['keep_note'] = $request->keep_note; 

        $update = DB::table('products')->where('id',$request->product_id)->update($data); 

                // check discount
            $product_id = $request->product_id ;

            $updated_product = DB::table('products')->where('id',$product_id)->first();

            $find_discount_price = ( ( $updated_product->discount * $updated_product->selling_price ) / 100 ); 

            $sell_price = $updated_product->selling_price - $find_discount_price;


            $update_present_price = DB::table('products')->where('id',$request->product_id)->update(['present_price'=>$sell_price]); 


            if($update){
                $notification=array(
                    'messege'=>'Update successfully !',
                    'alert-type'=>'info'
                    );
            }else{
                $notification=array(
                    'messege'=>'No Change !',
                    'alert-type'=>'warning'
                    );
            }
            return Redirect()->back()->with($notification); 

    }

    public function approve($id){
        $update = DB::table('products')->where('id',$id)->update(['block'=>'0','status'=>'active']); 

        if($update){
            $notification=array(
                'messege'=>'Product Approved successfully !',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'error'
                );
        }
        return Redirect()->back()->with($notification); 
    }

    public function block($id){
        $update = DB::table('products')->where('id',$id)->update(['status'=>'block']); 

        if($update){
            $notification=array(
                'messege'=>'Product Blocked successfully !',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'error'
                );
        }
        return Redirect()->back()->with($notification); 
    }

    public function unblock($id){
        $update = DB::table('products')->where('id',$id)->update(['status'=>'active']); 

        if($update){
            $notification=array(
                'messege'=>'Product Un-Blocked successfully !',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'error'
                );
        }
        return Redirect()->back()->with($notification); 
    }

        public function edit($id){

        $product = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.id',$id)
                    ->first();

        $brand = DB::table('brands')->get();
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->get();
        $microcategory = DB::table('micros')->get();

        return view('admin.product.edit',compact('product','category','subcategory','microcategory','brand'));

    }

    public function update(Request $request){

                $validatedData = $request->validate([
                    'image_one' => 'mimes:jpeg,jpg,png|max:500',
                    'image_two' => 'mimes:jpeg,jpg,png|max:500',
                    'image_three' => 'mimes:jpeg,jpg,png|max:500',
                    'image_four' => 'mimes:jpeg,jpg,png|max:500',
                ]);
        
                $data=array();
                $data['product_name']=$request->product_name;
                $data['brand_id']=$request->brand_id;
                $data['category_id']=$request->category_id;
                $data['subcategory_id']=$request->subcategory_id;
                $data['microcategory_id']=$request->microcategory_id;
        
                $data['buying_price']=$request->buying_price;
                $data['selling_price']=$request->selling_price;
        
                $data['product_description']=$request->product_description;
                $data['product_quantity']=$request->product_quantity;

        
                $image_one  = $request->image_one;
                $image_two  = $request->image_two;
                $image_three  = $request->image_three;
                $image_four  = $request->image_four;

                $old_image_one  = $request->old_image_one;
                $old_image_two  = $request->old_image_two;
                $old_image_three  = $request->old_image_three;
                $old_image_four  = $request->old_image_four;

        
                if($image_one){ 

                    if($old_image_one){
                        unlink($old_image_one);
                    }

                    $image_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                        Image::make($image_one)->save('public/media/product/'.$image_name);
                        $data['image_one']='public/media/product/'.$image_name;
                }
        
                if($image_two){ 

                    if($old_image_two){
                        unlink($old_image_two);
                    }

                    $image_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                        Image::make($image_two)->save('public/media/product/'.$image_name);
                        $data['image_two']='public/media/product/'.$image_name;
                }
        
                if($image_three){ 

                    if($old_image_three){
                        unlink($old_image_three);
                    }


                    $image_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                        Image::make($image_three)->save('public/media/product/'.$image_name);
                        $data['image_three']='public/media/product/'.$image_name;
                }
        
                if($image_four){ 

                    if($old_image_four){
                        unlink($old_image_four);
                    }


                    $image_name= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                        Image::make($image_four)->save('public/media/product/'.$image_name);
                        $data['image_four']='public/media/product/'.$image_name;
                }
        


                // PRODUCT COLOR PART

                    $data['red']=$request->red;
                    $data['green']=$request->green;
                    $data['blue']=$request->blue;
                    $data['yellow']=$request->yellow;
                    $data['white']=$request->white;
                    $data['black']=$request->black;      
            
                    
                    $color = '';

                    if($request->red!=null){
                        $color =$color.'red';
                    }
                    if($request->green!=null){
                        $color =$color.' green';
                    }
                    if($request->blue!=null){
                        $color =$color.' blue';
                    }
                    if($request->white!=null){
                        $color =$color.' white';
                    }
                    if($request->black!=null){
                        $color =$color.' black'; 
                    }
                    if($request->yellow!=null){
                        $color =$color.' yellow'; 
                    }

                    $data['product_color'] = $color;                                                                                         
                    
                        //PRODUCT QUANTITY BASED ON COLOR   

                    $data['red_color_quantity']=$request->red_color_quantity;
                    $data['green_color_quantity']=$request->green_color_quantity;   
                    $data['blue_color_quantity']=$request->blue_color_quantity;
                    $data['white_color_quantity']=$request->white_color_quantity;
                    $data['black_color_quantity']=$request->black_color_quantity;
                    $data['yellow_color_quantity']=$request->yellow_color_quantity;



                $update = DB::table('products')->where('id',$request->id)->update($data);           
        
                if($update){
                    $notification=array(
                        'messege'=>'Product Uploaded Successfully !',
                        'alert-type'=>'info'
                         );
                    return Redirect()->back()->with($notification); 
                }else{
                    $notification=array(
                        'messege'=>'No Change !',
                        'alert-type'=>'error'
                         );
                    return Redirect()->back()->with($notification);   
                }

    }



    public function delete($id){

        $product = DB::table('products')->where('id',$id)->first();

        if($product){

            if ($product->image_one) {
                unlink($product->image_one);
            }
            if ($product->image_two) {
                unlink($product->image_two);
            }
            if ($product->image_three) {
                unlink($product->image_three);
            }
            if ($product->image_four) {
                unlink($product->image_four);
            }
            if ($product->image_five) {
                unlink($product->image_five);
            }

            $delete = DB::table('products')->where('id',$id)->delete();

            if($delete){
                $notification=array(
                    'messege'=>'Product Delete successfully !',
                    'alert-type'=>'info'
                    );
            }else{
                $notification=array(
                    'messege'=>'Something wrong !',
                    'alert-type'=>'error'
                    );
            }
            
            return Redirect()->back()->with($notification); 
        }
    }

}
