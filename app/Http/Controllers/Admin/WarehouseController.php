<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use Image;

class WarehouseController extends Controller
{
    public function updatePickupPoint(Request $request){


        $id = $request->warehouse_id;

        $data=array();

    	$data['w_name']=$request->w_name;
    
        $data['phone']=$request->phone;
        $data['w_trade_no']=$request->w_trade_no;

        $data['w_district']=$request->w_district;
        $data['w_location']=$request->w_location;

        
        $old_logo  = $request->old_logo;
        $old_banner  = $request->old_banner;
        $old_w_trade_picture  = $request->old_w_trade_picture;

        $logo  = $request->logo;
        $banner  = $request->banner;
        $w_trade_picture  = $request->w_trade_picture;

        //return response()->json($data);

        if($logo){ 

            if($old_logo){
                unlink($request->old_logo);
            }
            $image_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                Image::make($logo)->resize(150,150)->save('public/media/w_logo/'.$image_name);
                $data['logo']='public/media/w_logo/'.$image_name;
        }

        if($banner){ 

            if($old_banner){
                unlink($request->old_banner);
            }
            $image_name= hexdec(uniqid()).'.'.$banner->getClientOriginalExtension();
            Image::make($banner)->resize(1110,150)->save('public/media/w_banner/'.$image_name); 
            $data['banner']='public/media/w_banner/'.$image_name;
        }


        if($w_trade_picture){ 

            if($old_w_trade_picture){
                unlink($request->old_w_trade_picture);
            }
            $image_name= hexdec(uniqid()).'.'.$w_trade_picture->getClientOriginalExtension();
                Image::make($w_trade_picture)->resize(500,500)->save('public/media/w_trade/'.$image_name);
                $data['w_trade_picture']='public/media/w_trade/'.$image_name;
        }

        $update = DB::table('warehouses')->where('id',$id)->update($data);


        if($update){
            $notification=array(
                'messege'=>'Pickup Point Updated Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->back()->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Pickup Point data reamin same !',
                'alert-type'=>'warning'
                 );
            return Redirect()->back()->with($notification);   
        }

    }



    public function all_warehouse(){

        $warehouse = DB::table('warehouses')->join('users','users.id','warehouses.user_id')
                    ->select('warehouses.*','users.name','users.shop_name')->where('warehouses.w_status','active')->get();

        $tag = 'Active Pickup Point';

        return view('admin.warehouse.index',compact('warehouse','tag'));                                       

    }
    public function pending_warehouse(){

        $warehouse = DB::table('warehouses')->join('users','users.id','warehouses.user_id')
                    ->select('warehouses.*','users.name','users.shop_name')->where('warehouses.w_status','pending')->get();

        $tag = 'Pending Pickup Point';

        return view('admin.warehouse.index',compact('warehouse','tag'));                                       

    }
    
    public function block_warehouse(){

        $warehouse = DB::table('warehouses')->join('users','users.id','warehouses.user_id')
                    ->select('warehouses.*','users.name','users.shop_name')->where('warehouses.w_status','block')->get();

        $tag = 'Block Pickup Point';

        return view('admin.warehouse.index',compact('warehouse','tag'));                                       

    }


    public function single_warehouse($id){

        $warehouse = DB::table('warehouses')->where('id',$id)->first();

        $owner = DB::table('users')->where('id',$warehouse->user_id)->first();

        //return response()->json($owner); 

        return view('admin.warehouse.show',compact('warehouse','owner'));
    }



    public function approve($id){ 

        $update = DB::table('warehouses')->where('id',$id)->update(['w_status'=>'active']);

        
        if($update){
            $notification=array(
                'messege'=>'Warehouse Active Successfully!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'info'
                );
        }
        
        return Redirect()->back()->with($notification); 
    }
    
    public function block($id){

        $update = DB::table('warehouses')->where('id',$id)->update(['w_status'=>'block']);

        
        if($update){
            $notification=array(
                'messege'=>'Warehouse Blcoked Successfully!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'info'
                );
        }
        
        return Redirect()->back()->with($notification); 
    }
    public function unblock($id){

        $update = DB::table('warehouses')->where('id',$id)->update(['w_status'=>'active']);
        
        if($update){
            $notification=array(
                'messege'=>'Shop Un-Blcoked Successfully!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong !',
                'alert-type'=>'info'
                );
        }
        
        return Redirect()->back()->with($notification); 
    }



}
