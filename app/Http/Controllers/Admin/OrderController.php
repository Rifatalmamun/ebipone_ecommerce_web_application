<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class OrderController extends Controller
{


    public function all(){

        $orders = DB::table('orders')->where('orders.status','complete')
        ->join('users','users.id','orders.who_orders')
        ->select('orders.*','users.name')
        ->get();   

        $pageTag  = 'All Orders'; 

        return view('admin.order.all',compact('orders','pageTag'));                                 
    }


    public function newOrder(){

        $orders = DB::table('order_childs')
        ->join('orders','orders.id','order_childs.order_id')
        ->join('products','products.id','order_childs.product_id')
        ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
        ->where('orders.status','complete')
        ->where('order_childs.isShopSend','0')
        ->where('order_childs.isWarehouseReceived','0')
        ->where('order_childs.isWarehouseSend','0')
        ->where('order_childs.isCustomerReceived','0')
        ->where('order_childs.status','0')->get();

        $pageTag = "List of New Order Single Products";

        return view('Admin.order.all',compact('orders','pageTag'));             

    }

    public function shopSendToPickupPointOrder(){
        $orders = DB::table('order_childs')
        ->join('orders','orders.id','order_childs.order_id')
        ->join('products','products.id','order_childs.product_id')
        ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
        ->where('orders.status','complete')
        ->where('order_childs.isShopSend','1')
        ->where('order_childs.isWarehouseReceived','0')
        ->where('order_childs.isWarehouseSend','0')
        ->where('order_childs.isCustomerReceived','0')
        ->where('order_childs.status','0')->get();

        $pageTag = "List of Vendor Send to Pickup Point Products";

        return view('Admin.order.all',compact('orders','pageTag'));  
    }

    public function pickupPointReceivedOrder(){

        $orders = DB::table('order_childs')
        ->join('orders','orders.id','order_childs.order_id')
        ->join('products','products.id','order_childs.product_id')
        ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
        ->where('orders.status','complete')
        ->where('order_childs.isShopSend','1')
        ->where('order_childs.isWarehouseReceived','1')
        ->where('order_childs.isWarehouseSend','0')
        ->where('order_childs.isCustomerReceived','0')
        ->where('order_childs.status','0')->get();

        $pageTag = "List of Pickup Point Received Product";

        return view('Admin.order.all',compact('orders','pageTag')); 

    }

    public function pickupPointSendToCustomerOrder(){

        $orders = DB::table('order_childs')
        ->join('orders','orders.id','order_childs.order_id')
        ->join('products','products.id','order_childs.product_id')
        ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
        ->where('orders.status','complete')
        ->where('order_childs.isShopSend','1')
        ->where('order_childs.isWarehouseReceived','1')
        ->where('order_childs.isWarehouseSend','1')
        ->where('order_childs.isCustomerReceived','0')
        ->where('order_childs.status','0')->get();

        $pageTag = "List of Pickup Point Send to Customer Product";

        return view('Admin.order.all',compact('orders','pageTag')); 

    }

    public function customerDeliveryPendingOrder(){


        $orders = DB::table('order_childs')
        ->join('orders','orders.id','order_childs.order_id')
        ->join('products','products.id','order_childs.product_id')
        ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
        ->where('orders.status','complete')
        ->where('order_childs.isShopSend','1')
        ->where('order_childs.isWarehouseReceived','1')
        ->where('order_childs.isWarehouseSend','1')
        ->where('order_childs.isCustomerReceived','0')
        ->where('order_childs.status','0')->get();

        $pageTag = "List of Customer Delivery Pending Product";

        return view('Admin.order.all',compact('orders','pageTag')); 


    }

    public function customerReceivedOrder(){

        $orders = DB::table('order_childs')
        ->join('orders','orders.id','order_childs.order_id')
        ->join('products','products.id','order_childs.product_id')
        ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
        ->where('orders.status','complete')
        ->where('order_childs.isShopSend','1')
        ->where('order_childs.isWarehouseReceived','1')
        ->where('order_childs.isWarehouseSend','1')
        ->where('order_childs.isCustomerReceived','1')
        ->where('order_childs.status','1')
        ->get();

        $pageTag = "List of Customer Received Product List";

        return view('Admin.order.all',compact('orders','pageTag')); 
    }

    public function fullCompleteOrder(){

        $orders = DB::table('orders')->where('finalStatus','completed')->get();

        return 'we are working.......';

        return response()->json($orders);

        // $orders = DB::table('order_childs')
        //             ->join('orders','orders.id','order_childs.order_id')
        //             ->join('products','products.id','order_childs.product_id')
        //             ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
        //             ->where('orders.status','complete')
        //             ->where('order_childs.isShopSend','1')
        //             ->where('order_childs.isWarehouseReceived','1')
        //             ->where('order_childs.isWarehouseSend','1')
        //             ->where('order_childs.isCustomerReceived','1')
        //             ->where('order_childs.status','1')
        //             ->where('orders.finalStatus','partially_completed')->get();

        $pageTag = "List of Customer Received Product || Partialy Completed Order";

        return view('Admin.order.all',compact('orders','pageTag')); 
    }





    public function orderDetails($id){

        $order_child = DB::table('order_childs')->where('id',$id)->first();  
        
        $product = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->select('products.*','users.name','users.shop_name','users.phone')
                    ->where('products.id',$order_child->product_id)->first();

        return view('Admin.order.details',compact('order_child','product'));                                    
    }

    public function singleOrderDetails($id){

        $upload_money_details = DB::table('orders')->where('id',$id)->first();

        $user = DB::table('users')->where('id',$upload_money_details->who_orders)->first();

        return view('Admin.order.upload_money_details',compact('upload_money_details','user'));            

    }

    public function orderParentDetails($id){

        $order_parent = DB::table('orders')->where('id',$id)->first();

        $user = DB::table('users')->where('id',$order_parent->who_orders)->first();

        $order_child = DB::table('order_childs')
                    ->join('orders','orders.id','order_childs.order_id')
                    ->join('products','products.id','order_childs.product_id')
                    ->select('order_childs.*','orders.transaction_id','orders.s_district','orders.shipping_address','products.un_id','products.product_name')
                    ->where('orders.status','complete')
                    ->where('order_childs.order_id',$id)
                    ->get();

        return view('Admin.order.order_parent_details',compact('order_parent','user','order_child'));

    }

    public function setPickupPoint(Request $request){ 

        $check_vendor_send_or_not_to_pickup_point = DB::table('order_childs')->where('id',$request->id)->first();

            //return 'ok';



        if($check_vendor_send_or_not_to_pickup_point->isShopSend=='1'){

            $notification=array(
                'messege'=>'Vendor Owner Already Send This Product to '.$check_vendor_send_or_not_to_pickup_point->w_district.'/'.$check_vendor_send_or_not_to_pickup_point->w_name.' Pickup Point.', 
                 'alert-type'=>'error'
           );

           return Redirect()->back()->with($notification);
        }

        if($request->id && $request->warehouse_id){

            $set_picktup_point = DB::table('order_childs')->where('id',$request->id)->update(['warehouse_id'=>$request->warehouse_id]);

            if($set_picktup_point){
                $notification=array(
                    'messege'=>'Pickup Point Set Successfully!', 
                     'alert-type'=>'info'
               );
            }else{
                $notification=array(
                    'messege'=>'Opps! Something wrong!', 
                     'alert-type'=>'error'
               );
            }

        }else{

            $notification=array(
                'messege'=>'Opps! Something wrong!', 
                 'alert-type'=>'error'
           );
        }

     return Redirect()->back()->with($notification);

    }

    public function pending(){

        $orders = DB::table('orders')->where('orders.status','complete')->where('orders.admin_status','pending')
        ->join('users','users.id','orders.who_orders')
        ->select('orders.*','users.name')
        ->get();

        $pageTag  = 'Pending Orders'; 

        return view('admin.order.pending',compact('orders','pageTag'));                                 
    }

    public function delivery(){

        $orders = DB::table('orders')->where('orders.status','complete')->where('orders.admin_status','on the way')
        ->join('users','users.id','orders.who_orders')
        ->select('orders.*','users.name')
        ->get();

        $pageTag  = 'Shipping '; 

        return view('admin.order.delivery',compact('orders','pageTag'));                                 
    }

    public function delivered(){

        $orders = DB::table('orders')->where('orders.status','complete')->where('orders.admin_status','delivery complete')
        ->join('users','users.id','orders.who_orders')
        ->select('orders.*','users.name')
        ->get();

        $pageTag  = 'Delivery complete'; 

        return view('admin.order.delivered',compact('orders','pageTag'));                                 
    }

    public function show($id){

        $order = DB::table('orders')->where('orders.id',$id) 
        ->join('users','users.id','orders.who_orders')          
        ->select('orders.*','users.name')
        ->first();       
        
        $id=$order->product_ids;
        $ids = explode (",", $id);

        $qty=$order->qtys;
        $q = explode (",", $qty);


        $size=$order->product_sizes;
        $s = explode (",", $size); 

        $color=$order->product_colors;
        $c = explode (",", $color);

        $loop_count = count($s);        
        

        return view('admin.order.show',compact('order','loop_count','ids','q','s','c'));                                                                    

    }

    public function deliveryProduct($id){

        $delivery = DB::table('orders')->where('id',$id)->update(['admin_status'=>'on the way']);

        $notification=array(
            'messege'=>'Product Shipping time start...', 
             'alert-type'=>'info'
       );

     return Redirect()->back()->with($notification);
        
    }
    
    public function deliveredProduct($id){

        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $delivery = DB::table('orders')->where('id',$id)->update(['admin_status'=>'delivery complete','delivery_date'=>$day.'-'.$month.'-'.$year,'delivery_time'=>date("h:i:sa")]); 

        $notification=array(
            'messege'=>'Product Delivery Complete.', 
             'alert-type'=>'info'
       );

       $order = DB::table('orders')->where('id',$id)->first();   
       
       $cashbackAmount = 0;

       $id=$order->product_ids;
       $ids = explode (",", $id);   

       for($i=0;$i<count($ids);$i++){

        $p = DB::table('products')->where('id',$ids[$i])->first();
        $cashbackAmount = $cashbackAmount + $p->cashback;                              

       }

       DB::table('users')->where('id',$order->who_orders)->update(['user_cashback'=>$cashbackAmount]);

        return Redirect()->back()->with($notification);
    }



    public function orderTransactionIndex(){

        $order_transaction_list = DB::table('orders')->where('status','complete')->where('reason','order_product')->get();
        
        $flag = 'order';
        $title = 'Order Transaction List';
        $sub_title = 'Order Package';

        return view('Admin.order.transaction_list',compact('order_transaction_list','flag','title','sub_title')); 

    }

    public function uploadTransactionIndex(){

        $upload_transaction_list = DB::table('orders')->where('status','complete')->where('reason','money_upload')->get(); 
        
        $flag = 'upload';
        $title = 'Upload Transaction List';
        $sub_title = 'Money Upload';

        return view('Admin.order.transaction_list',compact('upload_transaction_list','flag','title','sub_title')); 

    }

    
}
