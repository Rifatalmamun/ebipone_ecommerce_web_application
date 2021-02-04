<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class SubCategoryController extends Controller
{
    public function index(){

        $subcategory = DB::table('subcategories')
                    ->join('categories','subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category_name')
                    ->get();

        $category = DB::table('categories')->get();

        return view('admin.subcategory.index',compact('subcategory','category')); 
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|min:3|max:30',
        ]);



        $data = array();

        $data['subcategory_name'] = $request->subcategory_name;
        $data['category_id'] = $request->category_id;
        $data['uploaded_date'] = date("d").'-'.date("M").'-'.date("Y"); 

        // Manage Url --  subcategory name
        $url  = $request->subcategory_name; 
        $url = str_replace("&", "", $url);
        $url = str_replace("'", "", $url);
        $url = rtrim($url,'.');
        $url = strtolower($url);
        $url = str_replace("  ", " ", $url);

        $data['url_name'] = $url;

        $insert = DB::table('subcategories')->insert($data); 

            if($insert){
                $notification=array(
                    'messege'=>'Sub Category Inserted successfully !',
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

        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        
        return response()->json($subcategory);
    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|min:3|max:30',
        ]);

        $data = array();

        $data['subcategory_name'] = $request->subcategory_name;
        $data['category_id'] = $request->category_id;

        // Manage Url --  subcategory name
            $url  = $request->subcategory_name;  
            $url = str_replace("&", "", $url);
            $url = str_replace("'", "", $url);
            $url = rtrim($url,'.');
            $url = strtolower($url);
            $url = str_replace("  ", " ", $url);
        $data['url_name'] = $url;
        
        $update = DB::table('subcategories')->where('id',$request->subcategory_id)->update($data); 

            if($update){
                $notification=array(
                    'messege'=>'Sub Category updated successfully !',
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

        $delete_subcategory = DB::table('subcategories')->where('id',$id)->delete();

        if($delete_subcategory){

            $notification=array(
                    'messege'=>'Sub Category Deleted Successfully !',
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
