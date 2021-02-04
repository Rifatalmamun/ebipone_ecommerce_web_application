<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;

class ProfiltController extends Controller
{
    public function index(){

        $data = DB::table('profit_manages')->where('id','1')->first();

        return view('admin.manage_profit.index',compact('data'));
    }

    public function update(Request $request){

        $data = array();

        $data['warehouse_percent'] = $request->warehouse_percent;
        $data['system_percent'] = $request->system_percent;
        $data['call_center_percent'] = $request->call_center_percent;
        $data['orjon_percent'] = $request->orjon_percent;
        $data['marketing_percent'] = $request->marketing_percent;
        $data['shipping_charge'] = $request->shipping_charge;
	$data['min_upload'] = $request->min_upload; 


        if(($request->warehouse_percent + $request->system_percent + $request->call_center_percent + $request->orjon_percent + $request->marketing_percent )==100){
                
            $update = DB::table('profit_manages')->where('id','1')->update($data);

            if($update){
                $notification=array(
                    'messege'=>'Update successfully !',
                    'alert-type'=>'info'
                    );
            }else{
                $notification=array(
                    'messege'=>'No Change !',
                    'alert-type'=>'error'
                    );
            }
        }
        elseif(($request->warehouse_percent + $request->system_percent + $request->call_center_percent + $request->orjon_percent + $request->marketing_percent )<=100){

            $notification=array(
                'messege'=>'Check your input percentage, its less than 100!!',
                'alert-type'=>'error'
                );
        }else{
            $notification=array(
                'messege'=>'Check your input percentage, its more than 100!!',
                'alert-type'=>'error'
                );   
        }

        return Redirect()->back()->with($notification); 
    }
}
