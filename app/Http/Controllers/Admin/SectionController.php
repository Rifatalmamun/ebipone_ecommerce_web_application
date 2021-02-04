<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;

class SectionController extends Controller
{


    public function homeShop(){

        $shop = DB::table('users')->where('isVendor','1')->get();

        return view('admin.section.homeShop',compact('shop')); 

    }

    public function storeHomeShop(Request $request){

        $shop = DB::table('users')->where('isVendor','1')->get();

        $shopId = '';

        // collect shop id in a single variable

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

        // make all this collect id brand column show_home value no to yes

        $shopIds_explode = explode (",", $shopId); 

        $makeAllShopShowHomeValueNo = DB::table('users')->update(['show_home'=>'no']); 

        foreach ($shopIds_explode as $id) {

            $updateShopShowHomeValue = DB::table('users')->where('id',$id)->update(['show_home'=>'yes']);
        }
        
        $data = array();
        $data['home_shop']=$shopId; 

        //return response()->json($data); 

        $update = DB::table('homs')->where('id',1)->update($data); 

        if($update){
            $notification=array(
                'messege'=>'Updated!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong!',
                'alert-type'=>'warning'
                );
        }
        return Redirect()->back()->with($notification); 
    }

    public function homeBrand(){

        $brand = DB::table('brands')->get();

        return view('admin.section.homeBrand',compact('brand')); 

    }

    public function storeHomeBrand(Request $request){

        $brand = DB::table('brands')->get();

        $brandId = '';

        // collect brand id in a single variable

        foreach ($brand as $s) {
            $n = $s->id;

            if($request->$n){
                if($brandId==''){
                    $brandId=$s->id;
                }else{
                    $brandId =$brandId.','.$s->id;
                }
            }
        }

        // make all this collect id brand column show_home value no to yes

        $bramdIds_explode = explode (",", $brandId); 

        $makeAllBrandShowHomeValueNo = DB::table('brands')->update(['show_home'=>'no']); 

        foreach ($bramdIds_explode as $id) {

            $updateBrandShowHomeValue = DB::table('brands')->where('id',$id)->update(['show_home'=>'yes']);
        }
        
        $data = array();
        $data['home_brand']=$brandId; 

        //return response()->json($data); 

        $update = DB::table('homs')->where('id',1)->update($data); 

        if($update){
            $notification=array(
                'messege'=>'Updated!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong!',
                'alert-type'=>'warning'
                );
        }
        return Redirect()->back()->with($notification); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sections')->join('categories','sections.category_id','categories.id')->select('sections.*','categories.category_name')->get();

        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->get();
                                                                                                                        
        return view('admin.section.index',compact('data','category','subcategory')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['section_title'] = $request->section_title;
        $data['category_id'] = $request->category_id;

        $subcategory = DB::table('subcategories')->get();

        $subId = '';

        foreach ($subcategory as $s) {
            $n = $s->id;

            if($request->$n){
                if($subId==''){
                    $subId=$s->id;
                }else{
                    $subId =$subId.','.$s->id;
                }
            }
        }

        $data['subcat_ids']=$subId;                     

        //return response()->json($data);                                                    

        $insert = DB::table('sections')->insert($data); 

        if($insert){
            $notification=array(
                'messege'=>'New Section Added!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong!',
                'alert-type'=>'warning'
                );
        }
        return Redirect()->route('admin.section')->with($notification); 
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
       $delete = DB::table('sections')->delete($id);

        if($delete){
            $notification=array(
                'messege'=>'Delete Successfully!',
                'alert-type'=>'info'
                );
        }else{
            $notification=array(
                'messege'=>'Something wrong!',
                'alert-type'=>'warning'
                );
        }

        return Redirect()->back()->with($notification);  
    }
}
