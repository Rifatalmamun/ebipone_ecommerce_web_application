<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use Image;
use Response;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function printPage($id){

        $invoice_data = DB::table('order_childs')
                        ->join('users','users.id','order_childs.shop_id')
                        ->join('orders','orders.id','order_childs.order_id')
                        ->join('products','products.id','order_childs.product_id')
                        ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.who_orders','orders.transaction_id','orders.billing_address','orders.b_name','orders.b_email','orders.b_phone','orders.b_postcode','orders.b_thana','orders.b_area','orders.b_district','orders.shipping_address','orders.s_name','orders.s_email','orders.s_phone','orders.s_postcode','orders.s_thana','orders.s_area','orders.s_district','orders.total_product','orders.order_date','orders.order_time','orders.pay_price','products.product_name','products.image_one','products.product_code','products.un_id')
                        ->where('order_childs.id',$id)->first();

        return view('templates.warehouse.print_page',compact('invoice_data'));
    }


    public function index()
    {
        $warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        // count  warehouse upcomming product, received product, customer delivery pending, complete order.

        $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();


        $count_upcomming_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->select('order_childs.*','orders.status','orders.reason')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->count();

        $count_received_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->count();

        $count_customer_delivery_pending_product = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','0')
                ->where('order_childs.status','0')
                ->count();

        $count_complete_delivery = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('orders.status','complete')
                ->where('orders.reason','order_product')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isShopReceived','1')
                ->where('order_childs.isShopSend','1')
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','1')
                ->where('order_childs.status','1')
                ->count();
        
        return view('templates.warehouse.account',compact('warehouse','count_upcomming_product','count_received_product','count_customer_delivery_pending_product','count_complete_delivery')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'w_name' => 'required', 'string', 'w_name','min:2', 'max:180', 'unique:warehouses',
            'phone' => 'required | numeric | digits:11 | unique:warehouses',
            "logo"  => "dimensions:max_width=512,max_height=512",
            "banner"  => "dimensions:max_width=1110,max_height=512",
        ]);

        $w_slug = str_replace("-", "",$request->w_name);
        $w_slug = str_replace("'", "",$w_slug);
        $w_slug = str_replace("/", "",$w_slug);
        $w_slug = str_replace(",", "",$w_slug);

        $w_slug = strtolower($w_slug); // to lower case 

        $data=array();

        $data['w_name']=$request->w_name;
        $data['user_id']=Auth::user()->id; 
        $data['w_slug']=$w_slug;
        $data['logo']=$request->logo;
        $data['banner']=$request->banner;
    	$data['phone']=$request->phone;
        $data['w_trade_no']=$request->w_trade_no; 
        
        $data['w_location']=$request->w_location;
        $data['w_district']=$request->w_district;

        // $shop_id = rand(10000000,99999999);

        // $data['shop_id'] = $shop_id;

        
        $w_logo  = $request->logo;
        $w_banner = $request->banner;

       
        $w_trade_picture  = $request->w_trade_picture;


        
        //return response()->json($data);

        if($w_logo){ 
            $image_name= hexdec(uniqid()).'.'.$w_logo->getClientOriginalExtension();
                Image::make($w_logo)->resize(150,150)->save('public/media/w_logo/'.$image_name);
                $data['logo']='public/media/w_logo/'.$image_name;
        }

        if($w_banner){ 
            $image_name= hexdec(uniqid()).'.'.$w_banner->getClientOriginalExtension();
                Image::make($w_banner)->resize(1110,150)->save('public/media/w_banner/'.$image_name); 
                $data['banner']='public/media/w_banner/'.$image_name;
        }

        if($w_trade_picture){ 
            $image_name= hexdec(uniqid()).'.'.$w_trade_picture->getClientOriginalExtension();
                Image::make($w_trade_picture)->resize(500,500)->save('public/media/w_trade/'.$image_name);
                $data['w_trade_picture']='public/media/w_trade/'.$image_name;
        }



        //return response()->json($data);                                     

        if(Auth::user()->isWarehouse!=1){
            $insert = DB::table('warehouses')->insert($data);
            $changeIsWarehouse = DB::table('users')->where('id',Auth::user()->id)->update(['isWarehouse'=>1]);

            if($insert){
                $notification=array(
                    'messege'=>'Warehouse request applied !',
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
        }else{
            $notification=array(
                'messege'=>'You are already requested for warehouse!',
                'alert-type'=>'warning'
                 );
            return Redirect()->route('home')->with($notification); 
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_upcomming_product()
    {
        $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        $order = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->get();

            //return response()->json($order);
        
        $count = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','0')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->count();
        
        return view('templates.warehouse.upcomming_product',compact('order','count'));
    }

    public function warehouse_receive(Request $request){

        $id = $request->order_child_id;

        $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $date = $day.'-'.$month.'-'.$year; 
        $time = date("h:i:sa"); 
 
        $update = DB::table('order_childs')->where('id',$id)->update(['isWarehouseReceived'=>'1','prd'=>$date,'prt'=>$time]);  

        // NOW ADD PRODUCT VENDOR PRICE TO SHOP ACCOUNT BALANCE

        $get_order_child = DB::table('order_childs')->where('id',$id)->first(); // get order child

        $get_product = DB::table('products')->where('id',$get_order_child->product_id)->first();

        $shop = DB::table('users')->where('id',$get_order_child->shop_id)->first();
        $previous_total_earning = $shop->total_earning;
        $previous_shop_balance =  $shop->shop_balance;


        $product_money = $get_order_child->vendor_price_for_this * $get_order_child->qty;

        $new_total_earning =  $previous_total_earning + $product_money;
        $new_shop_balance  =  $previous_shop_balance + $product_money;


        DB::table('users')->where('id',$get_order_child->shop_id)->update(['total_earning'=>$new_total_earning,'shop_balance'=>$new_shop_balance]);


        if($update){
            $notification=array(
                'messege'=>'Warehouse Received Successfully !',
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
                                                                                                                                                                                    
    public function show_receive_product(){

        $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        $order = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->get();

            //return response()->json($order);
        
        $count = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','0')
                ->where('order_childs.isCustomerReceived','0')
                ->count();
        
        return view('templates.warehouse.received_product',compact('order','count'));
    }

    public function viewOrder($id){

        

        $order_child = DB::table('order_childs')->where('id',$id)->first(); 
        
        //return response()->json($order_child);
        $order = DB::table('orders')->where('id',$order_child->order_id)->first();
    
        $product = DB::table('products')
        ->join('users','users.id','products.product_owner_id')
        ->select('products.*','users.name','users.shop_name','users.phone')
        ->where('products.id',$order_child->product_id)->first();

        //return response()->json($product);
         
        return view('templates.warehouse.order_details',compact('order','order_child','product'));
    }

    public function warehouse_send_to_customer(Request $request){

        $id = $request->order_child_id;

        $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $date = $day.'-'.$month.'-'.$year; 
        $time = date("h:i:sa"); 

        $update = DB::table('order_childs')->where('id',$id)->update(['isWarehouseSend'=>'1','psd'=>$date,'pst'=>$time]); 

        if($update){
            $notification=array(
                'messege'=>'Warehouse Send Product To Customer Successfully !',
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

    public function show_delivery_pending(){
        
        $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        $order = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','0')
                ->get();

            //return response()->json($order);
        
        $count = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','0')
                ->count();
        
        return view('templates.warehouse.delivered_to_customer',compact('order','count'));
        
    }

    public function order_complete($id){

        $get_order_child = DB::table('order_childs')->where('id',$id)->first();

        $warehouse_id = $get_order_child->warehouse_id;

        //return $warehouse_id;

            //return response()->json($get_order_child);

        $get_order_complete_product = DB::table('products')->where('id',$get_order_child->product_id)->first(); 
        $get_order_complete_warehosue = DB::table('warehouses')->where('id',$warehouse_id)->first(); // get warehouse
        $get_profit_manages = DB::table('profit_manages')->where('id','1')->first(); // get profit_manages_table_first row.

        // $sll_cost = ($get_order_complete_product->present_price * 2.5)/100;
            $sll_cost = (($get_order_child->selling_price_for_this*$get_order_child->qty) * 2.5)/100; 

        // $profit = $get_order_complete_product->present_price - ($get_order_complete_product->buying_price + $sll_cost); 
            $profit = ($get_order_child->selling_price_for_this * $get_order_child->qty) - (($get_order_child->vendor_price_for_this * $get_order_child->qty) + $sll_cost); 


        # ********************************************Start:  Qty ta dite hobe **************************************************



        # ********************************************End:  Qty ta dite hobe **************************************************
                                                                                                                   
        // now get warehouse and system parcentage from database 

        $percentage = DB::table('profit_manages')->where('id',1)->first();

        $total_profit_part =  $profit; // total profit add for single product.
        $warehouse_part =  ( ($percentage->warehouse_percent) * ($profit) ) / 100; // warehouse prfit for single product.
        $system_part =  ( ($percentage->system_percent) * ($profit) ) / 100;      //  system profit for single product.
        $call_center_part =  ( ($percentage->call_center_percent) * ($profit) ) / 100; //  call center profit for single product.
        $orjon_part =  ( ($percentage->orjon_percent) * ($profit) ) / 100; //  orjon_percent profit for single product.
        $marketing_part =  ( ($percentage->marketing_percent) * ($profit) ) / 100; //  marketing_percent profit for single product.


        // return gettype($call_center_part);
        // return $call_center_part;

            if($get_order_complete_warehosue && $get_profit_manages){

                

                // Add previous data with current single product profit value and update profit_manages table

                                        // ****** DON'T TOUCH THIS CODE SECTION, VERY SENSITIVE *******

                $set_total_profit = $get_profit_manages->total_profit + $total_profit_part;
                $set_pickup_profit = $get_profit_manages->pickup_profit + $warehouse_part;
                $set_system_profit = $get_profit_manages->system_profit + $system_part;
                $set_orjon_profit = $get_profit_manages->orjon_profit + $orjon_part;
                $set_call_center_profit = $get_profit_manages->call_center_profit + $call_center_part;
                $set_marketing_profit = $get_profit_manages->marketing_profit + $marketing_part;

               // return $set_marketing_profit;

                DB::table('profit_manages')->where('id','1')->update(['total_profit'=>$set_total_profit,'pickup_profit'=>$set_pickup_profit,'system_profit'=>$set_system_profit,'orjon_profit'=> $set_orjon_profit,'call_center_profit'=>$set_call_center_profit,'marketing_profit'=>$set_marketing_profit]);

                // tatal profit add to profit_manages table... 
                $w_total_earning = $get_order_complete_warehosue->w_total_earning + $warehouse_part; // warehouse total earning
                $w_main_balance = $get_order_complete_warehosue->w_main_balance + $warehouse_part;   // warehouse main balance

                DB::table('warehouses')->where('id',$warehouse_id)->update(['w_main_balance'=>$w_main_balance,'w_total_earning'=>$w_total_earning]);

            }

            $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $date = $day.'-'.$month.'-'.$year; 
        $time = date("h:i:sa"); 

        $make_single_product_delivered = DB::table('order_childs')->where('id',$id)->update(['isCustomerReceived'=>'1','status'=>'1','crd'=>$date,'crt'=>$time]);



		// Now, Check all order ( orders_childs ) of a Orders table item fully completed or not.

            $get_parent_order = DB::table('orders')->where('id',$get_order_child->order_id)->first();

            $get_all_child_order = DB::table('order_childs')->where('order_id',$get_parent_order->id)->get();

            // Now, Loop all the order_childs item and check completed or not? 

            $fullyCompleted = 0;
            $partialyCompleted = 0;
            $pending = 1;

            $countComplete = 0;
            $countNotComplete = 0;

            foreach ($get_all_child_order as $item) {
                
                $check_completed = DB::table('order_childs')->where('id',$item->id)->first();

                if($check_completed->status=='complete'){
                    $countComplete += 1;
                }else{
                    $countNotComplete += 1;
                }

                if($countNotComplete==0){
                    DB::table('orders')->where('id',$get_parent_order->id)->update(['finalStatus'=>'completed']);
                }

                if($countComplete==0){
                    DB::table('orders')->where('id',$get_parent_order->id)->update(['finalStatus'=>'pending']);
                }

                if($countComplete>0 && $countNotComplete>0){
                    DB::table('orders')->where('id',$get_parent_order->id)->update(['finalStatus'=>'partially_completed']);
                }
            }


        if($make_single_product_delivered){
            $notification=array(
                'messege'=>'Product received by customer and payment addred to pickup point account Successfully !',
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

    public function show_order_complete(){


        $auth_warehouse = DB::table('warehouses')->where('user_id',Auth::user()->id)->first();

        $order = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','1')
                ->get();

            //return response()->json($order);
        
        $count = DB::table('order_childs')
                ->join('users','users.id','order_childs.shop_id')
                ->join('orders','orders.id','order_childs.order_id')
                ->join('products','products.id','order_childs.product_id')
                ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.total_product','orders.order_date','products.product_name','products.image_one','products.product_code','products.un_id')
                ->where('order_childs.warehouse_id',$auth_warehouse->id)
                ->where('order_childs.isWarehouseReceived','1')
                ->where('order_childs.isWarehouseSend','1')
                ->where('order_childs.isCustomerReceived','1')
                ->count();
        
        return view('templates.warehouse.complete_order',compact('order','count'));

    }

    public function order_complete_invoice($id){

        $invoice_data = DB::table('order_childs')
                        ->join('users','users.id','order_childs.shop_id')
                        ->join('orders','orders.id','order_childs.order_id')
                        ->join('products','products.id','order_childs.product_id')
                        ->select('order_childs.*','users.shop_name','users.shop_phone','users.name','orders.transaction_id','orders.billing_address','orders.b_name','orders.b_email','orders.b_phone','orders.b_postcode','orders.b_thana','orders.b_area','orders.b_district','orders.shipping_address','orders.s_name','orders.s_email','orders.s_phone','orders.s_postcode','orders.s_thana','orders.s_area','orders.s_district','orders.total_product','orders.order_date','orders.pay_price','products.product_name','products.image_one','products.product_code','products.un_id')
                        ->where('order_childs.id',$id)->first();

                       // return response()->json($invoice_data);

        
        return view('templates.warehouse.invoice_order_complete',compact('invoice_data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $w = DB::table('warehouses')->where('id',$id)->first();
            
            if($w){
                return view('templates.warehouse.edit',compact('w'));
            }else{
                return redirect()->route('welcome');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'w_name' => 'required', 'string', 'w_name','min:2', 'max:180', 'unique:warehouses',
            'phone' => 'required | numeric | digits:11',
            "logo"  => "dimensions:max_width=512,max_height=512",
            "banner"  => "dimensions:max_width=1110,max_height=512",
        ]);

        $w_slug = str_replace("-", "",$request->w_name);
        $w_slug = str_replace("'", "",$w_slug);
        $w_slug = str_replace("/", "",$w_slug);
        $w_slug = str_replace(",", "",$w_slug);

        $w_slug = strtolower($w_slug); // to lower case 

        $data=array();

        $data['w_name']= $request->w_name;
        $data['user_id']= $request->user_id; 
        $data['w_slug']= $w_slug;
    	$data['phone']= $request->phone;
        $data['w_trade_no']= $request->w_trade_no; 

        $data['w_location']= $request->w_location;
        $data['w_district']= $request->w_district; 
          
        $w_logo  = $request->logo;
        $w_banner = $request->banner;
        $w_trade_picture  = $request->w_trade_picture;

        $old_logo  = $request->old_logo;
        $old_banner = $request->old_banner;
        $old_w_trade_picture  = $request->old_w_trade_picture;

        //return response()->json($data);

        if($w_logo){ 

            if($old_logo){
                unlink($old_logo);
            }

            $image_name= hexdec(uniqid()).'.'.$w_logo->getClientOriginalExtension();
                Image::make($w_logo)->resize(150,150)->save('public/media/w_logo/'.$image_name);
                $data['logo']='public/media/w_logo/'.$image_name;
        }

        if($w_banner){ 

            if($old_banner){
                unlink($old_banner);
            }

            $image_name= hexdec(uniqid()).'.'.$w_banner->getClientOriginalExtension();
                Image::make($w_banner)->resize(1110,150)->save('public/media/w_banner/'.$image_name); 
                $data['banner']='public/media/w_banner/'.$image_name;
        }

        if($w_trade_picture){ 

            if($old_w_trade_picture){
                unlink($old_w_trade_picture);
            }

            $image_name= hexdec(uniqid()).'.'.$w_trade_picture->getClientOriginalExtension();
                Image::make($w_trade_picture)->resize(500,500)->save('public/media/w_trade/'.$image_name);
                $data['w_trade_picture']='public/media/w_trade/'.$image_name;
        }

        //return response()->json($data); 
        
        
        $update = DB::table('warehouses')->where('user_id',$request->user_id)->update($data);

            if($update){
                $notification=array(
                    'messege'=>'Warehouse updated !',
                    'alert-type'=>'info'
                     );
                return Redirect()->route('home')->with($notification); 
            }else{
                $notification=array(
                    'messege'=>'No Change !',
                    'alert-type'=>'info'
                     );
                return Redirect()->route('home')->with($notification);   
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewOrderJson($id){

        $oc=DB::table('order_childs')->where('id',$id)->first();

        return response::json(array(
                'oc' => $oc,
         ));

    }

    public function viewOrderJsonSecond($id){

        $oc=DB::table('order_childs')->where('id',$id)->first();

        return response::json(array(
                'octwo' => $oc,
         ));
    }
}
