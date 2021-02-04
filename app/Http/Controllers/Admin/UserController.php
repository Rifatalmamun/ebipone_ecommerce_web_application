<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;

class UserController extends Controller
{

    public function addNote(Request $request){



        return 'add note works'; 

    }

    public function verifyEmail($id){

        $email_verify = date('Y-m-d H:i:s', time() - 6*3600);
        
        $update = DB::table('users')->where('id',$id)->update(['email_verified_at'=>$email_verify]);

        if($update){
            $notification=array(
                'messege'=>'Email Verify Successfully !',
                'alert-type'=>'info'
                 );
        }
        else
        {
            $notification=array(
                'messege'=>'Opps! Something Wrong !',
                'alert-type'=>'error'
                 );
        }

        return Redirect()->back()->with($notification); 
    }

    public function verifyAllEmail(){

        $email_verify = date('Y-m-d H:i:s', time() - 6*3600);

        $update = DB::table('users')->where('email_verified_at',null)->update(['email_verified_at'=>$email_verify]);

        if($update){
            $notification=array(
                'messege'=>'Email Verify Successfully !',
                'alert-type'=>'info'
                 );
        }
        else
        {
            $notification=array(
                'messege'=>'Opps! Something Wrong !',
                'alert-type'=>'error'
                 );
        }

        return Redirect()->back()->with($notification); 

    }

    public function unVerifiedUser()
    {
        $data = DB::table('users')->where('email_verified_at',null)->get();

        $pageTag = 'Un-verified Customers List';
	
        return view('admin.customer.index',compact('data','pageTag'));
    }

    public function index()
    {
        $data = DB::table('users')->get();
        $pageTag = 'Customers List';

        return view('admin.customer.index',compact('data','pageTag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = DB::table('users')->where('id',$id)->first();

        $customerUploadMoney = DB::table('orders')->where('who_orders',$id)->where('status','complete')->where('reason','money_upload')->get();

        $customerOrder = DB::table('orders')->where('who_orders',$id)->where('status','complete')->where('reason','order_product')->get();

        $flag = 0;

        if($customer==null){
            $flag = 1;
        }

        //return response()->json($note);

        return view('admin.customer.show',compact('customer','flag','customerUploadMoney','customerOrder'));
    }


    public function userAllLogo($id){

        $userLogo = DB::table('logos')->where('user_id',$id)->get();

        return view('admin.customer.userLogo',compact('userLogo')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::table('users')->where('id',$id)->first();

        $note = DB::table('customer_notes')->where('id',$id)->get();


        $flag = 0;

        if($customer==null){
            $flag = 1;
        }

        return view('admin.customer.edit',compact('customer','note','flag')); 
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

            'phone' => 'required|digits:11',
        ]);

        $id = $request->id;

        $data=array();

        $data['user_balance']=$request->user_balance;
        $data['user_cashback']=$request->user_cashback;
        $data['user_giftbalance']=$request->user_giftbalance;
        $data['gift_pending']=$request->gift_pending; 

    	$data['name']=$request->name;
    	$data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['village']=$request->village;
        $data['postcode']=$request->postcode;
        $data['ps']=$request->ps;
        $data['district']=$request->district;
        $data['address']=$request->village.'-'.$request->ps.'-'.$request->district;
        


        $update = DB::table('users')->where('id',$id)->update($data);

        date_default_timezone_set("Asia/Dhaka");

        $day = date("d");
        $month = date("M");
        $year = date("Y");

        $date = $day.'-'.$month.'-'.$year; 

        //return $date;

        $time = date("h:i:sa");

            $ndata = array();

            $ndata['user_id'] = $id;
            $ndata['note'] = $request->note;
            
            $ndata['date'] = $date;
            $ndata['time'] = $time;



            $noteFlatg = 0;

            if ($request->note!=null || $request->note!='') {
                
                

                $insert_note = DB::table('customer_notes')->insert($ndata);
                $noteFlatg = 1;
            }

        if($update || $noteFlatg==1){
            $notification=array(
                'messege'=>'Customer data Updated Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->back()->with($notification); 
        }else{
            $notification=array(
                'messege'=>'No Change !',
                'alert-type'=>'warning'
                 );
            return Redirect()->back()->with($notification);    
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
        
    }
    
}
