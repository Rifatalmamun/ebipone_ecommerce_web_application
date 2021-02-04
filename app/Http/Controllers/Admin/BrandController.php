<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class BrandController extends Controller
{
    public function index(){

        $brand = DB::table('brands')->get();

        return view('admin.brand.index',compact('brand'));
    }

    public function store(Request $request){

        $data = array();

        $data['brand_name'] = $request->brand_name;
        $data['uploaded_date'] = date("d").'-'.date("M").'-'.date("Y"); 
	
	if($request->show_home==null){
            $data['show_home'] = 'no';
        }else{
            $data['show_home'] = $request->show_home;
        }
		
        $brand_picture  = $request->brand_picture;    
    
            if($brand_picture){ 
                $image_name= hexdec(uniqid()).'.'.$brand_picture->getClientOriginalExtension();
                    Image::make($brand_picture)->save('public/media/brand/'.$image_name);    
                    $data['brand_picture']='public/media/brand/'.$image_name;
            }

            $insert = DB::table('brands')->insert($data); 

        
            if($insert){
                $notification=array(
                    'messege'=>'Brand Inserted successfully !',
                    'alert-type'=>'info'
                    );
            }else{
                $notification=array(
                    'messege'=>'Something wrong !',
                    'alert-type'=>'error'
                    );
            }
            return Redirect()->back()->with($notification);  
    }

    public function edit($id){

        $brand=DB::table('brands')->where('id',$id)->first();
        
        return response()->json($brand);
    }

    public function update(Request $request){

        $data = array();
        
        $data['brand_name'] = $request->brand_name;

        $old_brand_picture  = $request->old_brand_picture;    
        $brand_picture  = $request->brand_picture;    
    
            if($brand_picture){ 

                if($old_brand_picture){
                    unlink($request->old_brand_picture); 
                }

                $image_name= hexdec(uniqid()).'.'.$brand_picture->getClientOriginalExtension();
                    Image::make($brand_picture)->save('public/media/brand/'.$image_name);    
                    $data['brand_picture']='public/media/brand/'.$image_name;
            }

            $update = DB::table('brands')->where('id',$request->brand_id)->update($data); 

        
            if($update){
                $notification=array(
                    'messege'=>'Brand update successfully !',
                    'alert-type'=>'info'
                    );
            }else{
                $notification=array(
                    'messege'=>'Something wrong !',
                    'alert-type'=>'error'
                    );
            }
            return Redirect()->back()->with($notification);  

    }

    public function destroy($id){

        $deleted_brand = DB::table('brands')->where('id',$id)->first();

        if($deleted_brand->brand_picture!=null){

            unlink($deleted_brand->brand_picture); 
            
        }

        $delete_brand = DB::table('brands')->where('id',$id)->delete();

        if($delete_brand){

            $notification=array(
                    'messege'=>'Brand Deleted Successfully !',
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
