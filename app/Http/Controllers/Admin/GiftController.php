<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Image;
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
        $gift = DB::table('gifts')->orderBy('id','DESC')->get();
        return view('admin.gift.index',compact('gift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $shop = DB::table('users')->where('isVendor',1)->where('shop_block',0)->where('shop_status','approve')->get();

       // return response()->json($shop);

        return view('admin.gift.create',compact('shop')); 
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
            'voucher_picture' => 'mimes:jpeg,jpg,png|max:500', 
        ]);

        // $vCode = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);

        $data = array();
        $data['voucher_name'] = $request->voucher_name;
        $data['voucher_code'] = $request->voucher_code;
        $data['time_duration'] = $request->time_duration;
        $data['amount'] = $request->amount;
        $data['offer'] = $request->offer;
        $data['balance'] = $request->balance;
        $data['description'] = $request->description; 

        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;

        $data['status']='active';   
        $data['show_home'] ='yes';  
        
        


        // STAR :  TAKE GIFT AVAILABLE SHOP 
            
        $shop = DB::table('users')->where('isVendor',1)->where('shop_block',0)->where('shop_status','approve')->get(); 

        $shopId = '';

        foreach ($shop as $s) {
            $n = $s->id;

            if($request->$n){
                if($shopId==''){
                    $shopId=$s->id;
                }else{
                    $shopId =$shopId.','.$s->id;
                }
            }
        }

        //$shopIds_explode = explode (",", $shopId); 

        // foreach ($shopIds_explode as $id) {

        //     $updateShopShowHomeValue = DB::table('users')->where('id',$id)->update(['show_home'=>'yes']);
        // }
        
        $data['shop_ids'] = $shopId; 

        // END :   TAKE GIFT AVAILABLE SHOP
        

        $voucher_picture  = $request->voucher_picture;

        if($voucher_picture){ 
            $image_name= hexdec(uniqid()).'.'.$voucher_picture->getClientOriginalExtension();
                Image::make($voucher_picture)->resize(500,500)->save('public/media/voucher/'.$image_name);
                $data['voucher_picture']='public/media/voucher/'.$image_name;   
        }

        $insert = DB::table('gifts')->insert($data);

        if($insert){
            $notification=array(
                'messege'=>'Gift Voucher Created Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->route('admin.index.giftvoucher')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Something Wrong !',
                'alert-type'=>'error'
                 );
            return Redirect()->back()->with($notification);   
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gift = DB::table('gifts')->where('id',$id)->first();

        return view('admin.gift.edit',compact('gift')); 
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
            'voucher_picture' => 'mimes:jpeg,jpg,png|max:500', 
        ]);

        $id = $request->id;    

        $data = array();
        $data['voucher_name'] = $request->voucher_name;
        $data['voucher_code'] = $request->voucher_code;
        $data['time_duration'] = $request->time_duration;
        $data['amount'] = $request->amount;
        $data['offer'] = $request->offer;
        $data['balance'] = $request->balance;
        $data['description'] = $request->description; 

        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;

        $data['status']='active';   
        $data['show_home'] ='yes';   
        

        $voucher_picture  = $request->voucher_picture;
        $old_voucher_picture  = $request->old_voucher_picture;

        if($voucher_picture){ 

            if($old_voucher_picture!=null){
                unlink($old_voucher_picture);
            }
            $image_name= hexdec(uniqid()).'.'.$voucher_picture->getClientOriginalExtension();
                Image::make($voucher_picture)->resize(500,500)->save('public/media/voucher/'.$image_name);
                $data['voucher_picture']='public/media/voucher/'.$image_name;   
        }

        $update = DB::table('gifts')->where('id',$id)->update($data);              

        if($update){
            $notification=array(
                'messege'=>'Gift Voucher Updated Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->route('admin.index.giftvoucher')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'No Change !',
                'alert-type'=>'warning'
                 );

            return Redirect()->route('admin.index.giftvoucher')->with($notification); 
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
        $get_voucher = DB::table('gifts')->where('id',$id)->first();

        if($get_voucher->voucher_picture!=null){
            unlink($get_voucher->voucher_picture);
        }

        $delete = DB::table('gifts')->where('id',$id)->delete();

        if($delete){

            $notification=array(
                    'messege'=>'Gift Voucher Deleted Successfully !',
                    'alert-type'=>'info'
                    );
        }else{
            $notification=array(
                'messege'=>'Something Wrong !',
                'alert-type'=>'error'
                );
        }

        return Redirect()->back()->with($notification);    
    }
}
