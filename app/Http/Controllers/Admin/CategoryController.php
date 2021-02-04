<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;
class CategoryController extends Controller
{
    public function index(){

        $category = DB::table('categories')->get();

        return view('admin.category.index',compact('category'));
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|min:3|max:30',
            'category_picture' => 'required|mimes:jpeg,jpg,png|max:30'
        ]);

        $data = array();

        $data['category_name'] = $request->category_name;
        $data['uploaded_date'] = date("d").'-'.date("M").'-'.date("Y"); 

        // Manage Url --  category name
        $url  = $request->category_name; 
        $url = str_replace("&", "", $url);
        $url = str_replace("'", "", $url);
        $url = rtrim($url,'.');
        $url = strtolower($url);
        $url = str_replace("  ", " ", $url);

        $data['url_name'] = $url;


        $category_picture  = $request->category_picture;    
    
            if($category_picture){ 
                $image_name= hexdec(uniqid()).'.'.$category_picture->getClientOriginalExtension();
                    Image::make($category_picture)->save('public/media/category/'.$image_name);    
                    $data['category_picture']='public/media/category/'.$image_name;
            }

            $insert = DB::table('categories')->insert($data); 

        
            if($insert){
                $notification=array(
                    'messege'=>'Category Inserted successfully !',
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

        $category=DB::table('categories')->where('id',$id)->first();
        
        return response()->json($category);
    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|min:3|max:30',
            'category_picture' => 'required|mimes:jpeg,jpg,png|max:30'
        ]);

        $data = array();
        
        $data['category_name'] = $request->category_name;
        
        // Manage Url --  subcategory name
            $url  = $request->category_name; 
            $url = str_replace("&", "", $url);
            $url = str_replace("'", "", $url);
            $url = rtrim($url,'.');
            $url = strtolower($url);
            $url = str_replace("  ", " ", $url);

            $data['url_name'] = $url;

        $old_category_picture  = $request->old_category_picture;    
        $category_picture  = $request->category_picture;    
    
            if($category_picture){ 

                if($old_category_picture){
                    unlink($request->old_category_picture); 
                }

                $image_name= hexdec(uniqid()).'.'.$category_picture->getClientOriginalExtension();
                    Image::make($category_picture)->save('public/media/category/'.$image_name);    
                    $data['category_picture']='public/media/category/'.$image_name;
            }

            $update = DB::table('categories')->where('id',$request->category_id)->update($data); 

        
            if($update){
                $notification=array(
                    'messege'=>'Category update successfully !',
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

        $deleted_category = DB::table('categories')->where('id',$id)->first();

        if($deleted_category->category_picture!=null){

            unlink($deleted_category->category_picture); 
            
        }

        $delete_category = DB::table('categories')->where('id',$id)->delete();

        if($delete_category){

            $notification=array(
                    'messege'=>'Category Deleted Successfully !',
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
