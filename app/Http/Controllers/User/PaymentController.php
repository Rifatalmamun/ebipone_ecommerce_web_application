<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cart;
use DB;
use Response;
use Auth;
use Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

            public function proceed(){

		$flag = 0;

        # Check out korar age Cart ta check kore , max buy quantitir besi product golo k delete kore dei...   


        if(Auth::user()){

            foreach (Cart::content() as $item){

                $product=DB::table('products')->where('id',$item->id)->first();

                # cart a add korar age dekhi je, product tar maximum buy quantity koto?
                $max_buy_quantity = $product->max_buy;

                    if(Auth::user()){

                        #ebar dekhi je Auth user koto bar kinse product ta
                        $order_child_count = DB::table('order_childs')
                                            ->join('orders','orders.id','order_childs.order_id')
                                            ->where('orders.status','complete')
                                            ->where('orders.who_orders',Auth::user()->id)
                                            ->where('order_childs.product_id',$product->id)->sum('order_childs.qty');
                    
                            if(Auth::user() && $max_buy_quantity!='0' ){ // $max_buy_quantity !0 mane, ei product gulur buy limit ache.

                                if($order_child_count>0 && $order_child_count>=$max_buy_quantity){

                                    if(Cart::get($item->rowId)){
                                            Cart::remove($item->rowId);

                                            $flag = 1;
                                     }

                                    
                                }

                                # now check kori je, cart a koto bar add korese? jodi oto bar add kore  max er besi hoy tahole remove korbo product

                                if( ($item->qty + $order_child_count) > $max_buy_quantity ){

                                    if($flag==0){
                                        if($item->rowId){
                                            if(Cart::get($item->rowId)){
                                                Cart::remove($item->rowId);
                                            }
                                        }
                                    }
                                }
                            }
                    }
            }
         }



        return view('templates.payment.checkout');
    }
 

    public function paymentData(Request $request){

        $data = array();

        // WHO ORDERS?  DATE & TIME 
        $data['who_orders']=Auth::user()->id; 

        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $data['order_time'] = date("h:i:sa"); 
        $data['order_date'] = $day.'-'.$month.'-'.$year; 

        //BASIC
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        $data['phone'] = Auth::user()->phone;
        $data['amount'] = Cart::total();
        $data['address'] = Auth::user()->address;
        $data['currency'] = 'BDT';

        // BILLING ADDRESS
        $data['billing_address'] = $request->billing_address; 
        $data['b_name'] = $request->b_name;
        $data['b_email'] = $request->b_email;
        $data['b_phone'] =$request->b_phone;
        $data['b_postcode'] =$request->b_postcode;
        $data['b_thana'] =$request->b_thana;
        $data['b_area'] =$request->b_area;
        $data['b_district'] =$request->b_district;

        // SHIPPING ADDRESS
        
        $data['shipping_address'] = $request->shipping_address; 
        $data['s_name'] = $request->s_name;
        $data['s_email'] = $request->s_email;
        $data['s_phone'] =$request->s_phone;
        $data['s_postcode'] =$request->s_postcode;
        $data['s_thana'] =$request->s_thana;
        $data['s_area'] =$request->s_area;
        $data['s_district'] =$request->s_district;


        if($request->same=='same'){
            $data['shipping_address'] = $request->billing_address; 
            $data['s_name'] = $request->b_name;
            $data['s_email'] = $request->b_email;
            $data['s_phone'] =$request->b_phone;
            $data['s_postcode'] =$request->b_postcode;
            $data['s_thana'] =$request->b_thana;
            $data['s_area'] =$request->b_area;
            $data['s_district'] =$request->b_district;
        }

        $p_ids='';
        $shop_ids='';
        $p_qtys='';
        $p_colors='';
        $p_sizes='';

        $b_string=''; // for buy string.
        $p_string=''; // for pay string.
        
        foreach (Cart::content() as $p) {

        // for buy string 
            $product = DB::table('products')->where('id',$p->id)->first();
            if($b_string==''){
                $b_string = $product->buying_price;               // product vendor price ta nilam 
            }
            else{
                $b_string = $b_string.','.$product->buying_price; // product vendor price ta nilam
            }
        // for pay string 
            if($p_string==''){
                $p_string = $product->present_price;               // product_price ta nilam 
            }
            else{
                $p_string = $p_string.','.$product->present_price; // product_price ta nilam
            }
        // for products id
            if($p_ids==''){
                $p_ids = $p->id;
            }
            else{
                $p_ids = $p_ids.','.$p->id;
            }
        // for shops id

            if($shop_ids==''){
                $product = DB::table('products')->where('id',$p->id)->first();
                $shop_ids = $product->product_owner_id;
            }
            else{
                $shop_ids = $shop_ids.','.$product->product_owner_id;
            }
        // for quantity 

            if($p_qtys==''){
                $p_qtys = $p->qty;
            }
            else{
                $p_qtys = $p_qtys.','.$p->qty;
            }
        // for color 

            if($p_colors==''){
                $p_colors = $p->options->color;
            }
            else{
                $p_colors = $p_colors.','.$p->options->color;
            }
        // for size 

            if($p_sizes==''){
                $p_sizes = $p->options->size;
            }
            else{
                $p_sizes = $p_sizes.','.$p->options->size;
            }
        }

        $data['product_ids'] = $p_ids; 
        $data['shop_ids'] = $shop_ids; 
        $data['qtys'] = $p_qtys; 
        $data['product_colors'] = $p_colors; 
        $data['product_sizes'] = $p_sizes;

        $data['buy_string'] = $b_string; 
        $data['pay_string'] = $p_string; 

        $data['reason'] ='order_product';

        // create a session

        $request->session()->put('orderdatasession', $data);                                                                                                      

        return view('templates.payment.invoice',compact('data'));  

    }

    public function invoice($transaction_id){

        $invoice_data = DB::table('orders')->where('transaction_id',$transaction_id)->first();

        
        return view('templates.payment.order_invoice',compact('invoice_data')); 
    }

    public function checkSession( Request $request ){

        return $request->session()->get('orderdatasession');
    }

    public function clearSession( Request $request ){


        $request->session()->forget('orderdatasession');
    }


      public function payWithEbiponeBalance(Request $request){
	
        $data = array();

        $data['pay_method'] = 'ebp';

        $total_get_cashback = $request->total_get_cashback; // ei cashback ta pabe
        $total_use_cashback = $request->total_use_cashback; // ei cashback ta use korte parbe
        $total_use_giftbalance = $request->total_use_giftbalance; // ei gift balance ta use korte parbe

        // kon method a pay korbe eta age check koro 1= main balance 2= main+cashback balance 3= main+gift balance.

        if ($request->pay_with_ebipone_balance=='1') {

            # Main Balance diye pay korbe customer.
            
            $amount = $request->amount; # ei amount pay korte hobe.
            # akhon check kori je ei amount ta customer er main balance a ache ki na.
            if (Auth::user()->user_balance<$amount) {
                # akhon jodi dekhi je main balance ta kom ache tokhon customer k alert dibo je main balance kom.

                $notification=array(
                    'messege'=>'Dear Customer, Your Main Balance is Insufficient to pay ৳ '.$amount,
                    'alert-type'=>'error'
                    );
                return redirect()->route('welcome')->with($notification);

            } else {
                # else a asa mane customer er main balance a pay amount ta ache
                # akhon first a customer er main balance theke pay amount ta kete nei.

                $current_user_balance = (Auth::user()->user_balance) - (Cart::total());

                # ebar dekhi je customer order korle koto cashback pabe

                
		$add_cashback = Auth::user()->user_cashback + $total_get_cashback ;
		
		//return $add_cashback.' ---------- '.Auth::user()->user_cashback;
                
                # ebar customer er user_balance & cashback balance a update kori

                $data['amount'] = Cart::total();

                $update = DB::table('users')->where('id',Auth::user()->id)->update(['user_balance'=>$current_user_balance,'user_cashback'=>$add_cashback]);

                $data['pay_method'] = 'ebp_mb';

                //return $data['amount'];

            }
        }elseif($request->pay_with_ebipone_balance=='2') {
          # Main Balance + Cashback Balance diye pay korbe customer.
          
          # First a dekhi je, cashback jeta use korte parbe sei cashback amount ta tar cashback balance a ache ki na?
          # Second a dekhi je, (pay_amount - cashback balance) ei amount ta main balance a ache ki na?


            

          if(Auth::user()->user_cashback < $total_use_cashback){
            $notification=array(
                'messege'=>'Dear Customer, Your Cashback Balance is insufficient to use',
                'alert-type'=>'error'
                );
            return redirect()->route('welcome')->with($notification);

          }elseif( (Cart::total() - $total_use_cashback) > Auth::user()->user_balance ){

            $notification=array(
                'messege'=>'Dear Customer, You need to upload money!',
                'alert-type'=>'error'
                );
            return redirect()->route('welcome')->with($notification);

          }
          else{
              # ekahne asa mane main + cashback mile order kora jabe.

              $new_get_cashback = Auth::user()->user_cashback + $total_get_cashback; // ei cashback ta plus hobe

              $new_use_cashback = Auth::user()->user_cashback - $total_use_cashback; // ei cashback ta minus hobe

	      $latest_user_cashback = Auth::user()->user_cashback + ($total_get_cashback - $total_use_cashback); 

              $new_user_balance = Auth::user()->user_balance - (Cart::total() - $total_use_cashback);


            $update = DB::table('users')->where('id',Auth::user()->id)->update(['user_balance'=>$new_user_balance,'user_cashback'=>$latest_user_cashback]);

            $data['amount'] = Cart::total() - ($total_use_cashback);

            $data['pay_method'] = 'ebp_mbcbb';
          }
          
        }elseif($request->pay_with_ebipone_balance=='3'){
            # Main Balance + Gift Balance diye pay korbe customer.
          
          # First a dekhi je, Gift jeta use korte parbe sei Gift amount ta tar Gift balance a ache ki na?
          # Second a dekhi je, (pay_amount - Gift balance) ei amount ta main balance a ache ki na?


          if(Auth::user()->user_giftbalance < $total_use_giftbalance){
            $notification=array(
                'messege'=>'Dear Customer, Your Gift Balance is insufficient to use',
                'alert-type'=>'error'
                );
            return redirect()->route('welcome')->with($notification);

          }elseif( (Cart::total() - $total_use_giftbalance) > Auth::user()->user_balance ){

            $notification=array(
                'messege'=>'Dear Customer, You need to upload money!',
                'alert-type'=>'error'
                );
            return redirect()->route('welcome')->with($notification);

          }
          else{
              # ekahne asa mane main + gift balance mile order kora jabe.

		$add_cashback = Auth::user()->user_cashback + $total_get_cashback ;
             
              $new_user_giftbalance = Auth::user()->user_giftbalance - $total_use_giftbalance; // ei gift balance amount ta minus hobe

              $new_user_balance = Auth::user()->user_balance - (Cart::total() - $total_use_giftbalance);


            $update = DB::table('users')->where('id',Auth::user()->id)->update(['user_balance'=>$new_user_balance,'user_giftbalance'=>$new_user_giftbalance,'user_cashback'=>$add_cashback]);

            
            $data['amount'] = Cart::total() - ($total_use_giftbalance) ;

            $data['pay_method'] = 'ebp_mbgftb';

            //return $data['amount'] ;
          
          }
        }
        


        

        // $data['pay_with_ebipone_balance']=$request->pay_with_ebipone_balance;

        
        $num = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT); // Random number for transaction id 

        
        //DATE & TIME 
        
       

        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        

        //BASIC
        $data['finalStatus']='pending'; 
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        $data['phone'] = Auth::user()->phone;
        $data['pay_price'] = $data['amount'];
        $data['address'] = Auth::user()->address;
        $data['status'] = 'complete';
        $data['admin_status'] = 'pending';
        $data['transaction_id']=$num; 
        $data['currency'] = 'BDT';

        // BILLING ADDRESS
        $data['billing_address'] = $request->billing_address; 
        $data['b_name'] = $request->b_name;
        $data['b_email'] = $request->b_email;
        $data['b_phone'] =$request->b_phone;
        $data['b_postcode'] =$request->b_postcode;
        $data['b_thana'] =$request->b_thana;
        $data['b_area'] =$request->b_area;
        $data['b_district'] =$request->b_district;

        // SHIPPING ADDRESS
        
        $data['shipping_address'] = $request->shipping_address; 
        $data['s_name'] = $request->s_name;
        $data['s_email'] = $request->s_email;
        $data['s_phone'] =$request->s_phone;
        $data['s_postcode'] =$request->s_postcode;
        $data['s_thana'] =$request->s_thana;
        $data['s_area'] =$request->s_area;
        $data['s_district'] =$request->s_district;


        if($request->same=='same'){
            $data['shipping_address'] = $request->billing_address; 
            $data['s_name'] = $request->b_name;
            $data['s_email'] = $request->b_email;
            $data['s_phone'] =$request->b_phone;
            $data['s_postcode'] =$request->b_postcode;
            $data['s_thana'] =$request->b_thana;
            $data['s_area'] =$request->b_area;
            $data['s_district'] =$request->b_district;
        }

        $data['who_orders']=Auth::user()->id; 
        $data['month'] = date("M"); 
        $data['order_time'] = date("h:i:sa"); 
        $data['order_date'] = $day.'-'.$month.'-'.$year; 

        $p_ids='';
        $shop_ids=''; 
        $p_qtys='';
        $p_colors='';
        $p_sizes='';

        $get_cashback='';
        $use_cashback='';
        $use_gift='';
        
        $i=0;


        
        $b_string=''; // for buy string.
        $p_string=''; // for pay string.
        
        foreach (Cart::content() as $p) {
            $i++;

        // for buy string 
            $product = DB::table('products')->where('id',$p->id)->first();
            if($b_string==''){
                $b_string = $product->buying_price;               // product vendor price ta nilam 
            }
            else{
                $b_string = $b_string.','.$product->buying_price; // product vendor price ta nilam
            }
        // for pay string 
            if($p_string==''){
                $p_string = $product->present_price;               // product_price ta nilam 
            }
            else{
                $p_string = $p_string.','.$product->present_price; // product_price ta nilam
            }

        // for products id

            if($p_ids==''){
                $p_ids = $p->id;
            }
            else{
                $p_ids = $p_ids.','.$p->id;
            }
        // for shops id

            if($shop_ids==''){
                $product = DB::table('products')->where('id',$p->id)->first();
                $shop_ids = $product->product_owner_id;
            }
            else{
                $shop_ids = $shop_ids.','.$product->product_owner_id;
            }
        // for quantity 

            if($p_qtys==''){
                $p_qtys = $p->qty;
            }
            else{
                $p_qtys = $p_qtys.','.$p->qty;
            }
        // for color 

            if($p_colors==''){
                $p_colors = $p->options->color;
            }
            else{
                $p_colors = $p_colors.','.$p->options->color;
            }
        // for size 

            if($p_sizes==''){
                $p_sizes = $p->options->size;
            }
            else{
                $p_sizes = $p_sizes.','.$p->options->size;
            }
        
        // for get cashback
        if($request->pay_with_ebipone_balance=='2'){

            // find product get cashback
            $product = DB::table('products')->where('id',$p->id)->first();


            if($get_cashback==''){

                $parcent = ( $p->qty *(($product->cashback) * ($product->present_price) / 100));

                $get_cashback = $parcent;
            }
            else{
                
                $parcent = ( $p->qty *(($product->cashback) * ($product->present_price) / 100));

                $get_cashback = $get_cashback.','.$parcent;
            }

            if($use_cashback==''){
                $parcent = ( $p->qty *(($product->cashback_use) * ($product->present_price) / 100));
                $use_cashback = $parcent;
            }
            else{
                $parcent = ( $p->qty *(($product->cashback_use) * ($product->present_price) / 100));
                $use_cashback = $use_cashback.','.$parcent;
            }
        }

        elseif($request->pay_with_ebipone_balance=='3'){

            // find product get gift balance
            $product = DB::table('products')->where('id',$p->id)->first();


            if($use_gift==''){
                $parcent = ( $p->qty *(($product->gift_use) * ($product->present_price) / 100));
                $use_gift = $parcent;
            }
            else{
                $parcent = ( $p->qty *(($product->gift_use) * ($product->present_price) / 100));
                $use_gift = $use_gift.','.$parcent;
            }
        }

        }

        $data['product_ids'] = $p_ids; 
        $data['shop_ids'] = $shop_ids; 
        $data['qtys'] = $p_qtys; 
        $data['product_colors'] = $p_colors; 
        $data['product_sizes'] = $p_sizes; 
        $data['total_product'] = $i;

        $data['get_cashback'] = $get_cashback; 
        $data['use_cashback'] = $use_cashback; 
        $data['use_gift'] = $use_gift; 

        $data['buy_string'] = $b_string; 
        $data['pay_string'] = $p_string; 


        //EMPTY PRODUCT ORDER ALERT CONDITION !!!!!!!!!!!!!!!!!!!!!!!;

        if($p_ids==''){

            Cart::destroy();

            $notification=array(
                'messege'=>'Product Empty in Cart! Order Failed!',
                'alert-type'=>'error'
                );
            
            return redirect()->route('home')->with($notification); 

        }

        $order = DB::table('orders')->insert($data);   // parent order place korlam. 


        // if order is successfull then decrease product 
        $s_order = DB::table('orders')->where('transaction_id', $num)->first();
        //return response()->json($s_order);

        // .......................................................................................... 

        $bb=$s_order->buy_string;
        $vendor_for_this = explode (",", $bb);

                            $pp=$s_order->pay_string;
                            $pay_for_this = explode (",", $pp);


        $id=$s_order->product_ids;
        $ids = explode (",", $id);

                            $qty=$s_order->qtys;
                            $q = explode (",", $qty);

        $s=$s_order->product_sizes;
        $sz = explode (",", $s);

                            $c=$s_order->product_colors;
                            $clr = explode (",", $c);

        $g_cb=$s_order->get_cashback;
        $g_c = explode (",", $g_cb);

                            $u_cb=$s_order->use_cashback;
                            $u_c = explode (",", $u_cb);

        $u_gft=$s_order->use_gift;
        $u_g = explode (",", $u_gft);

                            $loop_count = count($q);        

                            //return $loop_count;

        for($i = 0;$i<$loop_count;$i++){

                                // order kora product gulor quantity komano holo...

                                $ordr = DB::table('products')->where('id',$ids[$i])->first(); 
                                
                                $sub = (intval($ordr->product_quantity)) - intval($q[$i]); 
                                DB::table('products')->where('id',$ids[$i])->update(['product_quantity'=>$sub]);
                                
                                // ebar parent order table theke child order table a data insert korte hobe.... 
                                
                                $data = array();
                                $data['order_id'] = $s_order->id;
                                $data['warehouse_id'] = $s_order->warehouse_id;
                                $data['shop_id'] = $ordr->product_owner_id;
                                $data['product_id'] = $ids[$i];
                                $data['qty'] = $q[$i];

                                $data['vendor_price_for_this'] = $vendor_for_this[$i];
                                $data['selling_price_for_this'] = $pay_for_this[$i]; 

                                $data['sz'] = $sz[$i];
                                $data['clr'] = $clr[$i]; 
                                $data['status'] = '0';

                                $data['p_method'] = $s_order->pay_method;

                                if($request->pay_with_ebipone_balance=='2'){

                                    $data['g_cashback'] = $g_c[$i]; 
                                    $data['u_cashback'] = $u_c[$i];

                                }elseif($request->pay_with_ebipone_balance=='3'){

                                    $data['u_gift'] =     $u_g[$i];

                                }

                                
                                 
                                

                               // return response()->json($data);

                               DB::table('order_childs')->insert($data); 

        }

        Cart::destroy();

        $notification=array(
            'messege'=>'Order Place Successfull with eBipone Balance!',
            'alert-type'=>'info'
            );
        
        return redirect()->route('home')->with($notification); 

    }
}

