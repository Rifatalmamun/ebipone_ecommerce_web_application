<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Image;

class ShopController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function editShop($id){


        $shop = DB::table('users')->where('id',$id)->first(); 


        return view('templates.my shop.edit',compact('shop')); 

    }

    public function updateShop(Request $request){
                                                                                                                                                                                                                                                                                                                                
        $validatedData = $request->validate([
            'shop_name' => 'required', 'string', 'shop_name','min:3', 'max:180', 'unique:users',
            'shop_phone' => 'required | numeric | digits:11',
            "shop_logo"  => "dimensions:max_width=150,max_height=150",
            "shop_banner"  => "dimensions:max_width=1110,max_height=150",
        ]);

  
        $shopName = str_replace("-", "",$request->shop_name);
        $shopName = str_replace("'", "",$shopName);
        $shopName = str_replace("/", "", $shopName);

        $id = Auth::user()->id;

        $data=array();

    	$data['shop_name']=$shopName;
    	$data['shop_logo']=$request->shop_logo;
    	$data['shop_phone']=$request->shop_phone;
        $data['shop_trad_no']=$request->shop_trad_no;
        
        $data['shop_address']=$request->shop_address;
        $data['shop_owner']=$request->shop_owner;
        $data['nid']=$request->nid;
        $data['isVendor']=1;
        $data['shop_status']='pending';

        $shop_id = rand(10000000,99999999);

        $data['shop_id'] = $shop_id;
        
        $shop_logo  = $request->shop_logo;
        $old_shop_logo  = $request->old_shop_logo;

        $shop_banner  = $request->shop_banner;
        $old_shop_banner  = $request->old_shop_banner;

        $shop_trad_photo  = $request->shop_trad_photo;
        $old_shop_trad_photo  = $request->old_shop_trad_photo;

        if($shop_logo){
            if($old_shop_logo){
                unlink($old_shop_logo);
            } 
            $image_name= hexdec(uniqid()).'.'.$shop_logo->getClientOriginalExtension();
                Image::make($shop_logo)->resize(300,300)->save('public/media/shop_logo/'.$image_name);
                $data['shop_logo']='public/media/shop_logo/'.$image_name;

        }

        if($shop_banner){
            if($old_shop_banner){
                unlink($old_shop_banner);
            } 
            $image_name= hexdec(uniqid()).'.'.$shop_banner->getClientOriginalExtension();
                Image::make($shop_banner)->resize(1110,150)->save('public/media/shop_banner/'.$image_name);
                $data['shop_banner']='public/media/shop_banner/'.$image_name;

        }

        if($shop_trad_photo){ 
            if($old_shop_trad_photo){
                unlink($old_shop_trad_photo);
            }
            $image_name= hexdec(uniqid()).'.'.$shop_trad_photo->getClientOriginalExtension();
                Image::make($shop_trad_photo)->resize(300,300)->save('public/media/shop_trad/'.$image_name);
                $data['shop_trad_photo']='public/media/shop_trad/'.$image_name;
        }

        $update = DB::table('users')->where('id',$id)->update($data);

        if($update){
            $notification=array(
                'messege'=>'Shop Updated Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->route('home')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'No Change !',
                'alert-type'=>'warning'
                 );
            return Redirect()->route('home')->with($notification);   
        }

        
    }

    public function createForm(){

        $data = DB::table('users')->where('id',Auth::user()->id)->first();

        return view('templates.my shop.create_shop',compact('data'));
    }

    public function storeShop(Request $request){

        $validatedData = $request->validate([
            'shop_name' => 'required', 'string', 'shop_name','min:3', 'max:180', 'unique:users',
            'shop_phone' => 'required | numeric | digits:11 | unique:users',
            "shop_logo"  => "dimensions:max_width=150,max_height=150",
            "shop_banner"  => "dimensions:max_width=1110,max_height=150",
        ]);


        $id = Auth::user()->id;

        $shopName = str_replace("-", "",$request->shop_name);
        $shopName = str_replace("'", "",$shopName);
        $shopName = str_replace("/", "", $shopName);


        $data=array();

    	$data['shop_name']=$shopName;
    	$data['shop_logo']=$request->shop_logo;
    	$data['shop_phone']=$request->shop_phone;
        $data['shop_trad_no']=$request->shop_trad_no;
        
        $data['shop_address']=$request->shop_address;
        $data['shop_owner']=$request->shop_owner;
        $data['nid']=$request->nid;
        $data['isVendor']=1;

        $shop_id = rand(10000000,99999999);

        $data['shop_id'] = $shop_id;

        
        $shop_logo  = $request->shop_logo;
        $shop_banner = $request->shop_banner;

       
        $shop_trad_photo  = $request->shop_trad_photo;


        
        //return response()->json($data);

        if($shop_logo){ 
            $image_name= hexdec(uniqid()).'.'.$shop_logo->getClientOriginalExtension();
                Image::make($shop_logo)->resize(150,150)->save('public/media/shop_logo/'.$image_name);
                $data['shop_logo']='public/media/shop_logo/'.$image_name;
        }

        if($shop_banner){ 
            $image_name= hexdec(uniqid()).'.'.$shop_banner->getClientOriginalExtension();
                Image::make($shop_banner)->resize(1110,150)->save('public/media/shop_banner/'.$image_name); 
                $data['shop_banner']='public/media/shop_banner/'.$image_name;
        }

        if($shop_trad_photo){ 
            $image_name= hexdec(uniqid()).'.'.$shop_trad_photo->getClientOriginalExtension();
                Image::make($shop_trad_photo)->resize(300,300)->save('public/media/shop_trad/'.$image_name);
                $data['shop_trad_photo']='public/media/shop_trad/'.$image_name;
        }

        $update = DB::table('users')->where('id',$id)->update($data);


        if($update){
            $notification=array(
                'messege'=>'Shop Created Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->route('home')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'warning'
                 );
            return Redirect()->route('home')->with($notification);   
        }

    }

    public function myShop(){

        $shop = DB::table('users')->where('id',Auth::user()->id)->first(); 

        $shop_product = DB::table('products')->where('product_owner_id',Auth::user()->id)->orderBy('id','DESC')->get();  
        $count_shop_product = DB::table('products')->where('product_owner_id',Auth::user()->id)->count();

        return view('templates.my shop.shop',compact('shop','shop_product','count_shop_product')); 
    }


    public function viewShopProduct($id){

        

        $shop_product = DB::table('products')->where('products.id',$id)
                        ->join('users','users.id','products.product_owner_id')
                        ->join('categories','categories.id','products.category_id')
                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                        ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                        ->first();  

        $shop_product_count = DB::table('products')->where('products.id',$id)
                                        ->join('users','users.id','products.product_owner_id')
                                        ->join('categories','categories.id','products.category_id')
                                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                                        ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                                        ->count(); 
        if($shop_product_count==0){
            $shop_product = DB::table('products')->where('id',$id)->first();
        }

        
        //return response()->json( $test );

        $category = DB::table('categories')->get();

        return view('templates.my shop.view_product',compact('shop_product','category'));                                        

    }

    public function newOrder(){

        return view('templates.my shop.new_order');  
    }

        public function sendToWarehouse(Request $request){

        $id = $request->id; // order child id

        $warehouse_id = $request->warehouse_id;  // warehouse id

        $getChildOrder = DB::table('order_childs')->where('id',$id)->first();

        $getWarehouse = DB::table('warehouses')->where('id',$warehouse_id)->first();

        $setWarehouseToOrderChild = DB::table('order_childs')->where('id',$id)->update(['warehouse_id'=>$getWarehouse->id]);
        
        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $date = $day.'-'.$month.'-'.$year; 
        $time = date("h:i:sa"); 

        $sendToWarehouse = DB::table('order_childs')->where('id',$id)->update(['isShopSend'=>'1','ssd'=>$date,'sst'=>$time]);  

        //  SET SHOP DELIVERY PENDING BALANCE 
        // $get_order_child = DB::table('order_childs')->where('id',$id)->first();
        // $get_product = DB::table('products')->where('id',$get_order_child->product_id)->first();

        // $get_shop = DB::table('users')->where('id',$get_order_child->shop_id)->first();
        
        //$pending_delivery_money = $get_shop->pending_delivery + ($get_product->buying_price * $get_order_child->qty);

        //DB::table('users')->where('id',$get_order_child->shop_id)->update(['pending_delivery'=>$pending_delivery_money]); 

        if($sendToWarehouse){
            $notification=array(
                'messege'=>'Product Send to Pickup Point Successfully!',
                'alert-type'=>'info'
                 );
            return Redirect()->back()->with($notification);   
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'warning'
                 );
            return Redirect()->back()->with($notification);   
        }
    }

    public function deliveryPending(){

        return view('templates.my shop.delivery_pending'); 
    }

    public function deliveryComplete(){


        //return response()->json($child_order); 

        return view('templates.my shop.delivery_complete'); 
    }

	public function order_invoice($id){

        $invoice_data = DB::table('order_childs')
                        ->join('users','users.id','order_childs.shop_id')
                        ->join('orders','orders.id','order_childs.order_id')
                        ->join('products','products.id','order_childs.product_id')
                        ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.who_orders','orders.transaction_id','orders.billing_address','orders.b_name','orders.b_email','orders.b_phone','orders.b_postcode','orders.b_thana','orders.b_area','orders.b_district','orders.shipping_address','orders.s_name','orders.s_email','orders.s_phone','orders.s_postcode','orders.s_thana','orders.s_area','orders.s_district','orders.total_product','orders.order_date','orders.order_time','orders.pay_price','products.product_name','products.image_one','products.product_code','products.un_id')
                        ->where('order_childs.id',$id)->first();

                       // return response()->json($invoice_data);

        $who_order = DB::table('users')->where('id',$invoice_data->who_orders)->first();

        //return response()->json($who_order);

        return view('templates.warehouse.invoice_order_complete',compact('invoice_data','who_order'));

    }




}
