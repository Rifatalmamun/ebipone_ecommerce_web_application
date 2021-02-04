<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class ShopController extends Controller
{
    public function index(){

        $shop = DB::table('users')->where('isVendor',1)->where('shop_status','approve')->get();

        return view('admin.shop.index',compact('shop'));
    }

    public function pendingShop(){

        $shop = DB::table('users')->where('isVendor',1)->where('shop_status','pending')->get();

        return view('admin.shop.index',compact('shop'));
    }

    public function blockShop(){

        $shop = DB::table('users')->where('isVendor',1)->where('shop_status','block')->get();

        return view('admin.shop.index',compact('shop'));
    }
 
    public function edit($id){

        $shop = DB::table('users')->where('id',$id)->first();

        return view('admin.shop.edit',compact('shop'));
    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'shop_name' => 'required', 'string', 'shop_name','min:3', 'max:180', 'unique:users',
            'shop_phone' => 'required | numeric | digits:11',
            "shop_logo"  => "dimensions:max_width=150,max_height=150",
            "shop_banner"  => "dimensions:max_width=1110,max_height=150",
        ]);

        $shopName = str_replace("-", "",$request->shop_name);
        $shopName = str_replace("'", "",$shopName);
	$shopName = str_replace(".", "",$shopName);
        $shopName = str_replace("/", "", $shopName);

        $id = $request->id;

        $data=array();

    	$data['shop_name'] = $shopName;
    	$data['shop_phone'] = $request->shop_phone;
        $data['shop_trad_no'] = $request->shop_trad_no;

        // $data['shop_balance'] = $request->shop_balance;
        // $data['pending_delivery'] = $request->pending_delivery;
        // $data['pending_withdraw'] = $request->pending_withdraw;
        
        $data['shop_address']=$request->shop_address;
        
        if($request->show_home){
            $data['show_home'] = $request->show_home;
        }else{
            $data['show_home'] = 'no';
        }

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
            return Redirect()->route('admin.index.shop')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'No Change !',
                'alert-type'=>'warning'
                 );
            return Redirect()->route('admin.index.shop')->with($notification);   
        }
    }

    public function show($id){



        $shop = DB::table('users')->where('id',$id)->first();

        $shop_products = DB::table('products')->where('product_owner_id',$shop->id)->get(); 
	
	

        return view('admin.shop.show',compact('shop','shop_products'));
    }

    public function approve($id){

        $update = DB::table('users')->where('id',$id)->update(['shop_status'=>'approve']);

        
        if($update){
            $notification=array(
                'messege'=>'Shop Approved Successfully!',
                'alert-type'=>'success'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'warning'
                );
        }
        
        return Redirect()->route('admin.dashboard')->with($notification); 
    }

    public function block($id){

        $update = DB::table('users')->where('id',$id)->update(['shop_block'=>'0','shop_status'=>'block']);

        
        if($update){
            $notification=array(
                'messege'=>'Shop Blcoked Successfully!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'warning'
                );
        }
        
        return Redirect()->back()->with($notification); 
    }
    public function unblock($id){

        $update = DB::table('users')->where('id',$id)->update(['shop_block'=>'0','shop_status'=>'approve']);

        
        if($update){
            $notification=array(
                'messege'=>'Shop Un-Blcoked Successfully!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'warning'
                );
        }
        
        return Redirect()->back()->with($notification); 
    }
}
