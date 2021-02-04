<?php

namespace App\Http\Controllers;

use DB;
use Cart;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;


class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '75848'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        $test = $request->session()->get('orderdatasession');

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $test['amount']; # You cant not pay less than 10 
        $post_data['currency'] = 'BDT';
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        // fetch data form session

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $test['name']  ;
        $post_data['cus_email'] = $test['email']  ;
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";                      
        $post_data['cus_city'] = "";                 
        $post_data['cus_state'] = "";                                 
        $post_data['cus_postcode'] = "";                                          
        $post_data['cus_country'] = "Bangladesh";                               
        $post_data['cus_phone'] = $test['phone'] ;                                        
        $post_data['cus_fax'] = "";                                                                                         

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";               
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004"; 

        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],

                'reason' => $test['reason'],

                'billing_address' => $test['billing_address'],
                'b_name' => $test['b_name'],
                'b_email' => $test['b_email'],
                'b_phone' => $test['b_phone'],
                'b_postcode' => $test['b_postcode'],
                'b_thana' => $test['b_thana'],
                'b_area' => $test['b_area'],
                'b_district' => $test['b_district'],

                'shipping_address' => $test['shipping_address'],
                's_name' => $test['s_name'],
                's_email' => $test['s_email'],
                's_phone' => $test['s_phone'],
                's_postcode' => $test['s_postcode'],
                's_thana' => $test['s_thana'],
                's_area' => $test['s_area'],
                's_district' => $test['s_district'],

                'who_orders' => $test['who_orders'],
                'order_date' => $test['order_date'],
                'order_time' => $test['order_time'],
                'product_ids' => $test['product_ids'],
                'shop_ids' => $test['shop_ids'],
                'qtys' => $test['qtys'],    
                'pay_price' => $test['amount'],    
                'product_colors' => $test['product_colors'],                                                                   
                'product_sizes' => $test['product_sizes'],

                'buy_string' => $test['buy_string'], // this is new ( buy_string  )
                'pay_string' => $test['pay_string'], // this is new ( pay_string  )

                'total_product' => Cart::count(),
                'month' => date('M'),                                                                                                              
            ]);

        $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here ) 
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request)
    {

                    echo "Transaction is Successful";

                    $tran_id = $request->input('tran_id');
                    $amount = $request->input('amount');
                    $currency = $request->input('currency');

                    $sslc = new SslCommerzNotification();

                    #Check order status in order tabel against the transaction id or order id.
                    $order_detials = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->select('transaction_id', 'status', 'currency', 'amount','reason')->first();

                    if ($order_detials->status == 'Pending') {
                        $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());

                        if ($validation == TRUE) {
                            /*
                            That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                            in order table as Processing or Complete.
                            Here you can also sent sms or email for successfull transaction to customer
                            */

                            $get_order = Db::table('orders')->where('transaction_id',$tran_id)->first();



                            if ($get_order->reason=='money_upload') {

                                $getId = DB::table('orders')->where('transaction_id',$tran_id)->first();
                                

                                $userDB = DB::table('users')->where('id',$getId->who_orders)->first();

                                $currentBalance = $userDB->user_balance;

                                $updatedBalance = $userDB->user_balance + $getId->amount;


                                // Start of checking first upload or not? 
                            
                                $count_upload_money = DB::table('orders')->where('who_orders',$getId->who_orders)->where('status','complete')->where('reason','money_upload')->count();

                                // End of checking first upload or not?

                                if ($count_upload_money==0) {
                                    // for first time upload

                                    $updateGiftBalance = $userDB->user_giftbalance + $getId->amount;

                                    DB::table('users')->where('id',$getId->who_orders)->update(['user_balance'=>$updatedBalance,'user_giftbalance'=>$updateGiftBalance,'first_upload'=>'1']);

                                } else {
                                    // not first time upload

                                     DB::table('users')->where('id',$getId->who_orders)->update(['user_balance'=>$updatedBalance]);
                                }  


                                $update_product = DB::table('orders')
                                ->where('transaction_id', $tran_id)
                                ->update(['status' => 'complete']); 

                                $notification=array(
                                    'messege'=>'Money Upload Successfull !',
                                    'alert-type'=>'info'
                                    );
                                
                                return redirect()->route('welcome')->with($notification);  
                            } 
                            

                            $order_district = $get_order->s_district; 
                            $get_order_warehouse = DB::table('warehouses')->where('w_district',$order_district)->first();



                            if($get_order_warehouse){

                                $update_product = DB::table('orders')
                                ->where('transaction_id', $tran_id)
                                ->update(['status' => 'complete','warehouse_id'=>$get_order_warehouse->id]); 

                            }else{

                                $update_product = DB::table('orders')
                                ->where('transaction_id', $tran_id)
                                ->update(['status' => 'complete']); 
                                
                            }


                            echo "<br >Transaction is successfully Completed";

                            Cart::destroy();

                            // if order is successfull then decrease product 
                            $s_order = DB::table('orders')->where('transaction_id', $tran_id)->first();
                            // .......................................................................................... 



                            $id=$s_order->product_ids;
                            $ids = explode (",", $id);

                            $qty=$s_order->qtys;
                            $q = explode (",", $qty);

                            $s=$s_order->product_sizes;
                            $sz = explode (",", $s);

                            $c=$s_order->product_colors;
                            $clr = explode (",", $c);

                            $bb=$s_order->buy_string;
                            $vendor_for_this = explode (",", $bb);

                            $pp=$s_order->pay_string;
                            $pay_for_this = explode (",", $pp);

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

                                DB::table('order_childs')->insert($data); 

                            }



                            $notification=array(
                                'messege'=>'Payment successfull !',
                                'alert-type'=>'info'
                                );
                            
                            return redirect()->route('welcome')->with($notification);  

                        } else {

                            $update_product = DB::table('orders')
                                ->where('transaction_id', $tran_id)
                                ->update(['status' => 'Failed']);
                            echo "validation Fail";
                        }
                    } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
                        /*
                        That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
                        */
                        echo "Transaction is successfully Completed";
                    } else {
                        #That means something wrong happened. You can redirect customer to your product page.
                        echo "Invalid Transaction";
                    }
        
        


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
