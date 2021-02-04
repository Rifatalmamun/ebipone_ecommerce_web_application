<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;


class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $gift = DB::table('gifts')->get();

        return view('templates.gift.index',compact('gift'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($voucher_code)
    {
        $gift = DB::table('gifts')->where('voucher_code',$voucher_code)->first();

        //return response()->json($gift); 

        return view('templates.gift.show',compact('gift'));                                                                 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function giftInvoice($voucher_code){

        $gift = DB::table('gifts')->where('voucher_code',$voucher_code)->first();

        //return response()->json($gift);

        return view('templates.gift.invoice',compact('gift'));

    }

    public function purchaseComplete($id){

        $gift = DB::table('gifts')->where('id',$id)->first();

        date_default_timezone_set('Asia/Dhaka');
        $today = date("Y-m-d");

        $data = array();
        
        $data['gift_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        $data['invoice_no'] = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
        $data['amount'] = $gift->amount;    
        $data['offer'] = $gift->offer;  
        $data['purchase_date'] =  $today;
        $data['duration'] = $gift->time_duration;
        $data['pay_date'] = date('Y-m-d', strtotime($today. ' + '.$gift->time_duration.' days')); 

        // minus gift amount from main balance

        $main_balance = Auth::user()->user_balance;
        $after_payment = $main_balance - $gift->amount; 

        $gift_pending = Auth::user()->gift_pending + ($gift->amount + $gift->offer);


        $update_main_balance = DB::table('users')->where('id',Auth::user()->id)->update(['user_balance'=>$after_payment,'gift_pending'=>($gift_pending)]) ;

        //return response()->json($data);
        
        $insert = DB::table('giftpurchases')->insert($data); 

        if($insert){
            $notification=array(
                'messege'=>'Gift Voucher Buy Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->route('home')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Something Wrong !',
                'alert-type'=>'error'
                 );
            return Redirect()->back()->with($notification);   
        }
        //return $id;
    }

    public function myGiftPendingHistory(){

        $giftHistory = DB::table('giftpurchases')->where('user_id',Auth::user()->id)
                        ->join('gifts','giftpurchases.gift_id','gifts.id')
                        ->select('giftpurchases.*','gifts.voucher_name')
                        ->get();

        $gift_count = DB::table('giftpurchases')->where('user_id',Auth::user()->id)->count();

        return view('templates.gift.my_gift_history',compact('giftHistory','gift_count'));

    }
}
