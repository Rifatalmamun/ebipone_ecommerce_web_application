<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class MicroController extends Controller
{
    public function index(){

        $microcategory = DB::table('micros')
                    ->join('subcategories','micros.subcategory_id','subcategories.id')
                    ->select('micros.*','subcategories.subcategory_name')
                    ->get();

        $subcategory = DB::table('subcategories')->get();

        return view('admin.micro.index',compact('microcategory','subcategory')); 
    }

    public function store(Request $request){

        $data = array();

        $data['microcategory_name'] = $request->microcategory_name;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['uploaded_date'] = date("d").'-'.date("M").'-'.date("Y"); 

        // return response()->json($data);

        $insert = DB::table('micros')->insert($data); 

            if($insert){
                $notification=array(
                    'messege'=>'Micro Category Inserted successfully !',
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

        $microcategory=DB::table('micros')->where('id',$id)->first();
        
        return response()->json($microcategory);
    }

    public function update(Request $request){

        $data = array();

        $data['microcategory_name'] = $request->microcategory_name;
        $data['subcategory_id'] = $request->subcategory_id;
        
        $update = DB::table('micros')->where('id',$request->microcategory_id)->update($data); 

            if($update){
                $notification=array(
                    'messege'=>'Micro Category updated successfully !',
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

        $delete_microcategory = DB::table('micros')->where('id',$id)->delete();

        if($delete_microcategory){

            $notification=array(
                    'messege'=>'Micro Category Deleted Successfully !',
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
