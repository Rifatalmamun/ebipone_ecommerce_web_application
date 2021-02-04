<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Image;
use Str;

class ProductController extends Controller
{

        
    public function allShop(){

        $shops = DB::table('users')->where('isVendor',1)->get(); 

        return view('templates.my shop.index',compact('shops'));   

    }

    public function create(){

        $brand = DB::table('brands')->get();
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->get();
        $microcategory = DB::table('micros')->get();

        return view('templates.product.create',compact('brand','category','subcategory','microcategory')); 
    }

    public function store(Request $request){

        // validation 
        $validatedData = $request->validate([

            'image_one' => 'required|mimes:jpeg,jpg,png|max:1000',
            'image_two' => 'required|mimes:jpeg,jpg,png|max:1000',
            'image_three' => 'required|mimes:jpeg,jpg,png|max:1000',
            'image_four' => 'required|mimes:jpeg,jpg,png|max:1000',
            'image_five' => 'mimes:jpeg,jpg,png|max:1000',
        ]);

        $vendor_id = Auth::user()->id; 

        $data=array();
        $data['product_name']=$request->product_name;
        $data['brand_id']=$request->brand_id;
    	$data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['microcategory_id']=$request->microcategory_id;
        $data['product_owner_id']=$vendor_id;

        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;

        $data['present_price']=$request->selling_price; 
            
            //PRODUCT COLOR

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
        
            //PRODUCT SIZE
        $data['s']=$request->s;
        $data['m']=$request->m;
        $data['l']=$request->l;
        $data['xl']=$request->xl;
        $data['xxl']=$request->xxl; 

        $size = '';

        if($request->s!=null){
            $size =$size.'s';
        }
        if($request->m!=null){
            $size =$size.' m';
        }
        if($request->l!=null){
            $size =$size.' l';
        }
        if($request->xl!=null){
            $size =$size.' xl';
        }
        if($request->xxl!=null){
            $size =$size.' xxl';
        }

        $data['product_size'] = $size; 

            //PRODUCT QUANTITY BASED ON SIZE
        $data['s_size_quantity']=$request->s_size_quantity;
        $data['m_size_quantity']=$request->m_size_quantity;
        $data['l_size_quantity']=$request->l_size_quantity;
        $data['xl_size_quantity']=$request->xl_size_quantity;
        $data['xxl_size_quantity']=$request->xxl_size_quantity; 

            //PRODUCT PRICE BASED ON SIZE
        $data['s_size_price']=$request->s_size_price;
        $data['m_size_price']=$request->m_size_price;
        $data['l_size_price']=$request->l_size_price;
        $data['xl_size_price']=$request->xl_size_price;
        $data['xxl_size_price']=$request->xxl_size_price;


        $data['product_code']=$request->product_code;

        $data['status']='pending'; 

        $data['product_description']=$request->product_description;
        $data['product_quantity']=$request->product_quantity;


        $num = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
        $data['un_id']='EB'.$num;                                                      

       // return response()->json($data);

        $image_one  = $request->image_one;
        $image_two  = $request->image_two;
        $image_three  = $request->image_three;
        $image_four  = $request->image_four;
        $image_five  = $request->image_five;

        if($image_one){ 
            $image_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->save('public/media/product/'.$image_name);
                $data['image_one']='public/media/product/'.$image_name;
        }

        if($image_two){ 
            $image_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->save('public/media/product/'.$image_name);
                $data['image_two']='public/media/product/'.$image_name;
        }

        if($image_three){ 
            $image_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->save('public/media/product/'.$image_name);
                $data['image_three']='public/media/product/'.$image_name;
        }

        if($image_four){ 
            $image_name= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                Image::make($image_four)->save('public/media/product/'.$image_name);
                $data['image_four']='public/media/product/'.$image_name;
        }

        if($image_five){ 
            $image_name= hexdec(uniqid()).'.'.$image_five->getClientOriginalExtension();
                Image::make($image_five)->save('public/media/product/'.$image_name);
                $data['image_five']='public/media/product/'.$image_name;
        }

        $insert = DB::table('products')->insert($data);

        if($insert){
            $notification=array(
                'messege'=>'Product Uploaded Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->route('shop')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Something Wrong !',
                'alert-type'=>'error'
                 );
            return Redirect()->route('shop')->with($notification);   
        }
    }

    public function show($un_id,$product_name){

        $product_name = str_replace("-", " ", $product_name);

        $product = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','categories.url_name','subcategories.subcategory_name')->where('products.un_id',$un_id)
                    ->first();
                    
        $cat_id = $product->category_id;
        $subcat_id = $product->subcategory_id;

        $releted_product = DB::table('products')->where('category_id',$cat_id)->where('subcategory_id',$subcat_id)->get();
        $category = DB::table('categories')->get();

        return view('templates.product.show',compact('product','category','releted_product'));    

    }

    public function categoryProduct($category_name){

        $category_name = str_replace("-", " ", $category_name);

        //return $category_name;

        $category_product = DB::table('categories')->where('url_name',$category_name)->first();

        $countItem = DB::table('categories')->where('url_name',$category_name)->count();  
        
	

	    //return $category_name;	

        //  $id =  $category_product->id;

        if($countItem>0){
            $products = DB::table('products')
            ->join('users','users.id','products.product_owner_id')
            ->join('categories','categories.id','products.category_id')
            ->join('subcategories','subcategories.id','products.subcategory_id') 
            ->where('products.category_id',$category_product->id) 
            ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')
            ->get();


            $count = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->where('products.category_id',$category_product->id) 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')
                    ->count();


        }else{



            $subcategory_product = DB::table('subcategories')->where('url_name',$category_name)->first();
        
            $id =  $subcategory_product->id;

            $products = DB::table('products')
            ->join('users','users.id','products.product_owner_id')
            ->join('categories','categories.id','products.category_id')
            ->join('subcategories','subcategories.id','products.subcategory_id') 
            ->where('products.subcategory_id',$id) 
            ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')
            ->get();


            $count =  DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->where('products.subcategory_id',$id) 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')
                    ->count();
        }


        $others_products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->where('products.status','active') 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                    ->orderBy('id','DESC')->get();


        

        $category = DB::table('categories')->get();
        $tag = 'category'; 

        return view('templates.product.all_products',compact('products','others_products','category','tag','count')); 

    }

    public function shopProduct($shop_name){ 

        $shop_name = str_replace("-", " ", $shop_name);

        $tag = 'shop';  

        $shop_product = DB::table('users')->where('shop_name',$shop_name)->first();
        
        $id =  $shop_product->id;

        $products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->where('products.product_owner_id',$id)->where('products.status','active') 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                    ->orderBy('id','DESC')->get();

        $count = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->where('products.product_owner_id',$id)->where('products.status','active') 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                    ->count();
 
        $shop = DB::table('users')->where('shop_status','approve')->get();

        $singleShop = DB::table('users')->where('shop_name',$shop_name)->first();

        return view('templates.product.all_products',compact('products','shop','tag','count','singleShop'));  
    }

    public function subcategoryProduct($subcategory_name){

        $subcategory_product = DB::table('subcategories')->where('subcategory_name',$subcategory_name)->first();
        
        $id =  $subcategory_product->id;

        $products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->where('products.subcategory_id',$id) 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                    ->get();

        $count = DB::table('products')
                ->join('users','users.id','products.product_owner_id')
                ->join('categories','categories.id','products.category_id')
                ->join('subcategories','subcategories.id','products.subcategory_id') 
                ->where('products.subcategory_id',$id) 
                ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                ->count(); 

        $category = DB::table('categories')->get();

        $tag = 'subcategory ';

        return view('templates.product.all_products',compact('products','category','count','tag')); 
    }



        public function getOneTakaProduct(Request $request){

        // get all the orders field value and make a order for eBipone One Taka Tshirt.

        // for orders table
        $data = array();

        $data['finalStatus'] = 'pending';
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        $data['phone'] = Auth::user()->phone;
        $data['amount'] = '1';
        $data['pay_price'] = '1';
        $data['address'] = Auth::user()->address;
        $data['status'] = 'complete';
        $data['reason'] = 'order_product';
        $data['admin_status'] = 'pending';

        $tran_id = mt_rand(10000000, 99999999);

        $data['transaction_id'] = $tran_id;
        $data['currency'] = 'BDT';

        $data['billing_address'] = Auth::user()->address;

        $data['b_name'] = Auth::user()->name;
        $data['b_email'] = Auth::user()->email;
        $data['b_phone'] = Auth::user()->phone;
        $data['b_postcode'] = '';
        $data['b_thana'] = '';
        $data['b_area'] = '';
        $data['b_district'] = '';

        $data['shipping_address'] = $request->s_address;

        $data['s_name'] = Auth::user()->name;
        $data['s_email'] = Auth::user()->email;
        $data['s_phone'] = Auth::user()->phone;
        $data['s_postcode'] = '';
        $data['s_thana'] = '';
        $data['s_area'] = '';
        $data['s_district'] = $request->s_district;
        $data['warehouse_id'] = null;
        $data['who_orders'] = Auth::user()->id;

        $data['month'] = date('M');

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $data['order_time'] = date("h:i:sa"); 
        $data['order_date'] = $day.'-'.$month.'-'.$year;

        $data['product_ids'] = $request->product_id;
        $data['shop_ids']='1';
        $data['qtys']='1';
        $data['product_sizes']= $request->size;
        $data['product_colors']= $request->color;

        $data['total_product']= '1'; 
        
        $order_insert = DB::table('orders')->insert($data);

        // for order_childs table

            $get_parent_order = DB::table('orders')->where('transaction_id',$tran_id)->first();

                $data = array();

                $data['order_id'] = $get_parent_order->id;
                $data['warehouse_id'] = null;
                $data['shop_id'] = '1';
                $data['product_id'] = $request->product_id;
                $data['qty'] = '1';
                $data['sz'] = $request->size;
                $data['clr'] = $request->color; 
                $data['status'] = '0';

            $order_child_insert = DB::table('order_childs')->insert($data);

            $getAuthUser = DB::table('users')->where('id',Auth::user()->id)->first();
            $minusOneTaka = $getAuthUser->user_balance-1;

            $update_balance = DB::table('users')->where('id',Auth::user()->id)->update(['got_one_taka_tshirt'=>'1','user_balance'=>$minusOneTaka]); 

            
            if($order_child_insert){
                $notification=array(
                    'messege'=>'Order Place Successfully!',
                    'alert-type'=>'info'
                     );
                return Redirect()->back()->with($notification); 
            }else{
                $notification=array(
                    'messege'=>'Something Wrong !',
                    'alert-type'=>'error'
                     );
                return Redirect()->back()->with($notification); 
            }
    }
}
 