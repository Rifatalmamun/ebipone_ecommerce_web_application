<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class MoneyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $amount = $request->amount;

	$profit_manages = DB::table('profit_manages')->where('id','1')->first(); 

	if($profit_manages->min_upload>$amount){
		$notification=array(
				'messege'=>'Upload money can\'t less than ৳ '.$profit_manages->min_upload,
                            'alert-type'=>'error'
                            );
                        return Redirect()->back()->with($notification);
	}

        $data = array();

        $data['who_orders'] = Auth::user()->id;
        $data['reason'] = 'money_upload'; 

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
        $data['amount'] = $amount;
        $data['address'] = Auth::user()->address;
        $data['currency'] = 'BDT';

        // BILLING ADDRESS
        $data['billing_address'] = ''; 
        $data['b_name'] = Auth::user()->name;
        $data['b_email'] = Auth::user()->email;
        $data['b_phone'] = Auth::user()->phone;
        $data['b_postcode'] = Auth::user()->postcode;
        $data['b_thana'] = Auth::user()->thana;
        $data['b_area'] = Auth::user()->area;
        $data['b_district'] = Auth::user()->district; 

        // SHIPPING ADDRESS
        
        $data['shipping_address'] = ''; 
        $data['s_name'] = Auth::user()->name;
        $data['s_email'] = Auth::user()->email;
        $data['s_phone'] = Auth::user()->phone;
        $data['s_postcode'] = Auth::user()->postcode;
        $data['s_thana'] = Auth::user()->thana;
        $data['s_area'] = Auth::user()->area;
        $data['s_district'] = Auth::user()->district; 

        $data['product_ids'] = ''; 
        $data['shop_ids'] = ''; 
        $data['qtys'] = ''; 
        $data['product_colors'] = ''; 
        $data['product_sizes'] = ''; 

        $data['buy_string'] = null; 
        $data['pay_string'] = null; 

        // create a session

        $request->session()->put('orderdatasession', $data);   
        
        return view('templates.upload_money.invoice',compact('amount')); 
    }

}
